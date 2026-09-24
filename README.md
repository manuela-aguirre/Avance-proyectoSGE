# SGE - Sistema de Gestión de Biblioteca COTECNOVA

Aplicación web en Laravel para manejar el catálogo de la biblioteca de COTECNOVA: registrar libros, asociarlos a una editorial y a un género, y controlar cuántos ejemplares hay disponibles (stock). Es el prototipo del proyecto integrador **"Sistema de Gestión de Préstamos para la Biblioteca COTECNOVA"** (Tecnología en Sistemas de Información).

**Integrantes:** Alejandra Díaz Velásquez y Manuela Aguirre Toro

## Qué necesitas tener instalado

- Docker Desktop
- WSL2 (si estás en Windows, corre todo desde ahí y no desde `/mnt/c/...`, porque se pone lento)
- Git
- Composer (si no lo tienes, mira la nota de abajo)

## Cómo correrlo

```bash
# 1. Clonar el repositorio
git clone https://github.com/manuela-aguirre/Avance-proyectoSGE.git
cd Avance-proyectoSGE

# 2. Copiar las variables de entorno
cp .env.example .env

# 3. Instalar las dependencias de PHP
composer install

# 4. Levantar los contenedores (Laravel + MySQL)
./vendor/bin/sail up -d

# 5. Generar la key de la app
./vendor/bin/sail artisan key:generate

# 6. Crear las tablas y cargar los datos de prueba
./vendor/bin/sail artisan migrate:fresh --seed

# 7. Instalar y compilar el frontend (Tailwind y Vite)
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

Con eso ya se entra desde el navegador a `http://localhost`. Se puede crear una cuenta en `/register` o entrar con el usuario que crea el seeder: `test@example.com` / `password`.

> Si el puerto 80 está ocupado, cambia `APP_PORT` en el `.env` (por ejemplo `APP_PORT=8080`) y reinicia con `./vendor/bin/sail down` y `./vendor/bin/sail up -d`.
>
> Si no tienes Composer, el paso 3 se puede hacer con Docker:
> ```bash
> docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs
> ```

## Entidades

| Entidad | Para qué sirve |
|---|---|
| `User` | Usuarios que se autentican en la app |
| `Editorial` | Editoriales que publican los libros |
| `Genero` | Categorías de los libros |
| `Libro` | Entidad principal: el catálogo |

Una editorial tiene muchos libros, un género tiene muchos libros, y cada libro pertenece a una sola editorial y a un solo género. El modelo completo (11 tablas, con autores, ejemplares, ubicaciones y préstamos) está en el diagrama de la carpeta `docs/`.

## Módulo de libros

- `Route::resource('libros', LibroController::class)` con las 7 acciones del CRUD
- Vistas `index`, `create` y `edit` en `resources/views/libros/`
- `with(['editorial', 'genero'])` en el listado para evitar el problema N+1
- Dos scopes en el modelo `Libro`: `buscar()` (por título o ISBN) y `conStock()`

## Comandos que usamos seguido

```bash
./vendor/bin/sail artisan migrate:status   # estado de las migraciones
./vendor/bin/sail artisan tinker           # probar consultas y relaciones
./vendor/bin/sail artisan route:list       # rutas registradas
./vendor/bin/sail down                     # apagar el entorno
```

## Documentación

| Archivo | Contenido |
|---|---|
| [`docs/analisis.md`](docs/analisis.md) | Análisis del negocio y documentación completa del proyecto |
| [`docs/diccionario.md`](docs/diccionario.md) | Diccionario de datos |
| [`docs/diagrama_mer.jpeg`](docs/diagrama_mer.jpg) | Diagrama entidad-relación |

## Tecnologías

Laravel · Laravel Sail · Docker · MySQL · Blade · Tailwind CSS · Vite · Git / GitHub
