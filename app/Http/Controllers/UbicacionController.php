<?php

namespace App\Http\Controllers;
use App\Models\Ubicacion;
use App\Models\Departamento;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index()
    {
        $ubi= Ubicacion::all();
        $depa= Departamento::all();
        return view('ubicacion.index', compact('ubi','depa')); 
    }

    public function create()
    {
        $ubi= Ubicacion::all();
        $depa= Departamento::all();
        return view('ubicacion.create', compact('ubi','depa'));  
    }
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz"); // se define la zona horaria que usa Bolivia
       
        $ubi= Ubicacion::create($request->all());
        return redirect()->route('ubicaciones.index'); // Se redirige a la vista ubicaiones.index
    }


}
