<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('departamentos')->insert([
            [
                'nombre' => 'Departamento General',
                'descripcion' => 'Este departamento es la cabeza de la empresa. 
                Se basa en su plan de negocios, sus metas personales y sus conocimientos,
                 por lo que toma las decisiones en situaciones críticas.',
            ],
            [
                'nombre' => 'Departamento de Contabilidad y Finanzas',
                'descripcion' => 'Es el encargado de registrar los hechos 
                económicos de la organización en el día a día, así como también, 
                de realizar análisis periódicos de los indicadores financieros, 
                entregando alertas a la gerencia general sobre posibles riesgos.',
            ] 
             
        ]);
         */
        
        $depa= new Departamento();
        $depa->nombre= 'Departamento General';
        $depa->descripcion = 'Este departamento es la cabeza de la empresa. Se basa en su plan de negocios, sus metas personales y sus conocimientos, por lo que toma las decisiones en situaciones críticas.';
        $depa->save();
    }
    
}
