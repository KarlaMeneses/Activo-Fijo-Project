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
        $user->save(); 


        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2Fregistrar%20usuario.png?alt=media&token=5a5e5e4f-e040-4843-990f-54fc09a7ce22';
        $user->descripcion = "Para crear un usuario debe dar click en el botón Crear usuario.
        Después le aparecerá los espacios correspondientes para crear el nuevo perfil, debe rellenar todos los campos y es importante que asigne un rol al nuevo usuario creado.
        ";
        $user->save(); //save con  parentesis



        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2Fregistrar%20usuario.png?alt=media&token=5a5e5e4f-e040-4843-990f-54fc09a7ce22';
        $user->descripcion = "Para ver,editar su perfil debe dar click en 'Perfil': Escibir su nueva contraseña y confirmar contraseña y para guardar los cambios click en 'Guardar'";
        $user->save();    
        
        

        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FListado%20y%20nuevo%20rol.png?alt=media&token=100fb14b-facc-4cfa-bdf9-1f77a571473f';
        $user->descripcion = "Para crear,ver, editar y eliminar un rol ingresar en 'Roles y Permisos'; ahí verá la lista de roles existentes en caso de haber. Para Crear un rol clickear en 'Crear Rol' una vez ahí colocar nombre del rol y seleccionar los permisos que se asignarán";
        $user->save();


        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FBitacora.png?alt=media&token=7680d8e9-cbd1-4795-98a2-1549ea4b2d42';
        $user->descripcion = "Para ver el registro de las acciones en el sistema ingresar a Bitacora,introducir la contraseña luego click en Auntenticar Kay y se procederá a la descraga de un documento en formato.log";
        $user->save();


        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2Fcrear%20activo.png?alt=media&token=79b25b79-114e-4a38-9069-d4e6b2603f40';
        $user->descripcion = "Para registar un activo darc lick en el MÓDULO ACTIVO FIJO, luego en activo fijo; en esa vista se muestra una lista de los activos si ya hubieran registrados y si quiero registar otro dar click en Crear Activo Fijo ";
        $user->save();


        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FVer%20activo.png?alt=media&token=e4b3beea-b891-4f6a-8c40-2c04c700a746';
        $user->descripcion = "Para ver los dedtalles del activo debe precionar en el ícono de ojo, así mismo para editar en el ícono de lapiz y para eliminar en el ícono de basurero.";
        $user->save();



        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FRegistrar%20categorias.png?alt=media&token=bd050dc3-a41a-41d0-bbcd-206d3790f939';
        $user->descripcion = "para registrar a que categoría pertenecen los activos: Ingresar al MÓDULO ACTIVO FIJO 1 >>Categoría. Aquí se mostrará la lista de categoría existentes  2 >> Registrar Categoría. Se abre una vista dffonde debe llenar los campos solicitados como vida util, coeficiente porcentual de depreciación, etc. y finalmente para guardar click en 3 >>Registrar ";
        $user->save();
    }
}
