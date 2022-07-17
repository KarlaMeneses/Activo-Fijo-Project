<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

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
}
