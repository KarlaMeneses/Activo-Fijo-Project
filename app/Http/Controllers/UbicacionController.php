<?php

namespace App\Http\Controllers;
use App\Models\Ubicacion;
use App\Models\Departamento;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index()
    {
        $ubis= Ubicacion::all();
        $depas= Departamento::all();
        return view('ubicacion.index', compact('ubis','depas')); 
    }

    public function create()
    {
        $depa= Departamento::all();
        return view('ubicacion.create', compact('depa'));  
    }
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz"); // se define la zona horaria que usa Bolivia
       
        $ubi = new Ubicacion();
        $ubi->edificio = $request->edificio;
        $ubi->ciudad = $request->ciudad;
        $ubi->pais = $request->pais;
        $ubi->id_departamento = $request->id_departamento;
        $ubi->save();
       
        
        return redirect()->route('ubicaciones.index'); // Se redirige a la vista ubicaiones.index
    }

    public function edit($id)
    {
        $ubi = Ubicacion::find($id);
        $depas = Departamento::all();
        return view('ubicacion.edit', compact('ubi','depas'));
    }

    public function update(Request $request, $id)
    {

        $ubi = Ubicacion::find($id);
        $ubi->edificio = $request->edificio;
        $ubi->ciudad = $request->ciudad;
        $ubi->pais = $request->pais;
        $ubi->id_departamento = $request->id_departamento;
        $ubi->save();

        return redirect()->route('ubicaciones.index');
    }

    public function destroy($id)
    {
        $ubi = Ubicacion::find($id);
        $ubi->delete();
        return redirect()->back();
    }


}
