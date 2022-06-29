<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function obtenerFacturas()
    {
        try {
            //$paciente = auth('api')->user();
            $facturas = Factura::select('facturas.id', 'facturas.nit', 'facturas.ciudad', 'facturas.telefono', 'facturas.formapago', 'facturas.fechaemitida',
            'facturas.totalneto', 'facturas.tipo', 'facturas.foto')->get();
            return response()->json(['mensaje' => 'Consulta exitosa', 'data' => $facturas], 200);
        } catch (\Exception $e) {
            return response()->json(['mensaje' => $e->getMessage()], 500);
        }
    }
}
