<?php
/* Language plumbing for the bilingual site.

   Every page opens by declaring which language it is and where its twin lives,
   then includes this file before printing a single byte:

     <?php $HC_LANG='es'; $HC_EN='/what-we-do/'; $HC_ES='/es/que-hacemos/';
           include $_SERVER['DOCUMENT_ROOT'].'/_inc/lang.php'; ?>

   What it gives back: $HC_SELF and $HC_ALT (the canonical and the twin),
   $HC_ALT_LANG, and hc_hreflang() for the <head>.

   The rule that matters: English pages hand Spanish speakers over to /es/,
   Spanish pages never bounce anyone. That is what makes /es/ safe to point the
   book's domain at. An explicit click on the switcher (?lang=xx) is remembered
   for a year and always wins. */

if (!isset($HC_LANG)) { $HC_LANG = 'en'; }
if (!isset($HC_EN))   { $HC_EN   = '/'; }
if (!isset($HC_ES))   { $HC_ES   = '/es/'; }

$HC_SITE     = 'https://hypercreativemethod.com';
$HC_SELF     = ($HC_LANG === 'es') ? $HC_ES : $HC_EN;
$HC_ALT      = ($HC_LANG === 'es') ? $HC_EN : $HC_ES;
$HC_ALT_LANG = ($HC_LANG === 'es') ? 'en'   : 'es';
$HC_LOCALE   = ($HC_LANG === 'es') ? 'es_ES' : 'en_US';

if (!function_exists('hc_prefers_spanish')) {
    /* Reads Accept-Language and answers one question: is this browser's first
       choice Spanish? Anything else, including no header at all, means no. */
    function hc_prefers_spanish() {
        $al = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '';
        if ($al === '') { return false; }
        $best = ''; $bestQ = -1.0;
        foreach (explode(',', $al) as $part) {
            $bits = explode(';q=', trim($part));
            $tag  = strtolower(trim($bits[0]));
            if ($tag === '' || $tag === '*') { continue; }
            $q = isset($bits[1]) ? (float) $bits[1] : 1.0;
            if ($q > $bestQ) { $bestQ = $q; $best = $tag; }
        }
        return strpos($best, 'es') === 0;
    }
}

if (!function_exists('hc_is_bot')) {
    /* Crawlers and link previews are never redirected: they get the page they
       asked for, and the hreflang tags tell them about the other one. */
    function hc_is_bot() {
        $ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        return (bool) preg_match('~bot|crawl|spider|slurp|mediapartners|facebookexternalhit|embedly|preview|whatsapp|telegram|lighthouse~i', $ua);
    }
}

if (!function_exists('hc_hreflang')) {
    /* canonical + the pair of alternates + x-default, for the <head> */
    function hc_hreflang() {
        global $HC_SITE, $HC_SELF, $HC_EN, $HC_ES;
        return '<link rel="canonical" href="' . $HC_SITE . $HC_SELF . '">' . "\n"
             . '<link rel="alternate" hreflang="en" href="' . $HC_SITE . $HC_EN . '">' . "\n"
             . '<link rel="alternate" hreflang="es" href="' . $HC_SITE . $HC_ES . '">' . "\n"
             . '<link rel="alternate" hreflang="x-default" href="' . $HC_SITE . $HC_EN . '">';
    }
}

if (!function_exists('hc_lang_switch')) {
    /* The switcher: both languages always visible, the current one marked.
       Each link carries ?lang= so the click is recorded as a choice. */
    function hc_lang_switch() {
        global $HC_LANG, $HC_EN, $HC_ES;
        $en = ($HC_LANG === 'en')
            ? '<span class="on" aria-current="true">EN</span>'
            : '<a href="' . $HC_EN . '?lang=en" hreflang="en" lang="en">EN</a>';
        $es = ($HC_LANG === 'es')
            ? '<span class="on" aria-current="true">ES</span>'
            : '<a href="' . $HC_ES . '?lang=es" hreflang="es" lang="es">ES</a>';
        $label = ($HC_LANG === 'es') ? 'Idioma' : 'Language';
        return '<span class="nav-lang" role="group" aria-label="' . $label . '">'
             . $en . '<i aria-hidden="true">/</i>' . $es . '</span>';
    }
}

/* An explicit choice from the switcher, remembered for a year. */
if (isset($_GET['lang']) && ($_GET['lang'] === 'en' || $_GET['lang'] === 'es')) {
    $exp = time() + 31536000;
    if (PHP_VERSION_ID >= 70300) {
        setcookie('hc_lang', $_GET['lang'], ['expires' => $exp, 'path' => '/', 'samesite' => 'Lax']);
    } else {
        setcookie('hc_lang', $_GET['lang'], $exp, '/; samesite=Lax');
    }
} elseif ($HC_LANG === 'en' && empty($HC_NO_REDIRECT)) {
    /* No choice on this request. Spanish speakers go to the Spanish twin.
       A page with no real twin sets $HC_NO_REDIRECT before including this
       file: the 404 does, because a missing English page must not throw the
       visitor at the Spanish home. */
    header('Vary: Accept-Language, Cookie', false);
    if (!hc_is_bot()) {
        $want = isset($_COOKIE['hc_lang']) ? $_COOKIE['hc_lang'] : '';
        if ($want !== 'en' && ($want === 'es' || hc_prefers_spanish())) {
            header('Location: ' . $HC_ES, true, 302);
            exit;
        }
    }
}
