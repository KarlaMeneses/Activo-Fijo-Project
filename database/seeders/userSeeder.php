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
        $user=new User() ;
        $user->name='Admin';
        $user->email='admin@gmail.com';
        $user->password=bcrypt('12345');//bcrypt encripta la contraseña 
        
        $user->save();//save con  parentesis
        $user->assignRole('Administrador');

        $user=new User() ;
        $user->name='Admin2';
        $user->email='admin2@gmail.com';
        $user->password=bcrypt('123456');//bcrypt encripta la contraseña 
        
        $user->save();//save con  parentesis
        $user->assignRole('Administrador');


        $user=new User() ;
        $user->name='Admin3';
        $user->email='admin3@gmail.com';
        $user->password=bcrypt('123457');//bcrypt encripta la contraseña 
        
        $user->save();//save con  parentesis
        $user->assignRole('Administrador');


    }
}