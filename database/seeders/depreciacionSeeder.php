<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class depreciacionSeeder extends Seeder
{
    public function run()
    {
        DB::table('depreciaciones')->insert([
            [
                'año' => 1,
                'valor' => 5600,
                'd_acumulada' => 1400,
                'id_activo' => 1,
            ],
            [
                'año' => 2,
                'valor' => 4200,
                'd_acumulada' => 2800,
                'id_activo' => 1,
            ],
            [
                'año' => 3,
                'valor' => 2800,
                'd_acumulada' => 4200,
                'id_activo' => 1,
            ],
            [
                'año' => 4,
                'valor' => 1400,
                'd_acumulada' => 5600,
                'id_activo' => 1,
            ],
            //////////////
            [
                'año' => 1,
                'valor' => 414,
                'd_acumulada' => 36,
                'id_activo' => 2,
            ],
            [
                'año' => 2,
                'valor' => 378,
                'd_acumulada' => 72,
                'id_activo' => 2,
            ],
            [
                'año' => 3,
                'valor' => 342,
                'd_acumulada' => 108,
                'id_activo' => 2,
            ],
            [
                'año' => 4,
                'valor' => 306,
                'd_acumulada' => 144,
                'id_activo' => 2,
            ],

            [
                'año' => 5,
                'valor' => 270,
                'd_acumulada' => 180,
                'id_activo' => 2,
            ],

            [
                'año' => 6,
                'valor' => 234,
                'd_acumulada' => 216,
                'id_activo' => 2,
            ],

            [
                'año' => 7,
                'valor' => 198,
                'd_acumulada' => 252,
                'id_activo' => 2,
            ],

            [
                'año' => 8,
                'valor' => 162,
                'd_acumulada' => 288,
                'id_activo' => 2,
            ],

            [
                'año' => 9,
                'valor' => 126,
                'd_acumulada' => 324,
                'id_activo' => 2,
            ],

            [
                'año' => 10,
                'valor' => 90,
                'd_acumulada' => 360,
                'id_activo' => 2,
            ],
            ////
            [
                'año' => 1,
                'valor' => 1200,
                'd_acumulada' => 300,
                'id_activo' => 3,
            ],
            [
                'año' => 2,
                'valor' => 900,
                'd_acumulada' => 600,
                'id_activo' => 3,
            ],
            [
                'año' => 3,
                'valor' => 600,
                'd_acumulada' => 900,
                'id_activo' => 3,
            ],
            [
                'año' => 4,
                'valor' => 300,
                'd_acumulada' => 1200,
                'id_activo' => 3,
            ],
            ////
            [
                'año' => 1,
                'valor' => 792,
                'd_acumulada' => 198,
                'id_activo' => 4,
            ],
            [
                'año' => 2,
                'valor' => 594,
                'd_acumulada' => 396,
                'id_activo' => 4,
            ],
            [
                'año' => 3,
                'valor' => 396,
                'd_acumulada' => 594,
                'id_activo' => 4,
            ],
            [
                'año' => 4,
                'valor' => 198,
                'd_acumulada' => 792,
                'id_activo' => 4,
            ],
            ////
            [
                'año' => 1,
                'valor' => 147000,
                'd_acumulada' => 28000,
                'id_activo' => 6,
            ],
            [
                'año' => 2,
                'valor' => 119000,
                'd_acumulada' => 56000,
                'id_activo' => 6,
            ],
            [
                'año' => 3,
                'valor' => 91000,
                'd_acumulada' => 84000,
                'id_activo' => 6,
            ],
            [
                'año' => 4,
                'valor' => 63000,
                'd_acumulada' => 112000,
                'id_activo' => 6,
            ],
            [
                'año' => 5,
                'valor' => 35000,
                'd_acumulada' => 140000,
                'id_activo' => 6,
            ],




        ]);
    }
}
