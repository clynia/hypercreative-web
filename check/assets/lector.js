/* Lectura de revision, lado del lector.
   Regla del proyecto: aqui solo hay un numero y un boton. Todo lo listo pasa
   por debajo, sin pedirle nada a quien nos esta ayudando.

   Los numeros se teclean con el teclado del movil, no con uno dibujado: con un
   teclado propio, dos toques seguidos sobre la misma tecla los lee iOS como
   doble toque y hace zoom sobre la pantalla. */
(function () {
  'use strict';

  var cuerpo    = document.body;
  var TOKEN     = cuerpo.dataset.token || '';
  var TOTAL     = parseInt(cuerpo.dataset.total, 10) || 0;
  var ABRIR_FIN = cuerpo.dataset.fin === '1';

  var $ = function (id) { return document.getElementById(id); };

  var estado = {
    lector: null,
    notas: [],
    marcas: [],
    grabando: null,
    gesto: null,
    pararAlArrancar: false
  };

  /* ---------------------------------------------------------------- red */

  function api(accion, opciones) {
    opciones = opciones || {};
    return fetch('api.php?a=' + accion, {
      method: opciones.cuerpo ? 'POST' : 'GET',
      headers: opciones.json ? { 'Content-Type': 'application/json' } : undefined,
      body: opciones.cuerpo || undefined,
      credentials: 'same-origin',
      cache: 'no-store'
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

  function soloDigitos(campo, maximo) {
    var limpio = (campo.value || '').replace(/\D/g, '').slice(0, maximo);
    if (campo.value !== limpio) { campo.value = limpio; }
    return limpio;
  }

  /* --------------------------------------------------------------- puerta */

  var enviandoPin = false;

  function alEscribirPin() {
    var pin = soloDigitos($('clave'), 6);
    $('avisoPin').hidden = true;
    $('clave').classList.remove('error');
    if (pin.length === 6 && !enviandoPin) { enviarPin(pin); }
  }

  function enviarPin(pin) {
    enviandoPin = true;
    $('clave').blur();
    api('pin', { json: true, cuerpo: JSON.stringify({ token: TOKEN, pin: pin }) })
      .then(function (r) {
        enviandoPin = false;
        if (r.ok) {
          estado.lector = r.lector;
          entrarEnLaSala(true);
        } else {
          $('clave').classList.add('error');
          $('avisoPin').textContent = r.error || 'No ha entrado.';
          $('avisoPin').hidden = false;
          $('clave').value = '';
          setTimeout(function () { $('clave').focus(); }, 400);
        }
      }, function () { enviandoPin = false; });
  }

  /* ----------------------------------------------------------------- sala */

  var temporizador = null;

  function limpiarNumero() {
    $('numero').value = '';
    pintarDestino(null);
  }

  function pintarDestino(v) {
    if (!v) {
      $('destino').hidden = true;
      $('destinoVacio').hidden = false;
      return;
    }
    $('capitulo').textContent = 'Capitulo ' + v.cap_num;
    $('seccion').textContent = v.seccion || v.cap_titulo;
    $('extracto').textContent = v.extracto;
    $('destino').hidden = false;
    $('destinoVacio').hidden = true;
  }

  function alEscribirNumero() {
    var n = soloDigitos($('numero'), 4);
    $('destinoVacio').textContent = 'Teclea el numero del margen, junto al parrafo.';
    clearTimeout(temporizador);
    if (n === '') {
      pintarDestino(null);
      return;
    }
    temporizador = setTimeout(buscarVersiculo, 220);
  }

  function buscarVersiculo() {
    var n = numeroActual();
    if (!n) {
      pintarDestino(null);
      $('destinoVacio').textContent = 'Ese numero no existe. El libro llega hasta el ' + TOTAL + '.';
      return;
    }
    api('versiculo&n=' + n).then(function (r) {
      if (!r.ok) {
        pintarDestino(null);
        $('destinoVacio').textContent = 'Ese numero no existe. El libro llega hasta el ' + TOTAL + '.';
        return;
      }
      pintarDestino(r.versiculo);
    });
  }

  function numeroActual() {
    var n = parseInt($('numero').value, 10);
    return n > 0 && n <= TOTAL ? n : null;
  }

  /* --------------------------------------------------------------- grabar */

  var MANTENER_MS = 450;   // por debajo de esto fue un toque, no una pulsacion

  function mimeDisponible() {
    var opciones = ['audio/webm;codecs=opus', 'audio/webm', 'audio/mp4', 'audio/ogg;codecs=opus'];
    for (var i = 0; i < opciones.length; i++) {
      if (window.MediaRecorder && MediaRecorder.isTypeSupported(opciones[i])) { return opciones[i]; }
    }
    return '';
  }

  function pista(texto) {
    var p = $('pistaGrabar');
    if (p) { p.textContent = texto; }
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
        if (estado.grabando) {
          cancelAnimationFrame(estado.grabando.cuadro);
          clearInterval(estado.grabando.tic);
        }
        boton.dataset.grabando = '0';
        reloj.textContent = '';
        limpiarLienzo(lienzo);
        estado.grabando = null;
        pista('Manten pulsado y habla, o toca una vez para manos libres.');
        if (duracion < 600) {
          brindis('Muy corta. Manten pulsado mientras hablas.');
          return;
        }
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

      // Si solto el dedo antes de que el microfono llegara a abrirse, se para
      // en cuanto arranca: la pulsacion ya habia terminado.
      if (estado.pararAlArrancar) {
        estado.pararAlArrancar = false;
        setTimeout(function () { if (estado.grabando) { estado.grabando.rec.stop(); } }, 400);
      }
    }).catch(function () {
      estado.pararAlArrancar = false;
      pista('Manten pulsado y habla, o toca una vez para manos libres.');
      brindis('Necesito permiso para el microfono.');
    });
  }

  /* Mantener pulsado graba y soltar envia, como una nota de voz de toda la
     vida. Un toque corto deja grabando en manos libres hasta el toque siguiente. */
  function conectarBoton(boton, lienzo, reloj, hecho) {
    function abajo(e) {
      e.preventDefault();
      if (estado.grabando) {              // estaba en manos libres: parar
        estado.grabando.rec.stop();
        estado.gesto = null;
        return;
      }
      estado.gesto = Date.now();
      pista('Suelta para enviar.');
      arrancarGrabacion(boton, lienzo, reloj, hecho);
    }

    function arriba(e) {
      if (e) { e.preventDefault(); }
      if (estado.gesto === null) { return; }
      var mantenido = Date.now() - estado.gesto >= MANTENER_MS;
      estado.gesto = null;
      if (!mantenido) {
        pista('Grabando. Toca otra vez para parar.');
        return;                            // fue un toque: sigue grabando
      }
      if (estado.grabando) {
        estado.grabando.rec.stop();
      } else {
        estado.pararAlArrancar = true;     // el microfono aun no habia abierto
      }
    }

    if (window.PointerEvent) {
      boton.addEventListener('pointerdown', abajo);
      boton.addEventListener('pointerup', arriba);
      boton.addEventListener('pointercancel', arriba);
    } else {
      boton.addEventListener('click', function (e) {
        e.preventDefault();
        if (estado.grabando) { estado.grabando.rec.stop(); }
        else { arrancarGrabacion(boton, lienzo, reloj, hecho); }
      });
    }
    boton.addEventListener('contextmenu', function (e) { e.preventDefault(); });
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
    $('clave').addEventListener('input', alEscribirPin);
    $('clave').addEventListener('keydown', function (e) {
      if (e.key === 'Enter') { e.preventDefault(); alEscribirPin(); }
    });

    $('numero').addEventListener('input', alEscribirNumero);
    $('numero').addEventListener('keydown', function (e) {
      if (e.key === 'Enter') { e.preventDefault(); $('numero').blur(); }
    });
    $('sinNumero').addEventListener('click', function () {
      limpiarNumero();
      $('numero').blur();
      brindis('La proxima nota ira sin numero');
    });

    conectarBoton($('grabar'), $('onda'), $('reloj'), function (blob, duracion) {
      guardarNota({ versiculo: numeroActual(), tipo: 'audio', blob: blob, duracion_ms: duracion });
    });
    conectarBoton($('grabarFin'), $('ondaFin'), $('relojFin'), function (blob, duracion) {
      guardarNota({ versiculo: null, tipo: 'cierre', blob: blob, duracion_ms: duracion }).then(terminar);
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
      } else {
        setTimeout(function () { $('clave').focus(); }, 250);
      }
    }
  });

  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js').catch(function () {});
  }
})();
