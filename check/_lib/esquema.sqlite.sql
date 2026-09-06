CREATE TABLE IF NOT EXISTS ajustes (
  clave TEXT PRIMARY KEY, valor TEXT NOT NULL);
CREATE TABLE IF NOT EXISTS versiculos (
  n INTEGER PRIMARY KEY, capitulo TEXT NOT NULL, cap_num INTEGER NOT NULL,
  cap_titulo TEXT NOT NULL, seccion TEXT, texto TEXT NOT NULL, palabras INTEGER NOT NULL);
CREATE TABLE IF NOT EXISTS ejemplares (
  id INTEGER PRIMARY KEY AUTOINCREMENT, numero INTEGER NOT NULL, nombre TEXT NOT NULL,
  perfil TEXT NOT NULL DEFAULT '', lente TEXT NOT NULL DEFAULT '', token TEXT NOT NULL UNIQUE,
  pin_hash TEXT NOT NULL, estado TEXT NOT NULL DEFAULT 'activo', color TEXT NOT NULL DEFAULT '#E0463C',
  creado_en TEXT NOT NULL, visto_en TEXT, terminado_en TEXT);
CREATE TABLE IF NOT EXISTS pesos (
  ejemplar_id INTEGER NOT NULL, dimension TEXT NOT NULL, peso INTEGER NOT NULL DEFAULT 1,
  PRIMARY KEY (ejemplar_id, dimension));
CREATE TABLE IF NOT EXISTS notas (
  id INTEGER PRIMARY KEY AUTOINCREMENT, uuid TEXT NOT NULL UNIQUE, ejemplar_id INTEGER NOT NULL,
  versiculo INTEGER, tipo TEXT NOT NULL, audio TEXT, audio_mime TEXT, duracion_ms INTEGER,
  texto TEXT, transcripcion TEXT, dimension TEXT, sentimiento TEXT,
  creada_en TEXT NOT NULL, descartada INTEGER NOT NULL DEFAULT 0);
CREATE INDEX IF NOT EXISTS notas_versiculo ON notas (versiculo);
CREATE INDEX IF NOT EXISTS notas_ejemplar ON notas (ejemplar_id);
CREATE TABLE IF NOT EXISTS eventos (
  id INTEGER PRIMARY KEY AUTOINCREMENT, ejemplar_id INTEGER NOT NULL, tipo TEXT NOT NULL,
  versiculo INTEGER, ts TEXT NOT NULL);
CREATE TABLE IF NOT EXISTS intentos (
  id INTEGER PRIMARY KEY AUTOINCREMENT, token TEXT NOT NULL, ip TEXT NOT NULL,
  ts TEXT NOT NULL, ok INTEGER NOT NULL);
CREATE INDEX IF NOT EXISTS intentos_token ON intentos (token, ts);
