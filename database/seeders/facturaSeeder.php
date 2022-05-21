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
                    'vendedor' => 'Juan Pérez',
                    'nit' => '12922186',
                    'idcomprador' => '1',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'direccion' => 'Comercial chiriguano p/4 caseta # 123',
                    'telefono' => 6235093,
                    'email' => 'juanperez@gmail.com',
                    'formadepago' => 'Cheque',
                    'totalneto' => 20400.00,
                    'fechaemisión' => '2022-02-20',
                    'iva' => 2652.00,
                    'totaliva' => 23052.00,
                    'referencia' => 'Productos nuevos',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura compra 2
                [
                    'tipo' => 'compra',
                    'vendedor' => 'Maria Montaño',
                    'nit' => '5892486',
                    'idcomprador' => '2',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'direccion' => '4to anillo entre Av. Paragua #591',
                    'telefono' => 6235093,
                    'email' => 'mariamontaño@gmail.com',
                    'formadepago' => 'Efectivo',
                    'totalneto' => 1929.00,
                    'fechaemisión' => '2022-04-16',
                    'iva' => 250.77,
                    'totaliva' => 2179.77,
                    'referencia' => 'Productos de Buena Calidad',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura compra 3---------------------------------------------------------------------
                [
                    'tipo' => 'compra',
                    'vendedor' => 'Nathaly Rios',
                    'nit' => '981892',
                    'idcomprador' => '3',
                    'ciudad' => 'Cochabamba',
                    'direccion' => 'Av. Melchor Pérez de Olguín N°984 esquina',
                    'telefono' => 71005231,
                    'email' => 'nathalyrios@gmail.com',
                    'formadepago' => 'Transferencia Bancaria',
                    'totalneto' => 500.00,
                    'fechaemisión' => '2022-02-20',
                    'iva' => 65.00,
                    'totaliva' => 565.00,
                    'referencia' => 'Producto elaborado y nuevo',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura Compra 4---------------------------------------------------------------------
                [
                    'tipo' => 'compra',
                    'vendedor' => 'Marcos Aguilar',
                    'nit' => '5897103',
                    'idcomprador' => '1',
                    'ciudad' => 'Santa Cruz de la Sierra',
                    'direccion' => 'Av. Doble vía la Guaria, casi 4to anillo',
                    'telefono' => 68948267,
                    'email' => 'marcosaguilar@gmail.com',
                    'formadepago' => 'Cheque',
                    'totalneto' => 500.00,
                    'fechaemisión' => '2022-02-20',
                    'iva' => 65.00,
                    'totaliva' => 565.00,
                    'referencia' => 'Producto elaborado y nuevo',
                    'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

                ],
                // Factura compra 5---------------------------------------------------------------------
                [
                    'tipo' => 'compra',
                    'vendedor' => 'Nathaly Rios',
                    'nit' => '981892',
                    'idcomprador' => '3',
                    'ciudad' => 'Cochabamba',
                    'direccion' => 'Av. Melchor Pérez de Olguín N°984 esquina',
                    'telefono' => 71005231,
                    'email' => 'nathalyrios@gmail.com',
                    'formadepago' => 'Transferencia Bancaria',
                    'totalneto' => 500.00,
                    'fechaemisión' => '2022-02-20',
                    'iva' => 65.00,
                    'totaliva' => 565.00,
                    'referencia' => 'Producto elaborado y nuevo',
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
