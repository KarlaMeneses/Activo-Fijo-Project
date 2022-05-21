<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class activofijoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
        DB::table('activosfijo')->insert([
            [
                'codigo' => 'AB-01',
                'detalle' => 'para RRHH',
                'fecha' => '2022-02-03',
                'estado' => 'espera',
            ],

            [
                'codigo' => 'AB-02',
                'detalle' => 'para RRHH',
                'fecha' => '2022-02-12',
                'estado' => 'espera',
            ],
            [
                'codigo' => 'AB-03',
                'detalle' => 'para RRHH',
                'fecha' => '2022-02-14',
                'estado' => 'espera',
            ],
            [
                'codigo' => 'AB-04',
                'detalle' => 'para RRHH',
                'fecha' => '2022-02-20',
                'estado' => 'espera',
            ],
            [
                'codigo' => 'AB-05',
                'detalle' => 'para RRHH',
                'fecha' => '2022-02-27',
                'estado' => 'espera',
            ],
            [
                'codigo' => 'AB-06',
                'detalle' => 'para RRHH',
                'fecha' => '2022-02-10',
                'estado' => 'espera',
            ],

        ]);
    }
}
