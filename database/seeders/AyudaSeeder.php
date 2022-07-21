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
        $user->descripcion = "Para ver el registro de las acciones en el sistema ingresar a Bitacora, introducir la contraseña luego click en Autenticar Kay y se procederá a la descarga de un documento en formato.log";
        $user->save();


        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2Fcrear%20activo.png?alt=media&token=79b25b79-114e-4a38-9069-d4e6b2603f40';
        $user->descripcion = "Para registar un activo darc lick en el MÓDULO ACTIVO FIJO, luego en activo fijo; en esa vista se muestra una lista de los activos si ya hubieran registrados y si quiero registar otro dar click en Crear Activo Fijo ";
        $user->save();

        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FSubir%20foto%20activo.png?alt=media&token=0203c4c0-9873-44a6-a311-135f0278d540';
        $user->descripcion ="Una vez realizado los pasos anteriores se habilida la vista donde podrá registrar un nuevo activo, Para subir la foto del activo presionar en 'Subir foto'
        se podrá subir la foto desde el almacenamiento de su equipo o en el movil podrá tomar la foto directamente. Para guardar el activo dar click en >>Crear Activo<< de color rojo ";
        $user->save();


        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FVer%20activo.png?alt=media&token=e4b3beea-b891-4f6a-8c40-2c04c700a746';
        $user->descripcion = "Para ver los dedtalles del activo debe precionar en el ícono de ojo, así mismo para editar en el ícono de lapiz y para eliminar en el ícono de basurero.";
        $user->save();



        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FRegistrar%20categorias.png?alt=media&token=bd050dc3-a41a-41d0-bbcd-206d3790f939';
        $user->descripcion = "para registrar a que categoría pertenecen los activos: Ingresar al MÓDULO ACTIVO FIJO 1 >>Categoría. Aquí se mostrará la lista de categoría existentes  2 >> Registrar Categoría. Se abre una vista dffonde debe llenar los campos solicitados como vida util, coeficiente porcentual de depreciación, etc. y finalmente para guardar click en 3 >>Registrar ";
        $user->save();


        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FMantenimiento.png?alt=media&token=3b81f1b1-c7c7-4a06-9c51-bb87ccebe205';
        $user->descripcion ="Cuando un activo esté en mantenimiento este se debe registrar en el sistema en >>MÓDULO ACTIVO FIJO  >>Mantenimiento >>Registrar Mantenimiento : 
        llenar los datos soliciatdos y elegur que activo está en mantenimiento, esto hace que su estado se cambie";
        $user->save();


        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FDepartamentos.png?alt=media&token=c2612b81-e1e7-44c2-8bdc-e4a53d91cbee';
        $user->descripcion ="En el >>MÓDULO UBICACIÓN >>Departamentos, se puede registrar los distintos dptos que existan en su empresa tales como: RR.HH, Dpto. de Compras,Logistica,etc. 
        Para registrar un departamento click en >>Crear Departamento, se redirige a una nueva vista donde depe llenar los datos como el Nombre y una descripción y para guardar precionar en >>Crear Departamento";
        $user->save();


        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FCrear%20Ubicacion.png?alt=media&token=21f52f08-2f3b-462a-b871-c28d82fe949b';
        $user->descripcion ="Para agregar una ubicación del activo fijo ingresar a >>MÓDULO UBICACIÓN >>Ubicación y en esa vista click en >>Crear Ubicación que está en la parte superior izquerda de la pantalla.
        Esto le abre otra vista para llenar los datos de ubicación con Nombre del edificio, País,Ciudad y debe seleccionar un dpto de la empresa previamente creado por último presionar en 'Crear Ubicación' de la parte inferior para guardar.
        En este mismo apartado podrá Eliminar y editar una ubicaión ya creada con los íconos que aparecen en la parte derecha de la lista de ubicaciones";
        $user->save();

        $user = new Ayuda();
        $user->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/ayuda%2FSolicitar%20Activo.png?alt=media&token=020b54e2-c01b-484b-b5a1-b1c3a5734c56';
        $user->descripcion ="En caso de que la empresa requiera nuevos activos se debe realizar una solicitud del mismo 
        esto se registra en el >>MÓDULO SOLICITUD ";
        $user->save();



    }
}
