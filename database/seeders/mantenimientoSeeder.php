<?php

namespace Database\Seeders;

use App\Models\Mantenimiento;
use Illuminate\Database\Seeder;

class mantenimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mante = new Mantenimiento();
        $mante->problema = 'Funcionamiento Incorrecto';
        $mante->proveedor = 'MINISO S.A.';
        $mante->tiempo = '3 dias';
        $mante->costo = 100.0;
        $mante->id_activo = 1;
        $mante->fecha_ini = '2022-04-16';
        $mante->fecha_fin = '2022-04-20';
        $mante->fecha_aprox = '2022-04-19';
        $mante->solucion = 'Cambio de Baterias';
        $mante->estado = 'Finalizado';
        $mante->save();

        $mante = new Mantenimiento();
        $mante->problema = 'Estado Muy Degradado del Activo ';
        $mante->proveedor = 'SLW-Reparaciones S.A.';
        $mante->tiempo = '6 dias';
        $mante->costo = 500.0;
        $mante->id_activo = 2;
        $mante->fecha_ini = '2022-04-22';
        $mante->fecha_fin = '2022-04-28';
        $mante->fecha_aprox = '2022-04-28';
        $mante->solucion = 'Repuesto total de sus componentes importantes';
        $mante->estado = 'Finalizado';
        $mante->save();

        $mante = new Mantenimiento();
        $mante->problema = 'Mantenimiento Anual';
        $mante->proveedor = 'LEC S.R.L.';
        $mante->tiempo = '3 dias';
        $mante->costo = 300.0;
        $mante->id_activo = 3;
        $mante->fecha_ini = '2022-04-25';
        $mante->fecha_fin = '2022-04-27';
        $mante->fecha_aprox = '2022-04-28';
        $mante->solucion = 'Limpieza y Mantenimientos de sus componentes';
        $mante->estado = 'Finalizado';
        $mante->save();
        
    }
}
