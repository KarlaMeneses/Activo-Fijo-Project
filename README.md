# Instalacion del proyecto

-   ir a la ruta de xammp y ejecutar xammp
-   Crear base de datos en phpadmin, o posgretsql
-   abrir cmd desde donde se guardara el proyecto
-   git clone https://github.com/KarlaMeneses/Activo-Fijo-Project.git
-   composer update
-   composer install
-   npm install
-   npm run dev
-   duplicar el archivo .env example
-   cambiar nombre a .env
-   php artisan key:generate
-   php artisan migrate:fresh --seed
-   php artisan serve
    http://127.0.0.1:8000


# laravel ejemplos

-   php artisan make:migration create_Users_table
-   php artisan make:model User
-   php artisan make:controller UserController
-   php artisan make:seeder UsersSeeder

# git

Bajar cambios primero (para que tus cambios se mantenga sigue estos paso)

-   git add .
-   git commit -m "soy yo otraves"
-   git pull origin main

Subir sus cambios al proyecto(para subir tus cambios sigue estos pasos)

-   git add .
-   git commit -m "soy yo"
-   git push origin main

# Crear proyecto

-   Crear Proyecto Laravel de cero
    ----- Instalar Laravel -----------------
-   composer global require laravel/installer
    -------Crear Proyecto --------------
-   laravel new nuevo_proy
    ------Instalar LOGIN de LARAVEL------------
-   composer require laravel/ui
-   php artisan ui bootstrap --auth
-   npm install
-   npm run dev
-   php artisan adminlte:install

-   php artisan ui bootstrap --auth
-   composer require maatwebsite/excel
-   php artisan storage:link

-   alt+shif+a
    comentar

# error corregido de git

-   $ rm .git/refs/remotes/origin/main
-   $ git fetch
-   $ git pull
