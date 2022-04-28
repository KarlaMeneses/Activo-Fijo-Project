<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            [
                'descripcion' => 'departamento general',
            ],
            [
                'descripcion' => 'departamento de contaduría',
            ]   
        ]);
    }
}
