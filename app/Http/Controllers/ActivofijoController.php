<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Departamento;
use App\Models\Depreciacion;
use App\Models\Factura;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;

class ActivofijoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activosfijo = Activofijo::all();
        return view('activosfijo.index', compact('activosfijo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depas = Departamento::all();
        $ubi = Ubicacion::all();
        return view('activosfijo.create', compact('depas', 'ubi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activofijo = new Activofijo();
        $activofijo->codigo = $request->codigo;
        $activofijo->nombre = $request->nombre;
        $activofijo->detalle = $request->detalle;
        $activofijo->tipo = $request->tipo;
        $activofijo->fecha_ingreso = $request->fecha_ingreso;
        $activofijo->proveedor = $request->proveedor;
        $activofijo->costo = $request->costo;
        $activofijo->estado = $request->estado;

        $ubicacion = Ubicacion::all();
        foreach ($ubicacion as $ubi) {
            if ($ubi->edificio == $request->id_ubicacion) {
                $activofijo->id_ubicacion = $ubi->id;
            }
        }
        $activofijo->id_factura = $request->id_factura;
        $activofijo->save();
        return redirect()->route('activosfijo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activofijo = Activofijo::find($id);
        $ubicaciones = Ubicacion::all();
        $facturas = Factura::all();
        $departamentos = Departamento::all();
        $depreciacion = Depreciacion::all();
        foreach ($depreciacion as $depreci) {
            if ($activofijo->id_depreciacion == $depreci->id) {
                $depreciacion = Depreciacion::find($depreci->id);
            }
        }

        return view('activosfijo.show', compact('activofijo', 'facturas', 'ubicaciones', 'departamentos', 'depreciacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activofijo = Activofijo::find($id);
        $ubicaciones = Ubicacion::all();
        $facturas = Factura::all();
        $departamentos = Departamento::all();
        $ubicaci = Ubicacion::find($activofijo->id_ubicacion);
        $depa = Departamento::find($ubicaci->id);
        return view('activosfijo.edit', compact('activofijo', 'facturas', 'ubicaciones', 'departamentos', 'ubicaci', 'depa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $activofijo)
    {
        $activofi = Activofijo::findOrFail($activofijo);
        $activofi->codigo = $request->codigo;
        $activofi->nombre = $request->nombre;
        $activofi->detalle = $request->detalle;
        $activofi->tipo = $request->tipo;
        $activofi->fecha_ingreso = $request->fecha_ingreso;
        $activofi->proveedor = $request->proveedor;
        $activofi->costo = $request->costo;
        $activofi->estado = $request->estado;
        if ($request->id_ubicacion != null) {
            $ubicacion = Ubicacion::all();
            foreach ($ubicacion as $ubi) {
                if ($ubi->edificio == $request->id_ubicacion) {
                    $activofi->id_ubicacion = $ubi->id;
                }
            }
        }
        $activofi->save();
        return redirect()->route('activosfijo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activofijo = Activofijo::find($id);
        $activofijo->delete();
        return redirect()->back();
    }

    public function calcular($id)
    {
        $activofijo = Activofijo::find($id);
        $fechaActual = 2022 - 06 - 28;
        $fechaingreso = 2018 - 06 - 28;
        $segundosFechaActual = strtotime($fechaActual);
        $segundosFechaingreso = strtotime($fechaingreso);
        $segundosTranscurridos = $segundosFechaActual - $segundosFechaingreso;
        $semanasTranscurridos = $segundosTranscurridos / 604800;
        $semana = floor($semanasTranscurridos);

        $depreciacion = Depreciacion::all();
        foreach ($depreciacion as $depreci) {
            if ($depreci->id == $activofijo->id_depreciacion) {
                $auxi = $depreci->vida_util;
                $idaux = $depreci->id;
            }
        }

        $DAnual = $activofijo->costo / $auxi;

        if ($semana >= 52 && $semana < 104 ) { // 1 año
            DB::table('activosfijo')->where('id', $idaux)->update(['d_anual' => $DAnual]);
        } else {
            if ($semana >= 104 && $semana < 156 ) { // 2 año
                DB::table('activosfijo')->where('id', $idaux)->update(['d_anual' => $DAnual * 2]);
            } else {
                if ($semana >= 156 && $semana < 208 ) { //3 año
                    DB::table('activosfijo')->where('id', $idaux)->update(['d_anual' => $DAnual * 3]);
                } else {
                    if ($semana >= 208 && $semana < 260 ) { //4 año
                        DB::table('activosfijo')->where('id', $idaux)->update(['d_anual' => $DAnual * 4]);
                    } else {
                        if ($semana >= 260 && $semana < 312 ) { //5 año
                            DB::table('activosfijo')->where('id', $idaux)->update(['d_anual' => $DAnual * 5]);
                        }
                    }
                }
            }
        }

        return redirect()->back();
    }
}
