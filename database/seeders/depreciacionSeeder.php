<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class depreciacionSeeder extends Seeder
{


    public function run()
    {
        DB::table('depreciaciones')->insert([
            [
                'nombre' => 'Edificios', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 40,                //años de vida de un activo
                'valor_residual' => 2.50,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Viviendas para el Personal', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 20,                //años de vida de un activo
                'valor_residual' => 5.0,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Tinglados y Cobertizos de Madera', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 5,                //años de vida de un activo
                'valor_residual' => 20.00,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],


            [
                'nombre' => 'Tinglados y Cobertizos de Metal', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 10,                //años de vida de un activo
                'valor_residual' => 10.00,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Muebles y Enseres', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 10,                //años de vida de un activo
                'valor_residual' => 10.00,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Equipo de Computación', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 4,                //años de vida de un activo
                'valor_residual' => 25.00,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Maquinarias', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 8,                //años de vida de un activo
                'valor_residual' => 12.50,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Equipos e Instalaciones', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 8,                //años de vida de un activo
                'valor_residual' => 12.50,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

            [
                'nombre' => 'Barcos y Lanchas', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Tangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Depreciable', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 10,                //años de vida de un activo
                'valor_residual' => 10.00,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],

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
            /* [
                'nombre' => 'patentes de inversión', //bienes de cuenta contable nombre de la cuenta (contabilidad)
                'descripcion' => 'Licencia de software',     //descripción de la cuenta
                'tipo_activo' => 'Intangible',    //tipo de activo tangible , intangible o invesión
                'cacateristica' => 'Amortización', //No depreciables,Depreciable,Agotable,Amortización,No Amortizable
                'vida_util' => 0,                //años de vida de un activo
                'valor_residual' => 0,         //% de vida del activo fijo
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],*/



        ]);
    }
}
