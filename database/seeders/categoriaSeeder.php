<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'equipos de oficina',
                'descripcion' => 'máquinas y dispositivos propias de una oficina',
                'tipo_activo' => 'electrónico',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'vehículos industriales',
                'descripcion' => 'vehículos para el transporte de mercancías o el transporte colectivo de personas',
                'tipo_activo' => 'vehículos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]   
        ]);
    }
}
