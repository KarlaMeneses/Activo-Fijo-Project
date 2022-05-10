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
        DB::table('notas')->insert([
            [
                'unidad' => 1,
                'concepto' => 'Santa Cruz de la Sierra',
                //nota compra
                'precio_uni' => 1,
                'importe' => 1,
                'condicion_pago' => 'Santa Cruz de la Sierra',
                'fecha_envio' => '2000-02-20',
                'fecha_entrega' => '2000-02-20',
                'lugar_entrega' => 'Santa Cruz de la Sierra',
                //nota venta
                'nro_egreso' => 1,
                'almacen' => 'Santa Cruz de la Sierra',
                'entregado_a' => 'Santa Cruz de la Sierra',
                'orden' => 'Santa Cruz de la Sierra',
                'id_responsable' => 2,
            ]



        ]);
    }
}
