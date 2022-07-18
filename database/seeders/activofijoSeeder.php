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
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Flaptop1.png?alt=media&token=a90f26d2-ea4a-41d8-8a71-e0003b0e569f',
                'nombre' => 'Laptop',
                'detalle' => 'Para uso de personal',
                'costo' => 7000,
                'v_actual' => 7000,
                'valor_residual' => 1400,
                'fecha_ingreso' => '2021-02-03',
                'proveedor' => 'Mundo de las Computadoras',
                'estado' => 'Activo',
                'id_ubicacion' => 1,
                'id_factura' => 1,
                'id_categoria' => 6,
                'responsable' => 'Moises Leonardo Mogiano Gutierrez',
                'fecha_res' => '2022-01-01',
            ],

            [
                'codigo' => 'AB-02',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Fescritorio1.jpg?alt=media&token=4f0a98ff-27cd-4fca-8bf6-85c3fa9e6f88',
                'nombre' => 'Escritorio',
                'detalle' => 'Para uso de personal',
                'costo' => 450,
                'v_actual' => 450,
                'valor_residual' => 90,
                'fecha_ingreso' => '2021-09-15',
                'proveedor' => 'Mi Kasa Muebles',
                'estado' => 'Activo',
                'id_ubicacion' => 2,
                'id_factura' => 1,
                'id_categoria' => 11,
                'responsable' => 'Takeshi Kanashiro',
                'fecha_res' => '2022-02-01',
            ],
            [
                'codigo' => 'AB-03',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Fmonitor1.jpg?alt=media&token=2e560434-20d4-4979-901e-c70fa90be3fb',
                'nombre' => 'Monitor',
                'detalle' => 'Para uso de personal',
                'costo' => 1500,
                'v_actual' => 1500,
                'valor_residual' => 300,
                'fecha_ingreso' => '2021-04-17',
                'proveedor' => 'Nippon Computers',
                'estado' => 'En mantenimiento',
                'id_ubicacion' => 3,
                'id_factura' => 1,
                'id_categoria' => 6,
                'responsable' => 'Oscar Oros',
                'fecha_res' => '2022-04-01',
            ],
            [
                'codigo' => 'AB-04',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Fimpresora1.jpg?alt=media&token=0f6e10d7-f8a7-41d4-9ef4-d58d3abb7955',
                'nombre' => 'Impresora',
                'detalle' => 'Para uso de personal',
                'costo' => 990,
                'v_actual' => 990,
                'valor_residual' => 198,
                'fecha_ingreso' => '2021-02-01',
                'proveedor' => 'Mega Sistems Comp',
                'estado' => 'No activo',
                'id_ubicacion' => 4,
                'id_factura' => 1,
                'id_categoria' => 6,
                'responsable' => 'Erick Lopez Virreira',
                'fecha_res' => '2022-02-01',
            ],
            [
                'codigo' => 'AB-05',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Foffice1.png?alt=media&token=8188f4de-fa42-451d-b04d-6c9f189790e5',
                'nombre' => 'Licencia de Software Office 2019 Profesional Plus',
                'detalle' => 'Para uso de personal',
                'costo' => 200,
                'v_actual' => 200,
                'valor_residual' => 0,
                'fecha_ingreso' => '2021-02-20',
                'proveedor' => 'AssureSoft',
                'estado' => 'Estravio',
                'id_ubicacion' => 5,
                'id_factura' => 1,
                'id_categoria' => 6,
                'responsable' => 'Karla Meneses',
                'fecha_res' => '2022-05-02',
            ],
            [
                'codigo' => 'AB-06',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/activo%2Fauto1.jpg?alt=media&token=160029a2-19dd-4b87-9abd-a451dfea04ce',
                'nombre' => 'Automovil',
                'detalle' => 'Para uso de personal',
                'costo' => 175000,
                'v_actual' => 175000,
                'valor_residual' => 35000,
                'fecha_ingreso' => '2022-02-15',
                'proveedor' => 'Gac Motor Bolivia',
                'estado' => 'No activo',
                'id_ubicacion' => 6,
                'id_factura' => 1,
                'id_categoria' => 10,
                'responsable' => 'Maria Angelica Miranda',
                'fecha_res' => '2022-01-01',
            ],

        ]);
    }
}
