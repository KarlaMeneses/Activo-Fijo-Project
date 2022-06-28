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
            ]
             
        ]);
         */
        
        $depa= new Departamento();
        $depa->nombre= 'Departamento General';
        $depa->descripcion = 'Este departamento es la cabeza de la empresa. Se basa en su plan de negocios, sus metas personales y sus conocimientos, por lo que toma las decisiones en situaciones críticas.';
        $depa->save();

        $depa= new Departamento();
        $depa->nombre= 'Departamento de Compras';
        $depa->descripcion = 'Responsable de adquirir los insumos (materias primas, partes, herramientas, artículos de oficina y equipo).';
        $depa->save();

        $depa= new Departamento();
        $depa->nombre= 'Departamento de Almacen';
        $depa->descripcion = 'Se encarga de gestionar la mercancía y control de inventario además de mantenimiendo del stock';
        $depa->save();

        $depa= new Departamento();
        $depa->nombre= 'Departamento de Logística y Operaciones';
        $depa->descripcion = 'Realiza la planificación y gestión de todos los flujos que van desde el inicio de la producción de un producto hasta el cliente final';
        $depa->save();

        $depa= new Departamento();
        $depa->nombre= 'Departamento de Producción';
        $depa->descripcion = 'Su objetivo es la producción de bienes o servicios al mayor nivel de calidad posible y a tiempos establecidos';
        $depa->save();

        $depa= new Departamento();
        $depa->nombre= 'Departamento de Diseño';
        $depa->descripcion = 'Diseñar colecciones de prendas, basadas en las tendencias de dibujos y colores de moda, adaptando procedimientos viables para su producción, concretando las especificaciones técnicas del producto.';
        $depa->save();

        $depa= new Departamento();
        $depa->nombre= 'Departamento Comercial y de Marketing';
        $depa->descripcion = 'Reúne los factores y hechos que influyen en el mercado para crear lo que el consumidor quiere, desea y necesita, distribuyéndolo de tal forma que esté a su disposición en el momento oportuno.';
        $depa->save();

        $depa= new Departamento();
        $depa->nombre= 'Departamento Finanzas y Control de Gestión';
        $depa->descripcion = 'Encargado de consiguir financiación para las necesidades de la empresa (inversiones o circulante), planifica para que esta siempre tenga dinero para afrontar sus pagos puntualmente y tenga una situación patrimonial saneada, y controla que la actividad resulte rentable.';
        $depa->save();

        $depa= new Departamento();
        $depa->nombre= 'Departamento de Recursos Humanos';
        $depa->descripcion = 'Departamento que se encarga de todas aquellas tareas relacionadas con la gestión de personas y la atracción de talento.';
        $depa->save();

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
    }

}
