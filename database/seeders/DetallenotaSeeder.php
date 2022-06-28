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
                'id_facturas' => 2,
                'id_activosfijo' => 1
            ],
            [
                'cantidad' => 4,
                'detalle' => 'Cable VGA a VGA 5 mts.',
                'precio_uni' => 50,
                'total' => 200,
                'id_notas' => 1, //id de la nota 
                'id_facturas' => 2,
                'id_activosfijo' => 1
            ],
            //----------------------------------------------------------
            [
                'cantidad' => 2,
                'detalle' => 'Estante alto de 8 divisiones 1278 color legno/negro, marca Carraro',
                'precio_uni' => 720,
                'total' => 1440,
                'id_notas' => 2, //id de la nota 
                'id_facturas' => 2,
                'id_activosfijo' => 1
            ],
            [
                'cantidad' => 4,
                'detalle' => 'Silla con ruedas 1713 color negro/cromado, marca Carraro',
                'precio_uni' => 410,
                'total' => 1640,
                'id_notas' => 2, //id de la nota 
                'id_facturas' => 2,
                'id_activosfijo' => 1
            ],
            //-----------------------------------------------------------------
            [
                'cantidad' => 3,
                'detalle' => 'Escritorio de Oficina en L color nogal, marca Notavel',
                'precio_uni' => 750,
                'total' => 2250,
                'id_notas' => 3, //id de la nota 
                'id_facturas' => 2,
                'id_activosfijo' => 1
            ],
            [
                'cantidad' => 1,
                'detalle' => 'Estante bajo con bandeja 1345 color blanco/cromado, marca Carraro',
                'precio_uni' => 520,
                'total' => 520,
                'id_notas' => 3, //id de la nota 
                'id_facturas' => 2,
                'id_activosfijo' => 1
            ],
            //--------------------------------------------------------------------
            [
                'cantidad' => 1,
                'detalle' => 'Licencia de software Diamino Fashion',
                'precio_uni' => 11336,
                'total' => 11336,
                'id_notas' => 4, //id de la nota 
                'id_facturas' => 2,
                'id_activosfijo' => 1
            ],
            [
                'cantidad' => 1,
                'detalle' => 'Licencia de software Office 2019 Profesional Plus',
                'precio_uni' => 130.80,
                'total' => 130.80,
                'id_notas' => 4, //id de la nota 
                'id_facturas' => 2,
                'id_activosfijo' => 1
            ],

            //------
        ]);
    }
}
