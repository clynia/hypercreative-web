<?php
declare(strict_types=1);
require __DIR__ . '/_lib/bootstrap.php';
require __DIR__ . '/_lib/auth.php';

if (!instalado()) {
    http_response_code(503);
    exit;
}

// Los audios viven fuera del web root. Aqui se comprueba quien pide antes de
// servir: o es su dueno, o es el panel. Nadie mas.
$uuid = (string)($_GET['u'] ?? '');
if (!preg_match('/^[a-f0-9-]{16,64}$/i', $uuid)) {
    http_response_code(400);
    exit;
}

$q = db()->prepare('SELECT ejemplar_id, audio, audio_mime FROM notas WHERE uuid = ?');
$q->execute([$uuid]);
$n = $q->fetch();
if (!$n || !$n['audio']) {
    http_response_code(404);
    exit;
}

$lector = lector_actual();
$suyo   = $lector && (int)$lector['id'] === (int)$n['ejemplar_id'];
if (!$suyo && !panel_abierto()) {
    http_response_code(403);
    exit;
}

$ruta = carpeta_audio() . '/' . basename((string)$n['audio']);
if (!is_file($ruta)) {
    http_response_code(404);
    exit;
}

header('Content-Type: ' . ($n['audio_mime'] ?: 'application/octet-stream'));
header('Content-Length: ' . filesize($ruta));
// Sin cachear: si una nota se borra o se suspende a su autor, no puede seguir
// sonando desde la cache del movil durante una hora.
header('Cache-Control: private, no-cache, must-revalidate');
readfile($ruta);
