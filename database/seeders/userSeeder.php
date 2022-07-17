<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Leonardo';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('12345'); //bcrypt encripta la contraseña
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/usuario%2Ffcca5f38-d7f7-4bdd-b0f6-a1ba3e0420bf.jpg?alt=media&token=3402b043-3f5f-4b90-a768-fd870404b14f';
        $user->edad = 22;
        $user->sexo = 'Masculino';
        $user->cargo = 'Analista';
        $user->direccion = 'Av. Litoral  #341';
        $user->telefono = 6215215;
        /* $user->idempresa = 2; */
        $user->save(); //save con  parentesis
        $user->assignRole('Analista');

        $user = new User();
        $user->name = 'Juana';
        $user->email = 'admin2@gmail.com';
        $user->password = bcrypt('123456'); //bcrypt encripta la contraseña
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/usuario%2F269929687_3004715393100802_7132891553517560707_n.jpg?alt=media&token=21922377-f8a0-4b66-a36d-34d3957bfd8c';
        $user->edad = 22;
        $user->sexo = 'Femenino';
        $user->cargo = 'Administrador';
        $user->direccion = 'La Angostura. B Primavera';
        $user->telefono = 77169918;
        /* $user->idempresa = 1; */
        $user->save(); //save con  parentesis
        $user->assignRole('Encargado');


        $user = new User();
        $user->name = 'Karla';
        $user->email = 'admin3@gmail.com';
        $user->password = bcrypt('123457'); //bcrypt encripta la contraseña
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/usuario%2FScreenshot_2.png?alt=media&token=a84ce7e8-5441-47a6-be5f-cf9fed8b8c01';
        $user->edad = 19;
        $user->sexo = 'Femenino';
        $user->cargo = 'Administrador';
        $user->direccion = 'San Roque 3415';
        $user->telefono = 6215215;
    /*     $user->idempresa = 1; */
        $user->save(); //save con  parentesis
        $user->assignRole('Administrador');

        $user = new User();
        $user->name = 'Angélica';
        $user->email = 'angelicamirandau@gmail.com';
        $user->password = bcrypt('Miranda123'); //bcrypt encripta la contraseña
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/usuario%2FPhotoGrid_1568399833200.jpg?alt=media&token=d8753c3b-bc41-4beb-a6f8-d7b89e960053';
        $user->edad = 19;
        $user->sexo = 'Femenino';
        $user->cargo = 'Administrador';
        $user->direccion = 'Los Lotes';
        $user->telefono = 71005231;
        /* $user->idempresa = 1; */
        $user->save(); //save con  parentesis
        $user->assignRole('Administrador');

        $user = new User();
        $user->name = 'Luishiño';
        $user->email = 'admin5@gmail.com';
        $user->password = bcrypt('12345'); //bcrypt encripta la contraseña
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/usuario%2F278912771_534063228090247_1527028768983049230_n.jpg?alt=media&token=bd13dd09-a83d-4271-8326-94a6ac176dce';
        $user->edad = 19;
        $user->sexo = 'Masculino';
        $user->cargo = 'Auxiliar';
        $user->direccion = 'San Roque 3415';
        $user->telefono = 6215215;
        /* $user->idempresa = 1; */
        $user->save(); //save con  parentesis
        $user->assignRole('Auxiliar');
    }
}
//https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/usuario%2FPhotoGrid_1568399833200.jpg?alt=media&token=d8753c3b-bc41-4beb-a6f8-d7b89e960053
