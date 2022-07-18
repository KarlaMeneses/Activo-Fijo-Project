<?php

namespace Database\Seeders;

use App\Models\Responsable;
use Illuminate\Database\Seeder;

class ResponsablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resp = new Responsable();
        $resp->codigo = '1234';
        $resp->empleado = 'pedrito';
        $resp->cargo = 'cajero';
        $resp->estado = 'firmado';
        $resp->fecha = '2022-06-26';
        $resp->save();
    }
}
