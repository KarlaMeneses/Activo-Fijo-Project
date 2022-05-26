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
                'detalle' => 'Laptop',
                'costo' => 7000,
                'fecha_ingreso' => '2022-02-03',
                'proveedor' => 'Mundo de las Computadoras',
                'estado' => 'bueno',
                'id_ubicacion' => 1,
                'id_factura' => 1,
            ],

            [
                'codigo' => 'AB-02',
                'detalle' => 'Escritorio',
                'costo' => 180,
                'fecha_ingreso' => '2022-09-15',
                'proveedor' => 'Mi Kasa Muebles',
                'estado' => 'regular',
                'id_ubicacion' => 2,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-03',
                'detalle' => 'Monitor',
                'costo' => 5000,
                'fecha_ingreso' => '2022-04-17',
                'proveedor' => 'Nippon Computers',
                'estado' => 'bueno',
                'id_ubicacion' => 3,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-04',
                'detalle' => 'Impresora',
                'costo' => 1530.00,
                'fecha_ingreso' => '2022-02-01',
                'proveedor' => 'Mega Sistems Comp',
                'estado' => 'bueno',
                'id_ubicacion' => 4,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-05',
                'detalle' => 'Licencia de Software Office 2019 Profesional Plus',
                'costo' => 138.80,
                'fecha_ingreso' => '2022-02-20',
                'proveedor' => 'AssureSoft',
                'estado' => 'bueno',
                'id_ubicacion' => 5,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-06',
                'detalle' => 'Automovil',
                'costo' => 118300.00,
                'fecha_ingreso' => '2022-02-15',
                'proveedor' => 'Gac Motor Bolivia',
                'estado' => 'bueno',
                'id_ubicacion' => 6,
                'id_factura' => 1,
            ],

        ]);
    }
}
