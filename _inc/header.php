<style>
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
</style>
<header class="snav" id="nav"><a class="brand" href="/">Hypercreative<span class="bp">.</span></a><button class="snav-toggle" id="navToggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="navLinks"><span></span><span></span><span></span></button><nav class="snav-links" id="navLinks" aria-label="Primary"><a href="/#method">The method</a><a href="/what-we-do/">What we do</a><a class="nav-hot" href="/creative-profile/">Creative Profile</a><a href="/blog/">Blog</a><a href="/press/">Press</a><a class="nav-cta" href="/#request">Let&#39;s talk</a></nav></header>
<script>(function(){var n=document.getElementById("nav"),t=document.getElementById("navToggle");if(!n||!t)return;function set(o){n.classList.toggle("open",o);t.setAttribute("aria-expanded",o?"true":"false");t.setAttribute("aria-label",o?"Close menu":"Open menu");}t.addEventListener("click",function(){set(!n.classList.contains("open"));});n.querySelectorAll(".snav-links a").forEach(function(a){a.addEventListener("click",function(){set(false);});});})();</script>
