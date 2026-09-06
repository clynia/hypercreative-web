<?php
declare(strict_types=1);

/**
 * Arranque comun de la revision del manuscrito.
 *
 * Dos reglas del sitio mandan aqui:
 *
 * 1. Los datos NO viven en public_html. El deploy de la web es limpio y borra
 *    todo lo que hay dentro en cada push, asi que la base y los audios se
 *    guardan una carpeta por encima, igual que el hc-config.php del formulario.
 * 2. Este repositorio es PUBLICO. Ni el texto del libro ni ningun secreto
 *    pueden estar aqui: viven en la base, que esta fuera del repositorio.
 */

const DIMENSIONES = ['estructura', 'claridad', 'rigor', 'voz', 'utilidad', 'erratas'];
const MAX_AUDIO_BYTES = 12 * 1024 * 1024;   // cinco minutos a 32 kbps van muy sobrados
const MAX_DURACION_MS = 5 * 60 * 1000;
const MAX_INTENTOS_PIN = 10;                // por ejemplar y hora

function carpeta_datos(): string
{
    $raiz = $_SERVER['DOCUMENT_ROOT'] ?? '';
    if ($raiz !== '') {
        // una por encima de public_html: el deploy limpio no llega hasta aqui
        return rtrim(str_replace(DIRECTORY_SEPARATOR, '/', dirname($raiz)), '/') . '/check_datos';
    }
    return rtrim(str_replace(DIRECTORY_SEPARATOR, '/', dirname(__DIR__, 2)), '/') . '/_datos';
}

function ruta_base(): string
{
    return carpeta_datos() . '/revision.db';
}

function instalado(): bool
{
    return is_file(ruta_base()) && filesize(ruta_base()) > 0;
}

function db(): PDO
{
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }
    $pdo = new PDO('sqlite:' . ruta_base(), null, null, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
    $pdo->exec('PRAGMA journal_mode=WAL');
    $pdo->exec('PRAGMA busy_timeout=4000');
    return $pdo;
}

function es_sqlite(): bool
{
    return true;
}

/** Lo que no puede estar en un repositorio publico: firma y clave del panel. */
function ajuste(string $clave): string
{
    static $cache = [];
    if (array_key_exists($clave, $cache)) {
        return $cache[$clave];
    }
    $q = db()->prepare('SELECT valor FROM ajustes WHERE clave = ?');
    $q->execute([$clave]);
    return $cache[$clave] = (string)($q->fetchColumn() ?: '');
}

function carpeta_audio(): string
{
    $d = carpeta_datos() . '/audio';
    if (!is_dir($d)) {
        mkdir($d, 0770, true);
    }
    return $d;
}

function ahora(): string
{
    return gmdate('Y-m-d H:i:s');
}

function json_salida($datos, int $codigo = 200): never
{
    http_response_code($codigo);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store');
    header('X-Robots-Tag: noindex, nofollow');
    echo json_encode($datos, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function json_error(string $mensaje, int $codigo = 400): never
{
    json_salida(['ok' => false, 'error' => $mensaje], $codigo);
}

function entrada(): array
{
    if (!empty($_POST)) {
        return $_POST;
    }
    $crudo = file_get_contents('php://input');
    $d = json_decode($crudo ?: '[]', true);
    return is_array($d) ? $d : [];
}

function ip_cliente(): string
{
    return (string)($_SERVER['REMOTE_ADDR'] ?? '0.0.0.0');
}

function firmar(string $carga): string
{
    return hash_hmac('sha256', $carga, ajuste('secreto'));
}

/** Aviso al movil. Nunca puede tumbar la peticion de un lector. */
function avisar(string $mensaje): void
{
    $url = ajuste('telegram_url');
    if ($url === '' || !function_exists('curl_init')) {
        return;
    }
    try {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode(['key' => ajuste('telegram_key'), 'text' => $mensaje], JSON_UNESCAPED_UNICODE),
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 4,
        ]);
        curl_exec($ch);
        curl_close($ch);
    } catch (Throwable) {
        // silencio deliberado: un aviso caido no puede costarle una nota al lector
    }
}
