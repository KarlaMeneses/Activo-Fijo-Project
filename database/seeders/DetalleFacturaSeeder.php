<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class detallefacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detallefactura')->insert([
              // FACTURA 1
            [
                
                'cantidad' => 2,
                'descuento' => 1000.00,
                'articulo' => 'Laptop',
                'codigo' => 'A1-001',
                'valor_unitario' => 5000.00,
                'valor_total' => 9000.00,
                'idfactura' => 1, 
            ],
            [
                'cantidad' => 1,
                'descuento' => 0.00,
                'articulo' => 'Monitor',
                'codigo' => 'A1-005',
                'valor_unitario' => 2000.00,
                'valor_total' => 2000.00,
                'idfactura' => 1,
            ],
                       // FACTURA 2
            [
                
                'cantidad' => 15,
                'descuento' => 54.00,
                'articulo' => 'Escritorio',
                'codigo' => 'B1-018',
                'valor_unitario' => 180.00,
                'valor_total' => 2646.00,
                'idfactura' => 2, 
            ],
                 // FACTURA 3
            [
                
                'cantidad' => 5,
                'descuento' => 15.00,
                'articulo' => 'Mesa',
                'codigo' => 'C1-001',
                'valor_unitario' => 150.00,
                'valor_total' => 735.00,
                'idfactura' => 3, 
            ],
            [
                'cantidad' => 15,
                'descuento' => 21.00,
                'articulo' => 'Silla',
                'codigo' => 'C1-015',
                'valor_unitario' => 70.00,
                'valor_total' => 1029.00,
                'idfactura' => 3,
            ], 
                // FACTURA 4
            [
                
                'cantidad' => 1,
                'descuento' => 0.00,
                'articulo' => 'Automovil',
                'codigo' => 'GS3',
                'valor_unitario' => 118300.00,
                'valor_total' => 118300.00,
                'idfactura' => 4, 
            ],
                // FACTURA 5
                [
                
                    'cantidad' => 5,
                    'descuento' => 153.00,
                    'articulo' => 'Impresora',
                    'codigo' => 'GS3',
                    'valor_unitario' => 1530.00,
                    'valor_total' => 7497.00,
                    'idfactura' => 5, 
                ],
                //-------------------------- VENTA ---------------------------------

                // FACTURA 6
                [
                
                    'cantidad' => 2,
                    'descuento' => 0.00,
                    'articulo' => 'Mesa',
                    'codigo' => 'H1-45',
                    'valor_unitario' => 225.00,
                    'valor_total' => 450.00,
                    'idfactura' => 6, 
                ],
                // FACTURA 7
                [
                
                    'cantidad' => 2,
                    'descuento' => 0.00,
                    'articulo' => 'Sillas Gammer',
                    'codigo' => 'G1-04',
                    'valor_unitario' => 250.00,
                    'valor_total' => 500.00,
                    'idfactura' => 7, 
                ],
                [
                
                    'cantidad' => 4,
                    'descuento' => 0.00,
                    'articulo' => 'Sillas Gammer',
                    'codigo' => 'G1-05',
                    'valor_unitario' => 200.00,
                    'valor_total' => 1000.00,
                    'idfactura' => 7, 
                ],
                  // FACTURA 8
                [
                
                    'cantidad' => 1,
                    'descuento' => 100.00,
                    'articulo' => 'Antena',
                    'codigo' => 'L1-04',
                    'valor_unitario' => 1800.00,
                    'valor_total' => 1700.00,
                    'idfactura' => 8, 
                ],
                //FACTURA 9
                [
                
                    'cantidad' => 40,
                    'descuento' => 100.00,
                    'articulo' => 'Sillas',
                    'codigo' => 'U1-05',
                    'valor_unitario' => 102.50,
                    'valor_total' => 4000.00,
                    'idfactura' => 9, 
                ],
                [
                
                    'cantidad' => 40,
                    'descuento' => 0.00,
                    'articulo' => 'Gorras',
                    'codigo' => 'U1-05',
                    'valor_unitario' => 25.,
                    'valor_total' => 1000.00,
                    'idfactura' => 9, 
                ],
                  // FACTURA 10
                  [
                
                    'cantidad' => 1,
                    'descuento' => 100.00,
                    'articulo' => 'Silla con ruedas',
                    'codigo' => 'S1-04',
                    'valor_unitario' => 300.00,
                    'valor_total' => 200.00,
                    'idfactura' => 10, 
                ],
                  // FACTURA 11
                  [
                
                    'cantidad' => 1,
                    'descuento' => 100.00,
                    'articulo' => 'Laptop',
                    'codigo' => 'P1-04',
                    'valor_unitario' => 7100.50,
                    'valor_total' => 7000.00,
                    'idfactura' => 11, 
                ],
                  // FACTURA 11
                  [
                
                    'cantidad' => 1,
                    'descuento' => 0.00,
                    'articulo' => 'Monitor',
                    'codigo' => 'P1-04',
                    'valor_unitario' => 2600.00,
                    'valor_total' => 2600.00,
                    'idfactura' => 12, 
                ],
        ]);
    }
}
