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
        $role2 = Role::create(['name'=> 'Encargado']);
        $role3 = Role::create(['name'=> 'Auxiliar']);
        $role4 = Role::create(['name'=> 'Analista']);
        permission::create(['name'=>'Gestionar Usuario'])->syncRoles([$role1]);
        permission::create(['name'=>'Gestionar Roles'])->syncRoles([$role1]);
        permission::create(['name'=>'Gestionar Categorias'])->syncRoles([$role1, $role2, $role3, $role4]);
        permission::create(['name'=>'Gestionar Revalorizacion'])->syncRoles([$role3, $role4]);
        permission::create(['name'=>'Gestionar Revalorizacion Reporte'])->syncRoles([$role1]);
        permission::create(['name'=>'editar notas'])->syncRoles([$role2]);
        permission::create(['name'=>'Solicitud-Fin'])->syncRoles([$role4]);
    }
}


