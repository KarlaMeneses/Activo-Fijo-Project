<?php

namespace App\Http\Controllers;

use App\Models\Ayuda;
use Illuminate\Http\Request;

class AyudaController extends Controller
{
    //
    public function index()
    {
        $ayuds = Ayuda::all();
        return view('ayuda.index', compact('ayuds')); 
    }

    public function create()
    {
        return view('ayuda.create');
    }

    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz"); // se define la zona horaria que usa Bolivia
        $request->validate([
            'foto' => 'required|unique:ayudas', //Se valida el nombre en categoria para que no se repitan antes de registrar una nueva
            'descripcion' => 'required|unique:ayudas'
        ]);
        $depas= Ayuda::create($request->all()); // se crea una categoria con una funcion directa de laravel usando al model de referencia para solicitar los datos
        return redirect()->route('ayudas.index'); // Se redirige a la vista categoria.index
    }
   

    public function show($id)
    {
        $ayud = Ayuda::find($id);
        return view('ayuda.show', compact('ayud'));

    }

    public function edit($id)
    {
        $ayud = Ayuda::find($id);
        return view('ayuda.edit', compact('ayud'));
    }

    public function update(Request $request, $id)
    {
        $ayud = Ayuda::find($id);
        $ayud->foto = $request->foto;
        $ayud->descripcion = $request->descripcion;
        $ayud->save();
        return redirect()->route('ayudas.index'); 
    }


    public function destroy($id)
    {
        $ayud = Ayuda::find($id);
        $ayud->delete();
        return redirect()->back();
    }


}
