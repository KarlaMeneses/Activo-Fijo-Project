<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Ubicacion;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $depas = Departamento::all();
        return view('ubicacion.create', compact('depas'));  
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

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Registró');
        $bita->apartado = encrypt('Ubicaciones');
        $afectado = $ubi->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
       
        
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

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Editó');
        $bita->apartado = encrypt('Ubicaciones');
        $afectado = $ubi->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();

        return redirect()->route('ubicaciones.index');
    }

    public function destroy(Request $request,$id)
    {
        $ubi = Ubicacion::find($id);
        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Eliminó');
        $bita->apartado = encrypt('Ubicaciones');
        $afectado = $ubi->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        $ubi->delete();
        return redirect()->back();
    }


}
