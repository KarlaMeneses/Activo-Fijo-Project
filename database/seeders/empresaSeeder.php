<?php

namespace Database\Seeders;

use App\Models\Empresa;

use Illuminate\Database\Seeder;

class empresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        $empresa = new Empresa();
        $empresa->nombre = 'B&L Confecciones';
        $empresa->email = 'bylconfecciones@gmail.com';
        $empresa->foto = 'https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/empresa%2FWhatsApp%20Image%202022-06-27%20at%2011.53.51%20AM.jpeg?alt=media&token=fd58b853-90db-4ab7-bb25-14f73c9b110d';
        $empresa->juridica = 'S.A.';
        $empresa->nit = '365987';
        $empresa->direccion = 'Calle Vallegrande  #341';
        $empresa->telefono = 75693698;
        $empresa->save(); //save con  parentesis 

        $empresa = new Empresa();
        

    }
}
//https://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/usuario%2FPhotoGrid_1568399833200.jpg?alt=media&token=d8753c3b-bc41-4beb-a6f8-d7b89e960053
///ttps://firebasestorage.googleapis.com/v0/b/imagenes-972f4.appspot.com/o/empresa%2F1200px-YPFB_Logo.svg.jpg?alt=media&token=c777f33a-0d73-4ca8-b1b9-8925a1372708