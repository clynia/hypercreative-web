<?php
// Lead proxy: forwards the website form POST to the n8n webhook, server-side.
// The webhook URL is read from config.php (created on the server, gitignored) or an
// env var, so it never appears in the public site source or repo.
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'method_not_allowed']);
    exit;
}

$url = getenv('HC_LEAD_WEBHOOK');
if (!$url) {
    $candidates = [];
    if (!empty($_SERVER['DOCUMENT_ROOT'])) {
        // One level ABOVE the web root: a clean git deploy only touches public_html,
        // so a secret kept here survives every deploy. Create it once, never again.
        $candidates[] = dirname($_SERVER['DOCUMENT_ROOT']) . '/hc-config.php';
    }
    $candidates[] = __DIR__ . '/config.php'; // in-folder fallback (a clean deploy can wipe this)
    foreach ($candidates as $p) {
        if (file_exists($p)) {
            $cfg = require $p;
            $url = is_array($cfg) ? ($cfg['webhook'] ?? null) : null;
            if ($url) break;
        }
    }
}
if (!$url) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'not_configured']);
    exit;
}

$body = file_get_contents('php://input');
if (strlen($body) > 20000) { // basic guard
    http_response_code(413);
    echo json_encode(['ok' => false, 'error' => 'too_large']);
    exit;
}

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $body,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 20,
    CURLOPT_CONNECTTIMEOUT => 8,
]);
$resp = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($resp === false || $code >= 400) {
    http_response_code(502);
    echo json_encode(['ok' => false, 'error' => 'upstream']);
    exit;
}

http_response_code(200);
echo $resp;
