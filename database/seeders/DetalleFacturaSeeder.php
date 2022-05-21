<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DetalleFacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detallefactura')->insert([
            [
                //nota compra
                'cantidad' => 2,
                'descuento' => 1000.00,
                'articulo' => 'Laptop',
                'codigo' => 'A1-001',
                'valor_unitario' => 5000.00,
                'valor_total' => 9000.00,
                'idfactura' => 1, //id de la nota
            ],
            [
                'cantidad' => 1,
                'descuento' => 0.00,
                'articulo' => 'Laptop',
                'codigo' => 'A1-001',
                'valor_unitario' => 2000.00,
                'valor_total' => 2000.00,
                'idfactura' => 1, //id de la nota
            ],
            
        ]);
    }
}
