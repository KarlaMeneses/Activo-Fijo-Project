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
                'costo' => 100,
                'fecha_ingreso' => '2022-02-03',
                'proveedor' => 'alguien',
                'estado' => 'bueno',
                'id_ubicacion' => 1,
                'id_factura' => 1,
            ],

            [
                'codigo' => 'AB-02',
                'detalle' => 'para RRHH',
                'costo' => 200,
                'fecha_ingreso' => '2022-09-15',
                'proveedor' => 'alguien',
                'estado' => 'regular',
                'id_ubicacion' => 2,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-03',
                'detalle' => 'para RRHH',
                'costo' => 250,
                'fecha_ingreso' => '2022-04-17',
                'proveedor' => 'alguien',
                'estado' => 'bueno',
                'id_ubicacion' => 3,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-04',
                'detalle' => 'para RRHH',
                'costo' => 100,
                'fecha_ingreso' => '2022-02-01',
                'proveedor' => 'alguien',
                'estado' => 'bueno',
                'id_ubicacion' => 4,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-05',
                'detalle' => 'para RRHH',
                'costo' => 100,
                'fecha_ingreso' => '2022-02-20',
                'proveedor' => 'alguien',
                'estado' => 'malo',
                'id_ubicacion' => 5,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-06',
                'detalle' => 'para RRHH',
                'costo' => 100,
                'fecha_ingreso' => '2022-02-15',
                'proveedor' => 'alguien',
                'estado' => 'regular',
                'id_ubicacion' => 6,
                'id_factura' => 1,
            ],

        ]);
    }
}
