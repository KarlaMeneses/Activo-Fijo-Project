<?php

namespace App\Http\Controllers;

use App\Models\Depreciacion;
use Illuminate\Http\Request;



class DepreciacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depres = Depreciacion::all();
        return view('depreciacion.index', compact('depres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('depreciacion.create');
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
            'nombre' => 'required|unique:depreciaciones', //Se valida el nombre en categoria para que no se repitan antes de registrar una nueva
            'descripcion' => 'required|unique:depreciaciones',
            'tipo_activo' => 'required|unique:depreciaciones',
            'cacateristica' => 'required|unique:depreciaciones',
            'vida_util' => 'required|unique:depreciaciones',
            'valor_residual' => 'required|unique:depreciaciones',
        ]);
        $depres = Depreciacion::create($request->all()); // se crea una categoria con una funcion directa de laravel usando al model de referencia para solicitar los datos
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
        $depres = Depreciacion::find($id);
        return view('depreciacion.show', compact('depres'));
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
        $depres->cacateristica = $request->cacateristica;
        $depres->vida_util = $request->vida_util;
        $depres->valor_residual = $request->valor_residual;
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
