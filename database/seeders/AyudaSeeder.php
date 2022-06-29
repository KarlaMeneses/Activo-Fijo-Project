<?php

namespace Database\Seeders;

use App\Models\Ayuda;
use Illuminate\Database\Seeder;

class AyudaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FHome%20SI.jpeg?alt=media&token=d7d880cc-2e49-48a0-83d3-1e04200fb453';
        $user->descripcion = "Al momento de aquirir el sistema se otorga un perfil de usuario con el rol de administrardor el cual podra  crear nuevos usuarios para interactuar con los demas modulos .
        los módulos disponibles son: Gestionar usuario, gestionar ubicación, gestionar activo fijo, Nota de compra y venta, factura 
        ";
        $user->save(); //save con  parentesis
    }
}
