<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class notaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notas')->insert(
            [   //nota compra
                [
                    'tipo' => 'compra',
                    'proveedor' => 'Mundo de las computadoras',
                    'direccion' => 'Comercial chiriguano p/4 caseta # 123',
                    'telefono' => 6235093,
                    'totales' => 6000,
                    'fecha_entrega' => '2022-02-20',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Nota de compra 2---------------------------------------------------------------------
                [
                    'tipo' => 'compra',
                    'proveedor' => 'Casa bonita muebles',
                    'direccion' => 'Av. Brasil #56 entre 1er y 2do anillo, Santa Cruz',
                    'telefono' => 750485,
                    'totales' => 3080,
                    'fecha_entrega' => '2022-03-26',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Nota de compra 3---------------------------------------------------------------------
                [
                    'tipo' => 'compra',
                    'proveedor' => 'Walter arte en muebles',
                    'direccion' => '4to anillo entre Av. Paragua #591',
                    'telefono' => 6724403,
                    'totales' => 2770,
                    'fecha_entrega' => '2022-03-28',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Nota de compra 4---------------------------------------------------------------------
                [
                    'tipo' => 'compra',
                    'proveedor' => 'AssureSoft.',
                    'direccion' => 'Av. Las Ramblas #100 ITC Tower A Suite 202',
                    'telefono' =>  3435155,
                    'totales' => 11466.8,
                    'fecha_entrega' => '2021-01-02',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Nota de compra 5---------------------------------------------------------------------
                [
                    'tipo' => 'compra',
                    'proveedor' => 'Lectra',
                    'direccion' => 'Carrera 49C # 86-20, Bogotá - Cundinamarca, Colombia',
                    'telefono' => 7071114,
                    'totales' => 4000,
                    'fecha_entrega' => '2022-04-05',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                
            ]
        );

        DB::table('notas')->insert(
            [   //  nota venta
                [
                    'tipo' => 'venta',
                    'adquirente' => 'Juan Perez',
                    'telefono' => 76320594,
                    'fecha_venta' => '2022-02-20',
                    'encargado' => 'Esteban Flores',
                    'cargo' => 'auxiliar de ventas',
                    'totales' => 450,
                ],

            ]
        );
    }
}
