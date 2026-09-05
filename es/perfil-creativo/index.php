<?php $HC_LANG='es'; $HC_EN='/creative-profile/'; $HC_ES='/es/perfil-creativo/'; include $_SERVER['DOCUMENT_ROOT'].'/_inc/lang.php'; ?><!DOCTYPE html>
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
<title>Creative Profile: ¿en qué perfil estás ahora mismo? | Hypercreative</title>
<link rel="icon" href="/favicon.svg" type="image/svg+xml"><link rel="icon" href="/favicon-32.png" sizes="32x32" type="image/png"><link rel="icon" href="/favicon-16.png" sizes="16x16" type="image/png"><link rel="apple-touch-icon" href="/apple-touch-icon.png">
<meta name="description" content="Un test de dos minutos que te dice en cuál de los nueve perfiles creativos estás ahora mismo, no cuánto de creativo eres. Sin nota, con una tarjeta para compartir. Del método Hypercreative.">
<?php echo hc_hreflang(); ?>
<meta name="robots" content="index,follow,max-image-preview:large">
<meta property="og:site_name" content="Hypercreative">
<meta property="og:locale" content="es_ES">
<meta property="og:type" content="website">
<meta property="og:title" content="Creative Profile: ¿en qué perfil estás ahora mismo?">
<meta property="og:description" content="No cuánto de creativo eres. En qué perfil estás. Nueve perfiles, sin nota y una tarjeta que te llevas. Dos minutos, del método Hypercreative.">
<meta property="og:url" content="https://hypercreativemethod.com/es/perfil-creativo/">
<meta property="og:image" content="https://hypercreativemethod.com/assets/og-default.png">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Creative Profile: ¿en qué perfil estás ahora mismo?">
<meta name="twitter:description" content="No cuánto de creativo eres. En qué perfil estás. Nueve perfiles, sin nota y una tarjeta que te llevas.">
<meta name="twitter:image" content="https://hypercreativemethod.com/assets/og-default.png">
<script type="application/ld+json">
{"@context":"https://schema.org","@graph":[
{"@type":"WebPage","@id":"https://hypercreativemethod.com/es/perfil-creativo/#page","url":"https://hypercreativemethod.com/es/perfil-creativo/","name":"Creative Profile: ¿en qué perfil estás ahora mismo?","isPartOf":{"@id":"https://hypercreativemethod.com/#website"},"inLanguage":"es","description":"Una tipología de la creatividad: en cuál de los nueve perfiles creativos estás ahora mismo, no cuánto de creativo eres. Sin nota, con una tarjeta para compartir.","publisher":{"@id":"https://hypercreativemethod.com/#org"}},
{"@type":"Organization","@id":"https://hypercreativemethod.com/#org","name":"Hypercreative","url":"https://hypercreativemethod.com/"}
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
  html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
  body{background:var(--paper);color:var(--ink);font-family:var(--f-body);font-weight:300;
    font-size:clamp(16px,1.05vw,18px);line-height:1.7;letter-spacing:.01em;overflow-x:hidden;-webkit-font-smoothing:antialiased;
    min-height:100vh;min-height:100svh;display:flex;flex-direction:column}
  a{color:inherit;text-decoration:none}
  ::selection{background:var(--red-dim)}
  .sr-only{position:absolute!important;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
  .section-tag{font-family:var(--f-mono);font-size:.72rem;letter-spacing:.2em;text-transform:uppercase;color:var(--ink-mute)}
  .bp{color:var(--red)}

  .nav{position:fixed;top:0;left:0;right:0;z-index:50;display:flex;align-items:center;justify-content:space-between;
    padding:1.5rem clamp(1.25rem,4vw,3.25rem);transition:background .5s var(--ease),border-color .5s var(--ease),padding .5s var(--ease);border-bottom:1px solid transparent}
  .nav.scrolled{background:rgba(247,246,243,.78);backdrop-filter:blur(14px) saturate(120%);-webkit-backdrop-filter:blur(14px) saturate(120%);border-bottom-color:var(--line);padding-top:1rem;padding-bottom:1rem}
  .brand{display:inline-flex;align-items:center;gap:9px;font-family:var(--f-display);font-weight:500;font-size:1.18rem;letter-spacing:-.015em;color:var(--ink)}
  .nav-links{display:flex;align-items:center;gap:clamp(1.4rem,3vw,2.6rem);font-family:var(--f-mono);font-size:.72rem;letter-spacing:.16em;text-transform:uppercase}
  .nav-links a{position:relative;color:var(--ink-soft);transition:color .3s var(--ease)}
  .nav-links a:hover{color:var(--ink)}
  .nav-links a::after{content:"";position:absolute;left:0;right:0;bottom:-5px;height:1px;background:var(--red);opacity:.8;transform:scaleX(0);transform-origin:right;transition:transform .4s var(--ease)}
  .nav-links a:hover::after{transform:scaleX(1);transform-origin:left}
  @media(max-width:760px){.nav-links a:not(.nav-cta){display:none}}
  .nav-cta{border:1px solid var(--line);padding:8px 15px;border-radius:2px;color:var(--ink)!important}
  .nav-cta::after{display:none}
  .nav-cta:hover{border-color:var(--red)}
  .nav-lang{display:inline-flex;align-items:center;gap:.45em;color:var(--ink-mute)}
  .nav-links .nav-lang a{color:var(--ink-mute)}
  .nav-links .nav-lang a:hover{color:var(--ink)}
  .nav-lang a::after{display:none}
  .nav-lang .on{color:var(--ink);font-weight:500}
  .nav-lang i{font-style:normal;opacity:.4}
  @media(max-width:760px){.nav-links .nav-lang a{display:inline}}

  .wrap{max-width:var(--maxw);margin:0 auto;padding:0 clamp(1.25rem,4vw,3.25rem);width:100%}
  main.wrap{flex:1 0 auto}
  .hero{padding:clamp(8rem,18vh,12rem) 0 clamp(3rem,7vh,5rem)}

  /* ---- el mapa como puerta de entrada, dibujado sobre el mismo papel de la página ---- */
  .cw-hero{position:relative;background:var(--paper);height:clamp(600px,94svh,940px);overflow:hidden}
  .cw-hero::after{content:"";position:absolute;inset:0;pointer-events:none;z-index:1;
    background:radial-gradient(120% 92% at 60% 46%,transparent 55%,rgba(247,246,243,.9) 100%)}
  #hero-sky{position:absolute;inset:0;width:100%;height:100%;display:block;cursor:grab;touch-action:pan-y}
  .cw-hud{position:absolute;z-index:3;left:clamp(1.25rem,4vw,3.25rem);top:50%;transform:translateY(-50%);
    max-width:min(88vw,560px);pointer-events:none}
  .cw-hud::before{content:"";position:absolute;inset:-2.5rem -3rem;z-index:-1;
    background:radial-gradient(closest-side,rgba(247,246,243,.94),rgba(247,246,243,.6) 60%,transparent)}
  .cw-hud .h1{font-size:clamp(2.3rem,5vw,4.2rem)}
  .cw-hud .h1 em{color:var(--red)}
  .cw-sub{margin:1.4rem 0 0;max-width:50ch;color:var(--ink-soft);font-size:clamp(.98rem,1.35vw,1.14rem);
    line-height:1.65;text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  .cw-hud .actions{pointer-events:auto;align-items:center}
  .cw-full{font-family:var(--f-mono);font-size:.7rem;letter-spacing:.15em;text-transform:uppercase;
    color:var(--ink);border-bottom:1px solid var(--red);padding-bottom:4px;transition:opacity .3s ease}
  .cw-full:hover{opacity:.7}
  .cw-hint{position:absolute;left:0;right:0;bottom:clamp(12px,2vw,20px);z-index:3;text-align:center;pointer-events:none;
    font-family:var(--f-mono);font-size:.62rem;letter-spacing:.15em;text-transform:uppercase;color:var(--ink-mute)}
  .cw-hero .panel{position:absolute;right:clamp(14px,3vw,44px);bottom:clamp(46px,6vw,58px);z-index:6;
    width:min(88vw,352px);background:rgba(255,255,255,.86);border:1px solid var(--line);border-radius:4px;
    padding:1.1rem 1.2rem 1.25rem;backdrop-filter:blur(16px) saturate(130%);-webkit-backdrop-filter:blur(16px) saturate(130%);
    box-shadow:0 24px 60px -28px rgba(0,0,0,.18);transition:opacity .28s ease,transform .28s ease;color:var(--ink)}
  .cw-hero .panel[hidden]{display:none}
  .cw-hero .panel.enter{opacity:0;transform:translateY(8px)}
  .cw-hero .p-ico{width:28px;height:28px;color:var(--ink);opacity:.92}
  .cw-hero .p-ico svg{width:100%;height:100%}
  .cw-hero .p-ico.multi{width:auto;display:flex;gap:.6rem}
  .cw-hero .p-ico.multi svg{width:24px;height:24px}
  .cw-hero .p-fam{margin-top:.6rem;font-weight:500;font-size:.78rem}
  .cw-hero .p-name{margin:.14rem 0 0;font-weight:600;font-size:1.24rem;letter-spacing:-.02em;line-height:1.06}
  .cw-hero .p-sub{margin-top:.28rem;font-size:.8rem;color:var(--ink-soft)}
  .cw-hero .p-sub b{color:var(--ink);font-weight:600}
  .cw-hero .p-body{margin:.7rem 0 0;font-size:.86rem;line-height:1.55;color:var(--ink);opacity:.87;
    text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  .cw-hero .px{position:absolute;top:.5rem;right:.65rem;background:none;border:0;color:var(--ink-mute);
    font-size:1.2rem;line-height:1;cursor:pointer;padding:.1rem .2rem}
  .cw-hero .px:hover{color:var(--ink)}
  @media(max-width:760px){
    .cw-hero{height:clamp(560px,90svh,780px)}
    .cw-hud{top:clamp(84px,13vh,120px);transform:none}
    .cw-hero .panel{right:auto;left:14px;bottom:44px}
    .cw-hint{display:none}
  }

  /* ---- la tarjeta, enseñada antes del test como la prueba que te llevas ---- */
  .type-cta .tc-flex{display:flex;align-items:center;justify-content:center;gap:clamp(2rem,4.5vw,4rem);flex-wrap:wrap}
  .tc-copy{flex:1 1 30ch;max-width:52ch;text-align:left}
  .tc-copy .type-cta-h,.tc-copy .type-cta-p{margin-left:0;max-width:none}
  .mock-wrap{flex:0 0 auto;display:flex;flex-direction:column;align-items:center}
  .mock-stage{position:relative;width:212px;height:378px;flex:0 0 auto}
  .mock-stage .imprint{position:absolute;top:0;left:0;margin:0;width:340px;max-width:none;transform-origin:top left;transform:scale(.624)}
  .mock-card{width:min(238px,70vw);aspect-ratio:9/13.6;background:#111110;border:1px solid rgba(247,246,243,.1);
    border-radius:14px;padding:1.05rem 1.15rem;display:flex;flex-direction:column;transform:rotate(3deg);
    box-shadow:0 34px 64px -26px rgba(0,0,0,.6)}
  .mk-top{font-family:var(--f-display);font-weight:500;font-size:.8rem;color:#F7F6F3;text-align:left}
  .mk-top span{color:var(--red)}
  .mk-mid{margin:auto 0;text-align:center}
  .mk-ico{display:inline-block;width:36px;height:36px;color:var(--red)}
  .mk-ico svg{width:100%;height:100%}
  .mk-name{font-family:var(--f-display);font-weight:300;font-size:1.3rem;letter-spacing:-.02em;color:#F7F6F3;margin-top:.45rem}
  .mk-role{margin-top:.35rem;font-family:var(--f-display);font-style:italic;font-size:.72rem;color:rgba(247,246,243,.72);line-height:1.4}
  .mk-role b{font-style:normal;font-weight:500;color:var(--red)}
  .mk-foot{display:flex;justify-content:space-between;gap:.6rem;font-family:var(--f-mono);font-size:.48rem;letter-spacing:.06em;color:rgba(247,246,243,.42)}
  .mock-cap{margin-top:.85rem;max-width:250px;font-family:var(--f-mono);font-size:.58rem;letter-spacing:.1em;
    text-transform:uppercase;color:rgba(255,255,255,.8);text-align:center;line-height:1.7}
  @media(max-width:820px){.tc-copy{text-align:center}}
  .hero .section-tag{display:block;margin-bottom:1.5rem}
  .hero .section-tag::before{content:"";display:inline-block;width:5px;height:5px;border-radius:50%;background:var(--red);vertical-align:.18em;margin-right:.7em}
  .h1{font-family:var(--f-display);font-weight:300;font-size:clamp(2.6rem,7vw,5.4rem);line-height:.98;letter-spacing:-.025em;max-width:15ch}
  .h1 em{font-style:italic;color:var(--red)}
  .hero-sub{margin:1.6rem 0 0;max-width:52ch;color:var(--ink-soft);font-size:clamp(1.05rem,1.5vw,1.22rem);text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  .hero-meta{margin-top:2rem;display:flex;flex-wrap:wrap;gap:.7rem;font-family:var(--f-mono);font-size:.82rem;letter-spacing:.1em;text-transform:uppercase}
  .hero-meta span{display:inline-flex;align-items:center;color:var(--ink);background:var(--paper-2);border:1px solid var(--line);border-radius:999px;padding:.6rem 1.05rem;line-height:1}
  .hero-meta span::before{content:"";display:inline-block;width:5px;height:5px;border-radius:50%;background:var(--red);vertical-align:.15em;margin-right:.6em;flex:none}
  .hero-meta span:last-child{color:var(--red);border-color:rgba(224,70,60,.38);background:var(--red-dim);font-weight:400}
  .actions{display:flex;gap:14px;flex-wrap:wrap;margin-top:2.4rem}
  .btn{display:inline-flex;align-items:center;gap:.6em;font-family:var(--f-mono);font-size:.76rem;letter-spacing:.14em;text-transform:uppercase;padding:1rem 1.7rem;border:1px solid var(--line);border-radius:2px;cursor:pointer;transition:.3s var(--ease);background:none;color:var(--ink)}
  .btn-primary{background:var(--ink);color:var(--paper);border-color:var(--ink)}
  .btn-primary:hover{background:var(--red);border-color:var(--red);transform:translateY(-1px)}
  .btn-ghost:hover{color:var(--ink);border-color:var(--red)}
  #start-btn{background:var(--red);border-color:var(--red);color:var(--paper);font-size:.84rem;padding:1.2rem 2.3rem;box-shadow:0 14px 34px -12px rgba(224,70,60,.55)}
  #start-btn:hover{background:#cf3d33;border-color:#cf3d33;transform:translateY(-2px);box-shadow:0 18px 42px -12px rgba(224,70,60,.68)}

  /* test */
  .test{padding:clamp(1rem,3vh,2rem) 0 clamp(5rem,12vh,8rem);min-height:60svh}
  body.testing .cw-hero,body.testing #types,body.testing footer{display:none}
  body.testing .test{padding-top:clamp(5rem,12vh,7rem);animation:qin .5s var(--ease)}
  .test-inner{max-width:640px}
  .qbar{height:2px;background:var(--line);margin-bottom:.9rem}
  .qbar-fill{height:2px;background:var(--red);width:0;transition:width .45s var(--ease)}
  .qcount{font-family:var(--f-mono);font-size:.7rem;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-mute);margin-bottom:2.2rem}
  .qstep{display:none}.qstep.on{display:block;animation:qin .45s var(--ease)}
  @keyframes qin{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
  .q{font-family:var(--f-display);font-weight:300;font-size:clamp(1.6rem,3.6vw,2.5rem);line-height:1.16;letter-spacing:-.015em;margin-bottom:1.7rem;max-width:22ch}
  .q-opts{display:flex;flex-direction:column;gap:12px}
  .q-opt{text-align:left;font-family:var(--f-body);font-weight:300;font-size:1.08rem;line-height:1.45;color:var(--ink);padding:1.15rem 1.3rem;border:1px solid var(--line);border-radius:4px;background:var(--paper-2);cursor:pointer;transition:.2s var(--ease)}
  .q-opt:hover{border-color:var(--red);transform:translateX(3px)}
  .q-opt:focus-visible{outline:2px solid var(--red);outline-offset:2px}
  .q-back{margin-top:1.6rem;font-family:var(--f-mono);font-size:.68rem;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-mute);background:none;border:none;cursor:pointer}
  .q-back:hover{color:var(--ink)}
  .q-back[hidden]{display:none}

  /* calculando */
  .calc{display:none;text-align:center;padding:5rem 0}
  .calc.on{display:block;animation:qin .4s var(--ease)}
  .calc-dot{width:12px;height:12px;border-radius:50%;background:var(--red);margin:0 auto 1.6rem;animation:pulse 1.1s var(--ease) infinite}
  @keyframes pulse{0%,100%{transform:scale(.7);opacity:.5}50%{transform:scale(1.25);opacity:1}}
  .calc p{font-family:var(--f-display);font-style:italic;font-weight:300;font-size:clamp(1.4rem,3vw,2rem);color:var(--ink-soft)}

  /* resultado */
  .result{display:none;padding:clamp(2rem,5vh,4rem) 0 clamp(5rem,12vh,8rem);scroll-margin-top:84px}
  .result.on{display:block}
  .res-kicker{font-family:var(--f-display);font-weight:300;font-size:clamp(1rem,1.8vw,1.2rem);color:var(--ink-soft)}
  .res-blend{margin-top:.6rem;font-family:var(--f-display);font-style:italic;font-weight:300;font-size:clamp(1.15rem,2.6vw,1.7rem);line-height:1.3;color:var(--ink)}
  .res-blend strong{font-style:normal;font-weight:500;color:var(--red)}
  .res-name{font-family:var(--f-display);font-weight:300;font-size:clamp(2.6rem,7.5vw,5.6rem);line-height:1;letter-spacing:-.03em;margin:.5rem 0 0}
  .res-name .bp{color:var(--red)}
  .res-state{font-family:var(--f-display);font-style:italic;font-weight:300;font-size:clamp(1.3rem,3vw,2rem);line-height:1.28;color:var(--ink);max-width:26ch;margin:1.4rem 0 0}
  .res-grid{margin-top:clamp(2.4rem,6vh,4rem);display:grid;grid-template-columns:1fr 1fr;gap:0;border-top:1px solid var(--line)}
  @media(max-width:680px){.res-grid{grid-template-columns:1fr}}
  .res-cell{padding:1.9rem 0;border-bottom:1px solid var(--line)}
  .res-cell:nth-child(odd){padding-right:2rem;border-right:1px solid var(--line)}
  @media(max-width:680px){.res-cell:nth-child(odd){padding-right:0;border-right:0}}
  .res-cell:nth-child(even){padding-left:2rem}
  @media(max-width:680px){.res-cell:nth-child(even){padding-left:0}}
  .res-k{font-family:var(--f-display);font-weight:500;font-size:clamp(1.18rem,2.6vw,1.42rem);letter-spacing:-.015em;line-height:1.15;color:var(--red);margin-bottom:.55rem}
  .res-v{color:var(--ink-soft);font-size:1.02rem;line-height:1.6;text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  .res-v strong{color:var(--ink);font-weight:500}
  .res-map{display:inline-flex;align-items:center;gap:.45rem;margin-top:1.8rem;
    font-family:var(--f-mono);font-size:.68rem;letter-spacing:.14em;text-transform:uppercase;
    color:var(--ink);border-bottom:1px solid var(--red);padding-bottom:5px;transition:opacity .3s ease}
  .res-map:hover{opacity:.7}
  .res-retake{margin-top:1.2rem;font-family:var(--f-mono);font-size:.66rem;letter-spacing:.14em;text-transform:uppercase;color:var(--ink-mute);background:none;border:none;border-bottom:1px solid var(--red);padding:0 0 4px;cursor:pointer;transition:color .3s ease}
  .res-retake:hover{color:var(--ink)}
  .res-last{margin-top:2.2rem;font-family:var(--f-display);font-weight:300;font-size:clamp(1.1rem,2vw,1.4rem);line-height:1.4;color:var(--ink);max-width:34ch}
  .res-last .bp{color:var(--red)}

  /* tarjeta */
  .card-wrap{margin-top:clamp(3rem,7vh,5rem);width:100vw;margin-left:calc(50% - 50vw);background:var(--ink);color:var(--paper);padding:clamp(3rem,7vw,5.5rem) 0;position:relative;overflow:hidden;isolation:isolate}
  .card-wrap::before{content:"";position:absolute;inset:0;z-index:-1;pointer-events:none;background:radial-gradient(760px 380px at 16% -8%,rgba(224,70,60,.2),transparent 60%),radial-gradient(680px 500px at 100% 108%,rgba(224,70,60,.16),transparent 60%)}
  .card-inner{max-width:660px;margin:0 auto;padding:0 clamp(1.25rem,4vw,2rem)}
  .card-lead{display:flex;align-items:center;justify-content:center;gap:.55em;font-family:var(--f-display);font-weight:400;font-size:clamp(1.1rem,2.3vw,1.4rem);letter-spacing:-.01em;color:var(--paper);margin-bottom:1.5rem;text-align:center}
  .card-lead svg{width:1.15em;height:1.15em;flex:none;color:var(--red)}
  .card-name-in{display:flex;justify-content:center;margin-bottom:1.6rem}
  .card-name-in input{width:min(340px,100%);text-align:center;background:rgba(247,246,243,.06);border:1px solid rgba(247,246,243,.18);border-radius:999px;padding:.62rem 1.1rem;font-family:var(--f-mono);font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:var(--paper)}
  .card-name-in input::placeholder{color:rgba(247,246,243,.5);letter-spacing:.1em}
  .card-name-in input:focus{outline:none;border-color:var(--red);background:rgba(247,246,243,.1)}
  .card-stage{position:relative;display:flex;justify-content:center;padding:1.2rem 0 .4rem}
  .card-stage::before{content:"";position:absolute;top:6%;left:50%;transform:translateX(-50%);width:80%;height:80%;background:radial-gradient(ellipse at center,rgba(224,70,60,.5),transparent 68%);filter:blur(58px);z-index:0;pointer-events:none}
  .imprint{position:relative;z-index:1;width:340px;max-width:100%;aspect-ratio:9/16;background:var(--ink);color:var(--paper);border-radius:14px;padding:1.7rem 1.5rem;display:flex;flex-direction:column;overflow:hidden;border:1px solid rgba(247,246,243,.1);box-shadow:0 0 90px -8px rgba(224,70,60,.4),0 40px 80px -28px rgba(0,0,0,.8)}
  .imprint::after{content:"";position:absolute;left:50%;top:36%;transform:translate(-50%,-50%);width:250px;height:250px;border-radius:50%;background:radial-gradient(circle at center,rgba(224,70,60,.2),transparent 70%);pointer-events:none}
  .imp-top{text-align:center;z-index:1}
  .imp-brand{font-family:var(--f-display);font-weight:500;font-size:1.18rem;letter-spacing:-.01em;color:var(--paper)}
  .imp-brand .bp{color:var(--red)}
  .imp-dot{width:7px;height:7px;border-radius:50%;background:var(--red);flex:none}
  .imp-core{margin:auto 0;text-align:center;z-index:1}
  .imp-emblem{position:relative;width:110px;height:110px;margin:0 auto 1.1rem}
  .emb-ring{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;border:1.5px solid rgba(247,246,243,.5);border-radius:50%;color:var(--paper)}
  .emb-ring svg{width:50px;height:50px}
  .emb-badge{position:absolute;right:-3px;bottom:-3px;width:40px;height:40px;border-radius:50%;background:var(--ink);border:1.5px solid rgba(224,70,60,.6);display:flex;align-items:center;justify-content:center;color:var(--red)}
  .emb-badge svg{width:21px;height:21px}
  .imp-name{font-family:var(--f-display);font-weight:300;font-size:2.2rem;line-height:1.05;letter-spacing:-.02em;text-wrap:balance}
  .imp-blend{margin-top:.25rem;font-family:var(--f-display);font-style:italic;font-weight:300;font-size:1rem;color:rgba(247,246,243,.8)}
  .imp-blend b{font-style:normal;font-weight:500;color:var(--red)}
  .imp-fam{margin-top:.9rem;font-size:.8rem;line-height:1.4;color:rgba(247,246,243,.66)}
  .imp-desc{margin-top:.55rem;color:rgba(247,246,243,.72);font-size:.88rem;line-height:1.5}
  .imp-cta{z-index:1;border-top:1px solid rgba(247,246,243,.16);padding-top:.85rem;text-align:center}
  .imp-hook{font-family:var(--f-display);font-weight:400;font-size:1rem;line-height:1.2;color:var(--paper)}
  .imp-url{margin-top:.35rem;font-family:var(--f-display);font-weight:500;font-size:.84rem;letter-spacing:.01em;color:var(--red);line-height:1.3}
  .imp-foot{margin-top:1.1rem;text-align:center;z-index:1}
  .imp-serial{font-family:var(--f-display);font-weight:400;font-size:.62rem;letter-spacing:.03em;color:rgba(247,246,243,.42)}
  .imp-bot{margin-top:.85rem;display:flex;justify-content:space-between;align-items:end;font-family:var(--f-mono);font-size:.5rem;letter-spacing:.1em;text-transform:uppercase;color:rgba(247,246,243,.42);z-index:1}
  .card-actions{margin-top:1.9rem;display:flex;gap:12px;flex-wrap:wrap;justify-content:center}
  .card-actions .btn{color:var(--paper);border-color:rgba(247,246,243,.28)}
  .card-actions .btn-primary{background:var(--red);border-color:var(--red);color:var(--paper)}
  .card-actions .btn-primary:hover{background:#c93b32;border-color:#c93b32;transform:translateY(-1px)}
  .card-actions .btn-ghost:hover{color:var(--paper);border-color:var(--paper)}
  .card-share-note{margin:1.15rem auto 0;max-width:38rem;text-align:center;color:rgba(247,246,243,.72);font-size:.92rem;line-height:1.55}

  /* email */
  .unlock{margin-top:clamp(3rem,7vh,5rem);border-top:1px solid var(--line);padding-top:clamp(2.4rem,6vh,3.5rem);max-width:560px}
  .unlock h2{font-family:var(--f-display);font-weight:300;font-size:clamp(1.6rem,3.4vw,2.3rem);line-height:1.14;letter-spacing:-.015em}
  .unlock p{color:var(--ink-soft);margin-top:.9rem;text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  .unlock-form{margin-top:1.6rem;display:flex;gap:10px;flex-wrap:wrap}
  .unlock-form input{flex:1 1 240px;background:none;border:none;border-bottom:1px solid var(--line);padding:.7rem 0;font-family:var(--f-display);font-weight:300;font-size:clamp(1.15rem,2.4vw,1.5rem);color:var(--ink)}
  .unlock-form input:focus{outline:none;border-bottom-color:var(--red)}
  .unlock-form input.err{border-bottom-color:var(--red)}
  .unlock-note{margin-top:1rem;font-family:var(--f-mono);font-size:.66rem;letter-spacing:.06em;color:var(--ink-mute)}
  .unlock-done{color:var(--ink);font-family:var(--f-display);font-style:italic;font-size:1.2rem;margin-top:.4rem}

  footer{border-top:1px solid var(--line);padding:clamp(3rem,7vh,4.5rem) clamp(1.25rem,4vw,3.25rem) 3rem;margin-top:2rem}
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
  .foot-legal{max-width:var(--maxw);margin:2.6rem auto 0;padding:1.4rem 0 0;display:flex;justify-content:space-between;gap:.8rem 1.5rem;flex-wrap:wrap;font-family:var(--f-mono);font-size:.64rem;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-mute);border-top:1px solid var(--line)}.foot-legal a:hover{color:var(--ink)}
  .foot-fine{text-transform:none;letter-spacing:.03em;color:var(--ink-mute);opacity:.9}

  /* los nueve perfiles */
  .types{padding:clamp(3.5rem,9vh,7rem) 0 clamp(1rem,3vh,2rem)}
  .types .section-tag{display:block;margin-bottom:1.1rem}
  .types .section-tag::before{content:"";display:inline-block;width:5px;height:5px;border-radius:50%;background:var(--red);vertical-align:.18em;margin-right:.7em}
  .types-h{font-family:var(--f-display);font-weight:300;font-size:clamp(1.9rem,4.5vw,3.1rem);line-height:1.05;letter-spacing:-.02em;max-width:20ch}
  .types-lead{margin-top:1.1rem;color:var(--ink-soft);max-width:62ch;font-size:clamp(1.02rem,1.4vw,1.16rem);text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  .types-lead strong{color:var(--ink);font-weight:500}
  .types-lead em{font-style:italic;color:var(--red)}
  /* los nueve mundos, vivos, abriendo la sección que los enumera */
  .test-h{font-family:var(--f-display);font-weight:300;font-size:clamp(1.5rem,3.4vw,2.2rem);letter-spacing:-.02em;line-height:1.1;margin-bottom:1.8rem;text-align:center}
  .sky{margin-top:clamp(1.8rem,4vh,2.6rem);position:relative;height:clamp(280px,44vh,440px);
    border-radius:4px;overflow:hidden;background:var(--paper-2);border:1px solid var(--line)}
  .sky::after{content:"";position:absolute;inset:0;pointer-events:none;
    background:radial-gradient(120% 92% at 50% 50%,transparent 58%,rgba(255,255,255,.85) 100%)}
  .sky canvas{position:absolute;inset:0;width:100%;height:100%;display:block}
  .sky-cap{margin-top:.75rem;font-family:var(--f-mono);font-size:.66rem;letter-spacing:.14em;
    text-transform:uppercase;color:var(--ink-mute)}
  .sky-cap a{color:var(--ink);border-bottom:1px solid var(--red);padding-bottom:3px}
  .sky-cap a:hover{opacity:.7}
  @media(max-width:520px){.sky{height:clamp(240px,52vh,340px)}}
  .types-grid{margin-top:clamp(2.2rem,5vh,3.4rem)}
  .fiche{display:flex;gap:.85rem;align-items:flex-start;border:1px solid var(--line);border-radius:10px;padding:1.15rem 1.2rem;background:var(--paper-2);transition:border-color .25s var(--ease),transform .25s var(--ease)}
  .fiche:hover,.fiche:focus-within{border-color:var(--red);transform:translateY(-2px)}
  .fiche-ico{flex:none;width:30px;height:30px;color:var(--red);margin-top:.15rem}
  .fiche-ico svg{width:100%;height:100%;display:block}
  .fiche-body{min-width:0}
  .fiche-name{font-family:var(--f-display);font-weight:300;font-size:1.35rem;letter-spacing:-.02em;margin:0 0 .3rem}
  .fiche-one{font-family:var(--f-display);font-style:italic;color:var(--ink-soft);font-size:1rem;line-height:1.35}

  /* familias */
  .fam-group{margin-top:clamp(2.4rem,5.5vh,3.6rem)}
  .fam-group:first-child{margin-top:0}
  .fam-head{display:flex;flex-wrap:wrap;align-items:baseline;gap:.4rem 1.4rem;padding-bottom:1.05rem;border-bottom:1px solid var(--line);margin-bottom:1.5rem}
  .fam-title{font-family:var(--f-display);font-weight:400;font-size:clamp(1.35rem,2.7vw,1.85rem);letter-spacing:-.01em;color:var(--ink);display:inline-flex;align-items:center;gap:.55em}
  .fam-title::before{content:"";width:7px;height:7px;border-radius:50%;background:var(--red);flex:none}
  .fam-blurb{flex:1 1 32ch;color:var(--ink-soft);font-size:clamp(.98rem,1.3vw,1.1rem);line-height:1.55;max-width:66ch;text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  .fam-cards{display:grid;grid-template-columns:repeat(auto-fill,minmax(244px,1fr));gap:12px}
  /* al pasar por una ficha se enciende toda la familia */
  .fam-group:hover .fiche,.fam-group:focus-within .fiche{border-color:rgba(224,70,60,.34)}
  .fam-group:hover .fiche:hover,.fam-group:focus-within .fiche:focus-within{border-color:var(--red)}

  /* la invitación, después de explicar los perfiles */
  .type-cta{margin-top:clamp(3rem,7vh,5rem);background:var(--red);color:#fff;border-radius:16px;padding:clamp(2.3rem,4.5vw,3.6rem) clamp(1.4rem,4vw,3rem);text-align:center;position:relative;overflow:hidden;isolation:isolate;box-shadow:0 24px 60px -26px rgba(224,70,60,.7)}
  .type-cta::before{content:"";position:absolute;inset:0;z-index:-1;background:radial-gradient(620px 300px at 50% -25%,rgba(255,255,255,.2),transparent 66%)}
  .type-cta-kicker{font-family:var(--f-mono);font-size:.72rem;letter-spacing:.2em;text-transform:uppercase;color:rgba(255,255,255,.82)}
  .type-cta-h{font-family:var(--f-display);font-weight:400;font-size:clamp(1.7rem,3.8vw,2.6rem);line-height:1.1;letter-spacing:-.02em;margin:.7rem auto 0;max-width:19ch}
  .type-cta-p{margin:1rem auto 0;max-width:46ch;color:rgba(255,255,255,.9);font-size:clamp(1rem,1.4vw,1.12rem);line-height:1.5}
  .type-cta-btn{margin-top:1.9rem;background:#fff;color:var(--ink);border-color:#fff;font-size:.86rem;padding:1.15rem 2.5rem}
  .type-cta-btn:hover{background:var(--ink);color:#fff;border-color:var(--ink);transform:translateY(-2px)}
  .type-cta-meta{margin-top:1.1rem;font-family:var(--f-mono);font-size:.68rem;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.75)}
  body.has-result .type-cta{display:none}

  /* iconos de perfil en el resultado y en la tarjeta */
  .res-icon{position:relative;display:inline-block;width:110px;height:110px;margin:0 0 1.2rem}
  .res-icon .emb-ring{border-color:rgba(19,19,15,.22);color:var(--ink)}
  .res-icon .emb-badge{background:var(--paper)}
  .res-how{margin-top:2.2rem;border-top:1px solid var(--line);padding-top:1.4rem;max-width:44rem}
  .res-how summary{font-family:var(--f-display);font-weight:500;font-size:clamp(1.18rem,2.6vw,1.42rem);letter-spacing:-.015em;line-height:1.2;color:var(--red);cursor:pointer;list-style:none}
  .res-how summary::-webkit-details-marker{display:none}
  .res-how summary::before{content:"+ "}
  .res-how[open] summary::before{content:"\00d7 "}
  .res-how-body p{color:var(--ink-soft);font-size:.98rem;line-height:1.6;margin-top:1.1rem;text-align:justify;hyphens:auto;-webkit-hyphens:auto}
  .res-how-sci{font-style:italic;color:var(--ink-mute)!important}
  .reveal{opacity:0;transform:translateY(20px);transition:opacity .9s var(--ease) var(--d,0s),transform .9s var(--ease) var(--d,0s)}
  .reveal.in{opacity:1;transform:none}
  @media (prefers-reduced-motion:reduce){.reveal{opacity:1;transform:none;transition:none}.calc-dot{animation:none}.fiche:hover,.fiche:focus-within{transform:none}}
</style>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TBPM9KTK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="nav" id="nav">
  <a class="brand" href="/es/">Hypercreative<span class="bp">.</span></a>
  <nav class="nav-links" aria-label="Principal">
    <a href="/es/#metodo">El método</a>
    <a href="/es/que-hacemos/">Qué hacemos</a>
    <a href="/es/perfil-creativo/">Creative Profile</a>
    <a href="/es/blog/">Blog</a>
    <a href="/es/prensa/">Prensa</a>
    <a class="nav-cta" href="/es/#contacto">Hablemos</a>
    <?php echo hc_lang_switch(); ?>
  </nav>
</header>

<section class="cw-hero" id="top">
  <canvas id="hero-sky" role="img" aria-label="Un mapa que puedes girar: tres familias, nueve perfiles recorriendo sus órbitas alrededor de ellas y las 72 firmas colgando entre los perfiles"></canvas>
  <div class="cw-hud">
    <h1 class="h1 reveal" style="--d:.05s">¿En qué perfil creativo estás <em>ahora mismo</em>?</h1>
    <p class="cw-sub reveal" style="--d:.12s">No cuánto de creativo eres. Desde dónde estás creando. Los once hábitos del método se reparten en tres familias: alimentar, afilar y proteger. Nueve perfiles giran alrededor de esas familias, y las setenta y dos firmas cuelgan entre los perfiles: el método entero, dibujado como un mapa que puedes girar. Ahora mismo estás trabajando desde uno de esos perfiles. Dos minutos te dicen cuál, qué lo matiza y qué hábito toca entrenar.</p>
    <div class="actions reveal" style="--d:.2s">
      <button class="btn btn-primary" id="start-btn" type="button">Descubre tu perfil</button>
      <a class="cw-full" href="/es/el-mapa/">Abre el mapa a pantalla completa</a>
    </div>
  </div>
  <div class="cw-hint" id="cw-hint">Arrastra para girar &middot; pasa el ratón para frenar, haz clic para fijar</div>
  <aside class="panel" id="hpanel" aria-live="polite" hidden>
    <button class="px" id="hpx" type="button" aria-label="Cerrar">&times;</button>
    <div class="p-ico" id="hpIco"></div>
    <div class="p-fam" id="hpFam"></div>
    <h2 class="p-name" id="hpName"></h2>
    <div class="p-sub" id="hpSub"></div>
    <p class="p-body" id="hpBody"></p>
  </aside>
</section>

<main class="wrap">

  <section class="types" id="types">
    <span class="section-tag reveal">Los nueve perfiles</span>
    <h2 class="types-h reveal" style="--d:.05s">Un perfil manda<span class="bp">.</span> Otro lo matiza<span class="bp">.</span></h2>
    <p class="types-lead reveal" style="--d:.1s">Estos son los nueve perfiles del mapa de arriba, agrupados por la familia a la que pertenecen: <em>alimentar</em> una idea, <em>afilarla</em> o <em>protegerla</em>. Cada perfil lleva el nombre de aquello en lo que te conviertes mientras trabajas desde él, y por eso tu resultado te dará un perfil como el Cartógrafo o el Guardián. El test te dice en qué perfil estás y cuál es el segundo que lo matiza. Nueve perfiles, cada uno matizado por uno de los otros ocho: eso son <strong>setenta y dos firmas</strong> en total, y una de ellas es la tuya.</p>
    <div class="types-grid" id="types-grid"></div>
  </section>

  <section class="test" id="test" hidden>
    <div class="test-inner">
      <h2 class="test-h">Veinte preguntas, ninguna respuesta correcta<span class="bp">.</span></h2>
      <div class="qbar"><div class="qbar-fill" id="qbar-fill"></div></div>
      <div class="qcount" id="qcount"></div>
      <div id="questions"></div>
      <div class="calc" id="calc"><div class="calc-dot"></div><p>Leyendo la forma de tus respuestas&hellip;</p></div>
      <button class="q-back" id="q-back" type="button" hidden>&#8592; Atrás</button>
    </div>
  </section>

  <section class="result" id="result">
    <div class="res-icon" id="res-icon" aria-hidden="true"></div>
    <p class="res-kicker">Te ha salido</p>
    <h1 class="res-name" id="res-name"></h1>
    <p class="res-blend" id="res-blend"></p>
    <p class="res-state" id="res-state"></p>

    <div class="res-grid">
      <div class="res-cell"><div class="res-k">Tu ventaja</div><div class="res-v" id="res-sig"></div></div>
      <div class="res-cell"><div class="res-k">El hábito que entrenar este mes</div><div class="res-v" id="res-shadow"></div></div>
    </div>

    <div class="sky reveal"><canvas id="sig-sky" role="img" aria-label="Tu firma, encendida en el mapa de las setenta y dos"></canvas></div>
    <p class="sky-cap">Tu firma, encendida en el mapa. <a id="res-map" href="/es/el-mapa/" target="_blank" rel="noopener">Ábrelo a pantalla completa <span aria-hidden="true">&#8599;</span></a></p>

    <p class="res-last">Esto apunta a una tendencia, no a un veredicto<span class="bp">.</span> Lo que hagas con ella es cosa tuya.</p>
    <button type="button" id="res-retake" class="res-retake">Repetir el test</button>

    <details class="res-how">
      <summary>Cómo leemos tus respuestas</summary>
      <div class="res-how-body">
        <p>El test Creative Profile no te puntúa. Te sitúa. Cada pregunta ofrece dos maneras reales de trabajar, no una correcta y otra incorrecta, así que no hay nada que forzar: solo una dirección que se revela. Tus elecciones se van agrupando en las tres familias que organizan los once hábitos del método: cómo alimentas las ideas, cómo las afilas y cómo proteges el trabajo. El perfil que te sale es la orientación a la que tus elecciones vuelven una y otra vez; el que lo matiza está funcionando justo por debajo. Algunas preguntas vuelven a la misma tensión desde otro ángulo, y así la lectura se mantiene honesta. Lo que no hacemos nunca es ponerte en una escala: no hay un primero, ni percentiles, ni un perfil mejor que otro.</p>
        <p>Aquí no vas a encontrar un número, ni un percentil, ni un puesto en una lista, y es a propósito. La creatividad no es una cantidad de la que se tenga más o menos, y tratarla así solo enseña a la gente a actuar de cara a un marcador. Por eso te decimos en qué perfil estás y dejamos fuera por completo lo bueno que seas. Esto es un espejo, no una medición.</p>
        <p class="res-how-sci">Los nueve perfiles son nuestra propia lectura de los hábitos creativos, sacada de los once del método, y se ofrecen como una lente, no como el resultado de un laboratorio; por eso nunca te devuelven una nota.</p>
      </div>
    </details>

    <div class="card-wrap reveal">
      <div class="card-inner">
        <h2 class="card-lead">Tu Hypercreative Imprint<span class="bp">.</span></h2>
        <div class="card-name-in"><input type="text" id="imp-name-in" maxlength="26" placeholder="Añade tu nombre a la tarjeta" aria-label="Tu nombre en la tarjeta" autocomplete="name"></div>
        <div class="card-stage">
          <div class="imprint" id="imprint">
            <div class="imp-top"><span class="imp-brand">Hypercreative<span class="bp">.</span></span></div>
            <div class="imp-core">
              <div class="imp-emblem" id="imp-emblem" aria-hidden="true"></div>
              <div class="imp-name" id="imp-name"></div>
              <div class="imp-blend" id="imp-blend"></div>
              <div class="imp-desc" id="imp-desc"></div>
            </div>
            <div class="imp-cta">
              <div class="imp-hook">¿En qué perfil creativo estás?</div>
            </div>
            <div class="imp-foot">
              <div class="imp-serial" id="imp-serial"></div>
              <div class="imp-url">www.hypercreativemethod.com</div>
              <span id="imp-owner" hidden></span>
            </div>
          </div>
        </div>
        <div class="card-actions">
          <button class="btn btn-primary" id="dl-card" type="button">Descargar la tarjeta</button>
          <button class="btn btn-ghost" id="share-card" type="button">Compartir</button>
        </div>
        <p class="card-share-note">Publica tu tarjeta si te apetece, o pasa el test para que alguien más encuentre el suyo.</p>
      </div>
    </div>

    <div class="unlock" id="unlock">
      <h2>Debajo de tu perfil hay más.</h2>
      <p>El entrenamiento completo de tu perfil, los hábitos en sombra que proteger este mes y tu sitio dentro del método viven detrás del libro. Déjanos tu email y te avisamos en cuanto esté listo.</p>
      <form class="unlock-form" id="unlock-form" novalidate>
        <input type="email" id="unlock-email" placeholder="tu@email.com" aria-label="Tu email" required>
        <button class="btn btn-primary" type="submit" id="unlock-submit">Avísame</button>
      </form>
      <p class="unlock-note" id="unlock-note">La tarjeta ya es tuya. El email solo abre la profundidad, nunca el resultado.</p>
    </div>
  </section>
</main>

<footer>
  <div class="foot">
    <div class="foot-lead">
      <a class="brand" href="/es/">Hypercreative<span class="bp">.</span></a>
      <p class="foot-claim">Entrenamiento creativo para líderes.</p>
      <a class="foot-talk" href="/es/#contacto">Empieza una conversación <span aria-hidden="true">&#8594;</span></a>
    </div>
    <nav class="foot-nav" aria-label="Pie">
      <div class="foot-col">
        <p class="foot-h">Explora</p>
        <a href="/es/#metodo">El método</a>
        <a href="/es/que-hacemos/">Qué hacemos</a>
        <a href="/es/perfil-creativo/">Creative Profile</a>
        <a href="/es/el-mapa/">El mapa</a>
        <a href="/es/blog/">Blog</a>
      </div>
      <div class="foot-col">
        <p class="foot-h">Empresa</p>
        <a href="/es/prensa/">Prensa y dosier</a>
        <a href="/es/#contacto">Contacto</a>
      </div>
      <div class="foot-col">
        <p class="foot-h">Legal</p>
        <a href="/es/legal/aviso-legal">Aviso legal</a>
        <a href="/es/legal/privacidad">Privacidad</a>
        <a href="/es/legal/cookies">Cookies</a>
        <a href="/es/legal/terminos">Términos</a>
      </div>
    </nav>
  </div>
  <div class="foot-legal"><span class="foot-fine">&copy; 2026 Hypercreative&#8482;. Todos los derechos reservados.</span><span class="foot-fine">Entrenamiento creativo para líderes.</span></div>
</footer>

<script src="/assets/hc-worlds-es.js"></script>
<script src="/assets/hc-universe.js"></script>
<script>
(function(){
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  function dl(ev,extra){var o={event:ev};if(extra)for(var k in extra)o[k]=extra[k];(window.dataLayer=window.dataLayer||[]).push(o);}

  /* nav + reveals */
  var nav=document.getElementById('nav');
  addEventListener('scroll',function(){nav.classList.toggle('scrolled',scrollY>24)},{passive:true});
  function revealAll(scope){var r=[].slice.call((scope||document).querySelectorAll('.reveal'));
    if(reduce||!('IntersectionObserver'in window)){r.forEach(function(e){e.classList.add('in')});return;}
    var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.15,rootMargin:'0px 0px -6% 0px'});
    r.forEach(function(e){io.observe(e)});}
  revealAll(document);

  /* ---- contenido ---- */
  var TYPES=HCW.TYPES;
  /* mezcla del que manda con el que matiza: las 72 firmas */
  var INFLECT=HCW.INFLECT;
  /* prioridad para desempatar: gana el perfil más raro o más específico */
  var PRIORITY=["guardian","explorer","notary","persona","reframer","sketcher","collider","seedcollector","cartographer"];

  /* nombre corto: los nueve perfiles llevan "El " delante, aquí se quita */
  function shortName(n){return String(n).replace(/^El /,'');}

  /* un icono por perfil, el mismo en todas partes: fichas, resultado y tarjeta */
  var TYPE_ICON=HCW.TYPE_ICON;
  function iconSVG(key,cls,sw){return '<svg class="'+(cls||'')+'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="'+(sw||1.6)+'" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'+(TYPE_ICON[key]||'')+'</svg>';}
  /* qué significa cada familia, en cristiano, para la tarjeta */
  var FAM_DESC=HCW.FAM_DESC;

  /* el motor del mapa habla ingles por defecto; aqui van sus palabras en
     espanol, las mismas que en /es/el-mapa/. Las claves internas de las
     familias (Feed, Sharpen, Protect) no se tocan: solo cambia lo que se lee. */
  var I18N_ES={
    fam:{Feed:'Alimentar', Sharpen:'Afilar', Protect:'Proteger'},
    article:'El ',
    descLead:'',
    numbers:{2:'dos', 3:'tres', 4:'cuatro'},
    listJoin:', ',
    listLast:' y ',
    famSub:'una de las tres familias',
    famBody:'Cuando tiras de esta familia, {desc}. A su alrededor giran {n} perfiles: {profiles}.',
    nodeSub:'con el matiz del <b>{profile}</b>',
    sunSub:'un perfil que orbita la familia {family}',
    touchHint:'Arrastra para orbitar &middot; pellizca para acercar &middot; toca para fijar'
  };

  /* 20 preguntas de elección forzada en tres rondas de familia; cada perfil se disputa 4 o 5 veces */
  var Q=[
    /* --- ronda Alimentar --- */
    {fam:"Feed",q:"Te cae encima un proyecto nuevo. ¿Primer instinto?",a:{t:"Bajar a fondo en el terreno que ya es mío.",type:"cartographer"},b:{t:"Irme a merodear por un terreno que no es mío a buscar material.",type:"explorer"}},
    {fam:"Feed",q:"Tus notas, enlaces y capturas guardadas están&hellip;",a:{t:"Desbordadas. Lo guardo todo y no ordeno nada.",type:"seedcollector"},b:{t:"Justas. Solo guardo lo que he decidido que importa.",type:"persona"}},
    {fam:"Feed",q:"¿Por qué acude a ti la gente?",a:{t:"Porque conozco un terreno más a fondo que nadie.",type:"cartographer"},b:{t:"Porque siempre traigo algo de un sitio raro que no pinta nada.",type:"explorer"}},
    {fam:"Feed",q:"Tu material en bruto sale sobre todo de&hellip;",a:{t:"Todo lo que he ido guardando y nunca pierdo.",type:"seedcollector"},b:{t:"Sitios y mundos por los que he pasado de verdad.",type:"explorer"}},
    {fam:"Feed",q:"¿Cuándo piensas más afilado?",a:{t:"Cuando estoy metido a fondo en el terreno que domino.",type:"cartographer"},b:{t:"Cuando ya me he puesto el yo creativo que he elegido.",type:"persona"}},
    {fam:"Feed",q:"A solas, delante de un montón de material tuyo, ¿qué haces?",a:{t:"Salgo a recoger más antes de tocarlo.",type:"seedcollector"},b:{t:"Hago borradores sucios y los cribo en frío.",type:"sketcher"}},
    {fam:"Feed",q:"Un problema en blanco delante. ¿A qué echas mano primero?",a:{t:"Al detalle por el que todos han pasado de largo.",type:"notary"},b:{t:"A algo de un mundo que no tiene nada que ver.",type:"explorer"}},
    /* --- ronda Afilar --- */
    {fam:"Sharpen",q:"¿Tu mejor jugada ante un problema en blanco?",a:{t:"Ver la anomalía que no ha visto nadie.",type:"notary"},b:{t:"Reescribirlo hasta convertirlo en una pregunta mejor.",type:"reframer"}},
    {fam:"Sharpen",q:"Cuando una idea funciona de verdad, ha salido de&hellip;",a:{t:"Chocar dos cosas muy lejanas entre sí.",type:"collider"},b:{t:"Un montón de borradores sucios, cribados en frío.",type:"sketcher"}},
    {fam:"Sharpen",q:"¿En qué trampa te pillas a ti mismo?",a:{t:"Describir sin parar y no decidir nunca.",type:"notary"},b:{t:"Reformular sin parar y no sacar nunca nada.",type:"reframer"}},
    {fam:"Sharpen",q:"Con una entrega imposible encima, tu instinto es&hellip;",a:{t:"Reformular hasta que la petición esté bien planteada.",type:"reframer"},b:{t:"Sacar un borrador y arreglarlo sobre la marcha.",type:"sketcher"}},
    {fam:"Sharpen",q:"¿Qué desatasca un problema encallado?",a:{t:"Reescribirlo hasta que sea una pregunta más afilada.",type:"reframer"},b:{t:"Hacerlo chocar con algo muy lejano.",type:"collider"}},
    {fam:"Sharpen",q:"Tu archivo está lleno y la entrega está cerca. ¿Qué haces?",a:{t:"Fuerzo dos piezas que no tienen nada que ver hasta que encajan.",type:"collider"},b:{t:"Salgo a buscar más antes de empezar.",type:"seedcollector"}},
    {fam:"Sharpen",q:"¿Qué se acerca más a lo que eres?",a:{t:"Nunca pierdo un fragmento que merezca la pena.",type:"seedcollector"},b:{t:"Hago conexiones a larga distancia que casi nadie ve.",type:"collider"}},
    {fam:"Sharpen",q:"¿Qué es lo que te tienes que obligar a hacer?",a:{t:"Lanzar de una vez la versión sucia.",type:"sketcher"},b:{t:"Salir de mi terreno y explorar.",type:"cartographer"}},
    /* --- ronda Proteger --- */
    {fam:"Protect",q:"¿Qué es lo que más protege tu trabajo creativo?",a:{t:"Que nadie toca mis mandos sin que yo le invite.",type:"guardian"},b:{t:"Que ya tengo decidido quién soy cuando creo.",type:"persona"}},
    {fam:"Protect",q:"Tu creatividad depende sobre todo de&hellip;",a:{t:"El ritual que me pone y el estado en el que llego.",type:"persona"},b:{t:"Mantener las opiniones ajenas lejos de los mandos.",type:"guardian"}},
    {fam:"Protect",q:"Te cae encima una opinión que no pediste. ¿Qué haces?",a:{t:"Mi criterio sigue siendo mío y sigo adelante.",type:"guardian"},b:{t:"Voy a contrastarla con cómo lo hacen en otros campos.",type:"explorer"}},
    {fam:"Protect",q:"Bajo presión, tu ventaja real es&hellip;",a:{t:"Pillar el detalle que se le ha escapado a todo el mundo.",type:"notary"},b:{t:"Mantener el ruido de fuera lejos de los mandos.",type:"guardian"}},
    {fam:"Protect",q:"¿Por qué se fía la gente de tu criterio?",a:{t:"Porque no subcontrato mi criterio a nadie.",type:"guardian"},b:{t:"Porque veo lo que a otros se les pasa antes de tener una opinión.",type:"notary"}}
  ];

  var scores={},answers=[],idx=0,started=false;
  for(var k0 in TYPES)scores[k0]=0;

  var testSec=document.getElementById('test'),qWrap=document.getElementById('questions'),
      fill=document.getElementById('qbar-fill'),qcount=document.getElementById('qcount'),
      calc=document.getElementById('calc'),back=document.getElementById('q-back'),
      resultSec=document.getElementById('result');
  var nameIn=document.getElementById('imp-name-in'),owner=document.getElementById('imp-owner');
  function applyOwner(){
    if(!CUR.key)return;
    var t=TYPES[CUR.key],s=CUR.sec?TYPES[CUR.sec]:null;
    var typeName=shortName(t.name),subName=s?shortName(s.name):'';
    if(NAME){
      document.getElementById('imp-name').textContent=NAME;
      document.getElementById('imp-blend').innerHTML='tu perfil ahora mismo: <b>'+typeName+'</b>'+(s?', matizado por <b>'+subName+'</b>':'');
    }else{
      document.getElementById('imp-name').textContent=t.name;
      document.getElementById('imp-blend').innerHTML=s?'matizado por <b>'+subName+'</b>':'';
    }
    if(owner){owner.textContent='';owner.hidden=true;}
  }
  nameIn.addEventListener('input',function(){NAME=nameIn.value.trim();applyOwner();if(CUR.key)saveResult();});

  function renderQ(){
    var item=Q[idx];
    qcount.textContent="Pregunta "+(idx+1)+" de "+Q.length;
    fill.style.width=Math.round(idx/Q.length*100)+"%";
    back.hidden=(idx===0);
    var opts=[item.a,item.b],html='<div class="qstep on"><p class="q">'+item.q+'</p><div class="q-opts">';
    for(var i=0;i<opts.length;i++){html+='<button class="q-opt" type="button" data-type="'+opts[i].type+'">'+opts[i].t+'</button>';}
    html+='</div></div>';
    qWrap.innerHTML=html;
    [].slice.call(qWrap.querySelectorAll('.q-opt')).forEach(function(b){
      b.addEventListener('click',function(){choose(b.getAttribute('data-type'));});
    });
    var first=qWrap.querySelector('.q-opt');if(first&&!reduce)setTimeout(function(){first.focus();},80);
  }
  function choose(type){
    answers[idx]=type; scores[type]=(scores[type]||0)+1; idx++;
    if(idx>=Q.length){finish();} else {renderQ();}
  }
  function goBack(){
    if(idx===0)return;
    idx--; var prev=answers[idx];
    if(prev){scores[prev]-=1;answers[idx]=null;}
    renderQ();
  }
  back.addEventListener('click',goBack);

  function order(){return PRIORITY.slice().sort(function(a,b){return scores[b]-scores[a];});}
  function winner(){return order()[0];}
  function finish(){
    qWrap.innerHTML=''; qcount.textContent=''; fill.style.width='100%'; back.hidden=true;
    calc.classList.add('on');
    var key=winner();
    dl('creative_profile_complete',{profile_type:TYPES[key].name});
    setTimeout(function(){calc.classList.remove('on');showResult(key);},1600);
  }

  var SERIAL='',NAME='',CUR={key:null,sec:null};
  function showResult(key,restore){
    var t=TYPES[key],secKey=(restore&&restore.sec)?restore.sec:order()[1],s=TYPES[secKey];
    CUR.key=key;CUR.sec=secKey;
    document.getElementById('res-name').innerHTML=t.name+'<span class="bp">.</span>';
    document.getElementById('res-blend').innerHTML='matizado por el <strong>'+shortName(s.name)+'</strong>';
    var _bl=(INFLECT[key]&&INFLECT[key][secKey])?(t.state+' '+INFLECT[key][secKey]):t.state;
    document.getElementById('res-state').textContent=_bl;
    document.body.classList.remove('testing');document.body.classList.add('has-result');
    document.getElementById('res-sig').innerHTML=t.sig;
    document.getElementById('res-shadow').innerHTML=t.shadow;
    document.getElementById('res-map').href='/es/el-mapa/?w='+encodeURIComponent(key)+'&u='+encodeURIComponent(secKey);
    if(window.HCUniverse){
      var sc=document.getElementById('sig-sky');
      if(sc&&!window.__SIG)window.__SIG=HCUniverse.mount({canvas:sc,anchor:'center',interactive:false,theme:'paper',i18n:I18N_ES});
      if(window.__SIG)window.__SIG.focus(key,secKey,true);
    }
    document.getElementById('res-icon').innerHTML='<span class="emb-ring">'+iconSVG(key)+'</span><span class="emb-badge">'+iconSVG(secKey)+'</span>';
    document.getElementById('imp-emblem').innerHTML='<span class="emb-ring">'+iconSVG(key)+'</span><span class="emb-badge">'+iconSVG(secKey)+'</span>';
    document.getElementById('imp-desc').textContent=_bl;
    var d=new Date();
    var mm=('0'+(d.getMonth()+1)).slice(-2),dd=('0'+d.getDate()).slice(-2);
    SERIAL=(restore&&restore.serial)?restore.serial:('HCM-'+key.slice(0,3).toUpperCase()+'-'+Math.random().toString(36).slice(2,6).toUpperCase());
    document.getElementById('imp-serial').textContent=SERIAL+'  ·  '+d.getFullYear()+'-'+mm+'-'+dd;
    applyOwner();
    testSec.hidden=true;
    resultSec.classList.add('on');
    revealAll(resultSec);
    resultSec.scrollIntoView({behavior:(reduce||restore)?'auto':'smooth',block:'start'});
    if(!restore)saveResult();
    window.__profileType=t.name;
  }

  function startTest(){
    if(!started){started=true;dl('creative_profile_start');}
    document.body.classList.remove('has-result');
    document.body.classList.add('testing');
    testSec.hidden=false; idx=0; answers=[]; for(var k in TYPES)scores[k]=0;
    renderQ();
    window.scrollTo({top:0,behavior:reduce?'auto':'smooth'});
  }
  document.getElementById('start-btn').addEventListener('click',startTest);
  var rt=document.getElementById('res-retake');if(rt)rt.addEventListener('click',function(){try{localStorage.removeItem('hcpr');}catch(e){}startTest();});
  function saveResult(){try{localStorage.setItem('hcpr',JSON.stringify({key:CUR.key,sec:CUR.sec,serial:SERIAL,name:NAME}));}catch(e){}}
  var restored=(function(){var saved;try{saved=JSON.parse(localStorage.getItem('hcpr')||'null');}catch(e){saved=null;}if(saved&&TYPES[saved.key]&&(!saved.sec||TYPES[saved.sec])){NAME=saved.name||'';if(nameIn)nameIn.value=NAME;showResult(saved.key,{sec:saved.sec,serial:saved.serial||''});return true;}return false;})();
  if(!restored&&new URLSearchParams(location.search).get('start')==='1'){startTest();}
  var shareBtn=document.getElementById('share-card');
  if(shareBtn){shareBtn.addEventListener('click',function(){
    var url='https://hypercreativemethod.com/es/perfil-creativo/';
    var txt='¿En qué perfil creativo estás ahora mismo? Descubre el tuyo con Hypercreative.';
    if(navigator.share){navigator.share({title:'Creative Profile',text:txt,url:url}).catch(function(){});}
    else if(navigator.clipboard&&navigator.clipboard.writeText){navigator.clipboard.writeText(url).then(function(){var o=shareBtn.textContent;shareBtn.textContent='Enlace copiado';setTimeout(function(){shareBtn.textContent=o;},1800);}).catch(function(){window.prompt('Copia este enlace',url);});}
    else{window.prompt('Copia este enlace',url);}
    dl('creative_profile_share',{});
  });}

  /* ---- descarga de la tarjeta: SVG puro para que el canvas no quede contaminado ---- */
  function esc(s){return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');}
  function wrapText(text,max){var w=text.split(' '),lines=[],cur='';for(var i=0;i<w.length;i++){var tryl=cur?cur+' '+w[i]:w[i];if(tryl.length>max&&cur){lines.push(cur);cur=w[i];}else{cur=tryl;}}if(cur)lines.push(cur);return lines;}
  function tspans(lines,x,y,lh){var s='';for(var i=0;i<lines.length;i++){s+='<tspan x="'+x+'" y="'+(y+i*lh)+'">'+esc(lines[i])+'</tspan>';}return s;}
  function buildSVG(t){
    var W=1080,H=1920,CX=540,P=96;
    var sec=CUR.sec?TYPES[CUR.sec]:null;
    var primI=TYPE_ICON[CUR.key]||'', secI=(sec?TYPE_ICON[CUR.sec]:'')||'';
    function cwrap(str,y,size,fill,op,max,lh){var lines=wrapText(str,max),s='';for(var i=0;i<lines.length;i++){s+='<text x="'+CX+'" y="'+(y+i*lh)+'" text-anchor="middle" fill="'+fill+'" fill-opacity="'+op+'" font-family="Inter, sans-serif" font-weight="300" font-size="'+size+'">'+esc(lines[i])+'</text>';}return s;}
    var rCy=560,rR=180,bX=CX+128,bY=560+128,bR=58;
    var emblem='<circle cx="'+CX+'" cy="'+rCy+'" r="'+rR+'" fill="none" stroke="#F7F6F3" stroke-opacity="0.5" stroke-width="3"/>'+
      '<g transform="translate('+(CX-108)+','+(rCy-108)+') scale(9)" fill="none" stroke="#F7F6F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">'+primI+'</g>'+
      (sec?('<circle cx="'+bX+'" cy="'+bY+'" r="'+bR+'" fill="#13130F" stroke="#E0463C" stroke-opacity="0.6" stroke-width="2.5"/>'+
      '<g transform="translate('+(bX-42)+','+(bY-42)+') scale(3.5)" fill="none" stroke="#E0463C" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">'+secI+'</g>'):'');
    var bl=(typeof INFLECT!=='undefined'&&INFLECT[CUR.key]&&INFLECT[CUR.key][CUR.sec])?(t.state+' '+INFLECT[CUR.key][CUR.sec]):t.state;
    var headline=NAME?NAME:t.name;
    var typeName=shortName(t.name),subName=sec?shortName(sec.name):'';
    var hlY=868,hlLH=86,hlLines=wrapText(headline,18).length;
    var roleY=hlY+(hlLines-1)*hlLH+94;
    var descY=roleY+82;
    var roleSVG;
    if(NAME){
      roleSVG='<text x="'+CX+'" y="'+roleY+'" text-anchor="middle" font-family="Inter, sans-serif" font-style="italic" font-weight="300" font-size="36"><tspan fill="#F7F6F3" fill-opacity="0.85">tu perfil ahora mismo: </tspan><tspan fill="#E0463C" font-style="normal" font-weight="500">'+esc(typeName)+'</tspan>'+(sec?('<tspan fill="#F7F6F3" fill-opacity="0.85">, matizado por </tspan><tspan fill="#E0463C" font-style="normal" font-weight="500">'+esc(subName)+'</tspan>'):'')+'</text>';
    }else{
      roleSVG=sec?('<text x="'+CX+'" y="'+roleY+'" text-anchor="middle" font-family="Inter, sans-serif" font-style="italic" font-weight="300" font-size="40"><tspan fill="#F7F6F3" fill-opacity="0.8">matizado por </tspan><tspan fill="#E0463C" font-style="normal" font-weight="500">'+esc(subName)+'</tspan></text>'):'';
    }
    return '<svg xmlns="http://www.w3.org/2000/svg" width="'+W+'" height="'+H+'" viewBox="0 0 '+W+' '+H+'">'+
      '<defs><radialGradient id="g" cx="50%" cy="30%" r="55%"><stop offset="0" stop-color="#E0463C" stop-opacity="0.17"/><stop offset="1" stop-color="#E0463C" stop-opacity="0"/></radialGradient></defs>'+
      '<rect width="'+W+'" height="'+H+'" fill="#13130F"/>'+
      '<rect width="'+W+'" height="'+H+'" fill="url(#g)"/>'+
      '<text x="'+CX+'" y="152" text-anchor="middle" font-family="Inter, sans-serif" font-weight="500" font-size="44" letter-spacing="-1"><tspan fill="#F7F6F3">Hypercreative</tspan><tspan fill="#E0463C">.</tspan></text>'+
      emblem+
      cwrap(headline,hlY,78,'#F7F6F3',1,18,hlLH)+
      roleSVG+
      cwrap(bl,descY,34,'#F7F6F3',0.74,42,46)+
      '<line x1="'+P+'" y1="1500" x2="'+(W-P)+'" y2="1500" stroke="#F7F6F3" stroke-opacity="0.16"/>'+
      '<text x="'+CX+'" y="1590" text-anchor="middle" fill="#F7F6F3" font-family="Inter, sans-serif" font-weight="400" font-size="46">¿En qué perfil creativo estás?</text>'+
      '<text x="'+CX+'" y="1740" text-anchor="middle" fill="#F7F6F3" fill-opacity="0.42" font-family="Inter, sans-serif" font-size="22" letter-spacing="1">'+esc(SERIAL)+'</text>'+
      '<text x="'+CX+'" y="1812" text-anchor="middle" fill="#E0463C" font-family="Inter, sans-serif" font-weight="500" font-size="32" letter-spacing="0">www.hypercreativemethod.com</text>'+
      ''+
      '</svg>';
  }
  document.getElementById('dl-card').addEventListener('click',function(){
    var key=winner(),t=TYPES[key];
    dl('creative_profile_card_download',{profile_type:t.name});
    var svg=buildSVG(t),img=new Image();
    var blob=new Blob([svg],{type:'image/svg+xml;charset=utf-8'}),url=URL.createObjectURL(blob);
    img.onload=function(){
      var c=document.createElement('canvas');c.width=1080;c.height=1920;
      var cx=c.getContext('2d');cx.fillStyle='#13130F';cx.fillRect(0,0,1080,1920);cx.drawImage(img,0,0);
      URL.revokeObjectURL(url);
      try{
        c.toBlob(function(b){
          var a=document.createElement('a');a.download='Tarjeta Hypercreative.png';
          a.href=URL.createObjectURL(b);a.click();setTimeout(function(){URL.revokeObjectURL(a.href);},1000);
        },'image/png');
      }catch(e){
        var a2=document.createElement('a');a2.download='Tarjeta Hypercreative.svg';
        a2.href='data:image/svg+xml;charset=utf-8,'+encodeURIComponent(svg);a2.click();
      }
    };
    img.onerror=function(){
      var a=document.createElement('a');a.download='Tarjeta Hypercreative.svg';
      a.href='data:image/svg+xml;charset=utf-8,'+encodeURIComponent(svg);a.click();
    };
    img.src=url;
  });

  /* ---- captura de email (después de la tarjeta; nunca bloquea el resultado) ---- */
  var uform=document.getElementById('unlock-form'),uemail=document.getElementById('unlock-email'),
      unote=document.getElementById('unlock-note'),usub=document.getElementById('unlock-submit');
  uform.addEventListener('submit',function(e){
    e.preventDefault();
    var v=(uemail.value||'').trim();
    if(!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(v)){uemail.classList.add('err');uemail.focus();return;}
    uemail.classList.remove('err'); usub.disabled=true; var old=usub.textContent; usub.textContent='Enviando…';
    var pt=(window.__profileType||''),under=(CUR.sec?TYPES[CUR.sec].name:'');
    var payload={origen:"Perfil Creativo",name:NAME,email:v,consent:true,
      message:"Type: "+pt+(under?(" · Underlying: "+under):"")+" · Serial: "+SERIAL,
      source:"creative-profile",profile_type:pt,serial:SERIAL};
    fetch("/api/lead.php",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify(payload)})
      .then(function(r){if(!r.ok)throw 0;
        dl('creative_profile_email',{profile_type:(window.__profileType||'')});
        uform.style.display='none';
        unote.className='unlock-done';
        unote.textContent="Ya estás en la lista. Te avisamos en cuanto salga.";
      })
      .catch(function(){usub.disabled=false;usub.textContent=old;
        unote.textContent="No hemos podido enviarlo. Inténtalo dentro de un momento.";});
  });

  /* las tres familias en la portada, los nueve perfiles siempre visibles, cada uno con su marca */
  (function(){var g=document.getElementById('types-grid');if(!g)return;
    var FAMS=[
      {k:"Feed",verb:"Alimentar",blurb:"De dónde salen tus ideas. Estos perfiles llenan el depósito: dominan su propio terreno, se meten en terrenos que no son suyos y guardan todo lo que merece la pena."},
      {k:"Sharpen",verb:"Afilar",blurb:"Cómo el material en bruto se convierte en una idea. Estos perfiles hacen que corte: ven lo que a otros se les pasa, reescriben la pregunta, estrellan cosas muy lejanas entre sí y piensan en borradores."},
      {k:"Protect",verb:"Proteger",blurb:"Cómo sobrevive el trabajo al contacto con el mundo. Estos perfiles defienden lo que construyen, del ruido de fuera y del comité de dentro, y no sueltan los mandos."}
    ];
    var h='';
    for(var fi=0;fi<FAMS.length;fi++){var F=FAMS[fi],cards='';
      for(var fk in TYPES){var ft=TYPES[fk];if(ft.family!==F.k)continue;
        cards+='<article class="fiche"><span class="fiche-ico">'+iconSVG(fk)+'</span><div class="fiche-body"><h4 class="fiche-name">'+ft.name+'</h4><p class="fiche-one">'+ft.one+'</p></div></article>';}
      h+='<section class="fam-group"><div class="fam-head"><h3 class="fam-title">'+F.verb+'</h3><p class="fam-blurb">'+F.blurb+'</p></div><div class="fam-cards">'+cards+'</div></section>';}
    h+='<div class="type-cta"><div class="tc-flex"><div class="tc-copy"><p class="type-cta-kicker">Entonces, ¿en cuál estás?</p><h3 class="type-cta-h">Descubre tu perfil y el hábito que más te va a mover.</h3><p class="type-cta-p">Dos minutos te señalan el perfil en el que estás este trimestre, el que lo matiza y lo único en lo que toca trabajar ahora.</p><button class="btn type-cta-btn js-start" type="button">Descubre tu perfil</button></div><div class="mock-wrap"><div class="mock-stage" id="ex-imprint" aria-hidden="true"></div></div></div></div>';
    g.innerHTML=h;
    (function(){var ex=document.getElementById('ex-imprint');if(!ex)return;var k='explorer',s='sketcher',et=TYPES[k],es=TYPES[s];var d=(INFLECT[k]&&INFLECT[k][s])?(et.state+' '+INFLECT[k][s]):et.state;ex.innerHTML='<div class="imprint"><div class="imp-top"><span class="imp-brand">Hypercreative<span class="bp">.</span></span></div>'+'<div class="imp-core"><div class="imp-emblem"><span class="emb-ring">'+iconSVG(k)+'</span><span class="emb-badge">'+iconSVG(s)+'</span></div>'+'<div class="imp-name">'+et.name+'</div><div class="imp-blend">matizado por <b>'+shortName(es.name)+'</b></div>'+'<div class="imp-desc">'+d+'</div></div>'+'<div class="imp-cta"><div class="imp-hook">¿En qué perfil creativo estás?</div></div>'+'<div class="imp-foot"><div class="imp-serial">HCM-EXP-2K4F  &middot;  2026</div><div class="imp-url">www.hypercreativemethod.com</div></div></div>';})();
    [].slice.call(g.querySelectorAll('.js-start')).forEach(function(b){b.addEventListener('click',startTest);});
  })();

  /* el mapa es la puerta de entrada: el mapa entero, vivo, detrás de la pregunta.
     La rueda se queda con la página (una portada tiene que poder bajar), así que
     el zoom vive en /es/el-mapa/; aquí se arrastra, se pasa por encima y se hace clic. */
  (function(){
    var c=document.getElementById('hero-sky');
    if(!c||!window.HCUniverse)return;
    if(matchMedia('(pointer:coarse)').matches){
      var hn=document.getElementById('cw-hint');
      if(hn)hn.innerHTML='Arrastra para girar &middot; toca un perfil para leerlo';
    }
    HCUniverse.mount({canvas:c,anchor:'left',wheelZoom:false,theme:'paper',i18n:I18N_ES,panel:{
      root:document.getElementById('hpanel'),
      ico:document.getElementById('hpIco'),
      fam:document.getElementById('hpFam'),
      name:document.getElementById('hpName'),
      sub:document.getElementById('hpSub'),
      body:document.getElementById('hpBody'),
      close:document.getElementById('hpx')
    }});
  })();
})();
</script>
</body>
</html>
