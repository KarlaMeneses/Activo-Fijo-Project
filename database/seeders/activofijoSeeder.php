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
                'nombre' => 'Laptop',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 7000,
                'fecha_ingreso' => '2022-02-03',
                'proveedor' => 'Mundo de las Computadoras',
                'v_residual' => 7000,
                'estado' => 'Activo',
                'vida_util' => "8 años",
                'id_ubicacion' => 1,
                'id_factura' => 1,
            ],

            [
                'codigo' => 'AB-02',
                'nombre' => 'Escritorio',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 180,
                'fecha_ingreso' => '2022-09-15',
                'proveedor' => 'Mi Kasa Muebles',
                'v_residual' => 180,
                'estado' => 'Activo',
                'vida_util' => "5 años",
                'id_ubicacion' => 2,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-03',
                'nombre' => 'Monitor',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 5000,
                'fecha_ingreso' => '2022-04-17',
                'proveedor' => 'Nippon Computers',
                'v_residual' => 5000,
                'estado' => 'En mantenimiento',
                'vida_util' => "7 años",
                'id_ubicacion' => 3,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-04',
                'nombre' => 'Impresora',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 1530.00,
                'fecha_ingreso' => '2022-02-01',
                'proveedor' => 'Mega Sistems Comp',
                'v_residual' => 1530.00,
                'estado' => 'No activo',
                'vida_util' => "3 años",
                'id_ubicacion' => 4,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-05',
                'nombre' => 'Licencia de Software Office 2019 Profesional Plus',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 138.80,
                'fecha_ingreso' => '2022-02-20',
                'proveedor' => 'AssureSoft',
                'v_residual' => 138.80,
                'estado' => 'Estravio',
                'vida_util' => "1 año",
                'id_ubicacion' => 5,
                'id_factura' => 1,
            ],
            [
                'codigo' => 'AB-06',
                'nombre' => 'Automovil',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 118300.00,
                'fecha_ingreso' => '2022-02-15',
                'proveedor' => 'Gac Motor Bolivia',
                'v_residual' => 118300.00,
                'estado' => 'No activo',
                'vida_util' => "15 años",
                'id_ubicacion' => 6,
                'id_factura' => 1,
            ],

        ]);
    }
}
