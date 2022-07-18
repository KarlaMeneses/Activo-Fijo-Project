<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    public function obtenerSolicitudes()
    {
        try {
            //$paciente = auth('api')->user();
            $solis = Solicitud::select('id', 'persona_sol', 'concepto', 'estado', 'fecha')->get();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $solis], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function crearSolicitud(Request $request){
        try {
            DB::beginTransaction();
            Solicitud::crearSolicitud($request);
            DB::commit();
            return response()->json(['mensaje' => 'Solicitud creado exitosamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function eliminarSolicitud(Request $request)
    {
        // dd(json_decode(json_encode($request->all())));
        try {
            DB::beginTransaction();
            Solicitud::eliminarSolicitud($request);
            DB::commit();
            return response()->json(['mensaje' => 'Solicitud eliminado exitosamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }
}
