<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = 'solicitud';
    protected $fillable = ['persona_sol', 'tipo_soli', 'clasificacion', 'concepto', 'estado', 'fecha'];

    public static function crearSolicitud(Request $request){
        $solicitud = new Solicitud();
        $solicitud->persona_sol = $request->persona_sol;
        $solicitud->concepto = $request->concepto;
        $solicitud->fecha = $request->fecha;
        $solicitud->clasificacion = $request->clasificacion;
        $solicitud->estado        = 'En Proceso';
        $solicitud->estado_fin    = 'No Aprobado';
        $solicitud->respuesta_fin = 'No Asignado'; 
        $solicitud->save();
    }

    public static function eliminarSolicitud(Request $request)
    {
        $banner = Solicitud::findOrFail($request->id);
        $banner->delete();
    }
}
