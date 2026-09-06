<?php
declare(strict_types=1);
require __DIR__ . '/_lib/bootstrap.php';
require __DIR__ . '/_lib/auth.php';

if (!instalado()) {
    http_response_code(503);
    exit;
}

/** Datos que ve el lector de si mismo. Nunca su perfil ni sus pesos. */
function datos_lector(array $ej): array
{
    $t = (int)db()->query('SELECT COUNT(*) FROM versiculos')->fetchColumn();
    return [
        'nombre'    => $ej['nombre'],
        'numero'    => (int)$ej['numero'],
        'estado'    => $ej['estado'],
        'total'     => $t,
        'terminado' => $ej['terminado_en'] !== null,
    ];
}

/** Dos lineas del parrafo, lo justo para que confirme que apunta donde cree. */
function extracto(string $texto, int $limite = 150): string
{
    if (mb_strlen($texto) <= $limite) {
        return $texto;
    }
    $corte  = mb_substr($texto, 0, $limite);
    $ultimo = mb_strrpos($corte, ' ');
    return rtrim(mb_substr($corte, 0, $ultimo ?: $limite), ' ,.;:') . '...';
}

$accion = $_GET['a'] ?? '';

switch ($accion) {

    case 'pin':
        $d     = entrada();
        $token = (string)($d['token'] ?? '');
        $pin   = preg_replace('/\D/', '', (string)($d['pin'] ?? ''));
        if ($token === '' || strlen($pin) !== 6) {
            json_error('Faltan la clave o el ejemplar.');
        }
        if (pin_bloqueado($token)) {
            json_error('Demasiados intentos. Prueba dentro de un rato.', 429);
        }
        $q = db()->prepare('SELECT * FROM ejemplares WHERE token = ?');
        $q->execute([$token]);
        $ej = $q->fetch();
        if (!$ej || !password_verify($pin, $ej['pin_hash'])) {
            anotar_intento($token, false);
            json_error('Esa clave no es la de este ejemplar.', 403);
        }
        if ($ej['estado'] === 'suspendido') {
            json_error('Este ejemplar esta desactivado.', 403);
        }
        anotar_intento($token, true);
        abrir_sesion_lector((int)$ej['id']);
        registrar((int)$ej['id'], 'entra');
        db()->prepare('UPDATE ejemplares SET visto_en = ? WHERE id = ?')->execute([ahora(), $ej['id']]);
        json_salida(['ok' => true, 'lector' => datos_lector($ej)]);

    case 'sesion':
        $ej = lector_actual();
        json_salida(['ok' => (bool)$ej, 'lector' => $ej ? datos_lector($ej) : null]);

    case 'salir':
        cerrar_sesion_lector();
        json_salida(['ok' => true]);

    case 'versiculo':
        exigir_lector();
        $n = (int)($_GET['n'] ?? 0);
        $q = db()->prepare('SELECT n, cap_num, cap_titulo, seccion, texto FROM versiculos WHERE n = ?');
        $q->execute([$n]);
        $v = $q->fetch();
        if (!$v) {
            json_salida(['ok' => false, 'error' => 'fuera']);
        }
        $v['extracto'] = extracto($v['texto']);
        unset($v['texto']);
        json_salida(['ok' => true, 'versiculo' => $v]);

    case 'nota':
        $ej   = exigir_lector();
        $uuid = (string)($_POST['uuid'] ?? '');
        if (!preg_match('/^[a-f0-9-]{16,64}$/i', $uuid)) {
            json_error('Nota sin identificador.');
        }
        // La cola sin cobertura puede reenviar la misma nota. No se duplica.
        $y = db()->prepare('SELECT uuid FROM notas WHERE uuid = ?');
        $y->execute([$uuid]);
        if ($y->fetch()) {
            json_salida(['ok' => true, 'repetida' => true]);
        }

        $versiculo = ($_POST['versiculo'] ?? '') === '' ? null : max(1, (int)$_POST['versiculo']);
        $tipo      = in_array($_POST['tipo'] ?? '', ['audio', 'texto', 'cierre'], true) ? $_POST['tipo'] : 'texto';
        $texto     = trim((string)($_POST['texto'] ?? ''));
        $duracion  = min(MAX_DURACION_MS, (int)($_POST['duracion_ms'] ?? 0));
        $fichero   = null;
        $mime      = null;

        if (!empty($_FILES['audio']['tmp_name']) && is_uploaded_file($_FILES['audio']['tmp_name'])) {
            if ($_FILES['audio']['size'] > MAX_AUDIO_BYTES) {
                json_error('La nota de voz es demasiado larga.', 413);
            }
            $mime = (new finfo(FILEINFO_MIME_TYPE))->file($_FILES['audio']['tmp_name']) ?: 'application/octet-stream';
            $ext  = null;
            $tipos = ['webm' => 'webm', 'mp4' => 'm4a', 'm4a' => 'm4a', 'aac' => 'm4a',
                      'ogg' => 'ogg', 'mpeg' => 'mp3', 'wav' => 'wav'];
            foreach ($tipos as $aguja => $extension) {
                if (str_contains($mime, $aguja)) {
                    $ext = $extension;
                    break;
                }
            }
            if ($ext === null) {
                json_error('Formato de audio no admitido.', 415);
            }
            $fichero = $uuid . '.' . $ext;
            if (!move_uploaded_file($_FILES['audio']['tmp_name'], carpeta_audio() . '/' . $fichero)) {
                json_error('No se pudo guardar la nota.', 500);
            }
        } elseif ($texto === '') {
            json_error('La nota esta vacia.');
        }

        db()->prepare(
            'INSERT INTO notas (uuid, ejemplar_id, versiculo, tipo, audio, audio_mime, duracion_ms, texto, creada_en)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
        )->execute([$uuid, $ej['id'], $versiculo, $tipo, $fichero, $mime, $duracion ?: null, $texto ?: null, ahora()]);
        registrar((int)$ej['id'], 'nota', $versiculo);
        json_salida(['ok' => true]);

    case 'notas':
        $ej = exigir_lector();
        $q  = db()->prepare(
            'SELECT n.uuid, n.versiculo, n.tipo, n.texto, n.duracion_ms, n.creada_en, n.audio,
                    v.cap_num, v.cap_titulo
             FROM notas n LEFT JOIN versiculos v ON v.n = n.versiculo
             WHERE n.ejemplar_id = ? AND n.descartada = 0
             ORDER BY (n.versiculo IS NULL), n.versiculo, n.creada_en'
        );
        $q->execute([$ej['id']]);
        json_salida(['ok' => true, 'notas' => $q->fetchAll()]);

    case 'borrar':
        $ej = exigir_lector();
        $d  = entrada();
        $q  = db()->prepare('SELECT audio FROM notas WHERE uuid = ? AND ejemplar_id = ?');
        $q->execute([(string)($d['uuid'] ?? ''), $ej['id']]);
        $n = $q->fetch();
        if ($n) {
            if ($n['audio']) {
                @unlink(carpeta_audio() . '/' . $n['audio']);
            }
            db()->prepare('DELETE FROM notas WHERE uuid = ? AND ejemplar_id = ?')
                ->execute([(string)$d['uuid'], $ej['id']]);
        }
        json_salida(['ok' => true]);

    case 'terminar':
        $ej = exigir_lector();
        db()->prepare('UPDATE ejemplares SET estado = ?, terminado_en = ? WHERE id = ?')
            ->execute(['terminado', ahora(), $ej['id']]);
        registrar((int)$ej['id'], 'termina');
        $c = db()->prepare('SELECT COUNT(*) FROM notas WHERE ejemplar_id = ? AND descartada = 0');
        $c->execute([$ej['id']]);
        avisar(sprintf('%s ha terminado la revision del manuscrito. %d notas.', $ej['nombre'], (int)$c->fetchColumn()));
        json_salida(['ok' => true]);

    case 'progreso':
        $ej = exigir_lector();
        $q  = db()->prepare('SELECT versiculo FROM notas WHERE ejemplar_id = ? AND versiculo IS NOT NULL AND descartada = 0');
        $q->execute([$ej['id']]);
        json_salida(['ok' => true, 'marcas' => array_map('intval', $q->fetchAll(PDO::FETCH_COLUMN))]);

    default:
        json_error('Accion desconocida.', 404);
}
