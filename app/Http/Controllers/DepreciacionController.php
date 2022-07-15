<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Depreciacion;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;


class DepreciacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activosfijo = Activofijo::all();
        return view('depreciacion.index', compact('activosfijo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz"); // se define la zona horaria que usa Bolivia
        $request->validate([
            'nombre' => 'required', //Se valida el nombre en depreciaciones para que no se repitan antes de registrar una nueva
            'descripcion' => 'required',
            'tipo_activo' => 'required',

            'vida_util' => 'required',
            'coeficiente' => 'required',
        ]);
        //$depres = Depreciacion::create($request->all()); // se crea una categoria con una funcion directa de laravel usando al model de referencia para solicitar los datos

        $depres = new Depreciacion();
        $depres->nombre = $request->nombre;
        $depres->descripcion = $request->descripcion;
        $depres->tipo_activo = $request->tipo_activo;
        $depres->vida_util = $request->vida_util;
        $depres->coeficiente = $request->coeficiente;
        $depres->save();
        //bitacora
        activity()->useLog('gestionar depreciaciones')->log('Registro')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $depres->id;
        $lastActivity->save();

        return redirect()->route('depreciaciones.index'); // Se redirige a la vista categoria.index
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activofijo = Activofijo::find($id);
        return view('depreciacion.show', compact('activofijo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $depres = Depreciacion::find($id);
        return view('depreciacion.edit', compact('depres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $depres = Depreciacion::find($id);
        $depres->nombre = $request->nombre;
        $depres->descripcion = $request->descripcion;
        $depres->tipo_activo = $request->tipo_activo;
        $depres->vida_util = $request->vida_util;
        $depres->coeficiente = $request->coeficiente;
        $depres->save();
        return redirect()->route('depreciaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depres = Depreciacion::find($id);
        $depres->delete();
        return redirect()->back();
    }
}
