<?php

namespace Database\Seeders;

use App\Models\Bitacora;
use Illuminate\Database\Seeder;

class bitacoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bita = new Bitacora();
        $bita->accion = encrypt('Registró');
        $bita->apartado = encrypt('Usuario');
        $bita->afectado = encrypt('1');
        $bita->fecha_h = encrypt('2022-05-23 06:57:22');
        $bita->id_user = 1;
        $bita->ip = encrypt('192.0.0.1');
        $bita->save();

        /* $bita = new Bitacora();
        $bita->accion = bcrypt('Editó');
        $bita->apartado = bcrypt('Usuario');
        $bita->afectado = bcrypt('1');
        $bita->fecha_h = bcrypt('2022-05-23 10:57:22');
        $bita->id_user = bcrypt('2');
        $bita->ip = bcrypt('127.0.0.1');
        $bita->save(); */

        $bita = new Bitacora();
        $bita->accion = encrypt('Editó');
        $bita->apartado = encrypt('Usuario');
        $bita->afectado = encrypt('2');
        $bita->fecha_h = encrypt('2022-05-23 10:57:22');
        $bita->id_user = 2;
        $bita->ip = encrypt('127.0.0.1');
        $bita->save();


    }
}
