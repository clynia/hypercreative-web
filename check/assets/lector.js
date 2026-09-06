/* Lectura de revision, lado del lector.
   Regla del proyecto: aqui solo hay un numero y un boton. Todo lo listo pasa
   por debajo, sin pedirle nada a quien nos esta ayudando. */
(function () {
  'use strict';

  var cuerpo    = document.body;
  var TOKEN     = cuerpo.dataset.token || '';
  var TOTAL     = parseInt(cuerpo.dataset.total, 10) || 0;
  var ABRIR_FIN = cuerpo.dataset.fin === '1';

  var $ = function (id) { return document.getElementById(id); };

  var estado = {
    numero: '',
    pin: '',
    lector: null,
    notas: [],
    marcas: [],
    grabando: null
  };

  /* ---------------------------------------------------------------- red */

  function api(accion, opciones) {
    opciones = opciones || {};
    return fetch('api.php?a=' + accion, {
      method: opciones.cuerpo ? 'POST' : 'GET',
      headers: opciones.json ? { 'Content-Type': 'application/json' } : undefined,
      body: opciones.cuerpo || undefined,
      credentials: 'same-origin'
    }).then(function (r) {
      return r.json().catch(function () { return { ok: false }; });
    });
  }

  /* ------------------------------------------------- cola sin cobertura */
  /* Una nota grabada en el metro no se pierde: vive en el movil hasta que
     haya red y sube sola. El servidor deduplica por uuid. */

  var bd = null;
  function abrirBase() {
    if (bd) { return Promise.resolve(bd); }
    return new Promise(function (ok, mal) {
      var p = indexedDB.open('hc-lectura', 1);
      p.onupgradeneeded = function () { p.result.createObjectStore('cola', { keyPath: 'uuid' }); };
      p.onsuccess = function () { bd = p.result; ok(bd); };
      p.onerror = function () { mal(p.error); };
    });
  }

  function conTienda(modo, trabajo) {
    return abrirBase().then(function (base) {
      return new Promise(function (ok, mal) {
        var tx = base.transaction('cola', modo);
        var peticion = trabajo(tx.objectStore('cola'));
        tx.oncomplete = function () { ok(peticion ? peticion.result : undefined); };
        tx.onerror = function () { mal(tx.error); };
      });
    });
  }

  var encolar    = function (n) { return conTienda('readwrite', function (t) { return t.put(n); }); };
  var desencolar = function (u) { return conTienda('readwrite', function (t) { return t.delete(u); }); };
  var pendientes = function () { return conTienda('readonly', function (t) { return t.getAll(); }); };

  function uuid() {
    if (crypto.randomUUID) { return crypto.randomUUID(); }
    return 'xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
      var r = Math.random() * 16 | 0;
      return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
  }

  function subir(nota) {
    var f = new FormData();
    f.append('uuid', nota.uuid);
    f.append('tipo', nota.tipo);
    f.append('versiculo', nota.versiculo === null ? '' : String(nota.versiculo));
    if (nota.texto) { f.append('texto', nota.texto); }
    if (nota.duracion_ms) { f.append('duracion_ms', String(nota.duracion_ms)); }
    if (nota.blob) { f.append('audio', nota.blob, nota.uuid); }
    return fetch('api.php?a=nota', { method: 'POST', body: f, credentials: 'same-origin' })
      .then(function (r) { return r.json(); });
  }

  var vaciando = false;
  function vaciarCola() {
    if (vaciando) { return Promise.resolve(); }
    vaciando = true;
    return pendientes().then(function (lista) {
      return (lista || []).reduce(function (cadena, nota) {
        return cadena.then(function () {
          return subir(nota).then(function (r) {
            if (r && r.ok) { return desencolar(nota.uuid); }
          }).catch(function () { /* sin red: se queda para la proxima */ });
        });
      }, Promise.resolve());
    }).then(function () {
      vaciando = false;
      return pintarCola();
    }, function () { vaciando = false; });
  }

  function pintarCola() {
    return pendientes().then(function (lista) {
      var n = (lista || []).length;
      var caja = $('cola');
      caja.hidden = n === 0;
      caja.textContent = n === 1 ? '1 nota esperando a que haya red'
                                 : n + ' notas esperando a que haya red';
    }).catch(function () {});
  }

  /* ------------------------------------------------------------ guardar */

  function guardarNota(datos) {
    var nota = {
      uuid: uuid(),
      versiculo: datos.versiculo === undefined ? null : datos.versiculo,
      tipo: datos.tipo,
      texto: datos.texto || '',
      blob: datos.blob || null,
      duracion_ms: datos.duracion_ms || 0,
      ts: Date.now()
    };
    // Primero al movil, despues a la red. Nunca al reves.
    return encolar(nota).then(function () {
      brindis(nota.versiculo ? 'Nota guardada en el ' + nota.versiculo : 'Nota guardada');
      limpiarNumero();
      return vaciarCola();
    }).then(cargarNotas).then(cargarProgreso);
  }

  /* ---------------------------------------------------------- pantallas */

  function mostrar(cual) {
    ['puerta', 'sala', 'cierre', 'gracias'].forEach(function (p) { $(p).hidden = p !== cual; });
    window.scrollTo(0, 0);
  }

  function brindis(texto) {
    var b = $('brindis');
    b.textContent = texto;
    b.classList.add('visible');
    clearTimeout(brindis.t);
    brindis.t = setTimeout(function () { b.classList.remove('visible'); }, 2200);
  }

  /* --------------------------------------------------------------- teclas */

  function construirTeclado(contenedor, alPulsar, extra) {
    contenedor.innerHTML = '';
    ['1', '2', '3', '4', '5', '6', '7', '8', '9', extra || '', '0', 'borrar'].forEach(function (t) {
      var b = document.createElement('button');
      b.type = 'button';
      if (t === '') {
        b.disabled = true;
        b.style.visibility = 'hidden';
      } else if (t === 'borrar') {
        b.className = 'tenue';
        b.textContent = 'Borrar';
      } else if (!/^\d$/.test(t)) {
        b.className = 'tenue';
        b.textContent = t === 'sin' ? 'Sin numero' : t;
      } else {
        b.textContent = t;
      }
      b.addEventListener('click', function () { alPulsar(t); });
      contenedor.appendChild(b);
    });
  }

  /* --------------------------------------------------------------- puerta */

  function pintarPin() {
    var casillas = $('casillas').children;
    for (var i = 0; i < casillas.length; i++) {
      casillas[i].textContent = estado.pin[i] ? '.' : '';
      casillas[i].classList.toggle('llena', Boolean(estado.pin[i]));
    }
  }

  function teclaPin(t) {
    $('avisoPin').hidden = true;
    $('casillas').classList.remove('error');
    if (t === 'borrar') { estado.pin = estado.pin.slice(0, -1); }
    else if (/^\d$/.test(t) && estado.pin.length < 6) { estado.pin += t; }
    pintarPin();
    if (estado.pin.length === 6) { enviarPin(); }
  }

  function enviarPin() {
    api('pin', { json: true, cuerpo: JSON.stringify({ token: TOKEN, pin: estado.pin }) })
      .then(function (r) {
        if (r.ok) {
          estado.lector = r.lector;
          entrarEnLaSala(true);
        } else {
          $('casillas').classList.add('error');
          $('avisoPin').textContent = r.error || 'No ha entrado.';
          $('avisoPin').hidden = false;
          estado.pin = '';
          setTimeout(pintarPin, 320);
        }
      });
  }

  /* ----------------------------------------------------------------- sala */

  var temporizador = null;

  function limpiarNumero() {
    estado.numero = '';
    pintarNumero();
  }

  function pintarNumero() {
    $('numero').firstElementChild.textContent = estado.numero;
    if (estado.numero === '') {
      $('destino').hidden = true;
      $('destinoVacio').hidden = false;
      return;
    }
    clearTimeout(temporizador);
    temporizador = setTimeout(buscarVersiculo, 180);
  }

  function buscarVersiculo() {
    var n = parseInt(estado.numero, 10);
    if (!n) { return; }
    api('versiculo&n=' + n).then(function (r) {
      if (!r.ok) {
        $('destino').hidden = true;
        $('destinoVacio').hidden = false;
        $('destinoVacio').textContent = 'Ese numero no existe. El libro llega hasta el ' + TOTAL + '.';
        return;
      }
      var v = r.versiculo;
      $('capitulo').textContent = 'Capitulo ' + v.cap_num;
      $('seccion').textContent = v.seccion || v.cap_titulo;
      $('extracto').textContent = v.extracto;
      $('destino').hidden = false;
      $('destinoVacio').hidden = true;
    });
  }

  function teclaNumero(t) {
    if (t === 'sin') {
      estado.numero = '';
      pintarNumero();
      brindis('La proxima nota ira sin numero');
      return;
    }
    if (t === 'borrar') {
      estado.numero = estado.numero.slice(0, -1);
    } else if (/^\d$/.test(t) && estado.numero.length < 4) {
      if (estado.numero === '' && t === '0') { return; }
      estado.numero += t;
    }
    $('destinoVacio').textContent = 'Teclea el numero del margen, junto al parrafo.';
    pintarNumero();
  }

  function numeroActual() {
    var n = parseInt(estado.numero, 10);
    return n > 0 && n <= TOTAL ? n : null;
  }

  /* --------------------------------------------------------------- grabar */

  function mimeDisponible() {
    var opciones = ['audio/webm;codecs=opus', 'audio/webm', 'audio/mp4', 'audio/ogg;codecs=opus'];
    for (var i = 0; i < opciones.length; i++) {
      if (window.MediaRecorder && MediaRecorder.isTypeSupported(opciones[i])) { return opciones[i]; }
    }
    return '';
  }

  function arrancarGrabacion(boton, lienzo, reloj, alTerminar) {
    if (!navigator.mediaDevices || !window.MediaRecorder) {
      brindis('Este navegador no graba audio. Escribe la nota.');
      return;
    }
    navigator.mediaDevices.getUserMedia({ audio: true }).then(function (flujo) {
      var mime   = mimeDisponible();
      var rec    = new MediaRecorder(flujo, mime ? { mimeType: mime, audioBitsPerSecond: 32000 } : undefined);
      var trozos = [];
      var inicio = Date.now();

      var ctx = new (window.AudioContext || window.webkitAudioContext)();
      var analiza = ctx.createAnalyser();
      analiza.fftSize = 128;
      ctx.createMediaStreamSource(flujo).connect(analiza);
      var datos = new Uint8Array(analiza.frequencyBinCount);

      rec.ondataavailable = function (e) { if (e.data.size) { trozos.push(e.data); } };
      rec.onstop = function () {
        var duracion = Date.now() - inicio;
        flujo.getTracks().forEach(function (t) { t.stop(); });
        ctx.close();
        cancelAnimationFrame(estado.grabando.cuadro);
        clearInterval(estado.grabando.tic);
        boton.dataset.grabando = '0';
        reloj.textContent = '';
        limpiarLienzo(lienzo);
        estado.grabando = null;
        alTerminar(new Blob(trozos, { type: mime || 'audio/webm' }), duracion);
      };

      rec.start();
      boton.dataset.grabando = '1';

      function pinta() {
        analiza.getByteFrequencyData(datos);
        dibujarOnda(lienzo, datos);
        estado.grabando.cuadro = requestAnimationFrame(pinta);
      }

      estado.grabando = {
        rec: rec,
        cuadro: requestAnimationFrame(pinta),
        tic: setInterval(function () {
          var s = Math.floor((Date.now() - inicio) / 1000);
          reloj.textContent = Math.floor(s / 60) + ':' + String(s % 60).padStart(2, '0');
          if (s >= 300) { rec.stop(); }   // tope de cinco minutos
        }, 250)
      };
      reloj.textContent = '0:00';
    }).catch(function () {
      brindis('Necesito permiso para el microfono.');
    });
  }

  function limpiarLienzo(lienzo) {
    lienzo.getContext('2d').clearRect(0, 0, lienzo.width, lienzo.height);
  }

  /* La onda es de verdad: son las frecuencias que entran por el microfono. */
  function dibujarOnda(lienzo, datos) {
    var dpr = window.devicePixelRatio || 1;
    if (lienzo.width !== 92 * dpr) {
      lienzo.width = 92 * dpr;
      lienzo.height = 92 * dpr;
    }
    var c = lienzo.getContext('2d');
    var mitad = 46 * dpr;
    c.clearRect(0, 0, lienzo.width, lienzo.height);
    c.strokeStyle = '#E0463C';
    c.lineCap = 'round';
    c.lineWidth = 2 * dpr;
    var barras = 44;
    for (var i = 0; i < barras; i++) {
      var v = datos[Math.floor(i * datos.length / barras)] / 255;
      var ang = (i / barras) * Math.PI * 2 - Math.PI / 2;
      var r0 = 38 * dpr;
      var r1 = r0 + Math.max(1.5, v * 8) * dpr;
      c.globalAlpha = 0.35 + v * 0.65;
      c.beginPath();
      c.moveTo(mitad + Math.cos(ang) * r0, mitad + Math.sin(ang) * r0);
      c.lineTo(mitad + Math.cos(ang) * r1, mitad + Math.sin(ang) * r1);
      c.stroke();
    }
    c.globalAlpha = 1;
  }

  /* ------------------------------------------------------------ recorrido */

  function dibujarRail() {
    var lienzo = $('railLienzo');
    var ancho = lienzo.parentElement.clientWidth || 320;
    var dpr = window.devicePixelRatio || 1;
    lienzo.width = ancho * dpr;
    lienzo.height = 6 * dpr;
    var c = lienzo.getContext('2d');
    c.clearRect(0, 0, lienzo.width, lienzo.height);
    var oscuro = window.matchMedia('(prefers-color-scheme: dark)').matches;
    c.fillStyle = oscuro ? '#2B2B26' : '#E5E3DD';
    c.fillRect(0, 2 * dpr, lienzo.width, 2 * dpr);
    c.fillStyle = '#E0463C';
    estado.marcas.forEach(function (n) {
      var x = (n / TOTAL) * lienzo.width;
      c.fillRect(Math.max(0, x - dpr), 0, 2 * dpr, 6 * dpr);
    });
  }

  function cargarProgreso() {
    return api('progreso').then(function (r) {
      if (r.ok) {
        estado.marcas = r.marcas;
        dibujarRail();
      }
    });
  }

  /* ------------------------------------------------------------ tus notas */

  function cargarNotas() {
    return api('notas').then(function (r) {
      if (!r.ok) { return; }
      estado.notas = r.notas;
      $('cuentaNotas').textContent = r.notas.length;
      var lista = $('listaNotas');
      lista.innerHTML = '';
      if (!r.notas.length) {
        var vacio = document.createElement('li');
        vacio.className = 'cuerpo';
        vacio.textContent = 'Todavia no has mandado ninguna.';
        lista.appendChild(vacio);
        return;
      }
      r.notas.forEach(function (n) {
        var li = document.createElement('li');

        var num = document.createElement('span');
        num.className = 'marca-num';
        num.textContent = n.versiculo ? n.versiculo : 'general';

        var caja = document.createElement('div');
        caja.className = 'cuerpo';
        if (n.texto) {
          caja.textContent = n.texto;
        } else {
          var s = Math.round((n.duracion_ms || 0) / 1000);
          var t = document.createElement('div');
          t.textContent = 'Nota de voz, ' + Math.floor(s / 60) + ':' + String(s % 60).padStart(2, '0');
          caja.appendChild(t);
          var au = document.createElement('audio');
          au.controls = true;
          au.preload = 'none';
          au.src = 'audio.php?u=' + n.uuid;
          caja.appendChild(au);
        }

        var quitar = document.createElement('button');
        quitar.type = 'button';
        quitar.className = 'texto-boton quitar';
        quitar.textContent = 'Quitar';
        quitar.addEventListener('click', function () {
          api('borrar', { json: true, cuerpo: JSON.stringify({ uuid: n.uuid }) })
            .then(cargarNotas).then(cargarProgreso);
        });

        li.appendChild(num);
        li.appendChild(caja);
        li.appendChild(quitar);
        lista.appendChild(li);
      });
    });
  }

  /* ------------------------------------------------------------- arranque */

  function entrarEnLaSala(recienEntrado) {
    if (ABRIR_FIN) {
      mostrar('cierre');
      return;
    }
    mostrar('sala');
    dibujarRail();
    cargarNotas();
    cargarProgreso();
    vaciarCola();
    if (recienEntrado && !localStorage.getItem('hc-instrucciones')) {
      $('modalInstrucciones').hidden = false;
    }
  }

  function terminar() {
    api('terminar', { json: true, cuerpo: '{}' }).then(function () { mostrar('gracias'); });
  }

  function conectar() {
    construirTeclado($('tecladoPin'), teclaPin);
    construirTeclado($('tecladoNum'), teclaNumero, 'sin');

    $('grabar').addEventListener('click', function () {
      if (estado.grabando) {
        estado.grabando.rec.stop();
        return;
      }
      var v = numeroActual();
      arrancarGrabacion($('grabar'), $('onda'), $('reloj'), function (blob, duracion) {
        guardarNota({ versiculo: v, tipo: 'audio', blob: blob, duracion_ms: duracion });
      });
    });

    $('grabarFin').addEventListener('click', function () {
      if (estado.grabando) {
        estado.grabando.rec.stop();
        return;
      }
      arrancarGrabacion($('grabarFin'), $('ondaFin'), $('relojFin'), function (blob, duracion) {
        guardarNota({ versiculo: null, tipo: 'cierre', blob: blob, duracion_ms: duracion }).then(terminar);
      });
    });

    $('terminarSinNota').addEventListener('click', terminar);

    $('prefieroEscribir').addEventListener('click', function () {
      $('escribir').hidden = false;
      $('textoNota').focus();
    });
    $('cancelarTexto').addEventListener('click', function () {
      $('escribir').hidden = true;
      $('textoNota').value = '';
    });
    $('enviarTexto').addEventListener('click', function () {
      var t = $('textoNota').value.trim();
      if (!t) { return; }
      guardarNota({ versiculo: numeroActual(), tipo: 'texto', texto: t });
      $('textoNota').value = '';
      $('escribir').hidden = true;
    });

    $('verNotas').addEventListener('click', function () {
      $('cajon').hidden = false;
      cargarNotas();
    });
    $('cerrarCajon').addEventListener('click', function () { $('cajon').hidden = true; });
    $('cajon').addEventListener('click', function (e) {
      if (e.target === $('cajon')) { $('cajon').hidden = true; }
    });

    $('entendido').addEventListener('click', function () {
      localStorage.setItem('hc-instrucciones', '1');
      $('modalInstrucciones').hidden = true;
    });

    window.addEventListener('online', vaciarCola);
    window.addEventListener('resize', dibujarRail);

    // El teclado fisico tambien vale, para probar desde el ordenador.
    document.addEventListener('keydown', function (e) {
      if (!$('sala').hidden && document.activeElement.tagName !== 'TEXTAREA') {
        if (/^\d$/.test(e.key)) { teclaNumero(e.key); }
        if (e.key === 'Backspace') { teclaNumero('borrar'); }
      } else if (!$('puerta').hidden) {
        if (/^\d$/.test(e.key)) { teclaPin(e.key); }
        if (e.key === 'Backspace') { teclaPin('borrar'); }
      }
    });
  }

  conectar();
  pintarCola();

  api('sesion').then(function (r) {
    if (r.ok) {
      estado.lector = r.lector;
      if (r.lector.terminado && !ABRIR_FIN) {
        mostrar('gracias');
        return;
      }
      entrarEnLaSala(false);
    } else {
      mostrar('puerta');
      if (!TOKEN) {
        $('avisoPin').textContent = 'Escanea el codigo de tu ejemplar para empezar.';
        $('avisoPin').hidden = false;
      }
    }
  });

  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js').catch(function () {});
  }
})();
