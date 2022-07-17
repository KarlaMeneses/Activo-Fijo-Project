<?php

namespace Database\Seeders;

use App\Models\SoliActivo;
use App\Models\Solicitud;
use Illuminate\Database\Seeder;

class solicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $soli = new Solicitud();
        $soli->persona_sol   = 'Fernando Herrera';
        /* $soli->tipo_soli     = 'Productos - Inventario'; */
        $soli->clasificacion = 'No Urgente';
        $soli->concepto      = 'Articulo necesario para producción.';
        $soli->estado        = 'En Proceso';
        $soli->estado_fin        = 'No Aprobado';
        $soli->fecha         = '2022-06-26';
        $soli->save();

        $soli_act = new SoliActivo();
        $soli_act->id_sol = 1;
        $soli_act->item = 'Equipo de Computacion Intel i7';
        $soli_act->unidad = 'Unidad';
        $soli_act->cantidad = 5;
        $soli_act->save();

        $soli_act = new SoliActivo();
        $soli_act->id_sol = 1;
        $soli_act->item = 'Hojas Bond Tamaño Carta';
        $soli_act->unidad = 'Paquete - 100 hojas';
        $soli_act->cantidad = 8;
        $soli_act->save();

        $soli_act = new SoliActivo();
        $soli_act->id_sol = 1;
        $soli_act->item = '8GB Memorias Ram 3600 MHz';
        $soli_act->unidad = 'Piezas';
        $soli_act->cantidad = 10;
        $soli_act->save();

}

}
