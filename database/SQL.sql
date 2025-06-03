DROP TABLE IF EXISTS productos CASCADE;
DROP TABLE IF EXISTS sucursales CASCADE;
DROP TABLE IF EXISTS monedas CASCADE;
DROP TABLE IF EXISTS bodegas CASCADE;

CREATE TABLE IF NOT EXISTS bodegas (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS monedas (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    simbolo VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS sucursales (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    bodega_id INTEGER REFERENCES bodegas(id)
);

CREATE TABLE IF NOT EXISTS productos (
    id SERIAL PRIMARY KEY,
    codigo VARCHAR(255) UNIQUE NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    bodega_id INTEGER REFERENCES bodegas(id),
    sucursal_id INTEGER REFERENCES sucursales(id),
    moneda_id INTEGER REFERENCES monedas(id),
    precio DECIMAL(10,2) NOT NULL,
    materiales TEXT,
    descripcion TEXT
);
