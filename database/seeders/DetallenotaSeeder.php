<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetallenotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detallenotas')->insert([
            [
                //nota compra
                'cantidad' => 2,
                'detalle' => 'Computadoras de escritorio',
                'precio_uni' => 3000,
                'total' => 6000,
                'id_notas' => 1, //id de la nota
            ] 
        ]);
    }
}
