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
                //nota compra
                'proveedor' => 'Mundo de las computadoras',
                'direccion' => 'Comercial chiriguano p/4 caseta # 123',
                'telefono' => 62350093, 
                'totales' => 6000,
                'fecha_entrega' => '2022-02-20',
                'foto' => 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/notas%2Fcompras%2F3.jpeg?alt=media&token=b6440cf8-f26a-4e9e-af88-8e7224dfe52e',

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
