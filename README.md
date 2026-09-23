# SGE - Sistema de Gestión de Biblioteca COTECNOVA



## ¿Qué hace el proyecto?

Permite manejar el catálogo de libros de la biblioteca: registrar libros, asociarlos a una editorial y a un género, controlar cuántos ejemplares hay disponibles (stock).
## Qué necesitas tener instalado

Se trabajó con Docker + Laravel Sail instalados directamente en el computador. Lo que sí necesitas:

- Docker Desktop
- WSL2 (si estás en Windows, corre todo desde ahí, no desde `/mnt/c/...` porque se pone lento)
- Git
- Composer (o si no lo tienes, más abajo explicamos cómo instalarlo con Docker directamente)

## Cómo correrlo en el navegador (paso a paso)

```bash
# 1. Clonar el repo
git clone https://github.com/manuela-aguirre/Avance-proyectoSGE.git
cd Avance-proyectoSGE

# 2. Copiar el archivo de variables de entorno
cp .env.example .env

# 3. Instalar las dependencias de PHP
composer install

# 4. Levantar los contenedores (Laravel + MySQL)
./vendor/bin/sail up -d

# 5. Generar la key de la app
./vendor/bin/sail artisan key:generate

# 6. Correr las migraciones y llenar la base con datos de prueba
./vendor/bin/sail artisan migrate:fresh --seed

# 7. Instalar dependencias de frontend (Tailwind/Vite)
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

Ya con eso se entra desde el navegador a `http://localhost`. Se puede registrar en `/register`, o entrar directo con el usuario que crea el seeder: `test@example.com`  `password` .

> Nota: si no se tiene Composer instalado localmente puedes correr este comando para instalar las dependencias usando un contenedor de Docker en vez de instalar PHP:
> ```bash
> docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs
> ```

## Estructura del proyecto

Se sigue la estructura estándar de Laravel:

- `app/` → modelos y controladores
- `database/migrations/` → las tablas de la base de datos
- `database/seeders/` → los datos de prueba
- `resources/views/` → las vistas Blade
- `routes/` → las rutas de la app
- `docs/` → el análisis del negocio, el diccionario de datos y el diagrama ER

## Las entidades que manejamos

| Entidad | Para qué sirve |
|---|---|
| User | Usuarios que se autentican en la app |
| Editorial | Las editoriales que publican los libros |
| Genero | Las categorías/géneros de los libros |
| Libro | La entidad principal, el catálogo en sí |

**Relaciones:** una Editorial tiene muchos Libros, un Genero tiene muchos Libros, y cada Libro pertenece a una sola Editorial y a un solo Genero.

## El módulo CRUD (Libros)

Es la entidad principal del proyecto:

- Rutas con `Route::resource('libros', LibroController::class)`
- Controlador `LibroController` con las 7 acciones típicas (index, create, store, edit, update, destroy, show)
- Vistas: `index`, `create` y `edit` en `resources/views/libros/`
- Usamos `with(['editorial', 'genero'])` en el index para evitar el problema de las N+1 queries
- Le agregamos dos scopes al modelo `Libro` para no repetir consultas: `scopeBuscar()` (busca por título/ISBN) y `scopeConStock()` (filtra los que tienen ejemplares disponibles)

## Datos de prueba

Los seeders cargan editoriales, géneros y libros de ejemplo para que no toque probar todo con la base vacía:

```bash
./vendor/bin/sail artisan db:seed
```

## Comandos que usamos seguido

```bash
# Resetear la base y volver a sembrar datos
./vendor/bin/sail artisan migrate:fresh --seed

# Ver el estado de las migraciones
./vendor/bin/sail artisan migrate:status

# Abrir Tinker para probar cosas en consola
./vendor/bin/sail artisan tinker

# Ver todas las rutas registradas
./vendor/bin/sail artisan route:list
```

## Documentación del entregable

- [`docs/analisis.md`](docs/analisis.md) — análisis del negocio y los procesos clave
- [`docs/diccionario.md`](docs/diccionario.md) — diccionario de datos de las tablas
- [`docs/diagrama_mer.jpeg`](docs/diagrama_mer.jpeg) — diagrama entidad-relación

## Tecnologías se usa

- Laravel + Laravel Sail
- Docker
- MySQL
- Blade
- Tailwind CSS + Vite
- Git / GitHub
