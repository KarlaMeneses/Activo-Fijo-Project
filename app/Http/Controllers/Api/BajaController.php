<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Baja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BajaController extends Controller
{
    public function obtenerBajas()
    {
        try {
            //$paciente = auth('api')->user();
            $bajas = Baja::join('activosfijo', 'bajas.idactivo', 'activosfijo.id')
            ->select('bajas.id', 'activosfijo.nombre as activo', 'bajas.causadebaja', 'bajas.fechasolicitada', 'bajas.fechaaceptada', 'bajas.estado')->get();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $bajas], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }

    public function eliminarBaja(Request $request)
    {
        // dd(json_decode(json_encode($request->all())));
        try {
            DB::beginTransaction();
            Baja::eliminarBaja($request);
            DB::commit();
            return response()->json(['mensaje' => 'Baja eliminado exitosamente'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
        
    }
}
