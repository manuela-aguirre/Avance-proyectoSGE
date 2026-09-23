# SGE - Sistema de Gestión de Biblioteca COTECNOVA

Proyecto Laravel para la gestión del catálogo bibliográfico y la administración básica de una biblioteca universitaria. El sistema permite gestionar libros, editoriales, géneros y usuarios autenticados, con un módulo CRUD para la entidad principal y una base de datos estructurada para soportar procesos de catalogación y consulta.

## 1. Descripción del proyecto

La aplicación fue desarrollada como entregable del primer. Su objetivo principal es digitalizar y organizar el proceso de gestión del inventario bibliográfico, facilitando la administración del catálogo, la relación entre libros y sus categorías, y la operación básica de una biblioteca institucional.

## 2. Requisitos del sistema

- Docker Desktop
- WSL2 (si se trabaja desde Windows)
- Composer
- Laravel Sail
- Git

## 3. Instalación y configuración

```bash
# Clonar el repositorio
git clone <URL-del-repositorio>
cd sge

# Instalar dependencias de PHP
composer install

# Copiar variables de entorno
cp .env.example .env

# Iniciar contenedores con Sail
./vendor/bin/sail up -d

# Generar la clave de la aplicación
./vendor/bin/sail artisan key:generate

# Ejecutar migraciones y sembrar datos de prueba
./vendor/bin/sail artisan migrate:fresh --seed
```

Luego se puede acceder a la aplicación desde el navegador y crear una cuenta en /register. Si se desea entrar rápidamente, el seeder crea un usuario de prueba con la cuenta test@example.com.

## 4. Estructura del proyecto

El proyecto sigue el patrón MVC de Laravel y está organizado en las carpetas estándar del framework:

- app/ — modelos, controladores, componentes y lógica de negocio
- database/migrations/ — migraciones de la base de datos
- database/seeders/ — sembrado inicial de datos de prueba
- resources/views/ — vistas Blade
- routes/ — definiciones de rutas
- docs/ — análisis de negocio, diccionario de datos y diagramas

## 5. Entidades principales

| Entidad | Descripción |
|---|---|
| User | Usuarios de la aplicación y autenticación Laravel |
| Editorial | Casa editorial que publica los libros |
| Genero | Categoría o temática del libro |
| Libro | Entidad principal del sistema, representa el catálogo bibliográfico |

## 6. Relaciones del negocio

- Editorial tiene muchos Libro.
- Genero tiene muchos Libro.
- Cada Libro pertenece a una Editorial y a un Genero.

## 7. Módulo CRUD de libros

El sistema cuenta con un módulo completo para la administración del catálogo de libros.

### Rutas

```php
Route::resource('libros', LibroController::class);
```

### Controlador

El controlador principal es LibroController, y maneja las operaciones de:
- listado index
- creación create
- almacenamiento store
- edición edit
- actualización update
- eliminación destroy

### Vistas Blade

- resources/views/libros/index.blade.php
- resources/views/libros/create.blade.php
- resources/views/libros/edit.blade.php

### Eager loading

Se usa with(['editorial', 'genero']) para evitar el problema N+1 al listar libros y cargar sus relaciones.

### Scopes reutilizables

En el modelo Libro se definen scopes para reutilizar consultas:
- scopeBuscar($query, $texto)
- scopeConStock($query)

## 8. Sembrado de datos de prueba

Los seeders crean registros iniciales para apoyar la validación del negocio y del flujo CRUD.

```bash
./vendor/bin/sail artisan db:seed
```

## 9. Comandos útiles

```bash
# Ejecutar migraciones desde cero
./vendor/bin/sail artisan migrate:fresh --seed

# Ver estado de migraciones
./vendor/bin/sail artisan migrate:status

# Abrir el shell de Laravel
./vendor/bin/sail artisan tinker

# Revisar errores de la aplicación
./vendor/bin/sail artisan route:list
```

## 10. Documentación del entregable

- [docs/analisis.md](docs/analisis.md) — análisis del negocio y procesos clave
- [docs/diccionario.md](docs/diccionario.md) — diccionario de datos
- [docs/diagrama_mer.png](docs/diagrama_mer.png) — diagrama entidad-relación

## 11. Tecnologías utilizadas

- Laravel
- Laravel Sail
- Docker
- MySQL
- Blade
- Bootstrap/Tailwind
- Git

## 12. Resultado esperado

El proyecto permite representar una solución de gestión básica para una biblioteca institucional, con una estructura ERP-like orientada a procesos de catalogación, gestión de inventario y consulta del material bibliográfico.