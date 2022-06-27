<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    //

    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresa.create');
    }

    public function store(Request $request) 
    {
        $credentials =   Request()->validate([
            'nombre' => ['required'],
            'direccion' => ['required'],
            'nit' => ['required'],
            'email' => ['required'],
            'juridica' => ['required'], 
            'telefono' => ['required'],
            
        ]);
       
            $empresa= Empresa::create([
                'nombre'=>request('nombre'),
                'direccion'=>request('direccion'),
                'nit'=>request('nit'),
                'telefono'=>request('telefono'),
                'juridica'=>request('juridica'), 
                'foto'=>request('foto'),
                'email'=>request('email'),
            ]); 
       

        return redirect()->route('empresa.index');
    }


    public function edit($id)
    {
        $empresa = Empresa::find($id);
      
        return view('empresa.edit', compact('empresa'));
    }


    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->nombre = $request->input('nombre');
        $empresa->direccion = $request->input('direccion');
        $empresa->nit = $request->input('nit');
        $empresa->telefono = $request->input('telefono');
        $empresa->email = $request->input('email');
        $empresa->foto = $request->input('foto');
        $empresa->save();
        return redirect()->route('empresa.index');
    }

    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();
        return redirect()->back();
    }

    public function show($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.show', compact('empresa'));
    }
}
