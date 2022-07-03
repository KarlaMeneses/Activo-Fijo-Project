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
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Fc823dc21-282b-4c55-9a2c-0bccaa45f169.jpg?alt=media&token=c96bb004-7c1a-4bc6-b55a-5c721fd43e28',
                'nombre' => 'Laptop',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 7000,
                'fecha_ingreso' => '2021-02-03',
                'proveedor' => 'Mundo de las Computadoras',
                'estado' => 'Activo',
                'id_ubicacion' => 1,
                'id_factura' => 1,
                'id_depreciacion' => 6,
            ],

            [
                'codigo' => 'AB-02',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Factivo-fijo-3.jpg?alt=media&token=e60e4fe5-353a-4faf-ad05-461f5bb9061b',
                'nombre' => 'Escritorio',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 180,
                'fecha_ingreso' => '2021-09-15',
                'proveedor' => 'Mi Kasa Muebles',
                'estado' => 'Activo',
                'id_ubicacion' => 2,
                'id_factura' => 1,
                'id_depreciacion' => 11,
            ],
            [
                'codigo' => 'AB-03',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Factivo-fijo-3.jpg?alt=media&token=e60e4fe5-353a-4faf-ad05-461f5bb9061b',
                'nombre' => 'Monitor',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 5000,
                'fecha_ingreso' => '2021-04-17',
                'proveedor' => 'Nippon Computers',
                'estado' => 'En mantenimiento',
                'id_ubicacion' => 3,
                'id_factura' => 1,
                'id_depreciacion' => 6,
            ],
            [
                'codigo' => 'AB-04',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Factivo-fijo-3.jpg?alt=media&token=e60e4fe5-353a-4faf-ad05-461f5bb9061b',
                'nombre' => 'Impresora',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 1530.00,
                'fecha_ingreso' => '2021-02-01',
                'proveedor' => 'Mega Sistems Comp',
                'estado' => 'No activo',
                'id_ubicacion' => 4,
                'id_factura' => 1,
                'id_depreciacion' => 6,
            ],
            [
                'codigo' => 'AB-05',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Factivo-fijo-3.jpg?alt=media&token=e60e4fe5-353a-4faf-ad05-461f5bb9061b',
                'nombre' => 'Licencia de Software Office 2019 Profesional Plus',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 138.80,
                'fecha_ingreso' => '2021-02-20',
                'proveedor' => 'AssureSoft',
                'estado' => 'Estravio',
                'id_ubicacion' => 5,
                'id_factura' => 1,
                'id_depreciacion' => 6,
            ],
            [
                'codigo' => 'AB-06',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Factivo-fijo-3.jpg?alt=media&token=e60e4fe5-353a-4faf-ad05-461f5bb9061b',
                'nombre' => 'Automovil',
                'detalle' => 'Para uso de personal',
                'tipo' => 'Tangible',
                'costo' => 118300.00,
                'fecha_ingreso' => '2022-02-15',
                'proveedor' => 'Gac Motor Bolivia',
                'estado' => 'No activo',
                'id_ubicacion' => 6,
                'id_factura' => 1,
                'id_depreciacion' => 10,
            ],

        ]);
    }
}
