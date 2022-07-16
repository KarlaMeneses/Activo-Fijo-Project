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
                'tiempo_vida' => '5 años',
                'valor' => 150,
                'estado' => 'Aprobado',
                'id_activo' => 1,
                'created_at' => "2022-06-28 01:29:28"
            ],
            [
                'tiempo_vida' => '6 años',
                'valor' => 600,
                'estado' => 'Aprobado',
                'id_activo' => 2, 
                'created_at' => "2022-06-28 01:29:28"
            ],
            [
                'tiempo_vida' => '3 años',
                'valor' => 200,
                'estado' => 'Aprobado',
                'id_activo' => 3,
                'created_at' => "2022-06-28 01:29:28"
            ],
            [
                'tiempo_vida' => '9 meses',
                'valor' => 200,
                'estado' => 'Aprobado',
                'id_activo' => 4,
                'created_at' => "2022-06-28 01:29:28"
            ],
            [
                'tiempo_vida' => '2 años',
                'valor' => 800,
                'estado' => 'Aprobado',
                'id_activo' => 5,
                'created_at' => "2022-06-28 01:29:28"
            ],
            
        ]);

    }
}
