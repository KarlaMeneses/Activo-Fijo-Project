<?php

namespace Database\Seeders;

use App\Models\Nota;
use Illuminate\Database\Seeder;

/* 
    por convension seguir el siguiente formato...
    PHP ARTISAN MAKE:SEEDER NombreSeeder
    PARA ACTUALIZAR USAR: php artisan migrate:fresh --seed
*/

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(roleSeeder::class);
        $this->call(userSeeder::class);
        $this->call(categoriaSeeder::class);
        $this->call(departamentoSeeder::class);
        $this->call(ubicacionSeeder::class);
        $this->call(notaSeeder::class);
        $this->call(facturaSeeder::class);
        $this->call(activofijoSeeder::class);
    }
}
