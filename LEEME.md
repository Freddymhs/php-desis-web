# Sistema de Registro de Productos

## 🚀 Instalación y Ejecución Rápida

### Requisitos Previos
- **PHP**: 8.1.2
- **PostgreSQL**: 16.9
- **Composer**
- **Node.js y NPM**

### 1. Clonar el Repositorio
```bash
git clone https://github.com/Freddymhs/php-desis-web
cd php-desis-web
```

### 2. Configurar Base de Datos PostgreSQL

#### Crear base de datos:
- Crear una base de datos llamada `registro_productos` en pgAdmin
- Ejecutar el archivo `database/SQL.sql` dentro de pgAdmin para crear las tablas

### 3. Configurar Variables de Entorno

Crear archivo `.env` en la raíz del proyecto con tus datos de acceso a tu BD:

```env
DB_HOST=localhost
DB_NAME=registro_productos
DB_USER=postgres
DB_PASS=postgres
DB_PORT=5432
```

> **Importante**: Adapta estos valores según tu configuración local de PostgreSQL.

### 4. Instalar Dependencias y Poblar Datos

```bash
# Instalar dependencias PHP
composer install

# Instalar dependencias Node.js
npm install

# Poblar base de datos con datos iniciales
composer seed

```
> **Importante**: en caso de no tener composer podria ejecutar el seed directo con php

### 5. Ejecutar la Aplicación

```bash
npm run dev
```

La aplicación estará disponible en la URL que se muestre en consola gracias a "browser-sync".

---

## 📋 Descripción del Proyecto

Sistema web para el registro de productos con validaciones en tiempo real y carga dinámica de datos con JavaScript. Desarrollado siguiendo los requerimientos específicos de uso de tecnologías nativas sin frameworks.

## 🛠️ Tecnologías Utilizadas

- **Frontend**: HTML5, CSS3, JavaScript (nativo)
- **Backend**: PHP 8.0+ (sin frameworks)
- **Base de Datos**: PostgreSQL 12+
- **Gestión de Dependencias**: Composer, NPM
- **Comunicación**: AJAX para peticiones asíncronas
- **Configuración**: Variables de entorno (.env)

## 📁 Estructura del Proyecto

```
sistema-registro-productos/
├── composer.json              # Dependencias PHP y scripts
├── composer.lock              # Versiones bloqueadas de dependencias
├── package.json               # Dependencias Node.js
├── package-lock.json          # Versiones bloqueadas NPM
├── index.php                  # Página principal (HTML + JavaScript)
├── css/
│   └── styles.css            # Estilos CSS del proyecto
├── js/
│   └── main.js               # JavaScript principal y validaciones
├── database/
│   ├── config.php            # Configuración de conexión a BD
│   ├── SQL.sql               # Estructura de la base de datos
│   └── seed.php              # Datos iniciales (seeders)
├── php/
│   ├── loaderDotEnv.php      # Cargador de variables de entorno
│   ├── controllers/
│   │   └── index.php         # Controlador principal con validaciones
│   ├── services/
│   │   ├── bodega.php        # Servicio para gestión de bodegas
│   │   ├── sucursal.php      # Servicio para gestión de sucursales
│   │   ├── moneda.php        # Servicio para gestión de monedas
│   │   └── producto.php      # Servicio para gestión de productos
│   └── helpers/
│       └── helper.php        # Funciones auxiliares
└── .env                      # Variables de entorno (crear manualmente)
```

## 🏗️ Arquitectura del Proyecto

### Flujo de Datos
1. **Frontend (index.php)**: Archivo principal con HTML y JavaScript
2. **JavaScript (js/main.js)**: Maneja validaciones del lado cliente
3. **Controlador (php/controllers/index.php)**: Recibe peticiones, valida datos y coordina servicios
4. **Servicios (php/services/)**: Archivos especializados en acceder a la BD
5. **Base de Datos**: PostgreSQL con estructura definida en `database/SQL.sql`

### Configuración de Entorno
- **loaderDotEnv.php**: Carga automática de variables de entorno
- **database/config.php**: Configuración de conexión usando variables .env

## ✨ Funcionalidades

### Validaciones Implementadas

#### Frontend (JavaScript)
- Verificación y validación del formulario en tiempo real
- Mensajes de alerta en caso de error
- Carga dinámica de sucursales según bodega seleccionada

#### Backend (PHP)
- Validación de datos en controlador antes de ejecutar en BD
- Verificación de unicidad de código de producto
- Manejo de errores y validaciones varias solicitadas

### Validacion Genearl del formulario para back y front
- **Código de Producto**: Alfanumérico, 5-15 caracteres, único
- **Nombre**: 2-50 caracteres, obligatorio
- **Bodega**: Selección de lista cargada dinámicamente
- **Sucursal**: Dependiente de bodega seleccionada
- **Moneda**: Selección de lista predefinida
- **Precio**: Número positivo con hasta 2 decimales
- **Materiales**: Mínimo 2 selecciones (checkboxes)
- **Descripción**: 10-1000 caracteres

## 🔧 Comandos Disponibles

### Composer Scripts
```bash
# Ejecutar seeder de base de datos
composer seed

# Instalar dependencias
composer install
```

### NPM Scripts
```bash
# Iniciar servidor de desarrollo
npm run dev

# Instalar dependencias
npm install
```

## 📖 Uso del Sistema

1. **Configurar entorno**: Crear archivo `.env` con credenciales de BD
2. **Instalar dependencias**: `composer install` y `npm install`
3. **Preparar BD**: Ejecutar `SQL.sql` y luego `composer seed`
4. **Iniciar servidor**: `npm run dev`
5. **Acceder**: Abrir la URL mostrada en consola
6. **Usar formulario**: Completar campos y validar en tiempo real

## 🎯 Características Destacadas

- **Sin Frameworks**: Desarrollado con tecnologias nativas según requerimientos
- **Validaciones Duales**: Frontend y Backend
- **Carga Dinámica**: Sucursales se actualizan según bodega seleccionada
- **Arquitectura Limpia**: Separación clara entre controladores, servicios y vista
- **Variables de Entorno**: Configuración segura de credenciales

