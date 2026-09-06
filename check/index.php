<?php
declare(strict_types=1);
require __DIR__ . '/_lib/bootstrap.php';
require __DIR__ . '/_lib/auth.php';

// El QR trae el ejemplar dentro. El PIN solo confirma que el libro lo tiene el.
if (!instalado()) {
    http_response_code(503);
    header('Content-Type: text/html; charset=utf-8');
    exit('<!doctype html><meta charset="utf-8"><title>Todavia no</title>'
       . '<body style="font:16px/1.6 system-ui;max-width:32em;margin:18vh auto;padding:0 22px;color:#56554E">'
       . '<p>Aqui todavia no hay nada. Vuelve cuando te llegue tu ejemplar.</p>');
}

$token  = preg_replace('/[^a-zA-Z0-9]/', '', (string)($_GET['e'] ?? ''));
$fin    = isset($_GET['fin']);
$sesion = lector_actual();

// Si el QR es de otro ejemplar que el de la sesion abierta, manda el QR.
if ($token !== '' && $sesion && !hash_equals((string)$sesion['token'], $token)) {
    cerrar_sesion_lector();
    $sesion = null;
}

$nombre = $sesion['nombre'] ?? '';
if ($token !== '' && !$sesion) {
    $q = db()->prepare('SELECT nombre FROM ejemplares WHERE token = ?');
    $q->execute([$token]);
    $nombre = (string)($q->fetchColumn() ?: '');
}
$primerNombre    = $nombre === '' ? '' : explode(' ', $nombre)[0];
$totalVersiculos = (int)db()->query('SELECT COUNT(*) FROM versiculos')->fetchColumn();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="robots" content="noindex, nofollow">
<meta name="theme-color" content="#F7F6F3" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#13130F" media="(prefers-color-scheme: dark)">
<title>De Creativo a Hipercreativo, lectura de revision</title>
<link rel="manifest" href="assets/manifest.webmanifest">
<link rel="apple-touch-icon" href="assets/icono-192.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Mono:wght@400;700&display=swap">
<link rel="stylesheet" href="assets/lector.css?v=1">
</head>
<body
  data-token="<?= htmlspecialchars($token, ENT_QUOTES) ?>"
  data-total="<?= $totalVersiculos ?>"
  data-fin="<?= $fin ? '1' : '0' ?>"
  data-sesion="<?= $sesion ? '1' : '0' ?>">

<section id="puerta" class="pantalla" hidden>
  <div class="marca"><span>Hypercreative</span><i class="punto"></i></div>
  <h1 class="saluda">Hola<?= $primerNombre !== '' ? ', ' . htmlspecialchars($primerNombre, ENT_QUOTES) : '' ?>.</h1>
  <p class="pie-puerta">Tu ejemplar lleva una clave de seis digitos impresa junto al codigo.</p>
  <div class="casillas" id="casillas" aria-label="Clave de seis digitos">
    <b></b><b></b><b></b><b></b><b></b><b></b>
  </div>
  <p class="aviso" id="avisoPin" role="alert" hidden></p>
  <div class="teclado" id="tecladoPin"></div>
  <p class="confidencial">Este manuscrito no esta publicado. Te lo presto para que lo rompas, no para que lo compartas.</p>
</section>

<section id="sala" class="pantalla" hidden>
  <header class="cabecera">
    <div class="marca"><span>Hypercreative</span><i class="punto"></i></div>
    <button class="texto-boton" id="verNotas" type="button">Tus notas <b id="cuentaNotas">0</b></button>
  </header>

  <div class="rail" id="rail" title="Tu recorrido por el libro"><canvas id="railLienzo"></canvas></div>

  <div class="numero-zona">
    <div class="numero" id="numero"><span></span><em class="cursor"></em></div>
    <div class="destino" id="destino" hidden>
      <p class="ubicacion"><b id="capitulo"></b><span id="seccion"></span></p>
      <p class="extracto" id="extracto"></p>
    </div>
    <p class="destino-vacio" id="destinoVacio">Teclea el numero del margen, junto al parrafo.</p>
  </div>

  <div class="teclado" id="tecladoNum"></div>

  <div class="acciones">
    <button class="grabar" id="grabar" type="button" aria-label="Grabar nota de voz">
      <canvas class="onda" id="onda"></canvas>
      <span class="disco"></span>
      <em class="reloj" id="reloj"></em>
    </button>
    <p class="pista" id="pistaGrabar">Pulsa y habla. Vuelve a pulsar cuando acabes.</p>
    <button class="texto-boton" id="prefieroEscribir" type="button">Prefiero escribir</button>
  </div>

  <div class="escribir" id="escribir" hidden>
    <textarea id="textoNota" rows="4" placeholder="Escribe tu nota"></textarea>
    <div class="fila">
      <button class="texto-boton" id="cancelarTexto" type="button">Cancelar</button>
      <button class="solido" id="enviarTexto" type="button">Enviar nota</button>
    </div>
  </div>

  <p class="cola" id="cola" hidden></p>
</section>

<section id="cierre" class="pantalla" hidden>
  <div class="marca"><span>Hypercreative</span><i class="punto"></i></div>
  <h1 class="saluda">Has llegado al final.</h1>
  <p class="parrafo">Gracias de verdad. Queda una sola cosa, y es la que mas me sirve. Contestame en voz alta, como se lo contarias a un amigo.</p>
  <ol class="preguntas">
    <li>Que te llevas.</li>
    <li>Que te sobra.</li>
    <li>A quien se lo darias.</li>
  </ol>
  <div class="acciones">
    <button class="grabar" id="grabarFin" type="button" aria-label="Grabar la nota final">
      <canvas class="onda" id="ondaFin"></canvas>
      <span class="disco"></span>
      <em class="reloj" id="relojFin"></em>
    </button>
    <button class="texto-boton" id="terminarSinNota" type="button">Terminar sin nota final</button>
  </div>
</section>

<section id="gracias" class="pantalla" hidden>
  <div class="marca"><span>Hypercreative</span><i class="punto"></i></div>
  <h1 class="saluda">Listo.</h1>
  <p class="parrafo">Tus notas ya estan conmigo. Si se te ocurre algo mas, vuelve a escanear el codigo cuando quieras.</p>
</section>

<div class="cajon" id="cajon" hidden>
  <div class="cajon-caja">
    <header class="cajon-cabecera">
      <h2>Tus notas</h2>
      <button class="texto-boton" id="cerrarCajon" type="button">Cerrar</button>
    </header>
    <p class="cajon-pista">Ordenadas por el orden del libro, no por cuando las mandaste.</p>
    <ul class="lista" id="listaNotas"></ul>
  </div>
</div>

<div class="modal" id="modalInstrucciones" hidden>
  <div class="modal-caja">
    <h2>Como va esto</h2>
    <p>Mira el numero pequeno del margen, junto al parrafo del que quieras hablar. Teclealo aqui y habla.</p>
    <p>Puedes ir y volver cuando quieras. Las notas se ordenan solas por el orden del libro, asi que si en el capitulo 10 te acuerdas de algo del 3, vuelve al 3 y mandala con su numero.</p>
    <p>No hace falta ser exhaustivo. Vale mas una nota sincera que veinte educadas.</p>
    <p>Habla en vez de escribir siempre que puedas. En la voz se oye el tono, y el tono es la mitad de lo que necesito.</p>
    <button class="solido" id="entendido" type="button">Entendido</button>
  </div>
</div>

<div class="brindis" id="brindis" role="status" aria-live="polite"></div>

<script src="assets/lector.js?v=1"></script>
</body>
</html>
