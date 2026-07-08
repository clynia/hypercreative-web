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

// Webhook for the n8n "Hypercreative - Website leads" flow.
// Set HC_LEAD_WEBHOOK in hPanel (Advanced > PHP env, or a SetEnv in .htaccess) to
// rotate the endpoint privately without a deploy; otherwise the current instance
// URL below is used.
$url = getenv('HC_LEAD_WEBHOOK');
if (!$url) {
    $url = 'https://n8n-ixwg.srv1722506.hstgr.cloud/webhook/hypercreative-lead';
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
