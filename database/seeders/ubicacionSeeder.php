<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ubicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicaciones')->insert([
            [
                'edificio' => 'Principal',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 1,
            ],
            [
                'edificio' => 'Principal',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 2,
            ]   
        ]);
    }
}
