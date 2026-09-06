/* Cascara offline: la app abre aunque no haya red, y las notas grabadas sin
   cobertura esperan en el movil (esa cola vive en IndexedDB, no aqui). */
var CACHE = 'hc-lectura-v1';
var CASCARA = ['./', 'assets/lector.css?v=1', 'assets/lector.js?v=1', 'assets/manifest.webmanifest'];

self.addEventListener('install', function (e) {
  e.waitUntil(caches.open(CACHE).then(function (c) {
    return Promise.all(CASCARA.map(function (u) { return c.add(u).catch(function () {}); }));
  }).then(function () { return self.skipWaiting(); }));
});

self.addEventListener('activate', function (e) {
  e.waitUntil(caches.keys().then(function (llaves) {
    return Promise.all(llaves.filter(function (k) { return k !== CACHE; })
      .map(function (k) { return caches.delete(k); }));
  }).then(function () { return self.clients.claim(); }));
});

self.addEventListener('fetch', function (e) {
  var u = new URL(e.request.url);
  if (e.request.method !== 'GET') { return; }
  if (u.pathname.indexOf('api.php') !== -1 || u.pathname.indexOf('audio.php') !== -1) { return; }
  e.respondWith(
    fetch(e.request).then(function (r) {
      var copia = r.clone();
      caches.open(CACHE).then(function (c) { c.put(e.request, copia).catch(function () {}); });
      return r;
    }).catch(function () { return caches.match(e.request); })
  );
});
