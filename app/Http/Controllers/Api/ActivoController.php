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
            ->select('activosfijo.id', 'activosfijo.codigo', 'activosfijo.detalle', 'activosfijo.costo', 'activosfijo.fecha_ingreso', 'activosfijo.proveedor',
            'activosfijo.estado', 'activosfijo.id_factura', 'ubicacion.edificio as ubicacion_edificio')->get();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $activos], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function obtenerActivo(Request $request)
    {
        try {
            if ($request->id == 0) {
                $activo = Activofijo::join('ubicacion', 'activosfijo.id_ubicacion', 'ubicacion.id')
                ->join('departamentos', 'ubicacion.id_departamento', 'departamentos.id')
                ->join('depreciaciones', 'activosfijo.id_depreciacion', 'depreciaciones.id')
                ->select('activosfijo.codigo', 'activosfijo.foto', 'activosfijo.nombre', 'activosfijo.detalle', 'activosfijo.tipo', 'activosfijo.fecha_ingreso', 'activosfijo.costo', 'activosfijo.estado', 'activosfijo.proveedor', 'activosfijo.d_anual', 'activosfijo.valor_residual',
                'ubicacion.pais as ubicacion_pais', 'ubicacion.ciudad as ubicacion_ciudad', 'ubicacion.edificio as ubicacion_edificio', 'departamentos.nombre as departamento_nombre', 'depreciaciones.descripcion as depreciacion_descripcion',
                'depreciaciones.vida_util as depreciacion_vidaUtil')
                ->where('activosfijo.codigo', $request->codigo)
                ->first();
            }else{
                $activo = Activofijo::join('ubicacion', 'activosfijo.id_ubicacion', 'ubicacion.id')
                ->join('departamentos', 'ubicacion.id_departamento', 'departamentos.id')
                ->join('depreciaciones', 'activosfijo.id_depreciacion', 'depreciaciones.id')
                ->select('activosfijo.codigo', 'activosfijo.foto', 'activosfijo.nombre', 'activosfijo.detalle', 'activosfijo.tipo', 'activosfijo.fecha_ingreso', 'activosfijo.costo', 'activosfijo.estado', 'activosfijo.proveedor', 'activosfijo.d_anual', 'activosfijo.valor_residual',
                'ubicacion.pais as ubicacion_pais', 'ubicacion.ciudad as ubicacion_ciudad', 'ubicacion.edificio as ubicacion_edificio', 'departamentos.nombre as departamento_nombre', 'depreciaciones.descripcion as depreciacion_descripcion',
                'depreciaciones.vida_util as depreciacion_vidaUtil')
                ->where('activosfijo.id', $request->id)
                ->first();
            }
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $activo], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function obtenerActivosA()
    {
        try {
            //$paciente = auth('api')->user();
            $activos = Activofijo::select('activosfijo.id', 'activosfijo.codigo', 'activosfijo.nombre')->get();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $activos], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }
}
