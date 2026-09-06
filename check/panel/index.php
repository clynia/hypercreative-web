<?php
declare(strict_types=1);
require __DIR__ . '/../_lib/bootstrap.php';
require __DIR__ . '/../_lib/auth.php';
if (!instalado()) {
    http_response_code(503);
    header('Content-Type: text/html; charset=utf-8');
    exit('<!doctype html><meta charset="utf-8"><title>Todavia no</title>'
       . '<body style="font:16px/1.6 system-ui;max-width:32em;margin:18vh auto;padding:0 22px;color:#56554E">'
       . '<p>Aqui todavia no hay nada. Vuelve cuando te llegue tu ejemplar.</p>');
}

$abierto = panel_abierto();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Revision del manuscrito</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Space+Mono:wght@400;700&display=swap">
<style>
:root{
  --papel:#F7F6F3; --tinta:#13130F; --suave:#56554E; --mudo:#9A988F;
  --linea:#E5E3DD; --rojo:#E0463C; --sobre:#FFFFFF;
  --ui:Inter,system-ui,-apple-system,"Segoe UI",sans-serif;
  --dato:"Space Mono",ui-monospace,Consolas,monospace;
  --libro:Georgia,"Iowan Old Style","Times New Roman",serif;
}
@media (prefers-color-scheme:dark){
  :root{--papel:#13130F;--tinta:#F2F1ED;--suave:#A6A49B;--mudo:#6E6C64;--linea:#2B2B26;--sobre:#1C1C18;}
}
*{box-sizing:border-box}
/* display:flex y display:grid ganan al atributo hidden del navegador */
[hidden]{display:none !important}
html,body{margin:0;background:var(--papel);color:var(--tinta);font-family:var(--ui);-webkit-font-smoothing:antialiased}
.envoltura{max-width:1180px;margin:0 auto;padding:26px 22px 70px;display:flex;flex-direction:column;gap:26px}
.marca{display:inline-flex;align-items:baseline;gap:3px;font-weight:500;font-size:15px}
.punto{width:5px;height:5px;border-radius:50%;background:var(--rojo);display:inline-block}
h1{font-size:26px;font-weight:600;letter-spacing:-0.025em;margin:0}
h2{font-size:16px;font-weight:600;margin:0}
.tenue{color:var(--suave);font-size:14px;line-height:1.55;margin:0;text-align:justify;hyphens:auto}
.cabecera{display:flex;align-items:flex-end;justify-content:space-between;gap:16px;flex-wrap:wrap}
.cifras{display:flex;gap:26px}
.cifra b{display:block;font-family:var(--dato);font-size:24px;font-variant-numeric:tabular-nums}
.cifra span{font-size:12px;color:var(--mudo)}

.tarjeta{background:var(--sobre);border:1px solid var(--linea);border-radius:14px;padding:18px 20px;display:flex;flex-direction:column;gap:14px}

#linea{width:100%;height:120px;display:block}
.leyenda{display:flex;gap:18px;flex-wrap:wrap;font-size:12px;color:var(--mudo);font-family:var(--dato)}

.zonas{display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:14px}
.zona{border:1px solid var(--linea);border-radius:12px;padding:14px 16px;display:flex;flex-direction:column;gap:8px;cursor:pointer;background:var(--sobre);text-align:left;font:inherit;color:inherit}
.zona:hover{border-color:var(--tinta)}
.zona .rango{font-family:var(--dato);font-size:12px;color:var(--rojo)}
.zona .quien{font-size:12px;color:var(--mudo)}
.zona p{margin:0;font-family:var(--libro);font-size:14px;line-height:1.5;color:var(--suave);text-align:justify;hyphens:auto}
.termometro{height:4px;border-radius:2px;background:var(--linea);overflow:hidden}
.termometro i{display:block;height:100%;background:var(--rojo)}

.lectores{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:12px}
.lector{border:1px solid var(--linea);border-radius:12px;padding:14px;display:flex;flex-direction:column;gap:8px;background:var(--sobre);cursor:pointer;text-align:left;font:inherit;color:inherit}
.lector:hover{border-color:var(--tinta)}
.lector .fila{display:flex;align-items:center;justify-content:space-between;gap:8px}
.lector .nombre{font-weight:500;display:flex;align-items:center;gap:7px}
.pastilla{font-size:11px;font-family:var(--dato);padding:2px 7px;border-radius:999px;border:1px solid var(--linea);color:var(--mudo);white-space:nowrap}
.pastilla.terminado{color:#1B7F4B;border-color:#1B7F4B}
.pastilla.suspendido{color:var(--rojo);border-color:var(--rojo)}
.gota{width:9px;height:9px;border-radius:50%;flex:none;display:inline-block}
.barra{height:5px;border-radius:3px;background:var(--linea);overflow:hidden}
.barra i{display:block;height:100%}
.lector .perfil{font-size:12.5px;color:var(--suave);line-height:1.45;min-height:2.6em}
.sello{font-size:11px;color:var(--mudo);font-family:var(--dato)}

.filtros{display:flex;gap:10px;flex-wrap:wrap;align-items:center}
select,input[type=text],input[type=number],input[type=password]{font-family:var(--ui);font-size:14px;padding:8px 10px;border-radius:9px;border:1px solid var(--linea);background:var(--papel);color:var(--tinta)}
.notas{display:flex;flex-direction:column}
.nota{display:grid;grid-template-columns:64px 1fr 160px;gap:14px;padding:14px 0;border-top:1px solid var(--linea);align-items:start}
.nota .num{font-family:var(--dato);font-size:13px;color:var(--rojo);font-variant-numeric:tabular-nums}
.nota .quien{font-size:12px;color:var(--mudo);display:flex;align-items:flex-start;gap:6px}
.nota .dicho{font-size:14px;line-height:1.5;color:var(--tinta);margin:0}
.nota .parrafo{font-family:var(--libro);font-size:13px;color:var(--mudo);line-height:1.45;margin:6px 0 0;border-left:2px solid var(--linea);padding-left:10px;text-align:justify;hyphens:auto}
.nota audio{width:100%;height:32px;margin-top:6px}

button.accion{border:0;border-radius:9px;background:var(--tinta);color:var(--papel);font-family:var(--ui);font-weight:500;font-size:14px;padding:10px 16px;cursor:pointer}
button.plano{background:none;color:var(--suave);text-decoration:underline;text-underline-offset:3px;border:0;cursor:pointer;font-family:var(--ui);font-size:14px;padding:8px 2px}

.velo{position:fixed;inset:0;background:rgba(19,19,15,.5);display:grid;place-items:center;padding:20px;z-index:20}
.velo[hidden]{display:none}
.ficha{background:var(--papel);border-radius:16px;padding:24px;max-width:520px;width:100%;max-height:88dvh;overflow:auto;display:flex;flex-direction:column;gap:16px}
.campo{display:flex;flex-direction:column;gap:5px}
.campo label{font-size:12px;color:var(--mudo);font-family:var(--dato)}
.pesos{display:flex;flex-direction:column;gap:10px}
.peso{display:grid;grid-template-columns:130px 1fr 22px;gap:10px;align-items:center}
.peso span{font-size:13px}
.peso input{width:100%}
.peso b{font-family:var(--dato);font-size:13px;text-align:right}
.nota-regla{font-size:12px;color:var(--mudo);line-height:1.5;margin:0}

.puerta{max-width:340px;margin:16vh auto;display:flex;flex-direction:column;gap:14px;padding:0 22px}
.puerta input{font-size:16px}
</style>
</head>
<body data-abierto="<?= $abierto ? '1' : '0' ?>">

<div class="puerta" id="puerta" hidden>
  <div class="marca"><span>Hypercreative</span><i class="punto"></i></div>
  <h1>Revision del manuscrito</h1>
  <input type="password" id="clave" placeholder="Clave del panel" autocomplete="current-password">
  <button class="accion" id="entrar" type="button">Entrar</button>
  <p class="tenue" id="errorPanel" hidden></p>
</div>

<div class="envoltura" id="panel" hidden>

  <header class="cabecera">
    <div>
      <div class="marca"><span>Hypercreative</span><i class="punto"></i></div>
      <h1>Revision del manuscrito</h1>
      <p class="tenue" id="subtitulo"></p>
    </div>
    <div class="cifras" id="cifras"></div>
  </header>

  <section class="tarjeta">
    <div>
      <h2>La linea del libro</h2>
      <p class="tenue">Cada nota no es un punto, es una mancha que pesa mas hacia atras: quien se pierde lo dice tarde, casi nunca pronto. Donde se acumulan hay zona. Donde no hay nada, tampoco hay lectura.</p>
    </div>
    <canvas id="linea"></canvas>
    <div class="leyenda" id="leyenda"></div>
  </section>

  <section class="tarjeta">
    <h2>Zonas calientes</h2>
    <p class="tenue">Ordenadas por cuanta gente distinta las toca, no por quien las toca. El consenso manda sobre el peso.</p>
    <div class="zonas" id="zonas"></div>
  </section>

  <section class="tarjeta">
    <h2>Quien lee</h2>
    <p class="tenue">Pulsa una ficha para ajustar su perfil, su lente y lo que sabe de cada dimension. El lector no ve nada de esto.</p>
    <div class="lectores" id="lectores"></div>
  </section>

  <section class="tarjeta">
    <div class="cabecera">
      <h2>Todas las notas</h2>
      <div class="filtros">
        <select id="filtroLector"><option value="">Todos los lectores</option></select>
        <input type="number" id="filtroDesde" placeholder="Desde" style="width:100px">
        <input type="number" id="filtroHasta" placeholder="Hasta" style="width:100px">
        <button class="plano" id="limpiarFiltros" type="button">Limpiar</button>
        <button class="accion" id="exportar" type="button">Exportar todo</button>
      </div>
    </div>
    <div class="notas" id="notas"></div>
  </section>
</div>

<div class="velo" id="velo" hidden>
  <div class="ficha">
    <h2 id="fichaNombre"></h2>
    <div class="campo">
      <label for="fNombre">Nombre del lector</label>
      <input type="text" id="fNombre" placeholder="Nombre y apellido">
    </div>
    <div class="campo">
      <label for="fPerfil">Quien es, en una linea</label>
      <input type="text" id="fPerfil" placeholder="Editora de mesa, veinte anos en no ficcion">
    </div>
    <div class="campo">
      <label for="fLente">La lente que le pides</label>
      <input type="text" id="fLente" placeholder="Leelo como economista, no me arregles las comas">
    </div>
    <div class="campo">
      <label>Lo que sabe de cada dimension, de 0 a 3</label>
      <div class="pesos" id="fPesos"></div>
      <p class="nota-regla">En claridad el peso se ignora a proposito: el que se pierde es el lector real, no el experto.</p>
    </div>
    <div class="campo">
      <label for="fEstado">Estado</label>
      <select id="fEstado">
        <option value="activo">Activo</option>
        <option value="suspendido">Suspendido</option>
        <option value="terminado">Terminado</option>
      </select>
    </div>
    <div class="campo">
      <label>Acceso</label>
      <button class="plano" id="nuevaClave" type="button" style="align-self:flex-start">Emitir una clave nueva</button>
      <p class="nota-regla" id="claveNueva" hidden></p>
    </div>
    <div class="cabecera">
      <button class="plano" id="cerrarFicha" type="button">Cancelar</button>
      <button class="accion" id="guardarFicha" type="button">Guardar</button>
    </div>
  </div>
</div>

<script>
(function () {
  'use strict';
  var $ = function (id) { return document.getElementById(id); };
  var D = { estado: null, calor: null, ficha: null, notasTodas: [] };

  var NOMBRES = {
    estructura: 'Estructura y ritmo', claridad: 'Claridad', rigor: 'Rigor de datos',
    voz: 'Voz y estilo', utilidad: 'Utilidad practica', erratas: 'Erratas y lengua'
  };

  function api(a, cuerpo) {
    return fetch('api.php?a=' + a, {
      method: cuerpo ? 'POST' : 'GET',
      headers: cuerpo ? { 'Content-Type': 'application/json' } : undefined,
      body: cuerpo ? JSON.stringify(cuerpo) : undefined,
      credentials: 'same-origin'
    }).then(function (r) { return r.json(); });
  }

  function escapar(t) {
    var d = document.createElement('div');
    d.textContent = t == null ? '' : t;
    return d.innerHTML;
  }

  /* ------------------------------------------------ la linea del libro */

  function pintarLinea() {
    var c = $('linea'), ctx = c.getContext('2d');
    var dpr = window.devicePixelRatio || 1;
    var ancho = c.clientWidth || 900, alto = 120;
    c.width = ancho * dpr;
    c.height = alto * dpr;
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    ctx.clearRect(0, 0, ancho, alto);

    var oscuro = window.matchMedia('(prefers-color-scheme: dark)').matches;
    var curva = D.calor.curva, max = D.calor.maximo || 1, total = curva.length || 1;
    var base = 88, i;

    ctx.font = '10px "Space Mono", monospace';
    D.estado.capitulos.forEach(function (cap, k) {
      var x0 = (cap.desde / total) * ancho, x1 = (cap.hasta / total) * ancho;
      ctx.fillStyle = oscuro ? (k % 2 ? '#1C1C18' : '#181814') : (k % 2 ? '#FFFFFF' : '#F1EFEA');
      ctx.fillRect(x0, 0, x1 - x0, base);
      ctx.fillStyle = oscuro ? '#4A483F' : '#B8B6AE';
      if (x1 - x0 > 15) { ctx.fillText(cap.cap_num, x0 + 3, base + 13); }
    });

    ctx.beginPath();
    ctx.moveTo(0, base);
    for (i = 0; i < total; i++) {
      ctx.lineTo((i / total) * ancho, base - (curva[i] / max) * (base - 8));
    }
    ctx.lineTo(ancho, base);
    ctx.closePath();
    var deg = ctx.createLinearGradient(0, 0, 0, base);
    deg.addColorStop(0, 'rgba(224,70,60,.55)');
    deg.addColorStop(1, 'rgba(224,70,60,.05)');
    ctx.fillStyle = deg;
    ctx.fill();

    ctx.strokeStyle = '#E0463C';
    ctx.lineWidth = 1.4;
    ctx.beginPath();
    for (i = 0; i < total; i++) {
      var xx = (i / total) * ancho, yy = base - (curva[i] / max) * (base - 8);
      if (i) { ctx.lineTo(xx, yy); } else { ctx.moveTo(xx, yy); }
    }
    ctx.stroke();

    // Las marcas de cada lector, en su color, bajo la curva
    D.notasTodas.forEach(function (n) {
      if (!n.versiculo) { return; }
      ctx.fillStyle = n.color || '#E0463C';
      ctx.fillRect((n.versiculo / total) * ancho - 1, base + 18, 2, 12);
    });

    ctx.strokeStyle = oscuro ? '#2B2B26' : '#E5E3DD';
    ctx.lineWidth = 1;
    ctx.beginPath();
    ctx.moveTo(0, base + 0.5);
    ctx.lineTo(ancho, base + 0.5);
    ctx.stroke();
  }

  function pintarLeyenda() {
    var caja = $('leyenda');
    caja.innerHTML = '';
    D.estado.ejemplares.forEach(function (e) {
      if (!e.notas) { return; }
      var s = document.createElement('span');
      s.innerHTML = '<i class="gota" style="background:' + e.color + '"></i> ' +
        escapar(e.nombre.split(' ')[0]) + ' (' + e.notas + ')';
      caja.appendChild(s);
    });
  }

  /* -------------------------------------------------------------- zonas */

  function pintarZonas() {
    var caja = $('zonas');
    caja.innerHTML = '';
    if (!D.calor.zonas.length) {
      caja.innerHTML = '<p class="tenue">Todavia no hay notas suficientes para dibujar una zona.</p>';
      return;
    }
    var maxPico = Math.max.apply(null, D.calor.zonas.map(function (z) { return z.pico; })) || 1;
    D.calor.zonas.slice(0, 12).forEach(function (z) {
      var b = document.createElement('button');
      b.className = 'zona';
      b.type = 'button';
      // El texto que se ensena es el del pico, que es donde se concentra el ruido
      var pico = z.versiculos.filter(function (v) { return v.n === z.pico_en; })[0] || z.versiculos[0];
      var cita = ((pico && pico.texto) || '').slice(0, 190);
      b.innerHTML =
        '<div class="rango">' + z.desde + ' a ' + z.hasta + '</div>' +
        '<div class="quien">Capitulo ' + z.capitulo + ', ' + escapar(z.titulo) + '. ' +
          z.lectores + (z.lectores === 1 ? ' lector' : ' lectores') + '</div>' +
        '<div class="termometro"><i style="width:' + Math.round(z.pico / maxPico * 100) + '%"></i></div>' +
        '<p>' + escapar(cita) + (cita.length >= 190 ? '...' : '') + '</p>';
      b.addEventListener('click', function () {
        $('filtroDesde').value = z.desde;
        $('filtroHasta').value = z.hasta;
        cargarNotas();
        $('notas').scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
      caja.appendChild(b);
    });
  }

  /* ----------------------------------------------------------- lectores */

  function pintarLectores() {
    var caja = $('lectores');
    caja.innerHTML = '';
    D.estado.ejemplares.forEach(function (e) {
      var avance = D.estado.total ? Math.round((e.tope / D.estado.total) * 100) : 0;
      var pastilla = e.estado === 'terminado' ? '<span class="pastilla terminado">terminado</span>'
        : e.estado === 'suspendido' ? '<span class="pastilla suspendido">suspendido</span>'
        : '<span class="pastilla">' + e.notas + ' notas</span>';
      var b = document.createElement('button');
      b.className = 'lector';
      b.type = 'button';
      b.innerHTML =
        '<div class="fila"><span class="nombre"><i class="gota" style="background:' + e.color + '"></i>' +
          escapar(e.nombre) + '</span>' + pastilla + '</div>' +
        '<div class="perfil">' + escapar(e.perfil || 'Sin perfil todavia') + '</div>' +
        '<div class="barra"><i style="width:' + avance + '%;background:' + e.color + '"></i></div>' +
        '<div class="sello">ejemplar ' + e.numero + ' . hasta el ' + (e.tope || 0) + ' de ' + D.estado.total + '</div>';
      b.addEventListener('click', function () { abrirFicha(e); });
      caja.appendChild(b);
    });
  }

  /* -------------------------------------------------------------- ficha */

  function abrirFicha(e) {
    D.ficha = e;
    $('fichaNombre').textContent = e.nombre;
    $('claveNueva').hidden = true;
    $('fNombre').value = e.nombre || '';
    $('fPerfil').value = e.perfil || '';
    $('fLente').value = e.lente || '';
    $('fEstado').value = e.estado;
    var caja = $('fPesos');
    caja.innerHTML = '';
    D.estado.dimensiones.forEach(function (dim) {
      var v = e.pesos[dim] === undefined ? 1 : e.pesos[dim];
      var fila = document.createElement('div');
      fila.className = 'peso';
      fila.innerHTML = '<span>' + NOMBRES[dim] + '</span>' +
        '<input type="range" min="0" max="3" step="1" value="' + v + '" data-dim="' + dim + '">' +
        '<b>' + v + '</b>';
      fila.querySelector('input').addEventListener('input', function () {
        fila.querySelector('b').textContent = this.value;
      });
      caja.appendChild(fila);
    });
    $('velo').hidden = false;
  }

  function guardarFicha() {
    var pesos = {};
    Array.prototype.forEach.call($('fPesos').querySelectorAll('input[data-dim]'), function (i) {
      pesos[i.dataset.dim] = parseInt(i.value, 10);
    });
    api('guardar', {
      id: D.ficha.id,
      nombre: $('fNombre').value,
      perfil: $('fPerfil').value,
      lente: $('fLente').value,
      estado: $('fEstado').value,
      color: D.ficha.color,
      pesos: pesos
    }).then(function () {
      $('velo').hidden = true;
      cargarTodo();
    });
  }

  /* -------------------------------------------------------------- notas */

  function cargarNotas() {
    var q = [];
    if ($('filtroLector').value) { q.push('ejemplar=' + $('filtroLector').value); }
    if ($('filtroDesde').value) { q.push('desde=' + $('filtroDesde').value); }
    if ($('filtroHasta').value) { q.push('hasta=' + $('filtroHasta').value); }
    return api('notas' + (q.length ? '&' + q.join('&') : '')).then(function (r) {
      var caja = $('notas');
      caja.innerHTML = '';
      if (!r.notas.length) {
        caja.innerHTML = '<p class="tenue" style="padding-top:14px">Ninguna nota con ese filtro.</p>';
        return;
      }
      r.notas.forEach(function (n) {
        var dicho = n.texto || n.transcripcion || '';
        var s = Math.round((n.duracion_ms || 0) / 1000);
        var reloj = Math.floor(s / 60) + ':' + String(s % 60).padStart(2, '0');
        var d = document.createElement('div');
        d.className = 'nota';
        d.innerHTML =
          '<div class="num">' + (n.versiculo || 'gen') + '</div>' +
          '<div>' +
            (dicho
              ? '<p class="dicho">' + escapar(dicho) + '</p>'
              : '<p class="dicho" style="color:var(--mudo)">Nota de voz sin transcribir, ' + reloj + '</p>') +
            (!n.texto && n.audio ? '<audio controls preload="none" src="../audio.php?u=' + n.uuid + '"></audio>' : '') +
            (n.parrafo ? '<p class="parrafo">' + escapar(n.parrafo.slice(0, 260)) + '</p>' : '') +
          '</div>' +
          '<div class="quien"><i class="gota" style="background:' + n.color + '"></i>' +
            '<div>' + escapar(n.nombre) + '<br><span class="sello">' +
            (n.cap_num ? 'capitulo ' + n.cap_num : 'sin numero') + '</span></div></div>';
        caja.appendChild(d);
      });
    });
  }

  /* ------------------------------------------------------------ arranque */

  function cifra(v, t) {
    return '<div class="cifra"><b>' + v + '</b><span>' + t + '</span></div>';
  }

  function cargarTodo() {
    return api('estado').then(function (e) {
      if (!e.ok) { throw new Error('sesion'); }
      D.estado = e;
      $('subtitulo').textContent = 'De Creativo a Hipercreativo. ' + e.total + ' versiculos, ' +
        e.capitulos.length + ' capitulos.';
      var sel = $('filtroLector');
      sel.innerHTML = '<option value="">Todos los lectores</option>';
      e.ejemplares.forEach(function (x) {
        var o = document.createElement('option');
        o.value = x.id;
        o.textContent = x.nombre;
        sel.appendChild(o);
      });
      pintarLectores();
      return api('notas');
    }).then(function (r) {
      D.notasTodas = r.notas || [];
      return api('calor');
    }).then(function (c) {
      D.calor = c;
      var leyendo = D.estado.ejemplares.filter(function (x) { return x.notas > 0; }).length;
      var fin = D.estado.ejemplares.filter(function (x) { return x.estado === 'terminado'; }).length;
      $('cifras').innerHTML =
        cifra(D.notasTodas.length, 'notas') +
        cifra(leyendo + ' / ' + D.estado.ejemplares.length, 'leyendo') +
        cifra(fin, 'han terminado') +
        cifra(D.calor.zonas.length, 'zonas');
      pintarLinea();
      pintarLeyenda();
      pintarZonas();
      return cargarNotas();
    });
  }

  function abrirPanel() {
    $('puerta').hidden = true;
    $('panel').hidden = false;
    cargarTodo();
  }

  $('entrar').addEventListener('click', function () {
    api('login', { clave: $('clave').value }).then(function (r) {
      if (r.ok) {
        abrirPanel();
      } else {
        $('errorPanel').textContent = r.error || 'No ha entrado.';
        $('errorPanel').hidden = false;
      }
    });
  });
  $('clave').addEventListener('keydown', function (e) { if (e.key === 'Enter') { $('entrar').click(); } });
  $('nuevaClave').addEventListener('click', function () {
    if (!confirm('La clave actual dejara de funcionar. Seguro?')) { return; }
    api('nueva_clave', { id: D.ficha.id }).then(function (r) {
      if (!r.ok) { return; }
      var enlace = location.origin + '/check/?e=' + r.token;
      var caja = $('claveNueva');
      caja.hidden = false;
      caja.innerHTML = 'Ejemplar ' + r.numero + '<br>' + escapar(enlace) +
        '<br>clave <b style="font-family:var(--dato);color:var(--rojo)">' + r.pin + '</b>' +
        '<br>Apuntala ahora: no se vuelve a ensenar.';
      cargarTodo();
    });
  });
  $('cerrarFicha').addEventListener('click', function () {
    $('velo').hidden = true;
    $('claveNueva').hidden = true;
  });
  $('guardarFicha').addEventListener('click', guardarFicha);
  $('filtroLector').addEventListener('change', cargarNotas);
  $('filtroDesde').addEventListener('change', cargarNotas);
  $('filtroHasta').addEventListener('change', cargarNotas);
  $('limpiarFiltros').addEventListener('click', function () {
    $('filtroLector').value = '';
    $('filtroDesde').value = '';
    $('filtroHasta').value = '';
    cargarNotas();
  });
  $('exportar').addEventListener('click', function () { window.location = 'api.php?a=exportar'; });
  window.addEventListener('resize', function () { if (D.calor) { pintarLinea(); } });

  if (document.body.dataset.abierto === '1') { abrirPanel(); } else { $('puerta').hidden = false; }
})();
</script>
</body>
</html>
