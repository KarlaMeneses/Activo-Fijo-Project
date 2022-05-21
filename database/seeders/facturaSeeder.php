<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class facturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facturas')->insert(
            [   //Factura compra
                [
                    'tipo' => 'compra',
                    'vendedor' => 'Nippon Computers',
                    'nit' => '12922186',
                    'idcomprador' => '1',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'direccion' => 'Comercial chiriguano p/4 caseta # 123',
                    'telefono' => 33517662,
                    'email' => 'nipponcomputers@gmail.com',
                    'formapago' => 'Cheque',
                    'totalneto' => 11000.00,
                    'fechaemitida' => '2022-02-20',
                    'iva' => 1430.00,
                    'totaliva' => 12430.00,
                    'referencia' => 'Productos nuevos',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura compra 2
                [
                    'tipo' => 'compra',
                    'vendedor' => 'Mi Kasa Muebles',
                    'nit' => '5892486',
                    'idcomprador' => '2',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'direccion' => '4to anillo entre Av. Paragua #591',
                    'telefono' => 61552473,
                    'email' => 'mikasamuebles@gmail.com',
                    'formapago' => 'Efectivo',
                    'totalneto' => 2646.00,
                    'fechaemitida' => '2022-04-16',
                    'iva' => 343.98,
                    'totaliva' => 2989.98,
                    'referencia' => 'Productos de Buena Calidad',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura compra 3---------------------------------------------------------------------
                [
                    'tipo' => 'compra',
                    'vendedor' => 'Muebles Cabrera',
                    'nit' => '981892',
                    'idcomprador' => '3',
                    'ciudad' => 'Cochabamba',
                    'direccion' => 'Av. América 955',
                    'telefono' => 62635668,
                    'email' => 'nathalyrios@gmail.com',
                    'formapago' => 'Transferencia Bancaria',
                    'totalneto' => 1764.00,
                    'fechaemitida' => '2022-04-28',
                    'iva' => 229.32,
                    'totaliva' => 1993.32,
                    'referencia' => 'Producto elaborado y nuevo',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura Compra 4---------------------------------------------------------------------
                [
                    'tipo' => 'compra',
                    'vendedor' => 'Gac Motor Bolivia',
                    'nit' => '5897103',
                    'idcomprador' => '1',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'direccion' => 'Av. Doble vía la Guaria, casi 4to anillo',
                    'telefono' => 72168231,
                    'email' => 'gacmotor@gmail.com',
                    'formapago' => 'Cheque',
                    'totalneto' => 118300.00,
                    'fechaemitida' => '2022-03-11',
                    'iva' => 15379.00,
                    'totaliva' => 133679.00,
                    'referencia' => 'Nuevo',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura compra 5---------------------------------------------------------------------
                [
                    'tipo' => 'compra',
                    'vendedor' => 'Mega Sistems Comp',
                    'nit' => '981892',
                    'idcomprador' => '3',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'direccion' => 'Comercial Chiriguano, Av. Roque Aguilera',
                    'telefono' =>  77658209,
                    'email' => 'megasistems@gmail.com',
                    'formapago' => 'efectivo',
                    'totalneto' => 7497.00,
                    'fechaemitida' => '2022-01-18',
                    'iva' => 974.61,
                    'totaliva' => 8471.61,
                    'referencia' => 'Producto nuevo',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
            ]
        );

        DB::table('facturas')->insert(
            [   //Factura venta
                [
                    'tipo' => 'venta',
                    'comprador' => 'Juanita',
                    'nit' => '5892486',
                    'idvendedor' => '2',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'telefono' => 61552473,
                    'formapago' => 'Efectivo',
                    'totalneto' => 1929.00,
                    'fechaemitida' => '2022-04-16',
                    'iva' => 250.77,
                    'totaliva' => 2179.77,
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura compra 2
                [
                    'tipo' => 'venta',
                    'comprador' => 'Mi Kasa Muebles',
                    'nit' => '5892486',
                    'idvendedor' => '1',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'telefono' => 61552473,
                    'formapago' => 'Efectivo',
                    'totalneto' => 1929.00,
                    'fechaemitida' => '2022-04-16',
                    'iva' => 250.77,
                    'totaliva' => 2179.77,
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura compra 3---------------------------------------------------------------------
                [
                    'tipo' => 'venta',
                    'comprador' => 'Mi Kasa Muebles',
                    'nit' => '5892486',
                    'idvendedor' => '3',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'telefono' => 61552473,
                    'formapago' => 'Efectivo',
                    'totalneto' => 1929.00,
                    'fechaemitida' => '2022-04-16',
                    'iva' => 250.77,
                    'totaliva' => 2179.77,
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura Compra 4---------------------------------------------------------------------
                [
                    'tipo' => 'venta',
                    'comprador' => 'Mi Kasa Muebles',
                    'nit' => '5892486',
                    'idvendedor' => '2',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'telefono' => 61552473,
                    'formapago' => 'Efectivo',
                    'totalneto' => 1929.00,
                    'fechaemitida' => '2022-04-16',
                    'iva' => 250.77,
                    'totaliva' => 2179.77,
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura compra 5---------------------------------------------------------------------
                [
                    'tipo' => 'venta',
                    'comprador' => 'Mi Kasa Muebles',
                    'nit' => '5892486',
                    'idvendedor' => '3',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'telefono' => 61552473,
                    'formapago' => 'Efectivo',
                    'totalneto' => 1929.00,
                    'fechaemitida' => '2022-04-16',
                    'iva' => 250.77,
                    'totaliva' => 2179.77,
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
            ]
        );
    }
}
