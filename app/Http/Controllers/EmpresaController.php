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
            ]); 
       

        return redirect()->route('empresa.index');
    }
}
