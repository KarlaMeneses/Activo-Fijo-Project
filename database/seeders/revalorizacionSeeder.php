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
            /*
            [
                'tiempo_vida' => '5 años',
                'valor' => 150,
                'id_activo' => 1,
            ],
            [
                'tiempo_vida' => '6 años',
                'valor' => 600,
                'id_activo' => 2,
            ],
            [
                'tiempo_vida' => '3 años',
                'valor' => 200,
                'id_activo' => 3,
            ],
            [
                'tiempo_vida' => '9 meses',
                'valor' => 200,
                'id_activo' => 4,
            ],
            [
                'tiempo_vida' => '2 años',
                'valor' => 800,
                'id_activo' => 5,
            ],
            */
        ]);

    }
}
