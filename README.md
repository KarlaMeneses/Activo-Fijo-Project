# Instalacion del proyecto

-   ir a la ruta de xammp y ejecutar xammp
-   Crear base de datos en phpadmin, o posgretsql
-   abrir cmd desde donde se guardara el proyecto
-   git clone https://github.com/KarlaMeneses/Activo-Fijo-Project.git
-   composer update
-   composer install
-   duplicar el archivo .env example
-   cambiar nombre a .env
-   php artisan key:generate
-   php artisan migrate:fresh --seed
-   php artisan ui bootstrap --auth
-   composer require maatwebsite/excel
-   php artisan storage:link
-   npm install
-   npm run dev
-   php artisan serve

http://127.0.0.1:8000

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

//Crear Proyecto Laravel
----- Instalar Laravel -----------------

-   composer global require laravel/installer
    -------Crear Proyecto --------------
    laravel new nuevo_proy

------Instalar LOGIN de LARAVEL------------

-   composer require laravel/ui
-   php artisan ui bootstrap --auth
-   npm install
-   npm run dev

-   php artisan adminlte:install

-   alt+shif+a
    comentar
