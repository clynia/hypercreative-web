<?php $HC_LANG='es'; $HC_EN='/blog/imagine-it-already-failed'; $HC_ES='/es/blog/imagina-que-ha-salido-mal'; include $_SERVER['DOCUMENT_ROOT'].'/_inc/lang.php'; ?><!DOCTYPE html><html lang="es"><head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TBPM9KTK');</script>
<!-- End Google Tag Manager --><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cómo hacer un premortem | Hypercreative</title>
<meta name="description" content="Cómo hacer un premortem: da tu proyecto por fracasado y trabaja hacia atrás para encontrar qué arreglar mientras aún hay tiempo. Simple y muy rentable."><?php echo hc_hreflang(); ?><meta name="robots" content="index,follow"><meta property="og:site_name" content="Hypercreative"><meta property="og:locale" content="es_ES"><meta property="og:type" content="article"><meta property="og:title" content="Cómo hacer un premortem | Hypercreative"><meta property="og:description" content="Cómo hacer un premortem: da tu proyecto por fracasado y trabaja hacia atrás para encontrar qué arreglar mientras aún hay tiempo. Simple y muy rentable."><meta property="og:url" content="https://hypercreativemethod.com/es/blog/imagina-que-ha-salido-mal"><meta property="og:image" content="https://hypercreativemethod.com/blog/assets/blog-8.png"><meta name="twitter:card" content="summary_large_image"><meta name="twitter:title" content="Cómo hacer un premortem | Hypercreative"><meta name="twitter:description" content="Cómo hacer un premortem: da tu proyecto por fracasado y trabaja hacia atrás para encontrar qué arreglar mientras aún hay tiempo. Simple y muy rentable."><meta name="twitter:image" content="https://hypercreativemethod.com/blog/assets/blog-8.png">
<script type="application/ld+json">{"@context": "https://schema.org", "@type": "BlogPosting", "@id": "https://hypercreativemethod.com/es/blog/imagina-que-ha-salido-mal#article", "headline": "Imagina que ha salido mal", "description": "Cómo hacer un premortem: da tu proyecto por fracasado y trabaja hacia atrás para encontrar qué arreglar mientras aún hay tiempo. Simple y muy rentable.", "image": "https://hypercreativemethod.com/blog/assets/blog-8.png", "datePublished": "2026-06-18", "dateModified": "2026-06-18", "author": {"@type": "Person", "name": "Alfonso González Aguilar", "@id": "https://hypercreativemethod.com/#alfonso"}, "publisher": {"@id": "https://hypercreativemethod.com/#org"}, "mainEntityOfPage": "https://hypercreativemethod.com/es/blog/imagina-que-ha-salido-mal", "inLanguage": "es", "isPartOf": {"@id": "https://hypercreativemethod.com/es/blog/#blog"}}</script><script type="application/ld+json">{"@context": "https://schema.org", "@type": "BreadcrumbList", "itemListElement": [{"@type": "ListItem", "position": 1, "name": "Inicio", "item": "https://hypercreativemethod.com/es/"}, {"@type": "ListItem", "position": 2, "name": "Blog", "item": "https://hypercreativemethod.com/es/blog/"}, {"@type": "ListItem", "position": 3, "name": "Imagina que ha salido mal", "item": "https://hypercreativemethod.com/es/blog/imagina-que-ha-salido-mal"}]}</script>
<link rel="icon" href="/favicon.svg" type="image/svg+xml"><link rel="icon" href="/favicon-32.png" sizes="32x32" type="image/png"><link rel="icon" href="/favicon-16.png" sizes="16x16" type="image/png"><link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Space+Mono:wght@400&display=swap" rel="stylesheet">
<style>
:root{--paper:#F7F6F3;--ink:#13130F;--soft:#56554E;--mute:#9a988f;--line:rgba(0,0,0,.10);--red:#E0463C;--fd:'Inter',system-ui,-apple-system,sans-serif;--fb:'Inter',system-ui,-apple-system,sans-serif;--fm:'Space Mono',monospace}
*{margin:0;padding:0;box-sizing:border-box}body{background:var(--paper);color:var(--ink);font-family:var(--fb);font-weight:300;line-height:1.7;-webkit-font-smoothing:antialiased}
a{color:inherit;text-decoration:none}
.nav{position:sticky;top:0;z-index:50;display:flex;flex-wrap:wrap;gap:.5rem 1rem;align-items:center;justify-content:space-between;max-width:980px;margin:0 auto;padding:1.5rem 1.5rem;border-bottom:1px solid var(--line);background:rgba(247,246,243,.92);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px)}
.brand{font-family:var(--fd);font-weight:500;font-size:1.15rem;letter-spacing:-.01em}.bp{color:var(--red)}.tm{font-size:.34em;vertical-align:.7em;color:var(--mute);font-family:var(--fm);margin-left:.08em}
.nlinks{display:flex;flex-wrap:wrap;gap:.5rem 1.1rem;font-family:var(--fm);font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:var(--soft)}.nlinks a:hover{color:var(--ink)}
.wrap{max-width:760px;margin:0 auto;padding:4rem 1.5rem}
.eyebrow{font-family:var(--fm);font-size:.72rem;letter-spacing:.28em;text-transform:uppercase;color:var(--mute)}
.byline{font-family:var(--fm);font-size:.72rem;letter-spacing:.1em;text-transform:uppercase;color:var(--mute);margin-bottom:1.4rem}
h1.t{font-family:var(--fd);font-weight:300;font-size:clamp(2.2rem,5vw,3.4rem);line-height:1.08;letter-spacing:-.02em;margin:.8rem 0}
.dek{font-size:1.2rem;color:var(--soft);margin-bottom:1.5rem;max-width:60ch;text-align:justify;hyphens:auto;-webkit-hyphens:auto}
.post-hero{width:100%;border:1px solid var(--line);border-radius:4px;margin:.5rem 0 2.6rem}
article h2{font-family:var(--fd);font-weight:400;font-size:1.55rem;margin:2.2rem 0 .7rem;letter-spacing:-.01em}
article p{margin:0 0 1.15rem;font-size:1.08rem;text-align:justify;hyphens:auto;-webkit-hyphens:auto}article strong{font-weight:500}
.pq{font-family:var(--fd);font-weight:300;font-style:italic;font-size:clamp(1.45rem,3vw,2.05rem);line-height:1.25;color:var(--ink);border-left:2px solid var(--red);padding:.3rem 0 .3rem 1.4rem;margin:2.2rem 0}
.takeaway{border-top:1px solid var(--line);margin-top:2.6rem;padding-top:1.4rem}
.tk-label{font-family:var(--fm);font-size:.7rem;letter-spacing:.14em;text-transform:uppercase;color:var(--red);display:block;margin-bottom:.5rem}
.takeaway p{font-family:var(--fd);font-weight:300;font-size:1.45rem;line-height:1.3;color:var(--ink);margin:0}
.legal article h2{font-size:1.3rem}.legal article p,.legal article li{font-size:.98rem;color:var(--soft)}.legal article ul{margin:0 0 1.2rem 1.2rem}
.foot{border-top:1px solid var(--line);max-width:980px;margin:4rem auto 0;padding:2.6rem 1.5rem 2.4rem}
.foot-top{display:flex;justify-content:space-between;align-items:flex-start;gap:2.4rem 3rem;flex-wrap:wrap}
.foot .brand{text-transform:none;letter-spacing:-.01em;color:var(--ink);font-size:1.2rem}
.foot-lead{flex:1 1 16rem;max-width:22rem}
.foot-claim{margin-top:.7rem;color:var(--soft);font-size:.92rem;line-height:1.5}
.foot-talk{display:inline-flex;align-items:center;gap:.45rem;margin-top:1.1rem;font-family:var(--fm);font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;color:var(--ink)}
.foot-talk span{transition:transform .25s ease}.foot-talk:hover span{transform:translateX(4px)}
.foot-nav{display:flex;gap:clamp(1.8rem,5vw,4rem);flex-wrap:wrap}
.foot-col{display:flex;flex-direction:column;gap:.65rem}
.foot-h{font-family:var(--fm);font-size:.6rem;letter-spacing:.2em;text-transform:uppercase;color:var(--mute);margin-bottom:.3rem}
.foot-col a{color:var(--soft);font-size:.92rem;transition:color .2s ease}.foot-col a:hover{color:var(--ink)}
.foot-legal{display:flex;justify-content:space-between;gap:.8rem 1.5rem;flex-wrap:wrap;margin-top:2.4rem;padding-top:1.3rem;border-top:1px solid var(--line);font-family:var(--fm);font-size:.62rem;letter-spacing:.12em;text-transform:uppercase;color:var(--mute)}
.foot-fine{text-transform:none;letter-spacing:.03em;color:var(--mute);opacity:.9}
.posts{display:grid;gap:1px;background:var(--line);border-block:1px solid var(--line)}
.post-link{background:var(--paper);padding:1.6rem .2rem;display:flex;gap:1.4rem;align-items:center}.post-link:hover{background:#fff}
.post-thumb{width:160px;height:92px;object-fit:cover;border:1px solid var(--line);border-radius:3px;flex:0 0 auto}
@media(max-width:560px){.post-link{flex-direction:column;align-items:flex-start}.post-thumb{width:100%;height:auto;aspect-ratio:16/9}}
.post-link h2{font-family:var(--fd);font-weight:400;font-size:1.5rem;margin:0 0 .4rem}.post-link p{color:var(--soft);margin:0;text-align:justify;hyphens:auto;-webkit-hyphens:auto}
.post-rt{display:block;margin-top:.6rem;font-family:var(--fm);font-size:.66rem;letter-spacing:.12em;text-transform:uppercase;color:var(--mute)}
article a{color:var(--ink);text-decoration:underline;text-decoration-color:var(--red);text-underline-offset:3px}article a:hover{color:var(--red)}
.back{font-family:var(--fm);font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:var(--mute)}.back:hover{color:var(--red)}

/* standard site header */
.snav{position:sticky;top:0;z-index:50;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:.5rem 1rem;padding:1.15rem clamp(1.25rem,4vw,3.25rem);background:rgba(247,246,243,.82);backdrop-filter:blur(14px) saturate(120%);-webkit-backdrop-filter:blur(14px) saturate(120%);border-bottom:1px solid rgba(0,0,0,.10)}
.snav .brand{font-family:'Inter',system-ui,sans-serif;font-weight:500;font-size:1.18rem;letter-spacing:-.015em;color:#13130F}
.snav .bp{color:#E0463C}
.snav-links{display:flex;flex-wrap:wrap;align-items:center;gap:clamp(1.2rem,3vw,2.4rem);font-family:'Space Mono',monospace;font-size:.72rem;letter-spacing:.16em;text-transform:uppercase}
.snav-links a{position:relative;color:#56554E;transition:color .3s ease}
.snav-links a:hover{color:#13130F}
.snav-links a:not(.nav-cta)::after{content:"";position:absolute;left:0;right:0;bottom:-5px;height:1px;background:#E0463C;opacity:.8;transform:scaleX(0);transform-origin:right;transition:transform .4s ease}
.snav-links a:not(.nav-cta):hover::after{transform:scaleX(1);transform-origin:left}
.snav .nav-cta{border:1px solid rgba(0,0,0,.10);padding:8px 15px;border-radius:2px;color:#13130F}
.snav .nav-cta:hover{border-color:#E0463C}
.snav .nav-hot::before{content:"";display:inline-block;width:6px;height:6px;border-radius:50%;background:#E0463C;vertical-align:.14em;margin-right:.55em}
.snav-toggle{display:none;flex-direction:column;justify-content:center;gap:5px;width:44px;height:44px;padding:0;border:0;background:none;cursor:pointer}
.snav-toggle span{display:block;width:24px;height:2px;background:#13130F;transition:transform .3s ease,opacity .3s ease}
.snav.open .snav-toggle span:nth-child(1){transform:translateY(7px) rotate(45deg)}
.snav.open .snav-toggle span:nth-child(2){opacity:0}
.snav.open .snav-toggle span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
@media(max-width:760px){.snav-toggle{display:flex}.snav-links{position:fixed;top:0;bottom:0;right:0;width:min(80vw,300px);flex-direction:column;flex-wrap:nowrap;justify-content:center;align-items:flex-start;gap:1.7rem;padding:2rem;background:#F7F6F3;box-shadow:-24px 0 60px -30px rgba(0,0,0,.55);transform:translateX(100%);transition:transform .4s cubic-bezier(.22,.61,.36,1);font-size:.85rem}.snav.open .snav-links{transform:none}.snav-links a:not(.nav-cta)::after{display:none}.snav .nav-cta{margin-top:.4rem}}
</style></head><body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TBPM9KTK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/_inc/header.php'; ?>
<main class="wrap"><a class="back" href="/es/blog/">&#8592; Blog</a><p class="eyebrow" style="margin-top:1.4rem">Blog</p><h1 class="t">Imagina que ha salido mal</h1><p class="byline">Por Alfonso G. Aguilar &middot; 4 min de lectura</p><p class="dek">La forma más rápida de proteger un proyecto importante es darlo por hundido y trabajar hacia atrás desde los restos, para encontrar qué arreglar mientras aún hay tiempo.</p><img class="post-hero" src="/blog/assets/blog-8.png" alt="Un avión de papel arrugado con un ala doblada y rota y una leve marca roja en el punto de impacto, para ilustrar el premortem, imaginar el fracaso por adelantado"><article><p>La mayoría de los equipos protege su mejor trabajo creyendo en él. Pulen la presentación, ensayan el discurso y entran en el lanzamiento convencidos de que va a funcionar. La confianza parece preparación. No lo es.</p>
<p>Hay un movimiento más afilado, y suena al revés. Antes de lanzar, sienta al equipo y dile que el proyecto está muerto. No en riesgo. Muerto. Salió, fracasó y todo el mundo está mirando los escombros intentando entender por qué.</p>
<p>Y entonces haces la única pregunta que importa. Qué lo mató.</p>
<blockquote class="pq">La confianza te mete en el lanzamiento. No te saca vivo de él.</blockquote>
<h2>Por qué el tiempo futuro te falla</h2>
<p>Pregúntale a un equipo qué podría salir mal y recibirás una lista educada. La gente se cubre. Nadie quiere ser el que predice el desastre de un proyecto del que la sala ya se ha enamorado. Así que los riesgos reales se quedan callados, y el lanzamiento los lleva dentro de todos modos.</p>
<p>Cambia el tiempo verbal y todo se suelta. Cuando el fracaso se enuncia como un hecho, la gente deja de defender el plan y empieza a explicar el accidente. La historia hace el trabajo. Un derrumbe concreto arranca causas concretas, y las causas concretas son las únicas que se pueden arreglar.</p>
<p>La técnica tiene dueño. El psicólogo Gary Klein la bautizó como premortem. Un postmortem estudia una muerte que ya ocurrió. Un premortem estudia una que todavía puedes evitar: la das por ocurrida y la trazas hacia atrás.</p>
<p>El cambio es pequeño y el efecto no lo es. Ya no estás prediciendo peligros vagos. Estás recordando un fracaso, y la memoria es mucho más honesta que la predicción.</p>
<h2>Cómo lo usamos bajo presión</h2>
<p>Esto no lo sacamos de un manual. Lo aprendimos donde un solo supuesto equivocado cuesta un día de rodaje que no se puede repetir. En un rodaje no te puedes permitir descubrir el fallo justo cuando estalla. Lo cazas antes, en voz alta, antes de que nadie diga acción.</p>
<p>Así que antes de que el trabajo salga, lo matamos a propósito. Ponemos nombre a la versión más humillante del fracaso, la que nadie quiere decir. El cliente se fue. El producto se lanzó y no lo oyó nadie. La gran idea parecía brillante en la sala y no significó nada en el mercado.</p>
<p>Después el equipo trabaja hacia atrás desde esos restos. Cada motivo recibe un nombre. El calendario que siempre fue demasiado justo. La objeción que nadie contestó. El supuesto que todos trataron como un hecho. Al final no tienes una preocupación vaga. Tienes una lista corta y brutal de cosas que arreglar mientras arreglarlas todavía es barato.</p>
<blockquote class="pq">Es más fácil evitar un fracaso que ya has vivido que uno que sigues fingiendo que no puede pasar.</blockquote>
<p>Esto es creatividad bajo presión, que es la única que paga. Cualquiera genera ideas en una sala tranquila y sin nada en juego. La habilidad que mueve un negocio es la que aguanta cuando el plazo es real y equivocarse sale caro. Imaginar primero el fracaso es la forma de construir ideas que sobreviven al contacto con el mundo en vez de romperse en el impacto.</p>
<h2>Que sea un hábito, no un trámite</h2>
<p>La trampa es tratar esto como una casilla que marcar. Un equipo que ejecuta el ejercicio para sentirse responsable, asiente ante los riesgos y no cambia nada ha desperdiciado la hora. El objetivo no es sentirse preparado. El objetivo es salir de la sala con el trabajo distinto de como entró.</p>
<p>Así que pon una regla pequeña. Cada riesgo que saque el premortem recibe una de tres salidas antes de que la sesión avance: se arregla ya, se planifica ya o se acepta a propósito, con los ojos abiertos. Ningún riesgo se queda en ese limbo donde todos lo vieron y nadie lo firmó.</p>
<p>Hazlo suficientes veces y algo cambia en la forma de pensar del equipo. La gente deja de proteger las ideas y empieza a someterlas a prueba de estrés. La duda deja de parecer deslealtad y empieza a parecer cuidado. La versión más fuerte del trabajo es la que ya ha pasado por su propia muerte y ha salido de pie. Este ejercicio tiene un gemelo optimista que merece la pena ejecutar a su lado, donde en vez del derrumbe <a href="/es/blog/imagina-que-ha-salido-bien" target="_blank" rel="noopener">das la victoria por conseguida</a> y trabajas hacia atrás desde ella. Juntos te dan el suelo y el techo.</p>
<p>La creatividad es <a href="/es/blog/la-creatividad-es-el-nuevo-activo" target="_blank" rel="noopener">el activo que decide qué empresas se adelantan</a>, y se entrena. Esta es una de las formas más baratas de entrenarla. Sin presupuesto nuevo y sin herramientas nuevas. Solo la disciplina de imaginar lo peor con claridad y actuar sobre lo que encuentres.</p>
<div class="takeaway"><span class="tk-label">Lo que te llevas</span><p>Mata el trabajo primero en tu cabeza. Lo que sobreviva merece lanzarse.</p></div></article></main><?php include $_SERVER['DOCUMENT_ROOT'].'/_inc/footer.php'; ?>

</body></html>