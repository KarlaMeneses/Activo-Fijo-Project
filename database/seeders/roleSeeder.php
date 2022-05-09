<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'Administrador']);
        //$role2 = Role::create(['name'=> 'Cliente']);
        //$role3 = Role::create(['name'=> 'Vendedor']);
        permission::create(['name'=>'Gestionar Perfil'])->syncRoles([$role1]) ;
    }
}


