<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Bitacora;
use App\Models\Revalorizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevalorizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revalorizacion = Revalorizacion::all();
        $activosfijo = Activofijo::all();
        return view('revalorizacion.index', compact('revalorizacion', 'activosfijo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revalorizacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $revalorizacion = new Revalorizacion();
        $revalorizacion->tiempo_vida = $request->tiempo_vida;
        $revalorizacion->costo = $request->costo;
        $revalorizacion->valor = $request->valor;
        $revalorizacion->foto = $request->foto;
        $revalorizacion->id_activo = $request->id_activo;
        $revalorizacion->save();

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Registró');
        $bita->apartado = encrypt('Revalorización');
        $afectado = $revalorizacion->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();

        return redirect()->route('revalorizacion.index');
    }


    public function idactivo(Request $request)
    {
        $revalorizacion = new Revalorizacion();
        $revalorizacion->id_activo = $request->id_activo;
        $revalorizacion->save();
        return redirect()->route('activosfijo.index');
    }

    public function aprobado(Request $request)
    {
        $revalorizacion = Revalorizacion::find($request->id_revalorizacion);
        $revalorizacion->estado = "Aprobado";
        $revalorizacion->save();
        return redirect()->route('revalorizacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $revalorizacion = Revalorizacion::find($id);
        $activosfijo = Activofijo::all();
        return view('revalorizacion.show', compact('revalorizacion', 'activosfijo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revalorizacion = Revalorizacion::findOrFail($id);
        $activosfijo = Activofijo::all();
        return view('revalorizacion.edit', compact('revalorizacion', 'activosfijo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revalorizacion $revalorizacion)
    {

        $revalorizacion = Revalorizacion::findOrFail($revalorizacion->id);
        $revalorizacion->tiempo_vida = $request->input('tiempo_vida');
        $revalorizacion->valor = $request->input('valor');
        $revalorizacion->foto = $request->input('foto');
        $revalorizacion->costo_revaluo = $request->input('costo_revaluo');
        $revalorizacion->estado = "En proceso";
        $revalorizacion->save();
        if ($request->input('estado') == "Aprobado") {
            $activosfijo = Activofijo::find($revalorizacion->id_activo);
            $activosfijo->valor_residual = $revalorizacion->valor;
            $activosfijo->save();
        }

         /* ------------BITACORA----------------- */
         $bita = new Bitacora();
         $bita->accion = encrypt('Editó');
         $bita->apartado = encrypt('Revalorización');
         $afectado = $revalorizacion->id;
         $bita->afectado = encrypt($afectado);
         $fecha_hora = date('m-d-Y h:i:s a', time());
         $bita->fecha_h = encrypt($fecha_hora);
         $bita->id_user = Auth::user()->id;
         $ip = $request->ip();
         $bita->ip = encrypt($ip);
         $bita->save();
        return redirect()->route('revalorizacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $revalorizacion = Revalorizacion::find($id);
         /* ------------BITACORA----------------- */
         $bita = new Bitacora();
         $bita->accion = encrypt('Eliminó');
         $bita->apartado = encrypt('Revalorización');
         $afectado = $revalorizacion->id;
         $bita->afectado = encrypt($afectado);
         $fecha_hora = date('m-d-Y h:i:s a', time());
         $bita->fecha_h = encrypt($fecha_hora);
         $bita->id_user = Auth::user()->id;
         $ip = $request->ip();
         $bita->ip = encrypt($ip);
         $bita->save();
        $revalorizacion->delete();
        return redirect()->back();
    }
}
