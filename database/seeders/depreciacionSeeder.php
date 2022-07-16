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
                'd_acumulada' => 10,
                'id_activo' => 1,
            ],
            [
                'año' => 2,
                'd_acumulada' => 20,
                'id_activo' => 1,
            ],
            [
                'año' => 3,
                'd_acumulada' => 30,
                'id_activo' => 1,
            ],
        ]);
    }
}
