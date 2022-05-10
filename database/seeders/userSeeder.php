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
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/usuario%2Ffcca5f38-d7f7-4bdd-b0f6-a1ba3e0420bf.jpg?alt=media&token=3402b043-3f5f-4b90-a768-fd870404b14f';
        $user->edad = 19;
        $user->sexo = 'Masculino';
        $user->cargo = 'Analista de AF';
        $user->direccion = 'San Roque 3415';
        $user->telefono = 6215215;

        $user->password = bcrypt('12345'); //bcrypt encripta la contraseña 

        $user->save(); //save con  parentesis
        $user->assignRole('Administrador');

        $user = new User();
        $user->name = 'Juana';
        $user->email = 'admin2@gmail.com';
        $user->password = bcrypt('123456'); //bcrypt encripta la contraseña 
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/usuario%2F269929687_3004715393100802_7132891553517560707_n.jpg?alt=media&token=21922377-f8a0-4b66-a36d-34d3957bfd8c';
        $user->edad = 19;
        $user->sexo = 'Femenina';
        $user->cargo = 'Analista de AF';
        $user->direccion = 'San Roque 3415';
        $user->telefono = 6215215;
        $user->save(); //save con  parentesis
        $user->assignRole('Administrador');


        $user = new User();
        $user->name = 'Karla';
        $user->email = 'admin3@gmail.com';
        $user->password = bcrypt('123457'); //bcrypt encripta la contraseña 
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/usuario%2FScreenshot_2.png?alt=media&token=a84ce7e8-5441-47a6-be5f-cf9fed8b8c01';
        $user->edad = 19;
        $user->sexo = 'Femenina';
        $user->cargo = 'Analista de AF';
        $user->direccion = 'San Roque 3415';
        $user->telefono = 6215215;
        $user->save(); //save con  parentesis
        $user->assignRole('Administrador');
    }
}
