<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ubicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicacion')->insert([
            [
                'edificio' => 'Principal-piso 1',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 1,
            ],
            
            [
                'edificio' => 'Principal-piso 2',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 2,
             ],  


             [
                'edificio' => 'Don Conce',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 3,
             ] ,  


             [
                'edificio' => 'Don Conce - piso 1',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 4,
             ] ,  


             [
                'edificio' => 'Don Conce',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 5,
             ] ,  


             [
                'edificio' => 'Principal-piso 3',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 6,
             ] ,  


             [
                'edificio' => 'Principal-piso 3',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 7,
             ] ,  


             [
                'edificio' => 'Principal-piso 4',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 8,
             ] ,  


             [
                'edificio' => 'Principal-piso 4',
                'ciudad' => 'Santa Cruz de la Sierra',
                'pais' => 'Bolivia',
                'id_departamento' => 9,
             ]
        ]);
    }
}
