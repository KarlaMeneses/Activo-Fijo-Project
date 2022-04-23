# Instalacion del proyecto

-   ir a la ruta de xammp y ejecutar xammp
-   abrir cmd desde donde se guardara el proyecto
-   git clone (enlace del repositorio)
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
