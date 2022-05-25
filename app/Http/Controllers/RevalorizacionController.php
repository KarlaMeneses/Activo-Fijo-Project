<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Revalorizacion;
use Illuminate\Http\Request;

class RevalorizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revalorizacion = Revalorizacion::all();
        $activosfijo = Activofijo::all();
        return view('revalorizacion.index', compact('revalorizacion', 'activosfijo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revalorizacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $revalorizacion = new Revalorizacion();
        $revalorizacion->tiempo_vida=$request->tiempo_vida;
        $revalorizacion->valor=$request->valor;
        $revalorizacion->id_activo=$request->id_activo;
        $revalorizacion->save();
        return redirect()->route('revalorizacion.index');
    }

    
    public function idactivo(Request $request)
    {
        $revalorizacion = new Revalorizacion();
        $revalorizacion->id_activo=$request->id_activo;
        $revalorizacion->save();
        return redirect()->route('activosfijo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $revalorizacion = Revalorizacion::find($id);
        $activosfijo = Activofijo::all();
        return view('revalorizacion.show', compact('revalorizacion', 'activosfijo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revalorizacion = Revalorizacion::findOrFail($id);
        $activosfijo = Activofijo::all();
        return view('revalorizacion.edit', compact('revalorizacion', 'activosfijo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Revalorizacion $revalorizacion)
    {
        
        $revalorizacion = Revalorizacion::findOrFail($revalorizacion->id);
        $revalorizacion->valor = $request->input('valor');
        $revalorizacion->tiempo_vida = $request->input('tiempo_vida');
        //return 'hola lu';
        $revalorizacion->save();
        return redirect()->route('revalorizacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $revalorizacion = Revalorizacion::find($id);
        $revalorizacion->delete();
        return redirect()->back();
    }
}
