<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activofijo;
use Illuminate\Http\Request;

class ActivoController extends Controller
{
    public function obtenerActivos()
    {
        try {
            //$paciente = auth('api')->user();
            $activos = Activofijo::join('ubicacion', 'activosfijo.id_ubicacion', 'ubicacion.id')
            ->orderBy('id', 'DESC')
            ->select('activosfijo.id', 'activosfijo.codigo', 'activosfijo.detalle', 'activosfijo.costo', 'activosfijo.fecha_ingreso', 'activosfijo.proveedor',
            'activosfijo.estado', 'activosfijo.id_factura', 'ubicacion.edificio as ubicacion_edificio')->get();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $activos], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }
}
