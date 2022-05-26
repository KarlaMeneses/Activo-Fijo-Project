<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bajas')->insert([
            // FACTURA 1
          [
              
            'idactivo' => 1,
            'causadebaja' => 'Se cayó',
            'fechasolicitada' => '2020-05-06',
            'estado' => 'Finalizado',
            'fechaaceptada' => '2020-05-16',
              
          ],
          [
            'idactivo' => 2,
            'causadebaja' => 'Sufrio Mojason',
            'fechasolicitada' => '2022-05-06',
            'estado' => 'En espera',
            'fechaaceptada' => null,
          ],
                     // FACTURA 2
          [
              
            'idactivo' => 6,
            'causadebaja' => 'Se venderá',
            'fechasolicitada' => '2020-02-06',
            'estado' => 'En espera',
            'fechaaceptada' => null,
          ],
               // FACTURA 3
          [
              
            'idactivo' => 3,
            'causadebaja' => 'Se cayó',
            'fechasolicitada' => '2022-02-06',
            'estado' => 'Finalizado',
            'fechaaceptada' => '2022-02-16',
          ],
        
      ]);
    }
}
