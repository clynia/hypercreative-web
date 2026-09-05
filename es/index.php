<?php $HC_LANG='es'; $HC_EN='/'; $HC_ES='/es/'; include $_SERVER['DOCUMENT_ROOT'].'/_inc/lang.php'; ?><!DOCTYPE html>
<html lang="es">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TBPM9KTK');</script>
<!-- End Google Tag Manager -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Hypercreative: entrenamiento creativo para líderes</title>
<link rel="icon" href="/favicon.svg" type="image/svg+xml"><link rel="icon" href="/favicon-32.png" sizes="32x32" type="image/png"><link rel="icon" href="/favicon-16.png" sizes="16x16" type="image/png"><link rel="apple-touch-icon" href="/apple-touch-icon.png">
<meta name="description" content="Hypercreative es entrenamiento creativo para líderes. Conferencias y programas a medida que enseñan a directivos y equipos a crear ideas útiles a demanda.">
<?php echo hc_hreflang(); ?>
<meta name="robots" content="index,follow,max-image-preview:large">
<meta property="og:site_name" content="Hypercreative">
<meta property="og:locale" content="es_ES">
<meta property="og:type" content="website">
<meta property="og:title" content="Hypercreative: entrenamiento creativo para líderes">
<meta property="og:description" content="Entrenamiento creativo para empresas y conferencias que enseñan a los equipos directivos a producir trabajo útil y original a demanda, con un plazo real y las reglas cambiando por el camino.">
<meta property="og:url" content="https://hypercreativemethod.com/es/">
<meta property="og:image" content="https://hypercreativemethod.com/assets/og-default.png">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Hypercreative: entrenamiento creativo para líderes">
<meta name="twitter:description" content="Entrenamiento creativo para empresas y conferencias que enseñan a directivos y equipos a crear ideas útiles a demanda.">
<meta name="twitter:image" content="https://hypercreativemethod.com/assets/og-default.png">
<script type="application/ld+json">
{"@context":"https://schema.org","@graph":[
{"@type":"Organization","@id":"https://hypercreativemethod.com/#org","name":"Hypercreative","url":"https://hypercreativemethod.com/","image":"https://hypercreativemethod.com/assets/og-default.png","slogan":"Entrenamiento creativo para líderes","description":"Entrenamiento creativo para empresas y conferencias que enseñan a directivos y equipos a crear trabajo útil y original a demanda.","founder":{"@id":"https://hypercreativemethod.com/#alfonso"}},
{"@type":"WebSite","@id":"https://hypercreativemethod.com/#website","url":"https://hypercreativemethod.com/","name":"Hypercreative","publisher":{"@id":"https://hypercreativemethod.com/#org"},"inLanguage":"es"},
{"@type":"Person","@id":"https://hypercreativemethod.com/#alfonso","name":"Alfonso González Aguilar","jobTitle":"Fundador y conferenciante","worksFor":{"@id":"https://hypercreativemethod.com/#org"},"description":"Fundador de Hypercreative. Entrena a equipos directivos para crear a demanda, con años dirigiendo equipos de cine y producción donde el error se paga."}
]}
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Space+Mono:wght@400&display=swap" rel="stylesheet">
<style>
  :root{
    --paper:#F7F6F3; --paper-2:#FFFFFF; --ink:#13130F; --ink-soft:#56554E; --ink-mute:#9a988f;
    --line:rgba(0,0,0,.10); --line-soft:rgba(0,0,0,.06);
    --red:#E0463C; --red-dim:rgba(224,70,60,.12);
    --maxw:1180px; --ease:cubic-bezier(.22,.61,.36,1);
    --f-display:"Inter",system-ui,-apple-system,sans-serif; --f-body:"Inter",system-ui,-apple-system,sans-serif; --f-mono:"Space Mono",ui-monospace,monospace;
  }
  *{box-sizing:border-box;margin:0;padding:0}
  .nav-lang{display:inline-flex;align-items:center;gap:.45em;color:var(--ink-mute)}
  .nav-links .nav-lang a{color:var(--ink-mute)}
  .nav-links .nav-lang a:hover{color:var(--ink)}
  .nav-links .nav-lang a::after{display:none}
  .nav-lang .on{color:var(--ink)}
  .nav-lang i{font-style:normal;opacity:.4}
  html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
  body{background:var(--paper);color:var(--ink);font-family:var(--f-body);font-weight:300;
    font-size:clamp(16px,1.05vw,18px);line-height:1.7;letter-spacing:.01em;overflow-x:hidden;-webkit-font-smoothing:antialiased}
  a{color:inherit;text-decoration:none}
  .sr-only{position:absolute!important;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
  ::selection{background:var(--red-dim)}
  .eyebrow,.section-tag{font-family:var(--f-mono);font-size:.72rem;letter-spacing:.2em;text-transform:uppercase;color:var(--ink-mute)}
  .italic{font-style:italic}

  #cursor-halo{position:fixed;top:0;left:0;width:440px;height:440px;border-radius:50%;pointer-events:none;z-index:3;
    background:radial-gradient(circle at center,rgba(224,70,60,.06),transparent 66%);opacity:0;transition:opacity .7s var(--ease);will-change:transform}
  #cursor-halo.on{opacity:1}
  @media (prefers-reduced-motion:reduce),(hover:none),(pointer:coarse){#cursor-halo{display:none!important}}

  .nav{position:fixed;top:0;left:0;right:0;z-index:50;display:flex;align-items:center;justify-content:space-between;
    padding:1.5rem clamp(1.25rem,4vw,3.25rem);transition:background .5s var(--ease),border-color .5s var(--ease),padding .5s var(--ease);border-bottom:1px solid transparent}
  .nav.scrolled{background:rgba(247,246,243,.78);backdrop-filter:blur(14px) saturate(120%);-webkit-backdrop-filter:blur(14px) saturate(120%);border-bottom-color:var(--line);padding-top:1rem;padding-bottom:1rem}
  .brand{display:inline-flex;align-items:center;gap:9px;font-family:var(--f-display);font-weight:500;font-size:1.18rem;letter-spacing:-.015em}
  .brand .dot{width:8px;height:8px;border-radius:50%;background:var(--red)}
  .nav-links{display:flex;align-items:center;gap:clamp(1.4rem,3vw,2.6rem);font-family:var(--f-mono);font-size:.72rem;letter-spacing:.16em;text-transform:uppercase}
  .nav-links a{position:relative;color:var(--ink-soft);transition:color .3s var(--ease)}
  .nav-links a:hover{color:var(--ink)}
  .nav-links a::after{content:"";position:absolute;left:0;right:0;bottom:-5px;height:1px;background:var(--red);opacity:.8;transform:scaleX(0);transform-origin:right;transition:transform .4s var(--ease)}
  .nav-links a:hover::after{transform:scaleX(1);transform-origin:left}
  @media(max-width:760px){.nav-toggle{display:flex}.nav-links{position:fixed;top:0;bottom:0;right:0;width:min(80vw,300px);flex-direction:column;justify-content:center;align-items:flex-start;gap:1.7rem;padding:2rem;background:var(--paper);box-shadow:-24px 0 60px -30px rgba(0,0,0,.55);transform:translateX(100%);transition:transform .4s var(--ease);font-size:.85rem;z-index:55}.nav.open .nav-links{transform:none}.nav-links a::after{display:none}.nav-cta{margin-top:.4rem}}
  .nav-cta{border:1px solid var(--line);padding:8px 15px;border-radius:2px;color:var(--ink)!important}
  .nav-cta::after{display:none}
  .nav-cta:hover{border-color:var(--red)}
  .nav-toggle{display:none;flex-direction:column;justify-content:center;gap:5px;width:44px;height:44px;padding:0;border:0;background:none;cursor:pointer;z-index:60}
  .nav-toggle span{display:block;width:24px;height:2px;background:var(--ink);transition:transform .3s var(--ease),opacity .3s var(--ease)}
  .nav.open .nav-toggle span:nth-child(1){transform:translateY(7px) rotate(45deg)}
  .nav.open .nav-toggle span:nth-child(2){opacity:0}
  .nav.open .nav-toggle span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
  .nav-links a.nav-hot::before{content:"";display:inline-block;width:6px;height:6px;border-radius:50%;background:var(--red);vertical-align:.14em;margin-right:.55em;animation:ndot 2.4s var(--ease) infinite}
  @keyframes ndot{0%,100%{box-shadow:0 0 0 0 rgba(224,70,60,.55)}55%{box-shadow:0 0 0 5px rgba(224,70,60,0)}}
  @media (prefers-reduced-motion:reduce){.nav-links a.nav-hot::before{animation:none}}

  .hero{position:relative;height:240svh}
  .hero-pin{position:sticky;top:0;height:100svh;overflow:hidden;display:flex;flex-direction:column;justify-content:center}
  #net{position:absolute;inset:0;width:100%;height:100%;z-index:0}
  .hero-scrim{position:absolute;inset:0;z-index:1;pointer-events:none;background:radial-gradient(58% 48% at 50% 46%,rgba(247,246,243,.62),rgba(247,246,243,.18) 60%,transparent 82%)}
  .hero-inner{position:relative;z-index:2;max-width:var(--maxw);width:100%;margin:0 auto;padding:7rem clamp(1.25rem,4vw,3.25rem) 6rem;text-align:center}
  .hero .eyebrow{display:block;margin-bottom:1.6rem;color:var(--ink-soft);font-size:.7rem;letter-spacing:.22em}
  .hero .eyebrow::before{content:"";display:inline-block;width:5px;height:5px;border-radius:50%;background:var(--red);vertical-align:.18em;margin-right:.8em}
  .hero-title{font-family:var(--f-display);font-weight:300;font-size:clamp(3rem,9.5vw,8.4rem);line-height:.95;letter-spacing:-.025em}
  .hero-title span{display:block}
  .hero-title .italic{font-style:italic}
  .hero-title .p{color:var(--red)}
  .hero-title .tm{font-size:.28em;vertical-align:.95em;color:var(--ink-mute);font-family:var(--f-mono);font-weight:400;letter-spacing:0;margin-left:.1em}
  /* Ignition Point: the brand mark, the one node that lights up */
  .hero-title .ip{display:block;margin:.18em auto 0;width:clamp(40px,4.6vw,64px);height:clamp(40px,4.6vw,64px);overflow:visible}
  .ip .c{stroke:rgba(19,19,15,.34);stroke-width:2.4;stroke-linecap:round;fill:none}
  .ip .n{fill:rgba(19,19,15,.40)}
  .ip .d{fill:#13130F;fill-opacity:.36;transform-box:fill-box;transform-origin:center;transform:scale(0);animation:ipDisc .42s var(--ease) .62s forwards,ipFill .42s linear .62s forwards}
  .ip .h{fill:var(--red);transform-box:fill-box;transform-origin:center;transform:scale(.6);opacity:0;animation:ipHalo .5s ease-out .9s forwards}
  @keyframes ipLoop{0%{stroke-dashoffset:34}35%{stroke-dashoffset:0}65%{stroke-dashoffset:0}100%{stroke-dashoffset:34}}
  @keyframes ipNode{0%{opacity:0}35%{opacity:.9}65%{opacity:.9}100%{opacity:0}}
  @keyframes ipDisc{0%{transform:scale(0)}68%{transform:scale(1.14)}100%{transform:scale(1)}}
  @keyframes ipFill{to{fill:#E0463C;fill-opacity:1}}
  @keyframes ipHalo{0%{transform:scale(.6);opacity:.45}100%{transform:scale(1.7);opacity:0}}
  @media (prefers-reduced-motion:reduce){.ip .c{stroke-dashoffset:0;animation:none}.ip .n{opacity:1;animation:none}.ip .d{transform:scale(1);fill:#E0463C;fill-opacity:1;animation:none}.ip .h{display:none}}
  .brand .tm{font-size:.34em;vertical-align:.7em;color:var(--ink-mute);font-family:var(--f-mono);font-weight:400;margin-left:.08em}
  .bp{color:var(--red)}
  .hero-tag{font-family:var(--f-display);font-style:italic;font-size:clamp(1.3rem,3vw,2rem);color:var(--ink);margin-top:1.1rem}
  .hero-tag .p{color:var(--red)}
  .hero-sub{margin:1.4rem auto 0;max-width:42ch;color:var(--ink-soft);font-size:clamp(1rem,1.5vw,1.18rem)}
  .actions{display:flex;gap:14px;justify-content:center;margin-top:2.4rem;flex-wrap:wrap}
  .btn{display:inline-flex;align-items:center;gap:.6em;font-family:var(--f-mono);font-size:.76rem;letter-spacing:.14em;text-transform:uppercase;padding:1rem 1.6rem;border:1px solid var(--line);border-radius:2px;cursor:pointer;transition:.3s var(--ease)}
  .btn-primary{background:var(--ink);color:var(--paper);border-color:var(--ink)}
  .btn-primary:hover{background:var(--red);border-color:var(--red);transform:translateY(-1px)}
  .btn-ghost{color:var(--ink-soft)}
  .btn-ghost:hover{color:var(--ink);border-color:var(--red)}
  /* creative profile banner */
  .tq{position:relative;background:var(--ink);color:var(--paper);overflow:hidden;isolation:isolate}
  .tq::before{content:"";position:absolute;inset:0;z-index:-1;background:radial-gradient(720px 380px at 50% -12%,rgba(224,70,60,.30),transparent 66%)}
  .tq-in{max-width:var(--maxw);margin:0 auto;padding:clamp(4rem,9.5vh,7rem) clamp(1.25rem,4vw,3.25rem);text-align:center}
  .tq-h{font-family:var(--f-display);font-weight:300;font-size:clamp(2.2rem,5.6vw,4.2rem);line-height:1.02;letter-spacing:-.025em;text-wrap:balance}
  .tq-h .p{color:var(--red);font-style:italic}
  .tq-sub{margin:1.35rem auto 0;max-width:56ch;color:rgba(247,246,243,.82);font-size:clamp(1rem,1.5vw,1.18rem);line-height:1.6}
  .tq-types{margin:1.8rem auto 0;max-width:60ch;font-family:var(--f-mono);font-size:.72rem;letter-spacing:.1em;color:rgba(247,246,243,.55);line-height:2}
  .tq-cta{margin-top:2.3rem;display:flex;justify-content:center;gap:12px;flex-wrap:wrap}
  .tq-btn{background:var(--paper);color:var(--ink)!important;border-color:var(--paper)}
  .tq-btn:hover{background:var(--red);color:var(--paper)!important;border-color:var(--red);transform:translateY(-2px)}
  .tq-btn2{background:transparent;color:var(--paper)!important;border-color:rgba(247,246,243,.4)}
  .tq-btn2:hover{border-color:var(--red);color:var(--paper)!important;transform:translateY(-2px)}
  .tq-meta{margin-top:1.15rem;font-family:var(--f-mono);font-size:.68rem;letter-spacing:.12em;text-transform:uppercase;color:rgba(247,246,243,.6)}
.tq-more{margin-top:1.5rem;font-size:.92rem;color:rgba(247,246,243,.5)}
.tq-more a{color:rgba(247,246,243,.78);border-bottom:1px solid rgba(224,70,60,.7);padding-bottom:3px;transition:color .3s ease}
.tq-more a:hover{color:var(--paper)}
  .scroll-cue{position:absolute;left:50%;bottom:2.2rem;transform:translateX(-50%);z-index:2;width:24px;height:40px;border:1px solid var(--line);border-radius:20px;display:grid;place-items:start center;padding-top:7px}
  .scroll-cue span{width:3px;height:8px;border-radius:3px;background:var(--red);animation:sp 2.2s var(--ease) infinite}
  @keyframes sp{0%{opacity:0;transform:translateY(-3px)}35%{opacity:1}70%{opacity:0;transform:translateY(11px)}100%{opacity:0}}

  section{position:relative;z-index:1}
  .band{max-width:var(--maxw);margin:0 auto;padding:clamp(4rem,9vh,7rem) clamp(1.25rem,4vw,3.25rem)}
  .lede{font-family:var(--f-display);font-weight:300;font-size:clamp(2rem,5.2vw,4rem);line-height:1.07;letter-spacing:-.015em;max-width:18ch}
  .lede em{font-style:italic;color:var(--red)}
  .acts{margin-top:clamp(3rem,7vh,5rem);display:flex;border-block:1px solid var(--line)}
  .act{position:relative;flex:1 1 0;min-width:0;text-align:left;background:var(--paper);border:0;border-left:1px solid var(--line);font:inherit;color:inherit;cursor:pointer;overflow:hidden;padding:2.4rem 1.9rem 2.7rem;transition:flex-grow .7s var(--ease),background .6s var(--ease)}
  .act:first-child{border-left:0}
  .act:focus-visible{outline:2px solid var(--red);outline-offset:-3px}
  .act::before{content:"";position:absolute;top:-1px;left:0;right:0;height:2px;background:var(--red);transform:scaleX(0);transform-origin:left;transition:transform .6s var(--ease)}
  .act-kicker{display:block;font-family:var(--f-mono);font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;color:var(--ink-mute);transition:color .5s var(--ease)}
  .act-title{font-family:var(--f-display);font-weight:400;letter-spacing:-.01em;margin:.75rem 0 0;font-size:clamp(1.45rem,1.9vw,1.8rem);color:var(--ink);transition:font-size .6s var(--ease),margin .6s var(--ease)}
  .act-desc{color:var(--ink-soft);font-size:1rem;max-width:38ch;text-align:justify;hyphens:auto;-webkit-hyphens:auto;margin-top:0;opacity:0;transform:translateY(10px);max-height:0;transition:opacity .55s var(--ease),transform .6s var(--ease),max-height .6s var(--ease),margin .6s var(--ease)}
  .act.is-active{flex-grow:2.2;background:var(--paper-2)}
  .act.is-active::before{transform:scaleX(1)}
  .act.is-active .act-kicker{color:var(--red)}
  .act.is-active .act-title{font-size:clamp(1.9rem,3vw,2.7rem);margin-top:.5rem}
  .act.is-active .act-desc{opacity:1;transform:none;max-height:26rem;margin-top:1.1rem}
  @media(hover:hover){.act:not(.is-active):hover{background:var(--paper-2)}}
  @media(max-width:760px){
    .acts{flex-direction:column}
    .act{flex:0 0 auto;border-left:0;border-top:1px solid var(--line);padding:1.7rem 1.4rem 1.9rem}
    .act:first-child{border-top:0}
    .act::before{top:0;bottom:0;left:0;right:auto;width:2px;height:auto;transform:scaleY(0);transform-origin:top;transition:transform .6s var(--ease)}
    .act.is-active::before{transform:scaleY(1)}
    .act-desc{max-width:none}
  }
  .quiet{position:relative;overflow:hidden;text-align:center;background:var(--paper);border-block:1px solid var(--line);padding:clamp(4.5rem,10vh,8rem) clamp(1.25rem,4vw,3.25rem)}
  .quiet-video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:0;pointer-events:none}
  .quiet-scrim{position:absolute;inset:0;z-index:1;background:radial-gradient(80% 92% at 50% 50%,rgba(247,246,243,.48),rgba(247,246,243,.72))}
  .quiet-inner{position:relative;z-index:2;max-width:var(--maxw);margin:0 auto}
  @media (prefers-reduced-motion:reduce){.quiet-video{display:none}}
  .quiet .l{font-family:var(--f-display);font-weight:300;font-style:italic;font-size:clamp(1.8rem,4.4vw,3.2rem);line-height:1.12;letter-spacing:-.01em}
  .quiet .s{margin:1.4rem auto 0;max-width:46ch;color:var(--ink-soft)}

  footer{border-top:1px solid var(--line);padding:clamp(3rem,7vh,4.5rem) clamp(1.25rem,4vw,3.25rem) 3rem}
  .foot{max-width:var(--maxw);margin:0 auto;display:flex;justify-content:space-between;align-items:flex-start;gap:2.6rem 3rem;flex-wrap:wrap}
  .foot .brand{text-transform:none;letter-spacing:-.01em;color:var(--ink);font-size:1.2rem}
  .foot-lead{flex:1 1 17rem;max-width:22rem}
  .foot-claim{margin-top:.75rem;color:var(--ink-soft);font-size:.95rem;line-height:1.5}
  .foot-talk{display:inline-flex;align-items:center;gap:.45rem;margin-top:1.15rem;font-family:var(--f-mono);font-size:.68rem;letter-spacing:.14em;text-transform:uppercase;color:var(--ink)}
  .foot-talk span{transition:transform .25s var(--ease)}.foot-talk:hover span{transform:translateX(4px)}
  .foot-nav{display:flex;gap:clamp(2rem,5vw,4.5rem);flex-wrap:wrap}
  .foot-col{display:flex;flex-direction:column;gap:.72rem}
  .foot-h{font-family:var(--f-mono);font-size:.62rem;letter-spacing:.2em;text-transform:uppercase;color:var(--ink-mute);margin-bottom:.35rem}
  .foot-col a{color:var(--ink-soft);font-size:.95rem;transition:color .2s var(--ease)}.foot-col a:hover{color:var(--ink)}

  .reveal{opacity:0;transform:translateY(22px);filter:blur(6px);transition:opacity 1s var(--ease) var(--d,0s),transform 1s var(--ease) var(--d,0s),filter 1s var(--ease) var(--d,0s)}
  .reveal.in{opacity:1;transform:none;filter:blur(0)}
  .method-intro{max-width:58ch;color:var(--ink-soft);font-size:clamp(1.02rem,1.4vw,1.15rem);margin-top:1.1rem;text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  @media (prefers-reduced-motion:reduce){.reveal{opacity:1;transform:none;filter:none;transition:none}.scroll-cue span{animation:none;opacity:.8}.act,.act::before,.act-title,.act-desc,.act-kicker,.law-n::after{transition:none}}



























/*GENCSS*/
  .prods{margin-top:clamp(2.5rem,6vh,4rem);display:grid;grid-template-columns:1fr 1fr;gap:18px}@media(max-width:760px){.prods{grid-template-columns:1fr}}
  .prod{border:1px solid var(--line);border-radius:2px;padding:2.2rem 1.9rem;transition:.2s}.prod:hover{border-color:var(--red)}
  .prod h3{font-family:var(--f-display);font-weight:400;font-size:1.7rem;margin-bottom:.6rem}.prod p{color:var(--ink-soft);font-size:1rem;margin-bottom:1.2rem}
  .prod-cta{font-family:var(--f-mono);font-size:.74rem;letter-spacing:.12em;text-transform:uppercase;color:var(--ink)}.prod-cta:hover{color:var(--red)}
  .manifesto{text-align:left}
  .manifesto-lead{font-family:var(--f-display);font-weight:300;font-size:clamp(1.5rem,3.6vw,2.5rem);line-height:1.16;letter-spacing:-.015em;color:var(--ink);max-width:18ch;margin-top:1.2rem}
  .laws{list-style:none;margin-top:clamp(2.6rem,6vh,4.2rem);border-top:1px solid var(--line)}
  .law{position:relative;display:grid;grid-template-columns:clamp(2.4rem,6vw,4rem) 1fr;gap:clamp(1rem,3vw,2.4rem);align-items:start;padding:clamp(1.3rem,3vh,2rem) 0;border-bottom:1px solid var(--line)}
  .law-n{position:relative;font-family:var(--f-display);font-weight:400;font-size:clamp(1.25rem,2vw,1.8rem);line-height:1;color:var(--ink-mute);transition:color .4s var(--ease)}
  .law-n::after{content:"";position:absolute;top:.12em;right:-12px;width:5px;height:5px;border-radius:50%;background:var(--red);transform:scale(0);transition:transform .5s var(--ease) calc(var(--d,0s) + .2s)}
  .law.in .law-n::after{transform:scale(1)}
  .law-t{font-family:var(--f-display);font-weight:300;font-size:clamp(1.25rem,2.6vw,1.95rem);line-height:1.24;letter-spacing:-.01em;color:var(--ink);max-width:32ch}
  @media(hover:hover){.law:hover .law-n{color:var(--red)}}
  .band-title{font-family:var(--f-display);font-weight:300;font-size:clamp(2.1rem,5vw,3.6rem);line-height:1.05;letter-spacing:-.02em;color:var(--ink)}
  .band-sub{color:var(--ink-soft);margin-top:.9rem;max-width:52ch;font-size:clamp(1rem,1.4vw,1.15rem);text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  .more-wrap{text-align:center;margin-top:2.6rem}
  .bt{margin-top:2.5rem;display:grid;grid-template-columns:1fr 1fr;gap:18px}@media(max-width:760px){.bt{grid-template-columns:1fr}}
  .bt-3{grid-template-columns:repeat(3,1fr)}@media(max-width:860px){.bt-3{grid-template-columns:1fr}}
  .bt-card{border:1px solid var(--line);border-radius:2px;padding:1.8rem;transition:.2s}.bt-card:hover{border-color:var(--red)}
  .bt-thumb{width:100%;aspect-ratio:16/9;object-fit:cover;border:1px solid var(--line);border-radius:2px;margin-bottom:1rem;display:block}
  .bt-card h3{font-family:var(--f-display);font-weight:400;font-size:1.3rem;margin-bottom:.5rem}.bt-card p{color:var(--ink-soft);font-size:.96rem;text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  .rq{max-width:560px;margin-top:2.6rem;position:relative;min-height:260px}
  .rq-bar{height:2px;background:var(--line);margin-bottom:2.6rem}.rq-bar-fill{height:2px;background:var(--red);width:0;transition:width .4s var(--ease)}
  .qstep{display:none}.qstep.on{display:block;animation:qin .45s var(--ease)}
  @keyframes qin{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
  .q{font-family:var(--f-display);font-weight:300;font-size:clamp(1.6rem,3.4vw,2.4rem);line-height:1.15;letter-spacing:-.01em;margin-bottom:1.5rem}
  .q-sub{color:var(--ink-soft)}
  .q-opts{display:flex;flex-direction:column;gap:10px;max-width:440px}
  .q-opt{text-align:left;font-family:var(--f-body);font-size:1.05rem;color:var(--ink);padding:1rem 1.2rem;border:1px solid var(--line);border-radius:3px;background:#fff;cursor:pointer;transition:.2s}
  .q-opt:hover{border-color:var(--red);transform:translateX(3px)}
  .rq input,.rq textarea{width:100%;max-width:480px;background:none;border:none;border-bottom:1px solid var(--line);border-radius:0;padding:.7rem 0;font-family:var(--f-display);font-weight:300;font-size:clamp(1.3rem,2.6vw,1.8rem);color:var(--ink)}
  .rq input:focus,.rq textarea:focus{outline:none;border-bottom-color:var(--red)}.rq input.err{border-bottom-color:var(--red)}
  .q-next{margin-top:1.7rem;font-family:var(--f-mono);font-size:.74rem;letter-spacing:.14em;text-transform:uppercase;padding:.85rem 1.7rem;border:1px solid var(--ink);background:var(--ink);color:var(--paper);border-radius:2px;cursor:pointer;transition:.2s}
  .q-next:hover{background:var(--red);border-color:var(--red)}
  .q-err{color:var(--red);font-family:var(--f-mono);font-size:.72rem;letter-spacing:.06em;margin-top:1.1rem}
  .q-back{position:absolute;top:1.4rem;right:0;font-family:var(--f-mono);font-size:.66rem;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-mute);background:none;border:none;cursor:pointer}.q-back:hover{color:var(--ink)}
  .foot-legal{max-width:var(--maxw);margin:2.6rem auto 0;padding:1.4rem 0 0;display:flex;justify-content:space-between;gap:.8rem 1.5rem;flex-wrap:wrap;font-family:var(--f-mono);font-size:.64rem;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-mute);border-top:1px solid var(--line)}.foot-legal a:hover{color:var(--ink)}
  .foot-fine{text-transform:none;letter-spacing:.03em;color:var(--ink-mute);opacity:.9}
/*GENCSS*/
</style>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TBPM9KTK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="cursor-halo" aria-hidden="true"></div>

<header class="nav" id="nav">
  <a class="brand" href="#top">Hypercreative<span class="bp">.</span></a>
  <button class="nav-toggle" id="navToggle" type="button" aria-label="Abrir menú" aria-expanded="false" aria-controls="navLinks"><span></span><span></span><span></span></button>
  <nav class="nav-links" id="navLinks" aria-label="Principal">
    <a href="/es/#metodo">El método</a>
    <a href="/es/que-hacemos/">Qué hacemos</a>
    <a class="nav-hot" href="/es/perfil-creativo/">Creative Profile</a>
    <a href="/es/blog/">Blog</a>
    <a href="/es/prensa/">Prensa</a>
    <a class="nav-cta" href="/es/#contacto">Hablemos</a>
    <?php echo hc_lang_switch(); ?>
  </nav>
</header>
<script>(function(){var n=document.getElementById("nav"),t=document.getElementById("navToggle");if(!n||!t)return;function set(o){n.classList.toggle("open",o);t.setAttribute("aria-expanded",o?"true":"false");t.setAttribute("aria-label",o?"Cerrar menú":"Abrir menú");}t.addEventListener("click",function(){set(!n.classList.contains("open"));});n.querySelectorAll(".nav-links a").forEach(function(a){a.addEventListener("click",function(){set(false);});});})();</script>

<section class="hero" id="top">
  <div class="hero-pin">
    <canvas id="net" aria-hidden="true"></canvas>
    <div class="hero-scrim"></div>
    <div class="hero-inner" id="hero-inner">
      <h1 class="hero-title">
        <span class="sr-only">Hypercreative. Entrenamiento creativo para líderes.</span>
        <span class="reveal" style="--d:.05s">Hypercreative<sup class="tm">™</sup><svg class="ip" viewBox="0 0 100 100" aria-hidden="true" focusable="false"><circle class="h" cx="50" cy="50" r="20"/><line class="c c1" x1="24" y1="62" x2="39" y2="53"/><circle class="n n1" cx="23" cy="63" r="3"/><line class="c c2" x1="74" y1="34" x2="61" y2="45"/><circle class="n n2" cx="75" cy="33" r="3"/><line class="c c3" x1="66" y1="76" x2="55" y2="62"/><circle class="n n3" cx="67" cy="77" r="3"/><circle class="d" cx="50" cy="50" r="14"/></svg></span>
      </h1>
      <p class="hero-tag reveal" style="--d:.18s">Entrenamiento creativo para líderes<span class="p">.</span></p>
      <p class="hero-sub reveal" style="--d:.32s">Entrenamos a los equipos de las empresas más exigentes del mundo para resolver cualquier reto, de forma creativa y a demanda.</p>
      <div class="actions reveal" style="--d:.42s">
        <a href="#metodo" class="btn btn-primary">Explora el método</a>
        <a href="#contacto" class="btn btn-ghost">Solicita una sesión</a>
      </div>
    </div>
    <a href="#metodo" class="scroll-cue" id="scroll-cue" aria-label="Bajar"><span></span></a>
  </div>
</section>

<section class="band" id="metodo">
  <p class="lede reveal" style="--d:.06s">Una rejilla rígida se convierte en una red viva. <em>Ese es el trabajo.</em></p>
  <p class="method-intro reveal" style="--d:.12s">Entrenamos a directivos y equipos para producir ideas útiles cuando se les pide, con un plazo real y las reglas cambiando por el camino. El trabajo va en tres actos: primero la mente de cada uno, después el equipo, y al final la presión de un rodaje de verdad.</p>
  <div class="acts reveal" role="group" aria-label="Los tres actos del método">
    <button class="act is-active" type="button" aria-expanded="true">
      <span class="act-kicker">Acto Uno</span>
      <h3 class="act-title">La mente</h3>
      <p class="act-desc">Entrenamos a cada persona para pensar como un profesional de la creatividad: concentrarse cuando hace falta, capturar materia prima en cualquier sitio, conectar ideas que no tenían por qué encontrarse y cambiar la pregunta hasta que aparece una respuesta mejor. Once hábitos que convierten la creatividad en un músculo que controlas, en vez de un estado de ánimo que esperas. Casi siempre, quien más gana es el que llegó convencido de que no era creativo.</p>
    </button>
    <button class="act" type="button" aria-expanded="false">
      <span class="act-kicker">Acto Dos</span>
      <h3 class="act-title">El equipo</h3>
      <p class="act-desc">Tres personas brillantes no son un equipo creativo: son tres solistas. Convertimos un grupo de talentos en un solo instrumento, con un lenguaje común, roles claros y la seguridad suficiente para decir en voz alta la idea a medio hacer. La sala deja de competir por parecer lista y empieza a sumar, así que gana la mejor idea venga de quien venga.</p>
    </button>
    <button class="act" type="button" aria-expanded="false">
      <span class="act-kicker">Acto Tres</span>
      <h3 class="act-title">El rodaje</h3>
      <p class="act-desc">La teoría se muere en cuanto toca un plazo. Así que lo ponemos todo a trabajar sobre un reto real, con un entregable real y las reglas cambiando a mitad de camino a propósito. Un reloj, límites duros y algo en juego: un ensayo de cómo funciona de verdad tu negocio, y el acto donde el método demuestra que aguanta.</p>
    </button>
  </div>
</section>

<section class="quiet" id="asset">
  <video class="quiet-video" autoplay muted loop playsinline preload="auto" aria-hidden="true">
    <source src="/assets/creativity-is-the-ultimate.mp4" type="video/mp4">
  </video>
  <div class="quiet-scrim"></div>
  <div class="quiet-inner">
    <p class="l reveal"><a href="/es/blog/la-creatividad-es-el-nuevo-activo">La creatividad es el nuevo activo.</a></p>
    <p class="s reveal" style="--d:.12s">Hace veinte años no contaba. Hoy las empresas más valiosas del mundo están construidas sobre ella.</p>
  </div>
</section>


<!--GEN-->
<section class="tq" id="creative-world-cta" aria-label="Haz el test Creative Profile">
  <div class="tq-in">
    <h2 class="tq-h">¿Cuál es tu perfil creativo <span class="p">ahora mismo</span>?</h2>
    <p class="tq-sub">Los once hábitos del método se reparten en tres familias: alimentar, afilar y proteger. Alrededor de ellas giran nueve perfiles. Veinte preguntas rápidas de o esto o lo otro te dicen en qué perfil estás este trimestre, cuál corre por debajo y qué hábito te toca entrenar ahora.</p>
    <div class="tq-cta"><a class="btn tq-btn" href="/es/perfil-creativo/">Encuentra tu perfil</a><a class="btn tq-btn2" href="/es/el-mapa/">Abre el mapa</a></div>
  </div>
</section>
<section class="band" id="programs">
<p class="lede reveal" style="--d:.06s">Dos formas de entrar. Todo lo que hacemos se construye alrededor de tu organización.</p>
<div class="prods"><div class="prod reveal"><h3>Solicita una conferencia</h3><p>Una conferencia para tu comité de dirección, tu offsite o tu convención. Elige una de las nuestras o cuéntanos cómo es la sala y te guiamos.</p><a class="prod-cta" href="#contacto" data-prod="Keynote">Solicita una conferencia &#8594;</a></div><div class="prod reveal" style="--d:.12s"><h3>A medida</h3><p>Un programa diseñado para tu equipo y tu reto, desde media jornada hasta una transformación completa. Hecho para ti, nunca sacado de un catálogo.</p><a class="prod-cta" href="#contacto" data-prod="Tailor-made">Escríbenos para un programa a medida &#8594;</a></div></div>
</section>
<section class="band manifesto" id="manifesto" style="padding-bottom:clamp(2rem,5vh,3.5rem)"><h2 class="band-title reveal">Las 7 leyes de nuestro manifiesto</h2><p class="manifesto-lead reveal" style="--d:.05s">No inventamos la creatividad. Nos negamos a dejarla en manos de la suerte.</p><ol class="laws"><li class="law reveal" style="--d:0.04s"><span class="law-n">01</span><p class="law-t">Creemos que la creatividad es el activo más valioso de una empresa, y el peor entrenado.</p></li><li class="law reveal" style="--d:0.10s"><span class="law-n">02</span><p class="law-t">La creatividad nunca fue un don repartido entre unos pocos afortunados. Es una disciplina, y una disciplina se construye.</p></li><li class="law reveal" style="--d:0.16s"><span class="law-n">03</span><p class="law-t">Lo difícil no es tener ideas. Es tener la útil, a tiempo, con todo en contra. Esa es la única prueba que cuenta: creatividad bajo presión.</p></li><li class="law reveal" style="--d:0.22s"><span class="law-n">04</span><p class="law-t">Si no se puede repetir, no es un método: es suerte. Lo que puedes nombrar, trocear en pasos y parametrizar, lo puedes volver a ejecutar cuando quieras.</p></li><li class="law reveal" style="--d:0.28s"><span class="law-n">05</span><p class="law-t">Cada mente crea de una manera, así que un método rígido es un método roto. El nuestro se adapta a la persona que tiene delante, y no al revés.</p></li><li class="law reveal" style="--d:0.34s"><span class="law-n">06</span><p class="law-t">Un equipo que crea junto gana a una sala llena de talento creando por separado.</p></li><li class="law reveal" style="--d:0.40s"><span class="law-n">07</span><p class="law-t">El futuro es de quien sabe construir la respuesta que todavía no tiene nadie.</p></li></ol></section>
<section class="band" id="journal" style="padding-top:clamp(2rem,5vh,3.5rem)"><h2 class="band-title reveal">El blog</h2><p class="band-sub reveal" style="--d:.06s">Ideas sobre creatividad bajo presión. Apuntes del método, no el manual entero.</p><div class="bt bt-3"><a class="bt-card reveal" href="/es/blog/la-creatividad-es-el-nuevo-activo"><img class="bt-thumb" src="/blog/assets/blog-1.png" alt=""><h3>La creatividad es el nuevo activo</h3><p>Las empresas más valiosas del planeta funcionan con ella. La mayoría de los comités de dirección la siguen tratando como un rasgo de carácter.</p></a><a class="bt-card reveal" href="/es/blog/tus-mejores-ideas-no-vienen-de-la-libertad"><img class="bt-thumb" src="/blog/assets/blog-2.png" alt=""><h3>Tus mejores ideas no vienen de la libertad</h3><p>La creatividad es el gran activo de un negocio. No es un don: es un músculo que se entrena, y el gimnasio es la restricción.</p></a><a class="bt-card reveal" href="/es/blog/el-brainstorming-esta-roto-y-esto-lo-sustituye"><img class="bt-thumb" src="/blog/assets/blog-3.png" alt=""><h3>El brainstorming está roto (y esto es lo que lo sustituye)</h3><p>El brainstorming abierto premia a la voz más alta y a la idea más segura. Los métodos creativos con estructura dan mejores respuestas bajo presión. Uno de los dos es una habilidad de equipo. El otro es una reunión.</p></a></div><p class="more-wrap reveal"><a class="btn btn-primary" href="/es/blog/">Ver los 9 artículos &#8594;</a></p></section>
<section class="band" id="contacto">
<h2 class="band-title reveal">Hablemos</h2>
<form id="rq" class="rq reveal" style="--d:.06s"><div class="rq-bar"><div class="rq-bar-fill" id="rq-fill"></div></div><button type="button" class="q-back" id="q-back" hidden>&#8592; Atrás</button><div class="qstep on" data-q="product"><p class="q">¿Qué estás buscando?</p><div class="q-opts"><button type="button" class="q-opt" data-name="product" data-val="Keynote">Una conferencia</button><button type="button" class="q-opt" data-name="product" data-val="Tailor-made">Algo a medida</button></div></div><div class="qstep" data-q="keynote" data-if="Keynote"><p class="q">¿Qué conferencia te interesa?</p><div class="q-opts"><button type="button" class="q-opt" data-name="keynote" data-val="Creativity under pressure">Creatividad bajo presión</button><button type="button" class="q-opt" data-name="keynote" data-val="Creativity is the ultimate asset">La creatividad es el nuevo activo</button><button type="button" class="q-opt" data-name="keynote" data-val="Three habits to create under pressure">Tres hábitos para crear bajo presión</button><button type="button" class="q-opt" data-name="keynote" data-val="Create from the future">Crear desde el futuro</button><button type="button" class="q-opt" data-name="keynote" data-val="Not sure yet">Todavía no lo sé</button></div></div><div class="qstep" data-q="company"><p class="q">¿Cuál es tu empresa?</p><input data-name="company" required><button type="button" class="q-next">Continuar</button></div><div class="qstep" data-q="name"><p class="q">¿Y tu nombre?</p><input data-name="name" required><button type="button" class="q-next">Continuar</button></div><div class="qstep" data-q="email"><p class="q">¿En qué correo te encontramos?</p><input type="email" data-name="email" required><button type="button" class="q-next">Continuar</button></div><div class="qstep" data-q="location"><p class="q">¿Dónde es el evento?</p><input data-name="location" placeholder="Ciudad, país"><button type="button" class="q-next">Continuar</button></div><div class="qstep" data-q="attendees"><p class="q">¿Cuánta gente, más o menos?</p><input data-name="attendees" placeholder="Número aproximado"><button type="button" class="q-next">Continuar</button></div><div class="qstep" data-q="date"><p class="q">¿Para cuándo lo piensas?</p><input data-name="date" placeholder="Por ejemplo, Q4 2026"><button type="button" class="q-next">Continuar</button></div><div class="qstep" data-q="message"><p class="q">¿Algo que debamos saber?</p><textarea data-name="message" rows="3"></textarea><button type="button" class="q-next">Enviar solicitud</button></div><div class="qstep" data-q="done"><p class="q">Gracias<span class="bp">.</span></p><p class="q-sub">Te contestamos en un plazo de dos días laborables.</p></div></form>
</section>
<script>(function(){var EP="/api/lead.php";var pre=null;document.querySelectorAll(".prod-cta").forEach(function(a){a.addEventListener("click",function(){pre=a.getAttribute("data-prod");});});var f=document.getElementById("rq");if(f){var steps=[].slice.call(f.querySelectorAll(".qstep")),fill=document.getElementById("rq-fill"),back=document.getElementById("q-back"),st={},i=0;function vis(k){var s=steps[k],c=s.getAttribute("data-if");return !(c&&st.product!==c);}function show(k){var dir=k>=i?1:-1;while(k>0&&k<steps.length&&!vis(k))k+=dir;i=Math.max(0,Math.min(steps.length-1,k));steps.forEach(function(s,m){s.classList.toggle("on",m===i);});fill.style.width=Math.round(i/(steps.length-1)*100)+"%";back.hidden=(i===0||steps[i].getAttribute("data-q")==="done");var inp=steps[i].querySelector("input,textarea");if(inp)setTimeout(function(){inp.focus();},60);}function nx(){if(i<steps.length-1)show(i+1);}function err(s,m){var e=s.querySelector(".q-err");if(!e){e=document.createElement("p");e.className="q-err";s.appendChild(e);}e.textContent=m;}function submit(btn){var s=steps[i];btn.disabled=true;var t=btn.textContent;btn.textContent="Enviando…";st.source="website";fetch(EP,{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify(st)}).then(function(r){if(!r.ok)throw 0;show(steps.length-1);}).catch(function(){btn.disabled=false;btn.textContent=t;err(s,"No hemos podido enviar tu solicitud. Vuélvelo a intentar en un momento.");});}f.querySelectorAll(".q-opt").forEach(function(b){b.addEventListener("click",function(){st[b.getAttribute("data-name")]=b.getAttribute("data-val");nx();});});f.querySelectorAll(".q-next").forEach(function(b){b.addEventListener("click",function(){var s=steps[i],inp=s.querySelector("input,textarea");if(inp){if(inp.hasAttribute("required")&&!inp.value.trim()){inp.classList.add("err");inp.focus();return;}inp.classList.remove("err");st[inp.getAttribute("data-name")]=inp.value;}if(s.getAttribute("data-q")==="message"){submit(b);}else{show(steps.length-1>i?i+1:i);}});});f.addEventListener("keydown",function(e){if(e.key==="Enter"){var s=steps[i];if(s.querySelector("textarea"))return;e.preventDefault();var nb=s.querySelector(".q-next");if(nb)nb.click();}});back.addEventListener("click",function(){show(i-1);});document.querySelectorAll(".prod-cta").forEach(function(a){a.addEventListener("click",function(){setTimeout(function(){if(pre){st.product=pre;show(1);}},10);});});show(0);}})();</script>
<!--/GEN-->
<?php include $_SERVER['DOCUMENT_ROOT'].'/_inc/footer.php'; ?>

<script>
(function(){
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* cursor halo */
  var halo=document.getElementById('cursor-halo');
  if(halo && window.matchMedia('(pointer:fine)').matches && !reduce){
    var hx=innerWidth/2,hy=innerHeight*.4,cx=hx,cy=hy;
    addEventListener('pointermove',function(e){hx=e.clientX;hy=e.clientY;halo.classList.add('on')},{passive:true});
    (function l(){cx+=(hx-cx)*.1;cy+=(hy-cy)*.1;halo.style.transform='translate3d('+cx.toFixed(1)+'px,'+cy.toFixed(1)+'px,0) translate(-50%,-50%)';requestAnimationFrame(l)})();
  }

  /* nav */
  var nav=document.getElementById('nav');
  addEventListener('scroll',function(){nav.classList.toggle('scrolled',scrollY>24)},{passive:true});

  /* reveals */
  var rev=[].slice.call(document.querySelectorAll('.reveal'));
  if(reduce||!('IntersectionObserver'in window)){rev.forEach(function(e){e.classList.add('in')});}
  else{
    var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.18,rootMargin:'0px 0px -8% 0px'});
    rev.forEach(function(e){ if(e.closest('.hero')) requestAnimationFrame(function(){e.classList.add('in')}); else io.observe(e); });
  }

  /* method: three acts, cinematic focus pull */
  (function(){
    var acts=[].slice.call(document.querySelectorAll('.acts .act'));
    if(!acts.length) return;
    var canHover=window.matchMedia('(hover:hover)').matches;
    function activate(el){acts.forEach(function(a){var on=a===el;a.classList.toggle('is-active',on);a.setAttribute('aria-expanded',on?'true':'false');});}
    acts.forEach(function(a){
      a.addEventListener('mouseenter',function(){if(canHover)activate(a);});
      a.addEventListener('focus',function(){activate(a);});
      a.addEventListener('click',function(){activate(a);});
    });
  })();

  /* ---- grid -> network canvas ---- */
  var canvas=document.getElementById('net'), hero=document.getElementById('top'), heroInner=document.getElementById('hero-inner'), cue=document.getElementById('scroll-cue');
  if(!canvas) return;
  var ctx=canvas.getContext('2d'), dpr=Math.min(devicePixelRatio||1,2), W,H, pts=[], sp, ignite=[];
  function build(){
    W=canvas.clientWidth; H=canvas.clientHeight;
    canvas.width=W*dpr; canvas.height=H*dpr; ctx.setTransform(dpr,0,0,dpr,0,0);
    var cols=Math.max(8,Math.min(16,Math.round(W/118))); sp=W/cols;
    var rows=Math.ceil(H/sp)+1; pts=[];
    var ox=(W-(cols)*sp)/2+sp/2;
    for(var r=0;r<rows;r++)for(var c=0;c<=cols;c++){
      var gx=ox+c*sp, gy=r*sp - sp/2 + (H-(rows-1)*sp)/2 + sp/2;
      var ang=Math.random()*Math.PI*2, mag=sp*(0.35+Math.random()*0.5);
      pts.push({gx:gx,gy:gy,dx:Math.cos(ang)*mag,dy:Math.sin(ang)*mag,ph:Math.random()*Math.PI*2,spd:0.0003+Math.random()*0.0006});
    }
    ignite=[]; var n=Math.min(7,Math.max(4,Math.round(pts.length/26)));
    for(var i=0;i<n;i++) ignite.push(Math.floor(Math.random()*pts.length));
  }
  var target=0,cur=0;
  function compute(){var vh=innerHeight,dist=(hero?hero.offsetHeight:vh)-vh,y=pageYOffset||0;target=dist>0?Math.min(1,Math.max(0,y/dist)):0;}
  addEventListener('scroll',compute,{passive:true}); addEventListener('resize',function(){build();compute();}); build(); compute();

  function ease(p){return p<.5?2*p*p:1-Math.pow(-2*p+2,2)/2;}
  var thr;
  (function frame(t){
    cur+=(target-cur)*0.10; if(Math.abs(target-cur)<0.0004)cur=target;
    var e=ease(cur); thr=sp*1.65;
    ctx.clearRect(0,0,W,H);
    // current positions
    for(var i=0;i<pts.length;i++){var p=pts[i];
      var dr = e* (Math.sin(t*p.spd+p.ph))*sp*0.14;
      p.x=p.gx+p.dx*e; p.y=p.gy+p.dy*e+dr;
      p.red = ignite.indexOf(i)>-1 ? Math.max(0,(cur-0.45)/0.55) : 0;
    }
    // links
    for(var a=0;a<pts.length;a++){var pa=pts[a];
      for(var b=a+1;b<pts.length;b++){var pb=pts[b];
        var dx=pa.x-pb.x,dy=pa.y-pb.y,d=Math.sqrt(dx*dx+dy*dy);
        if(d<thr){
          var al=(1-d/thr);
          var red=Math.max(pa.red,pb.red);
          if(red>0){ctx.strokeStyle='rgba(224,70,60,'+(al*0.55*red).toFixed(3)+')';}
          else{ctx.strokeStyle='rgba(19,19,15,'+(al*0.24).toFixed(3)+')';}
          ctx.lineWidth=0.85;
          ctx.beginPath();ctx.moveTo(pa.x,pa.y);ctx.lineTo(pb.x,pb.y);ctx.stroke();
        }
      }
    }
    // nodes
    for(var k=0;k<pts.length;k++){var pp=pts[k];
      if(pp.red>0){
        ctx.beginPath();ctx.arc(pp.x,pp.y,1.5+2.5*pp.red,0,6.2832);
        ctx.fillStyle='rgba(224,70,60,'+(0.5+0.5*pp.red).toFixed(3)+')';ctx.fill();
        ctx.beginPath();ctx.arc(pp.x,pp.y,5+9*pp.red,0,6.2832);
        ctx.fillStyle='rgba(224,70,60,'+(0.06*pp.red).toFixed(3)+')';ctx.fill();
      }else{
        ctx.beginPath();ctx.arc(pp.x,pp.y,1.35,0,6.2832);
        ctx.fillStyle='rgba(19,19,15,0.42)';ctx.fill();
      }
    }
    // title release
    if(heroInner){var f=Math.max(0,(cur-0.62)/0.38);heroInner.style.opacity=(1-f).toFixed(3);heroInner.style.transform='translate3d(0,'+(f*-44).toFixed(1)+'px,0)';}
    if(cue)cue.style.opacity=cur>0.04?'0':'';
    requestAnimationFrame(frame);
  })(0);
})();
</script>
<script>
(function(){
  var ip=document.querySelector('.hero-title .ip'); if(!ip) return;
  if(window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  var cs=[].slice.call(ip.querySelectorAll('.c')), ns=[].slice.call(ip.querySelectorAll('.n'));
  if(cs.length<3) return;
  var cx=50, cy=50, rin=17, DEG=Math.PI/180;
  var sp=[{b:0,fr:0.50,ph:0.0},{b:120,fr:0.66,ph:1.7},{b:240,fr:0.58,ph:3.1}];
  var t0=null;
  function frame(ts){
    if(t0===null)t0=ts; var t=(ts-t0)/1000;
    for(var i=0;i<3;i++){
      var s=sp[i];
      var a=(s.b + t*18 + 12*Math.sin(t*0.45 + s.ph))*DEG;
      var R=30 + 9*Math.sin(t*s.fr + s.ph);
      var ix=cx+rin*Math.cos(a), iy=cy+rin*Math.sin(a);
      var ox=cx+R*Math.cos(a), oy=cy+R*Math.sin(a);
      cs[i].setAttribute('x1',ix.toFixed(2)); cs[i].setAttribute('y1',iy.toFixed(2));
      cs[i].setAttribute('x2',ox.toFixed(2)); cs[i].setAttribute('y2',oy.toFixed(2));
      if(ns[i]){ ns[i].setAttribute('cx',ox.toFixed(2)); ns[i].setAttribute('cy',oy.toFixed(2)); }
    }
    requestAnimationFrame(frame);
  }
  requestAnimationFrame(frame);
})();
</script>
</body>
</html>
