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
                'nombre' => 'Edificaciones',
                'descripcion' => '40 años',
                'tipo_activo' => '2.5%',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Muebles y enseres de oficina',
                'descripcion' => '10 años',
                'tipo_activo' => '10.0%',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Maquinaria en general',
                'descripcion' => '8 años',
                'tipo_activo' => '12.5%',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Equipos e instalaciones',
                'descripcion' => '8 años',
                'tipo_activo' => '12.5%',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Vehículos automotores',
                'descripcion' => '8 años',
                'tipo_activo' => '12.5%',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
