<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depas = Departamento::all();
        return view('departamento.index', compact('depas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.create');
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
            'nombre' => 'required|unique:departamentos', //Se valida el nombre en categoria para que no se repitan antes de registrar una nueva
            'descripcion' => 'required|unique:departamentos'
        ]);
        $depas= Departamento::create($request->all()); // se crea una categoria con una funcion directa de laravel usando al model de referencia para solicitar los datos
        return redirect()->route('departamentos.index'); // Se redirige a la vista categoria.index
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $depa = Departamento::find($id);
        return view('departamento.edit', compact('depa'));
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
        $depa = Departamento::find($id);
        $depa->nombre = $request->nombre;
        $depa->descripcion = $request->descripcion;
        $depa->save();
        return redirect()->route('departamentos.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depa = Departamento::find($id);
        $depa->delete();
        return redirect()->back();
    }
}
