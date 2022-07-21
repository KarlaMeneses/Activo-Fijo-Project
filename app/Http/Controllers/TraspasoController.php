<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Bitacora;
use App\Models\Traspaso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TraspasoController extends Controller
{
    public function index()

    {
       $traspasos = Traspaso::all();
       $activos = Activofijo::all();
        return view('traspasos.index', compact('traspasos','activos'));
    }

    public function create()
    {
        $activos = Activofijo::all();
        return view('traspasos.create', compact('activos'));
    }

    public function store(Request $request)
    {
        $tras = new Traspaso();
        $tras->anterior    = 'Sin Asignar';
        $tras->nuevo       = $request->nuevo;
        $tras->fecha       = $request->fecha;
        $tras->descripcion = $request->descripcion;
        $tras->id_activo   = $request->id_activo;
        $tras->save();

        $activo = Activofijo::find($tras->id_activo);
        
        $tras->anterior = $activo->responsable;
        $tras->save();
        $activo->responsable = $tras->nuevo;
        $activo->fecha_res   = $tras->fecha;
        $activo->save();

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Registró');
        $bita->apartado = encrypt('Traspasos');
        $afectado = $tras->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();

        

        return redirect()->route('traspasos.index'); // Se redirige a la vista categoria.index
    }

    public function edit($id)
    {
        $tras = Traspaso::find($id);
        $activos = Activofijo::all();
        return view('traspasos.edit', compact('tras', 'activos'));
    }

    public function update(Request $request, $id)
    {
        $tras = Traspaso::find($id);
        $tras->anterior    = "Actualizando";
        $tras->nuevo       = $request->nuevo;
        $tras->fecha       = $request->fecha;
        $tras->descripcion = $request->descripcion;
        $tras->id_activo    = $request->id_activo;
        $tras->save();

        $activo = Activofijo::find($tras->id_activo);
        $tras->anterior = $activo->responsable;
        $tras->save();
        $activo->responsable = $tras->nuevo;
        $activo->fecha_res   = $tras->fecha;
        $activo->save();

       /* ------------BITACORA----------------- */
       $bita = new Bitacora();
       $bita->accion = encrypt('Editó');
       $bita->apartado = encrypt('Traspasos');
       $afectado = $tras->id;
       $bita->afectado = encrypt($afectado);
       $fecha_hora = date('m-d-Y h:i:s a', time());
       $bita->fecha_h = encrypt($fecha_hora);
       $bita->id_user = Auth::user()->id;
       $ip = $request->ip();
       $bita->ip = encrypt($ip);
       $bita->save();
        return redirect()->route('traspasos.index');
    }

    /* public function show($id)
    {
        $mante = Mantenimiento::find($id);
        $activos = Activofijo::all();
        return view('mantenimiento.show', compact('mante', 'activos'));
    } */


    public function destroy(Request $request,$id)
    {
        $tras = Traspaso::find($id);
        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Eliminó');
        $bita->apartado = encrypt('Traspasos');
        $afectado = $tras->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        $tras->delete();
        return redirect()->back();
    }
}
