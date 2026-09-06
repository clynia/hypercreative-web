<?php
declare(strict_types=1);

/**
 * Instalador de un solo uso.
 *
 * Existe porque este repositorio es PUBLICO y el texto del manuscrito no puede
 * viajar dentro de el. El codigo llega por git; el libro llega por aqui, en una
 * peticion HTTPS, y esta pagina se borra en el commit siguiente.
 *
 * Del token solo esta su SHA-256, igual que la clave del webhook de Telegram en
 * n8n. Y en cuanto haya una sola nota de un lector, deja de instalar.
 */

require __DIR__ . '/_lib/bootstrap.php';

const HUELLA_TOKEN = '95b2b8833425acd63ebfee20427e7267619d4c175ac471e4b905bc1eb246b65e';

function exigir_token(): void
{
    $dado = (string)($_SERVER['HTTP_X_INSTALAR'] ?? $_GET['t'] ?? '');
    if ($dado === '' || !hash_equals(HUELLA_TOKEN, hash('sha256', $dado))) {
        header('Content-Type: text/plain; charset=utf-8');
        http_response_code(404);
        echo "No such file or directory\n";
        exit;
    }
}

function hay_notas(): bool
{
    try {
        return instalado() && (int)db()->query('SELECT COUNT(*) FROM notas')->fetchColumn() > 0;
    } catch (Throwable) {
        return false;
    }
}

exigir_token();

$accion = $_GET['a'] ?? 'diag';

if ($accion === 'diag') {
    $datos = carpeta_datos();
    json_salida([
        'ok'               => true,
        'php'              => PHP_VERSION,
        'pdo_sqlite'       => extension_loaded('pdo_sqlite'),
        'fileinfo'         => extension_loaded('fileinfo'),
        'curl'             => extension_loaded('curl'),
        'document_root'    => $_SERVER['DOCUMENT_ROOT'] ?? null,
        'carpeta_datos'    => $datos,
        'padre_escribible' => is_writable(dirname($datos)),
        'datos_existe'     => is_dir($datos),
        'instalado'        => instalado(),
        'con_notas'        => hay_notas(),
        'post_max'         => ini_get('post_max_size'),
        'subida_max'       => ini_get('upload_max_filesize'),
    ]);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_error('Solo POST.', 405);
}
if (hay_notas()) {
    json_error('Ya hay notas de lectores. No se reinstala encima.', 409);
}

$datos = carpeta_datos();
if (!is_dir($datos) && !mkdir($datos, 0770, true)) {
    json_error('No puedo crear ' . $datos, 500);
}

$d = entrada();

if ($accion === 'iniciar') {
    // Se empieza de cero. Se vacia por SQL y no borrando el fichero: la
    // comprobacion de arriba ya ha abierto la base, y en Windows un fichero
    // abierto no se deja borrar, asi que el intento anterior se instalaba
    // encima en silencio.
    foreach (db()->query("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'")
                 ->fetchAll(PDO::FETCH_COLUMN) as $tabla) {
        db()->exec('DROP TABLE IF EXISTS "' . $tabla . '"');
    }
    foreach (glob($datos . '/audio/*') ?: [] as $f) {
        @unlink($f);
    }

    $sql = file_get_contents(__DIR__ . '/_lib/esquema.sqlite.sql');
    foreach (array_filter(array_map('trim', explode(';', $sql))) as $sentencia) {
        db()->exec($sentencia);
    }

    $poner = db()->prepare('INSERT OR REPLACE INTO ajustes (clave, valor) VALUES (?, ?)');
    $poner->execute(['secreto', bin2hex(random_bytes(32))]);
    $poner->execute(['panel_hash', password_hash((string)($d['panel_clave'] ?? ''), PASSWORD_DEFAULT)]);
    $poner->execute(['telegram_url', (string)($d['telegram_url'] ?? '')]);
    $poner->execute(['telegram_key', (string)($d['telegram_key'] ?? '')]);

    $claves  = [];
    $insEj   = db()->prepare(
        'INSERT INTO ejemplares (numero, nombre, perfil, lente, token, pin_hash, estado, color, creado_en)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
    );
    $insPeso = db()->prepare('INSERT INTO pesos (ejemplar_id, dimension, peso) VALUES (?, ?, ?)');

    foreach ((array)($d['lectores'] ?? []) as $i => $l) {
        $numero = (int)($l['numero'] ?? $i + 1);
        $nombre = (string)($l['nombre'] ?? ('Ejemplar ' . $numero));
        $token  = bin2hex(random_bytes(9));
        $pin    = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $insEj->execute([
            $numero, $nombre, (string)($l['perfil'] ?? ''), (string)($l['lente'] ?? ''),
            $token, password_hash($pin, PASSWORD_DEFAULT), 'activo',
            preg_match('/^#[0-9A-Fa-f]{6}$/', (string)($l['color'] ?? '')) ? $l['color'] : '#E0463C',
            ahora(),
        ]);
        $id = (int)db()->lastInsertId();
        foreach (DIMENSIONES as $dim) {
            $insPeso->execute([$id, $dim, max(0, min(3, (int)($l['pesos'][$dim] ?? 1)))]);
        }
        $claves[] = ['numero' => $numero, 'nombre' => $nombre, 'token' => $token, 'pin' => $pin];
    }

    json_salida(['ok' => true, 'ejemplares' => $claves]);
}

if ($accion === 'versiculos') {
    $ins = db()->prepare(
        'INSERT OR REPLACE INTO versiculos (n, capitulo, cap_num, cap_titulo, seccion, texto, palabras)
         VALUES (?, ?, ?, ?, ?, ?, ?)'
    );
    db()->beginTransaction();
    foreach ((array)($d['versiculos'] ?? []) as $v) {
        $ins->execute([
            (int)$v['n'], (string)$v['capitulo'], (int)$v['cap_num'], (string)$v['cap_titulo'],
            $v['seccion'] ?? null, (string)$v['texto'], (int)$v['palabras'],
        ]);
    }
    db()->commit();
    json_salida(['ok' => true, 'total' => (int)db()->query('SELECT COUNT(*) FROM versiculos')->fetchColumn()]);
}

if ($accion === 'cerrar') {
    json_salida([
        'ok'          => true,
        'versiculos'  => (int)db()->query('SELECT COUNT(*) FROM versiculos')->fetchColumn(),
        'ejemplares'  => (int)db()->query('SELECT COUNT(*) FROM ejemplares')->fetchColumn(),
        'capitulos'   => (int)db()->query('SELECT COUNT(DISTINCT cap_num) FROM versiculos')->fetchColumn(),
        'audio_listo' => is_dir(carpeta_audio()) && is_writable(carpeta_audio()),
    ]);
}

json_error('Accion desconocida.', 404);
