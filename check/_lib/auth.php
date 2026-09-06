<?php
declare(strict_types=1);

/**
 * Sesiones sin registro. El QR trae el ejemplar, el PIN lo confirma y a partir
 * de ahi una cookie firmada mantiene al lector dentro un ano. Cada peticion
 * relee el estado del ejemplar, para que suspender a alguien surta efecto ya.
 */

const COOKIE_LECTOR = 'hc_lectura';
const COOKIE_PANEL  = 'hc_panel';
const VIDA_SESION   = 365 * 24 * 3600;

/** La sesion no tiene por que viajar por el resto del sitio. */
function ruta_cookie(): string
{
    $s = dirname((string)($_SERVER['SCRIPT_NAME'] ?? '/check/index.php'));
    if (substr($s, -6) === '/panel') {
        $s = substr($s, 0, -6);
    }
    return rtrim($s, '/') . '/';
}

function poner_cookie(string $nombre, string $valor, int $vida): void
{
    setcookie($nombre, $valor, [
        'expires'  => time() + $vida,
        'path'     => ruta_cookie(),
        'secure'   => (($_SERVER['HTTPS'] ?? '') !== '') || (($_SERVER['SERVER_PORT'] ?? '') === '443'),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
}

function abrir_sesion_lector(int $ejemplarId): void
{
    $expira = time() + VIDA_SESION;
    $carga  = $ejemplarId . '.' . $expira;
    poner_cookie(COOKIE_LECTOR, $carga . '.' . firmar($carga), VIDA_SESION);
}

function cerrar_sesion_lector(): void
{
    poner_cookie(COOKIE_LECTOR, '', -3600);
}

/** Devuelve el ejemplar de la sesion, o null. Un ejemplar suspendido no pasa. */
function lector_actual(): ?array
{
    $c = $_COOKIE[COOKIE_LECTOR] ?? '';
    if (substr_count($c, '.') !== 2) {
        return null;
    }
    [$id, $expira, $firma] = explode('.', $c);
    if (!hash_equals(firmar($id . '.' . $expira), $firma) || (int)$expira < time()) {
        return null;
    }
    $e = db()->prepare('SELECT * FROM ejemplares WHERE id = ?');
    $e->execute([(int)$id]);
    $ej = $e->fetch();
    if (!$ej || $ej['estado'] === 'suspendido') {
        return null;
    }
    return $ej;
}

function exigir_lector(): array
{
    $ej = lector_actual();
    if (!$ej) {
        json_error('sesion', 401);
    }
    return $ej;
}

/** Limite de intentos de PIN por token y hora. */
function pin_bloqueado(string $token): bool
{
    $q = db()->prepare('SELECT COUNT(*) FROM intentos WHERE token = ? AND ok = 0 AND ts > ?');
    $q->execute([$token, gmdate('Y-m-d H:i:s', time() - 3600)]);
    return (int)$q->fetchColumn() >= MAX_INTENTOS_PIN;
}

function anotar_intento(string $token, bool $ok): void
{
    $q = db()->prepare('INSERT INTO intentos (token, ip, ts, ok) VALUES (?, ?, ?, ?)');
    $q->execute([$token, ip_cliente(), ahora(), $ok ? 1 : 0]);
}

function abrir_sesion_panel(): void
{
    $expira = time() + 12 * 3600;
    $carga  = 'panel.' . $expira;
    poner_cookie(COOKIE_PANEL, $carga . '.' . firmar($carga), 12 * 3600);
}

function panel_abierto(): bool
{
    $c = $_COOKIE[COOKIE_PANEL] ?? '';
    if (substr_count($c, '.') !== 2) {
        return false;
    }
    [$q, $expira, $firma] = explode('.', $c);
    return $q === 'panel' && hash_equals(firmar($q . '.' . $expira), $firma) && (int)$expira > time();
}

function exigir_panel(): void
{
    if (!panel_abierto()) {
        json_error('sesion', 401);
    }
}

function registrar(int $ejemplarId, string $tipo, ?int $versiculo = null): void
{
    $q = db()->prepare('INSERT INTO eventos (ejemplar_id, tipo, versiculo, ts) VALUES (?, ?, ?, ?)');
    $q->execute([$ejemplarId, $tipo, $versiculo, ahora()]);
}
