<?php
declare(strict_types=1);
require __DIR__ . '/../_lib/bootstrap.php';
require __DIR__ . '/../_lib/auth.php';
require __DIR__ . '/../_lib/calor.php';

if (!instalado()) {
    http_response_code(503);
    exit;
}

/** Pesos de cada ejemplar, indexados por id. */
function pesos_por_ejemplar(): array
{
    $out = [];
    foreach (db()->query('SELECT ejemplar_id, dimension, peso FROM pesos') as $f) {
        $out[(int)$f['ejemplar_id']][$f['dimension']] = (int)$f['peso'];
    }
    return $out;
}

function notas_vivas(): array
{
    return db()->query(
        'SELECT id, uuid, ejemplar_id, versiculo, tipo, texto, transcripcion, dimension,
                sentimiento, duracion_ms, audio, creada_en
         FROM notas WHERE descartada = 0'
    )->fetchAll();
}

$accion = $_GET['a'] ?? '';

if ($accion === 'login') {
    $d    = entrada();
    $hash = ajuste('panel_hash');
    if ($hash === '' || !password_verify((string)($d['clave'] ?? ''), $hash)) {
        json_error('Clave incorrecta.', 403);
    }
    abrir_sesion_panel();
    json_salida(['ok' => true]);
}

exigir_panel();

switch ($accion) {

    case 'estado':
        $pesos      = pesos_por_ejemplar();
        $ejemplares = db()->query('SELECT * FROM ejemplares ORDER BY numero')->fetchAll();

        $cuentas = [];
        foreach (db()->query(
            'SELECT ejemplar_id, COUNT(*) c, MAX(versiculo) tope
             FROM notas WHERE descartada = 0 GROUP BY ejemplar_id'
        ) as $f) {
            $cuentas[(int)$f['ejemplar_id']] = ['notas' => (int)$f['c'], 'tope' => (int)$f['tope']];
        }

        foreach ($ejemplares as &$e) {
            unset($e['pin_hash']);
            $e['pesos'] = $pesos[(int)$e['id']] ?? [];
            foreach (DIMENSIONES as $dim) {
                $e['pesos'][$dim] = $e['pesos'][$dim] ?? 1;
            }
            $e['notas'] = $cuentas[(int)$e['id']]['notas'] ?? 0;
            $e['tope']  = $cuentas[(int)$e['id']]['tope'] ?? 0;
        }
        unset($e);

        json_salida([
            'ok'          => true,
            'ejemplares'  => $ejemplares,
            'dimensiones' => DIMENSIONES,
            'total'       => (int)db()->query('SELECT COUNT(*) FROM versiculos')->fetchColumn(),
            'capitulos'   => db()->query(
                'SELECT cap_num, cap_titulo, MIN(n) desde, MAX(n) hasta
                 FROM versiculos GROUP BY cap_num, cap_titulo ORDER BY cap_num'
            )->fetchAll(),
        ]);

    case 'calor':
        $total = (int)db()->query('SELECT COUNT(*) FROM versiculos')->fetchColumn();
        $r     = calcular_calor(notas_vivas(), pesos_por_ejemplar(), $total);

        // Cada zona viaja con el texto real al que apunta: es lo que hace falta
        // para juzgarla sin ir a abrir el manuscrito.
        foreach ($r['zonas'] as &$z) {
            $q = db()->prepare(
                'SELECT n, cap_num, cap_titulo, seccion, texto FROM versiculos
                 WHERE n BETWEEN ? AND ? ORDER BY n'
            );
            $q->execute([$z['desde'], $z['hasta']]);
            $z['versiculos'] = $q->fetchAll();
            $z['capitulo']   = $z['versiculos'][0]['cap_num'] ?? null;
            $z['titulo']     = $z['versiculos'][0]['cap_titulo'] ?? '';
        }
        unset($z);

        json_salida(['ok' => true, 'curva' => $r['curva'], 'zonas' => $r['zonas'], 'maximo' => $r['maximo']]);

    case 'notas':
        $donde = ['n.descartada = 0'];
        $args  = [];
        if (!empty($_GET['ejemplar'])) {
            $donde[] = 'n.ejemplar_id = ?';
            $args[]  = (int)$_GET['ejemplar'];
        }
        if (!empty($_GET['desde'])) {
            $donde[] = 'n.versiculo >= ?';
            $args[]  = (int)$_GET['desde'];
        }
        if (!empty($_GET['hasta'])) {
            $donde[] = 'n.versiculo <= ?';
            $args[]  = (int)$_GET['hasta'];
        }
        $q = db()->prepare(
            'SELECT n.uuid, n.ejemplar_id, n.versiculo, n.tipo, n.texto, n.transcripcion,
                    n.dimension, n.duracion_ms, n.audio, n.creada_en,
                    e.nombre, e.color, v.cap_num, v.cap_titulo, v.texto AS parrafo
             FROM notas n
             JOIN ejemplares e ON e.id = n.ejemplar_id
             LEFT JOIN versiculos v ON v.n = n.versiculo
             WHERE ' . implode(' AND ', $donde) . '
             ORDER BY (n.versiculo IS NULL), n.versiculo, n.creada_en'
        );
        $q->execute($args);
        json_salida(['ok' => true, 'notas' => $q->fetchAll()]);

    case 'guardar':
        $d  = entrada();
        $id = (int)($d['id'] ?? 0);
        if (!$id) {
            json_error('Falta el ejemplar.');
        }
        $estado = in_array($d['estado'] ?? '', ['activo', 'suspendido', 'terminado'], true)
            ? $d['estado'] : 'activo';
        db()->prepare('UPDATE ejemplares SET nombre = ?, perfil = ?, lente = ?, estado = ?, color = ? WHERE id = ?')
            ->execute([
                mb_substr(trim((string)($d['nombre'] ?? '')) ?: 'Sin nombre', 0, 120),
                mb_substr((string)($d['perfil'] ?? ''), 0, 500),
                mb_substr((string)($d['lente'] ?? ''), 0, 500),
                $estado,
                preg_match('/^#[0-9A-Fa-f]{6}$/', (string)($d['color'] ?? '')) ? $d['color'] : '#E0463C',
                $id,
            ]);
        foreach (DIMENSIONES as $dim) {
            $peso = max(0, min(3, (int)($d['pesos'][$dim] ?? 1)));
            $q = db()->prepare('SELECT 1 FROM pesos WHERE ejemplar_id = ? AND dimension = ?');
            $q->execute([$id, $dim]);
            if ($q->fetch()) {
                db()->prepare('UPDATE pesos SET peso = ? WHERE ejemplar_id = ? AND dimension = ?')
                    ->execute([$peso, $id, $dim]);
            } else {
                db()->prepare('INSERT INTO pesos (ejemplar_id, dimension, peso) VALUES (?, ?, ?)')
                    ->execute([$id, $dim, $peso]);
            }
        }
        json_salida(['ok' => true]);

    // Si un lector pierde su clave, o si una se expone, se emite otra. La
    // anterior deja de servir en el acto y sus intentos fallidos se olvidan.
    case 'nueva_clave':
        $d  = entrada();
        $id = (int)($d['id'] ?? 0);
        if (!$id) {
            json_error('Falta el ejemplar.');
        }
        $q = db()->prepare('SELECT token, numero, nombre FROM ejemplares WHERE id = ?');
        $q->execute([$id]);
        $ej = $q->fetch();
        if (!$ej) {
            json_error('Ese ejemplar no existe.', 404);
        }
        $token = bin2hex(random_bytes(9));
        $pin   = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        db()->prepare('UPDATE ejemplares SET token = ?, pin_hash = ?, estado = ? WHERE id = ?')
            ->execute([$token, password_hash($pin, PASSWORD_DEFAULT), 'activo', $id]);
        db()->prepare('DELETE FROM intentos WHERE token = ?')->execute([$ej['token']]);
        json_salida([
            'ok'     => true,
            'numero' => (int)$ej['numero'],
            'nombre' => $ej['nombre'],
            'token'  => $token,
            'pin'    => $pin,
        ]);

    // Lo rellena el analisis: dimension, tono y transcripcion de cada nota.
    case 'clasificar':
        $d = entrada();
        foreach ((array)($d['notas'] ?? []) as $n) {
            $dim = in_array($n['dimension'] ?? '', DIMENSIONES, true) ? $n['dimension'] : null;
            db()->prepare(
                'UPDATE notas SET dimension = ?, sentimiento = ?,
                        transcripcion = COALESCE(?, transcripcion) WHERE uuid = ?'
            )->execute([$dim, $n['sentimiento'] ?? null, $n['transcripcion'] ?? null, (string)($n['uuid'] ?? '')]);
        }
        json_salida(['ok' => true]);

    // Un solo fichero con todo, para analizarlo fuera.
    case 'exportar':
        $total = (int)db()->query('SELECT COUNT(*) FROM versiculos')->fetchColumn();
        $r     = calcular_calor(notas_vivas(), pesos_por_ejemplar(), $total);
        $pesos = pesos_por_ejemplar();

        $ejemplares = db()->query(
            'SELECT id, numero, nombre, perfil, lente, estado, terminado_en FROM ejemplares ORDER BY numero'
        )->fetchAll();
        foreach ($ejemplares as &$e) {
            $e['pesos'] = $pesos[(int)$e['id']] ?? [];
        }
        unset($e);

        $notas = db()->query(
            'SELECT n.uuid, n.versiculo, n.tipo, n.texto, n.transcripcion, n.dimension,
                    n.duracion_ms, n.creada_en, e.nombre, e.perfil,
                    v.cap_num, v.cap_titulo, v.seccion, v.texto AS parrafo
             FROM notas n
             JOIN ejemplares e ON e.id = n.ejemplar_id
             LEFT JOIN versiculos v ON v.n = n.versiculo
             WHERE n.descartada = 0
             ORDER BY (n.versiculo IS NULL), n.versiculo'
        )->fetchAll();

        header('Content-Disposition: attachment; filename="revision-manuscrito.json"');
        json_salida([
            'generado'   => ahora(),
            'ejemplares' => $ejemplares,
            'zonas'      => $r['zonas'],
            'notas'      => $notas,
        ]);

    default:
        json_error('Accion desconocida.', 404);
}
