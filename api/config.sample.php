<?php
// Lead proxy configuration.
// RECOMMENDED on Hostinger: create this file as "hc-config.php" ONE folder ABOVE
// public_html (the auto-deploy only touches public_html, so a secret kept there
// survives every deploy; create it once, never again).
// Alternative: place it here as "config.php" in this api/ folder, but a clean deploy
// deletes it on the next push. Either way the URL never reaches the public repo.
return [
    'webhook' => 'PASTE_YOUR_N8N_WEBHOOK_URL_HERE',
];
