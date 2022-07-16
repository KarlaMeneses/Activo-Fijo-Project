<?php

namespace App\Http\Controllers;

use App\Models\SoliActivo;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        $solis = Solicitud::all();
        return view('solicitud.index', compact('solis'));
    }

    public function create()
    {
        return view('solicitud.create');
    }

    public function store(Request $request)
    {
        $soli = new Solicitud();
        $soli->persona_sol   = $request->persona_sol;
        $soli->tipo_soli     = $request->tipo_soli;
        $soli->clasificacion = $request->clasificacion;
        $soli->concepto      = $request->concepto;
        $soli->estado        = 'En Proceso';
        $soli->estado_fin    = 'En Proceso';
        $soli->fecha         = $request->fecha;
        $soli->save();
        return redirect()->route('solicitud.edit', $soli->id);

        
    }

    public function store_act(Request $request, $id)
    {

        $soli_act = new SoliActivo();
        $soli_act->id_sol = $id;
        $soli_act->item = $request->item;
        $soli_act->unidad = $request->unidad;
        $soli_act->cantidad = $request->cantidad;
        $soli_act->save();
        
        return redirect()->back();
    }

    public function show($id)
    {
        $soli = Solicitud::find($id);
        $soli_acts = SoliActivo::all();
        return view('solicitud.show', compact('soli', 'soli_acts'));
    }

    public function edit($id)
    {
        $soli = Solicitud::find($id);
        $soli_acts = SoliActivo::all();
        return view('solicitud.edit', compact('soli', 'soli_acts'));
    }

    public function update(Request $request, $id)
    {

        $soli = Solicitud::find($id);
        $soli->persona_sol   = $request->persona_sol;
        $soli->tipo_soli     = $request->tipo_soli;
        $soli->clasificacion = $request->clasificacion;
        $soli->concepto      = $request->concepto;
        $soli->estado        = $request->estado;
        $soli->estado_fin        = $request->estado_fin;
        $soli->fecha         = $request->fecha;
        $soli->save();

        return redirect()->route('solicitud.index');
    }


    public function destroy($id)
    {
        $soli = Solicitud::find($id);
        $soli->delete();
        return redirect()->back();
    }

    public function destroy_act($id)
    {
        $soli_act = SoliActivo::where('id', $id)->first();
        $soli_act->delete();
        return redirect()->back();
    }

}
