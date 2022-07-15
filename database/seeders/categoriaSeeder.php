<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     * 
     * 
     * 
     */
    /*

                        

 
            


                DEPRECIACIÓN ACUMULADA DE EQUIPO DE TRANSPORTE
DEPRECIACIÓN ACUMULADA DE EDIFICIO
MOBILIARIO Y EQUIPO
EQUIPO DE SERVICIO
DEPRECIACIÓN ACUMULADA DE MOBILIARIO Y EQUIPO DE OFICINA
DEPRECIACIÓN ACUMULADA DE EQUIPO DE SERVICIO

tangible y intangible
Edificaciones

tangible
	No depreciables
		Terreno
	Depreciable
		Maquinaria
		Vehiculo
		Mobiliario
	Agotable
		Bosque
		Minas
		Pozos Petroleros

Intangible
	Amortización
		patentes de inversión
		Derecho de autor
	No Amortizable

Terrenos Edificios
Mobiliario y equipo
Equipo de entrega o de reparto
Maquinaria
Depósitos en garantía
Acciones y valores

clasifican 
Tangible:
Bienes concretos, como los terrenos, edificios y la maquinaria y equipos.

Intangibles: 
Elementos que no pueden ser tocados, pero representan un bien. Por ejemplo, los derechos de patente, las marcas o los derechos de autor.


*/ public function run()
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Edificios', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'edificios de la empresa',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'vida_util' => 40,                //años de vida de un activo
                'coeficiente' => 2.50,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Viviendas para el Personal', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'departamento, casa',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                 //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 20,                //años de vida de un activo
                'coeficiente' => 5.0,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Tinglados y Cobertizos de Madera', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'tinglados de madera',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                 //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 5,                //años de vida de un activo
                'coeficiente' => 20.00,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Tinglados y Cobertizos de Metal', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'tinglados de metal',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                 //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 10,                //años de vida de un activo
                'coeficiente' => 10.00,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Muebles y Enseres', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Silla, Sofás, Armarios, Archivadores',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                 //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 10,                //años de vida de un activo
                'coeficiente' => 10.00,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Equipo de Computación', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'pc, laptop',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                 //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 4,                //años de vida de un activo
                'coeficiente' => 25.00,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Maquinarias', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'cualquier tipo de maquinaria',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                 //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 8,                //años de vida de un activo
                'coeficiente' => 12.50,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Equipos e Instalaciones', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'router, redes',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                 //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 8,                //años de vida de un activo
                'coeficiente' => 12.50,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Barcos y Lanchas', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'para uso exclusivo de la empresa',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                 //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 10,                //años de vida de un activo
                'coeficiente' => 10.00,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Vehículos automotores', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Vehiculo',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                 //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 5,                //años de vida de un activo
                'coeficiente' => 12.5,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Muebles y enseres de oficina', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Mesa de Escritorio',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                 //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 10,                //años de vida de un activo
                'coeficiente' => 10.0,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            /* [
                'nombre' => 'patentes de inversión', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Intangible',    //tipo de activo tangible , intangible o invesión
                'caracteristica' => 'Amortización', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 0,                //años de vida de un activo
                'coeficiente' => 0,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],*/



        ]);
    }
}
