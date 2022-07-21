<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class revalorizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('revalorizacion')->insert([
            
            [
                'tiempo_vida' => '5',
                'valor' => 500,
                'estado' => 'En proceso',
                'costo_revaluo' => 120,
                'id_activo' => 1,
                'created_at' => "2022-06-28 01:29:28"
            ],
            [
                'tiempo_vida' => '6',
                'valor' => 600,
                'estado' => 'En proceso',
                'costo_revaluo' => 180,
                'id_activo' => 2, 
                'created_at' => "2022-06-28 01:29:28"
            ],
            [
                'tiempo_vida' => '3',
                'valor' => 200,
                'estado' => 'En proceso',
                'costo_revaluo' => 120,
                'id_activo' => 3,
                'created_at' => "2022-06-28 01:29:28"
            ],
            [
                'tiempo_vida' => '9',
                'valor' => 200,
                'estado' => 'En proceso',
                'costo_revaluo' => 150,
                'id_activo' => 4,
                'created_at' => "2022-06-28 01:29:28"
            ],
            [
                'tiempo_vida' => '2',
                'valor' => 800,
                'estado' => 'En proceso',
                'costo_revaluo' => 110,
                'id_activo' => 5,
                'created_at' => "2022-06-28 01:29:28"
            ],
            
        ]);

    }
}
