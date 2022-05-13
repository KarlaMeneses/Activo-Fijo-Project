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


*/
    public function run()
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Vehículos automotores', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Vehiculo',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 5,                //años de vida de un activo
                'valor_residual' => 12.5,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'nombre' => 'Equipos e instalaciones', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Maquinaria',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 8,                //años de vida de un activo
                'valor_residual' => 12.5,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'nombre' => 'Muebles y enseres de oficina', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Mesa de Escritorio',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 10,                //años de vida de un activo
                'valor_residual' => 10.0,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'nombre' => 'patentes de inversión', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Intangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Amortización', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 0,                //años de vida de un activo
                'valor_residual' => 0,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

        ]);
    }
}
