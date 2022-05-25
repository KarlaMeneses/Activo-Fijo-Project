<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Mantenimiento;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantes = Mantenimiento::all();
        $activos = Activofijo::all();
        return view('mantenimiento.index', compact('mantes','activos'));
    }

    public function create()
    {   
        $activos = Activofijo::all();
        return view('mantenimiento.create', compact('activos'));
    }

    public function store(Request $request)
    {
        $mante = new Mantenimiento();
        $mante->problema  = $request->problema;
        $mante->costo     = 0;
        $mante->fecha_ini = $request->fecha_ini;
        $mante->fecha_fin = $request->fecha_fin;
        $mante->estado    = "En Proceso";
        $mante->solucion  = "En Espera";
        $mante->id_activo = $request->id_activo;
        $mante->save();
        return redirect()->route('mantenimientos.index'); // Se redirige a la vista categoria.index
    }

    public function edit($id)
    {
        $mante = Mantenimiento::find($id);
        $activos = Activofijo::all();
        return view('mantenimiento.edit', compact('mante','activos'));
    }

    public function update(Request $request, $id)
    {
        $mante = Mantenimiento::find($id);
        $mante->problema  = $request->problema;
        $mante->costo     = $request->costo;
        $mante->fecha_ini = $request->fecha_ini;
        $mante->fecha_fin = $request->fecha_fin;
        $mante->estado    = $request->estado;
        $mante->solucion  = $request->solucion;
        $mante->id_activo = $request->id_activo;
        $mante->save();
        return redirect()->route('mantenimientos.index'); 
    }

    public function show($id)
    {
        $mante = Mantenimiento::find($id);
        $activos = Activofijo::all();
        return view('mantenimiento.show', compact('mante','activos'));
    }


    public function destroy($id)
    {
        $mante = Mantenimiento::find($id);
        $mante->delete();
        return redirect()->back();
    }
}
