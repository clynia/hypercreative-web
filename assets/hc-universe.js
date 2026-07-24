/* The creative map: three families, nine worlds on their own orbits, and
   the 72 signatures hanging on the chords between the worlds.

   Hand-rolled canvas 3D, no libraries. Reads every name, description, icon and
   colour from HCW (assets/hc-worlds.js), which is the single source of truth
   shared with the Creative World test.

   Usage:
     HCUniverse.mount({canvas: el, panel: {...}, ...})

   Options
     canvas        the canvas element (required)
     panel         {root, ico, fam, name, sub, body, close} for the reading card
     interactive   pointer drag, zoom and picking (default true)
     wheelZoom     wheel zooms the sky (default true; landings turn it off
                   so the page keeps scrolling)
     theme         "night" (default) or "paper": ink and light swap, the
                   stars stay home and the air turns to watercolour, so the
                   map can sit on the site's paper instead of a dark page
     chords        draw the 36 chords (default true)
     nodes         draw the 72 signatures (default true)
     anchor        "left" leaves room for a reading column, "center" fills
     focus         {lead, under} lights one signature and turns the sky to it
     hint          element whose text swaps on touch devices
     onPick        called with the picked thing, or null

   Returns {focus, clear, destroy}. */
window.HCUniverse=(function(){
  "use strict";

  var W_=window.HCW;
  if(!W_) return {mount:function(){ return null; }};

  var TYPES=W_.TYPES, INFLECT=W_.INFLECT, TYPE_ICON=W_.TYPE_ICON,
      FAM_DESC=W_.FAM_DESC, FAMILIES=W_.FAMILIES, FAM_ORDER=W_.FAM_ORDER;
  var KEYS=Object.keys(TYPES);
  var NUMWORD={2:"Two",3:"Three",4:"Four"};
  var GROUND_INK="17,17,16", PAPER="247,246,243";

  function iconSVG(key){
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" '+
           'stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'+(TYPE_ICON[key]||'')+'</svg>';
  }

  /* the icon strokes again, this time as canvas paths */
  var ICON_PATH={};
  (function(){
    if(typeof Path2D==="undefined") return;
    for(var k in TYPE_ICON){
      var s=TYPE_ICON[k], P=new Path2D(), m, re=/d="([^"]+)"/g;
      while((m=re.exec(s))) P.addPath(new Path2D(m[1]));
      var cre=/<circle cx="([-\d.]+)" cy="([-\d.]+)" r="([-\d.]+)"/g, c;
      while((c=cre.exec(s))){
        var sp=new Path2D();
        sp.arc(parseFloat(c[1]),parseFloat(c[2]),parseFloat(c[3]),0,6.283);
        P.addPath(sp);
      }
      ICON_PATH[k]=P;
    }
  })();

  function mixCol(a,b,u){
    return [Math.round(a[0]+(b[0]-a[0])*u),Math.round(a[1]+(b[1]-a[1])*u),Math.round(a[2]+(b[2]-a[2])*u)];
  }
  function rgba(c,a){return "rgba("+c[0]+","+c[1]+","+c[2]+","+a+")";}
  function famColorCss(fam){var c=FAMILIES[fam].col;return "rgb("+c[0]+","+c[1]+","+c[2]+")";}
  function listNames(mem){
    var n=mem.map(function(k){return TYPES[k].name;});
    return n.length>1 ? n.slice(0,-1).join(", ")+" and "+n[n.length-1] : n[0];
  }

  function mount(opt){
    opt=opt||{};
    var cv=opt.canvas;
    if(!cv||!cv.getContext) return null;
    var ctx=cv.getContext("2d");
    if(!ctx) return null;

    var interactive=opt.interactive!==false;
    var wheelZoom=opt.wheelZoom!==false;
    var LIGHT=opt.theme==="paper";
    var FG=LIGHT?GROUND_INK:PAPER;
    var wantChords=opt.chords!==false;
    var wantNodes=opt.nodes!==false;
    var anchor=opt.anchor||"center";
    var panel=opt.panel||null;
    var onPick=opt.onPick||null;

    /* ---------- three suns, fixed, each in its own third of the sky ---------- */
    var R=210, FR=R*0.72;
    var FAMPOS={Feed:{lon:0,lat:0.20}, Sharpen:{lon:2.0944,lat:-0.24}, Protect:{lon:4.1888,lat:0.08}};
    var famCenters={}, FAMSUNS=[];
    FAM_ORDER.forEach(function(fam,fi){
      var p=FAMPOS[fam];
      var o={fam:fam, col:FAMILIES[fam].col, members:[], ang:p.lon, ph:fi*2.1,
        x:FR*Math.cos(p.lat)*Math.cos(p.lon), y:FR*Math.sin(p.lat), z:FR*Math.cos(p.lat)*Math.sin(p.lon)};
      famCenters[fam]=o; FAMSUNS.push(o);
    });

    /* ---------- nine worlds, each on its own orbit ----------
       Different planes, radii and speeds, some running the other way round,
       so no two worlds ever stay hidden behind each other. */
    var SUNS=[], SUNBY={};
    FAM_ORDER.forEach(function(fam,fi){
      var mem=KEYS.filter(function(k){return TYPES[k].family===fam;});
      mem.forEach(function(k,i){
        var tilt=0.42+i*0.6+fi*0.25, swing=fi*1.25+i*0.95;
        var n={x:Math.cos(tilt)*Math.cos(swing), y:Math.sin(tilt), z:Math.cos(tilt)*Math.sin(swing)};
        var nl=Math.sqrt(n.x*n.x+n.y*n.y+n.z*n.z)||1; n.x/=nl;n.y/=nl;n.z/=nl;
        var a=(Math.abs(n.y)>0.9)?{x:1,y:0,z:0}:{x:0,y:1,z:0};
        var u={x:n.y*a.z-n.z*a.y, y:n.z*a.x-n.x*a.z, z:n.x*a.y-n.y*a.x};
        var ul=Math.sqrt(u.x*u.x+u.y*u.y+u.z*u.z)||1; u.x/=ul;u.y/=ul;u.z/=ul;
        var v={x:n.y*u.z-n.z*u.y, y:n.z*u.x-n.x*u.z, z:n.x*u.y-n.y*u.x};
        SUNS.push({key:k, fam:fam, col:FAMILIES[fam].col, x:0,y:0,z:0,
          orb:{u:u, v:v, rad:58+i*25, phase:(i/mem.length)*6.2832+fi*0.7,
               speed:(0.052+i*0.014+fi*0.006)*((i%2)?-1:1)}});
        SUNBY[k]=SUNS[SUNS.length-1]; famCenters[fam].members.push(k);
      });
    });

    /* ---------- 36 chords, 72 signatures ----------
       Every pair of worlds is joined by one bowed chord carrying two
       signatures: the A-led one near A, the B-led one near B. 36 x 2 = 72.
       The bow is a share of the chord's own length, so a signature always
       stays nearer the world that leads it, however the worlds move. */
    var SEG=16, T_NEAR=0.27, BOW_K=0.28, UNDER_TINT=0.30;
    var pairs=[], nodes=[], nodeBy={};
    for(var i0=0;i0<SUNS.length;i0++){
      for(var j0=i0+1;j0<SUNS.length;j0++){
        var A0=SUNS[i0], B0=SUNS[j0], pts=[];
        for(var s0=0;s0<=SEG;s0++) pts.push({x:0,y:0,z:0});
        var pi0=pairs.length;
        pairs.push({a:A0.key,b:B0.key,colA:A0.col,colB:B0.col,pts:pts,C:{x:0,y:0,z:0}});
        /* a signature is a child of two worlds, weighted towards the one that leads */
        nodes.push({lead:A0.key,under:B0.key,fam:A0.fam,col:mixCol(A0.col,B0.col,UNDER_TINT),pi:pi0,t:T_NEAR,x:0,y:0,z:0});
        nodes.push({lead:B0.key,under:A0.key,fam:B0.fam,col:mixCol(B0.col,A0.col,UNDER_TINT),pi:pi0,t:1-T_NEAR,x:0,y:0,z:0});
      }
    }
    nodes.forEach(function(n){ nodeBy[n.lead+"|"+n.under]=n; });

    function updateGeometry(tsec){
      var i,k,s;
      for(i=0;i<SUNS.length;i++){
        var pl=SUNS[i], o=pl.orb, fc=famCenters[pl.fam];
        var ang=o.phase+tsec*o.speed, ca=Math.cos(ang), sa=Math.sin(ang);
        pl.x=fc.x+o.rad*(ca*o.u.x+sa*o.v.x);
        pl.y=fc.y+o.rad*(ca*o.u.y+sa*o.v.y);
        pl.z=fc.z+o.rad*(ca*o.u.z+sa*o.v.z);
      }
      if(!wantChords&&!wantNodes) return;
      for(k=0;k<pairs.length;k++){
        var pr=pairs[k], A=SUNBY[pr.a], B=SUNBY[pr.b];
        var mx=(A.x+B.x)/2, my=(A.y+B.y)/2, mz=(A.z+B.z)/2;
        var ml=Math.sqrt(mx*mx+my*my+mz*mz), bx,by,bz;
        if(ml<1){
          var px=A.y*B.z-A.z*B.y, py=A.z*B.x-A.x*B.z, pz=A.x*B.y-A.y*B.x;
          var pl2=Math.sqrt(px*px+py*py+pz*pz)||1; bx=px/pl2;by=py/pl2;bz=pz/pl2;
        }else{ bx=mx/ml;by=my/ml;bz=mz/ml; }
        var lx=B.x-A.x, ly=B.y-A.y, lz=B.z-A.z;
        var bow=BOW_K*Math.sqrt(lx*lx+ly*ly+lz*lz);
        var C=pr.C; C.x=mx+bx*bow; C.y=my+by*bow; C.z=mz+bz*bow;
        for(s=0;s<=SEG;s++){
          var t=s/SEG, u=1-t, w0=u*u, w1=2*u*t, w2=t*t, P=pr.pts[s];
          P.x=w0*A.x+w1*C.x+w2*B.x; P.y=w0*A.y+w1*C.y+w2*B.y; P.z=w0*A.z+w1*C.z+w2*B.z;
        }
      }
      for(i=0;i<nodes.length;i++){
        var nd=nodes[i], pr2=pairs[nd.pi], A2=SUNBY[pr2.a], B2=SUNBY[pr2.b], C2=pr2.C;
        var t2=nd.t, u2=1-t2, q0=u2*u2, q1=2*u2*t2, q2=t2*t2;
        nd.x=q0*A2.x+q1*C2.x+q2*B2.x;
        nd.y=q0*A2.y+q1*C2.y+q2*B2.y;
        nd.z=q0*A2.z+q1*C2.z+q2*B2.z;
      }
    }
    updateGeometry(0);

    var stars=[];
    for(var st0=0;st0<250;st0++){
      var uu=Math.random()*2-1, th=Math.random()*6.283, rr=Math.sqrt(1-uu*uu)*640;
      stars.push({x:Math.cos(th)*rr, y:uu*640, z:Math.sin(th)*rr,
        tw:Math.random()*6.28, b:0.2+Math.random()*0.5, sz:Math.random()<0.18?1.8:1.1});
    }

    /* ---------- canvas + state ---------- */
    var W=0,H=0,dpr=1,cx0=0,cy0=0;
    var rotY=0.6, rotX=-0.20, zoom=1, izoom=1, fitZ=1;
    var CAM=910, F=800;
    var reduce=matchMedia("(prefers-reduced-motion:reduce)").matches;
    var lastAct=performance.now();
    var tween=null;

    function resize(){
      dpr=Math.min(window.devicePixelRatio||1,2);
      W=Math.max(1,cv.clientWidth); H=Math.max(1,cv.clientHeight);
      cv.width=Math.round(W*dpr); cv.height=Math.round(H*dpr);
      ctx.setTransform(dpr,0,0,dpr,0,0);
      if(anchor==="left"){
        /* the reading column keeps the left edge, so the sky steps aside:
           sideways when there is width to give, downwards when there is not */
        if(W>900){ cx0=W*0.60; cy0=H*0.54; }
        else if(W>640){ cx0=W*0.54; cy0=H*0.60; }
        else { cx0=W/2; cy0=H*0.66; }
      }else{
        cx0=W/2; cy0=H/2;
      }
      /* the map takes the room it is given: a big canvas earns a big map,
         a small one keeps today's size rather than clipping */
      fitZ=Math.max(1,Math.min(1.7,Math.min(W,H)/520));
    }
    window.addEventListener("resize",resize);
    if(typeof ResizeObserver!=="undefined"){ new ResizeObserver(resize).observe(cv); }

    function project(p){
      var cy=Math.cos(rotY), sy=Math.sin(rotY);
      var x1=p.x*cy - p.z*sy, z1=p.x*sy + p.z*cy, y1=p.y;
      var cx=Math.cos(rotX), sx=Math.sin(rotX);
      var y2=y1*cx - z1*sx, z2=y1*sx + z1*cx;
      var dz=CAM - z2; if(dz<40) dz=40;
      var sc=F/dz*zoom*izoom*fitZ;
      return {x:cx0+x1*sc, y:cy0+y2*sc, s:sc, z2:z2};
    }
    /* the camera angles that bring a point round to face us */
    function facing(p){
      var flat=Math.sqrt(p.x*p.x+p.z*p.z);
      return {ry:Math.atan2(p.x,p.z), rx:Math.max(-1.15,Math.min(1.15,Math.atan2(p.y,flat)))};
    }

    var active=null, pinned=false, spotlight=false, hotTypes={}, hotPairs={}, hotFams={};
    /* the light warm grey the unpicked worlds sink to while a result is spotlit */
    var SPOT_GREY=LIGHT?[178,176,172]:[96,96,92], SPOT_MIX=LIGHT?0.88:0.82;
    function computeHot(){
      hotTypes={}; hotPairs={}; hotFams={};
      if(!active) return;
      var k;
      if(active.kind==="fam"){
        hotFams[active.fam]=1;
        SUNS.forEach(function(s){ if(s.fam===active.fam) hotTypes[s.key]=1; });
        for(k=0;k<pairs.length;k++){
          if(TYPES[pairs[k].a].family===active.fam||TYPES[pairs[k].b].family===active.fam) hotPairs[k]=1;
        }
        return;
      }
      if(active.kind==="node"){
        hotTypes[active.lead]=1; hotTypes[active.under]=1; hotPairs[active.pi]=1;
      }else{
        hotTypes[active.lead]=1;
        for(k=0;k<pairs.length;k++){
          if(pairs[k].a===active.lead||pairs[k].b===active.lead) hotPairs[k]=1;
        }
      }
      for(var kk in hotTypes) hotFams[TYPES[kk].family]=1;
    }

    var ORBSEG=44;
    function draw(t){
      ctx.clearRect(0,0,W,H);

      /* the air each sun breathes out, added as light */
      ctx.globalCompositeOperation=LIGHT?"multiply":"lighter";
      FAM_ORDER.forEach(function(fam){
        var fc=famCenters[fam], pr=project(fc), col=fc.col;
        var rad=Math.max(80, 340*pr.s);
        var g=ctx.createRadialGradient(pr.x,pr.y,0,pr.x,pr.y,rad);
        var depth=Math.max(0.25,Math.min(1,pr.s*0.9));
        g.addColorStop(0,rgba(col,(LIGHT?0.20:0.13)*depth));
        g.addColorStop(0.5,rgba(col,(LIGHT?0.08:0.05)*depth));
        g.addColorStop(1,rgba(col,0));
        ctx.fillStyle=g; ctx.beginPath(); ctx.arc(pr.x,pr.y,rad,0,6.283); ctx.fill();
      });
      if(!LIGHT){
        for(var i=0;i<stars.length;i++){
          var s0=stars[i], p0=project(s0);
          var tw=reduce?1:(0.6+0.4*Math.sin(t*0.001+s0.tw));
          ctx.fillStyle="rgba("+PAPER+","+(s0.b*0.5*tw*Math.min(1,p0.s))+")";
          ctx.fillRect(p0.x,p0.y,s0.sz,s0.sz);
        }
      }
      ctx.globalCompositeOperation="source-over";

      /* orbits: dotted and almost silent, up only for what is being pointed at */
      ctx.setLineDash([2,6]);
      for(var q=0;q<SUNS.length;q++){
        var pl=SUNS[q], o=pl.orb, fc2=famCenters[pl.fam];
        var lit=active&&(hotTypes[pl.key]||hotFams[pl.fam]);
        ctx.strokeStyle=rgba(pl.col, lit?0.34:(LIGHT?0.10:0.055));
        ctx.lineWidth=1;
        ctx.beginPath();
        for(var e=0;e<=ORBSEG;e++){
          var ea=(e/ORBSEG)*6.2832, ec=Math.cos(ea), es=Math.sin(ea);
          var pp=project({x:fc2.x+o.rad*(ec*o.u.x+es*o.v.x),
                          y:fc2.y+o.rad*(ec*o.u.y+es*o.v.y),
                          z:fc2.z+o.rad*(ec*o.u.z+es*o.v.z)});
          if(e===0) ctx.moveTo(pp.x,pp.y); else ctx.lineTo(pp.x,pp.y);
        }
        ctx.stroke();
      }
      ctx.setLineDash([]);

      /* chords burn brightest where they meet their two worlds and fade out
         through the middle, so the ball never fills with crossing lines.
         Point at a signature and its own chord lights the whole way across. */
      if(wantChords){
        for(var c=0;c<pairs.length;c++){
          var pr2=pairs[c], hot=!!hotPairs[c], proj=[];
          for(var k=0;k<pr2.pts.length;k++) proj.push(project(pr2.pts[k]));
          var first=proj[0], last=proj[proj.length-1];
          var depth2=Math.min(1,(first.s+last.s)/2);
          var al=(hot?(LIGHT?0.62:0.55):(active?0.06:(LIGHT?0.24:0.17)))*depth2;
          var lg=ctx.createLinearGradient(first.x,first.y,last.x,last.y);
          lg.addColorStop(0,rgba(pr2.colA,al));
          if(!hot){
            lg.addColorStop(0.30,rgba(pr2.colA,al*0.26));
            lg.addColorStop(0.50,rgba(pr2.colA,al*0.09));
            lg.addColorStop(0.70,rgba(pr2.colB,al*0.26));
          }
          lg.addColorStop(1,rgba(pr2.colB,al));
          ctx.strokeStyle=lg; ctx.lineWidth=hot?1.7:1;
          ctx.beginPath(); ctx.moveTo(first.x,first.y);
          for(var k3=1;k3<proj.length;k3++) ctx.lineTo(proj[k3].x,proj[k3].y);
          ctx.stroke();
        }
      }

      /* suns, worlds and signatures, sorted by depth */
      var draws=[];
      if(wantNodes){ for(var n=0;n<nodes.length;n++) draws.push({k:"node",o:nodes[n],p:project(nodes[n])}); }
      for(var m=0;m<SUNS.length;m++) draws.push({k:"sun",o:SUNS[m],p:project(SUNS[m])});
      for(var f=0;f<FAMSUNS.length;f++) draws.push({k:"fam",o:FAMSUNS[f],p:project(FAMSUNS[f])});
      draws.sort(function(A2,B2){return A2.p.z2-B2.p.z2;});

      for(var d=0;d<draws.length;d++){
        var dr=draws[d], ob=dr.o, p=dr.p;
        if(dr.k==="fam"){
          /* the sun is only light falling off into nothing, and it breathes */
          var fon=active&&active.kind==="fam"&&active.fam===ob.fam;
          var fb=fon?1:(hotFams[ob.fam]?0.88:(active?0.24:0.7));
          var pulse=reduce?1:(1+0.045*Math.sin(t*0.0011+ob.ph));
          var fr=Math.max(8, 18*p.s)*pulse;
          var fg=ctx.createRadialGradient(p.x,p.y,0,p.x,p.y,fr*3.6);
          fg.addColorStop(0,LIGHT?rgba(ob.col,0.9*fb):"rgba(255,251,243,"+(0.52*fb)+")");
          fg.addColorStop(0.09,rgba(ob.col,0.55*fb));
          fg.addColorStop(0.26,rgba(ob.col,0.20*fb));
          fg.addColorStop(0.58,rgba(ob.col,0.07*fb));
          fg.addColorStop(1,rgba(ob.col,0));
          ctx.fillStyle=fg; ctx.beginPath(); ctx.arc(p.x,p.y,fr*3.6,0,6.283); ctx.fill();
          if(p.s>0.5){
            ctx.fillStyle=rgba(LIGHT?mixCol(ob.col,[19,19,15],0.35):ob.col,fon?1:(hotFams[ob.fam]?0.85:(active?0.26:0.7)));
            ctx.font="600 "+Math.round(15*Math.min(1.3,p.s))+"px Inter, system-ui, sans-serif";
            ctx.textAlign="center"; ctx.textBaseline="top";
            ctx.fillText(ob.fam,p.x,p.y+fr*1.6);
          }
        }else if(dr.k==="sun"){
          /* a world: a flat solid body in the colour of its sun, wearing its
             icon. It never goes see-through; when something else is picked it
             only darkens, so the nine always read as bodies against the light. */
          var isOn=active&&active.kind==="sun"&&active.lead===ob.key;
          var full=(!active||hotTypes[ob.key]);
          /* while a result is spotlit the unpicked worlds sink to a flat grey,
             so only the two that matter keep their colour */
          var body=full?ob.col:(spotlight?mixCol(ob.col,SPOT_GREY,SPOT_MIX)
                                          :mixCol(ob.col,LIGHT?[247,246,243]:[17,17,16],0.45));
          var r=Math.max(6, 13*p.s);
          var gg=ctx.createRadialGradient(p.x,p.y,r*0.75,p.x,p.y,r*3);
          gg.addColorStop(0,rgba(ob.col,full?0.30:0.09));
          gg.addColorStop(0.4,rgba(ob.col,full?0.10:0.03));
          gg.addColorStop(1,rgba(ob.col,0));
          ctx.fillStyle=gg; ctx.beginPath(); ctx.arc(p.x,p.y,r*3,0,6.283); ctx.fill();
          ctx.fillStyle=rgba(body,1);
          ctx.beginPath(); ctx.arc(p.x,p.y,r,0,6.283); ctx.fill();
          if(isOn){
            ctx.strokeStyle="rgba("+FG+",.85)"; ctx.lineWidth=1.5;
            ctx.beginPath(); ctx.arc(p.x,p.y,r+4.5,0,6.283); ctx.stroke();
          }
          if(r>=8 && ICON_PATH[ob.key]){
            var kk=(r*1.3)/24;
            ctx.save();
            ctx.translate(p.x,p.y); ctx.scale(kk,kk); ctx.translate(-12,-12);
            ctx.strokeStyle="rgba("+GROUND_INK+","+(full?0.88:0.6)+")";
            ctx.lineWidth=1.8; ctx.lineCap="round"; ctx.lineJoin="round";
            ctx.stroke(ICON_PATH[ob.key]);
            ctx.restore();
          }
          if(p.s>0.6){
            ctx.fillStyle="rgba("+FG+","+(isOn?0.95:(full?0.75:(spotlight?0.2:0.32)))+")";
            ctx.font="600 "+Math.round(12*Math.min(1.25,p.s))+"px Inter, system-ui, sans-serif";
            ctx.textAlign="center"; ctx.textBaseline="top";
            ctx.fillText(TYPES[ob.key].name.replace("The ",""), p.x, p.y+r+8);
          }
        }else{
          /* the 72 sit low, like specks of light, until one is pointed at */
          var isAct=active&&active.kind==="node"&&active.lead===ob.lead&&active.under===ob.under;
          var rel=isAct?1:(!active?0.48:((hotTypes[ob.lead]||hotTypes[ob.under])?0.66:0.13));
          var dep=Math.min(1,p.s+0.15);
          var rn=Math.max(1.4, 2.9*p.s);
          if(isAct){
            var ng=ctx.createRadialGradient(p.x,p.y,0,p.x,p.y,rn*7);
            ng.addColorStop(0,rgba(ob.col,0.5));
            ng.addColorStop(0.4,rgba(ob.col,0.16));
            ng.addColorStop(1,rgba(ob.col,0));
            ctx.fillStyle=ng; ctx.beginPath(); ctx.arc(p.x,p.y,rn*7,0,6.283); ctx.fill();
            rn*=1.8;
          }else{
            ctx.fillStyle=rgba(ob.col,0.17*rel*dep);
            ctx.beginPath(); ctx.arc(p.x,p.y,rn*2.8,0,6.283); ctx.fill();
          }
          ctx.fillStyle=rgba(ob.col,rel*dep);
          ctx.beginPath(); ctx.arc(p.x,p.y,rn,0,6.283); ctx.fill();
          if(isAct){
            ctx.fillStyle=LIGHT?"rgba(17,17,16,.85)":"rgba(255,253,248,.9)";
            ctx.beginPath(); ctx.arc(p.x,p.y,rn*0.42,0,6.283); ctx.fill();
            ctx.strokeStyle="rgba("+FG+",.8)"; ctx.lineWidth=1.4;
            ctx.beginPath(); ctx.arc(p.x,p.y,rn+5,0,6.283); ctx.stroke();
          }
        }
      }
    }

    /* ---------- picking ---------- */
    var lastX=0,lastY=0;
    function pick(mx,my){
      var best=null, bd=1e9, n, p, dx, dy, dd, thr;
      if(wantNodes){
        for(n=0;n<nodes.length;n++){
          p=project(nodes[n]); thr=Math.max(11, 2.9*p.s+8);
          dx=p.x-mx; dy=p.y-my; dd=dx*dx+dy*dy;
          if(dd<thr*thr && dd<bd){ bd=dd; best={kind:"node",lead:nodes[n].lead,under:nodes[n].under,fam:nodes[n].fam,pi:nodes[n].pi}; }
        }
      }
      for(n=0;n<SUNS.length;n++){
        p=project(SUNS[n]); thr=Math.max(16, 13*p.s+6);
        dx=p.x-mx; dy=p.y-my; dd=dx*dx+dy*dy;
        if(dd<thr*thr && dd<bd){ bd=dd; best={kind:"sun",lead:SUNS[n].key,fam:SUNS[n].fam}; }
      }
      for(n=0;n<FAMSUNS.length;n++){
        p=project(FAMSUNS[n]); thr=Math.max(18, 18*p.s*0.8);
        dx=p.x-mx; dy=p.y-my; dd=dx*dx+dy*dy;
        if(dd<thr*thr && dd<bd){ bd=dd; best={kind:"fam",fam:FAMSUNS[n].fam}; }
      }
      return best;
    }

    /* ---------- the reading card ---------- */
    function showPanel(a){
      if(!a) return;
      active=a; computeHot();
      if(onPick) onPick(a);
      if(!panel||!panel.root) return;
      if(a.kind==="fam"){
        var mem=famCenters[a.fam].members;
        panel.ico.className="p-ico multi";
        panel.ico.innerHTML=mem.map(function(k){return iconSVG(k);}).join("");
        panel.fam.style.display="none";
        panel.name.textContent=a.fam;
        panel.name.style.color=famColorCss(a.fam);
        panel.sub.innerHTML='one of the three families';
        panel.body.innerHTML='Pull from this family and you '+FAM_DESC[a.fam].replace(/^you /,"")+'. '+
          (NUMWORD[mem.length]||mem.length).toLowerCase()+' profiles run their orbits around it: '+listNames(mem)+'.';
      }else{
        panel.ico.className="p-ico";
        panel.ico.innerHTML=iconSVG(a.lead);
        panel.fam.style.display="";
        panel.fam.textContent=a.fam;
        panel.fam.style.color=famColorCss(a.fam);
        panel.name.textContent=TYPES[a.lead].name;
        panel.name.style.color="";
        if(a.kind==="node"){
          panel.sub.innerHTML='shaded by the <b>'+TYPES[a.under].name.replace("The ","")+'</b>';
          panel.body.innerHTML=INFLECT[a.lead][a.under];
        }else{
          panel.sub.innerHTML='a profile orbiting the '+a.fam+' family';
          panel.body.innerHTML=TYPES[a.lead].one+' '+TYPES[a.lead].sig;
        }
      }
      if(panel.root.hidden){
        panel.root.hidden=false; panel.root.classList.add("enter");
        requestAnimationFrame(function(){panel.root.classList.remove("enter");});
      }
    }
    function hidePanel(){
      if(panel&&panel.root) panel.root.hidden=true;
      active=null; pinned=false; spotlight=false; computeHot();
      if(onPick) onPick(null);
    }
    if(panel&&panel.close) panel.close.addEventListener("click",hidePanel);
    function onKey(e){ if(e.key==="Escape") hidePanel(); }
    if(interactive) window.addEventListener("keydown",onKey);

    /* ---------- pointer ---------- */
    var ptrs={}, dragMoved=false, downX=0,downY=0, pinchD=0, orbiting=false;
    function pxy(e){var r=cv.getBoundingClientRect();return {x:e.clientX-r.left,y:e.clientY-r.top};}

    function onDown(e){
      cv.setPointerCapture(e.pointerId);
      ptrs[e.pointerId]=pxy(e);
      var n=Object.keys(ptrs).length;
      if(n===1){var q2=pxy(e);downX=q2.x;downY=q2.y;lastX=q2.x;lastY=q2.y;dragMoved=false;orbiting=true;tween=null;spotlight=false;cv.style.cursor="grabbing";}
      if(n===2){var k=Object.keys(ptrs),a=ptrs[k[0]],b=ptrs[k[1]];pinchD=Math.hypot(a.x-b.x,a.y-b.y);orbiting=false;}
      lastAct=performance.now();
    }
    function onMove(e){
      var here=pxy(e); lastX=here.x; lastY=here.y;
      if(ptrs[e.pointerId]) ptrs[e.pointerId]=here;
      var n=Object.keys(ptrs).length;
      if(n>=2){
        var k=Object.keys(ptrs),a=ptrs[k[0]],b=ptrs[k[1]],dd2=Math.hypot(a.x-b.x,a.y-b.y);
        if(pinchD>0){zoom*=dd2/pinchD;zoom=Math.max(0.55,Math.min(2.8,zoom));}
        pinchD=dd2; lastAct=performance.now(); return;
      }
      if(orbiting && ptrs[e.pointerId]!==undefined){
        var dx=here.x-downX, dy=here.y-downY;
        if(Math.abs(dx)+Math.abs(dy)>4) dragMoved=true;
        rotY+=dx*0.006; rotX+=dy*0.006;
        rotX=Math.max(-1.15,Math.min(1.15,rotX));
        downX=here.x; downY=here.y; lastAct=performance.now();
      } else if(!pinned){
        var hit=pick(here.x,here.y);
        cv.style.cursor=hit?"pointer":"grab";
        if(hit){ spotlight=false; showPanel(hit); } else hidePanel();
      }
    }
    function endPtr(e){
      var wasSingle=Object.keys(ptrs).length===1;
      delete ptrs[e.pointerId];
      if(wasSingle && !dragMoved){
        var hit=pick(lastX,lastY);
        if(hit){
          spotlight=false; showPanel(hit); pinned=true;
          /* clicking a sun or a world swings the camera round to face it */
          if(hit.kind==="fam") tween=famCenters[hit.fam];
          else if(hit.kind==="sun") tween=SUNBY[hit.lead];
        } else hidePanel();
      }
      if(Object.keys(ptrs).length<2) pinchD=0;
      if(Object.keys(ptrs).length===0){orbiting=false;cv.style.cursor="grab";}
      lastAct=performance.now();
    }
    function onWheel(e){
      e.preventDefault();
      zoom*=(1-e.deltaY*0.0011); zoom=Math.max(0.55,Math.min(2.8,zoom)); lastAct=performance.now();
    }
    if(interactive){
      cv.addEventListener("pointerdown",onDown);
      cv.addEventListener("pointermove",onMove);
      cv.addEventListener("pointerup",endPtr);
      cv.addEventListener("pointercancel",endPtr);
      if(wheelZoom) cv.addEventListener("wheel",onWheel,{passive:false});
      if(opt.hint && matchMedia("(pointer:coarse)").matches){
        opt.hint.innerHTML="Drag to orbit &middot; pinch to zoom &middot; tap to hold";
      }
    }else{
      cv.style.pointerEvents="none";
    }

    /* ---------- the clock ----------
       The sky runs on its own time: pointing at something slows it to a crawl,
       holding it stops it, and it picks the pace back up at half the rate it
       braked, so nothing lurches. */
    var simT=0, prevT=0, flow=1, HOVER_FLOW=0.15, BRAKE_TAU=0.6, RELEASE_TAU=1.2;
    var introK=reduce?1:0;
    var alive=true, onScreen=true, raf=0;
    function frame(t){
      if(!alive) return;
      var dt=prevT?Math.min(0.05,(t-prevT)/1000):0.016; prevT=t;
      /* mounting before the browser has laid the page out leaves a canvas one
         pixel wide, so the frame checks its own box rather than trusting an
         observer to have fired */
      if(cv.clientWidth!==W||cv.clientHeight!==H) resize();
      if(introK<1){
        introK=Math.min(1,introK+dt/1.4);
        var ei=1-Math.pow(1-introK,3);
        izoom=0.86+0.14*ei;
      }else izoom=1;
      /* a spotlit result keeps the whole sky in motion; only a live hover or a
         held pin brakes it */
      var want=reduce?0:(pinned?0:((active&&!spotlight)?HOVER_FLOW:1));
      var tau=(want<flow)?BRAKE_TAU:RELEASE_TAU;
      flow+=(want-flow)*(1-Math.exp(-dt/tau));
      simT+=dt*flow;
      updateGeometry(simT);
      if(tween){
        var g=facing(tween);
        rotY+=(g.ry-rotY)*0.12; rotX+=(g.rx-rotX)*0.12;
        if(Math.abs(g.ry-rotY)<0.008 && Math.abs(g.rx-rotX)<0.008) tween=null;
      } else if(!reduce && (t-lastAct)>2600 && !orbiting){
        rotY+=0.0015*flow;
      }
      draw(t);
      raf=requestAnimationFrame(frame);
    }

    /* a canvas nobody can see costs nothing */
    if(typeof IntersectionObserver!=="undefined"){
      new IntersectionObserver(function(es){
        var vis=es[0].isIntersecting;
        if(vis===onScreen) return;
        onScreen=vis;
        if(vis){ prevT=0; raf=requestAnimationFrame(frame); }
        else cancelAnimationFrame(raf);
      },{threshold:0}).observe(cv);
    }

    resize();
    raf=requestAnimationFrame(frame);

    /* light one signature (or one world) and turn the sky round to face it */
    /* live=true spotlights the reading (unpicked worlds fade to grey) but leaves
       the sky turning; the default holds it still, as a pinned pick does */
    function focus(lead,under,live){
      var nd=under?nodeBy[lead+"|"+under]:null;
      if(nd){
        showPanel({kind:"node",lead:nd.lead,under:nd.under,fam:nd.fam,pi:nd.pi});
        if(live){spotlight=true;pinned=false;}else{pinned=true;}
        tween=nd;
      }else if(SUNBY[lead]){
        showPanel({kind:"sun",lead:lead,fam:SUNBY[lead].fam});
        if(live){spotlight=true;pinned=false;}else{pinned=true;}
        tween=SUNBY[lead];
      }
    }

    if(opt.focus && opt.focus.lead) focus(opt.focus.lead, opt.focus.under, !!opt.focus.live);

    return {
      focus:focus,
      clear:hidePanel,
      destroy:function(){
        alive=false; cancelAnimationFrame(raf);
        window.removeEventListener("resize",resize);
        window.removeEventListener("keydown",onKey);
      }
    };
  }

  return {mount:mount, iconSVG:iconSVG, famColorCss:famColorCss};
})();
