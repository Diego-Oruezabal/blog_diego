

## Blog Personal con Laravel

Repositorio oficial del **Blog Personal de Diego**, desarrollado con el framework [Laravel](https://laravel.com/) 10. Este proyecto permite la publicación de artículos, organización por categorías y etiquetas, y la gestión de usuarios/autores mediante un panel básico de administración.


## 🚀 Funcionalidades principales

- CRUD de publicaciones
- Sistema de autenticación de usuarios
- Etiquetas y categorías con tablas pivote
- Carga de archivos multimedia por post
- Relación autor ↔ publicaciones
- Slugs amigables para URLs
- Roles de usuario (admin, autor)
- Base de datos MySQL estructurada y normalizada

## ⚙️ Instalación del proyecto

```bash
# Clona el repositorio
git clone https://github.com/Diego-Oruezabal/blog_diego.git

cd blog_diego

# Instala las dependencias de Laravel
composer install

# Copia el archivo de entorno
cp .env.example .env

# Genera la clave de la app
php artisan key:generate

# Configura la base de datos en tu archivo .env

# Ejecuta las migraciones
php artisan migrate

# (Opcional) Pobla con datos de prueba
php artisan db:seed

# Inicia el servidor
php artisan serve

```

## 🧠 Estructura de base de datos
Este blog utiliza las siguientes tablas principales:

users — Autores y administradores

posts — Entradas de blog

categories — Clasificación de contenidos

tags — Etiquetas temáticas

media — Archivos relacionados

post_categories — Relación muchos a muchos entre posts y categorías

post_tags — Relación muchos a muchos entre posts y etiquetas

Relaciones implementadas con Eloquent (hasMany, belongsTo, belongsToMany).

## 👤 Autor
Diego Oruezábal
GitHub: @Diego-Oruezabal
