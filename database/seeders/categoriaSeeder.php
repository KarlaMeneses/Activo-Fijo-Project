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
                'nombre' => 'r3rere', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'eerer de software',     //descripción de la cuenta
                'estado' => 'Disponible',
                'id_depreciacion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],



        ]);
    }
}
