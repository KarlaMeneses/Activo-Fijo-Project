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
        $activofijo->foto = $request->foto;
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
        $activofi->foto = $request->foto;
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

        $V_activo = $activofijo->costo;
        $id_de = $activofijo->id_depreciacion;
        $depreciacion = Depreciacion::find($id_de);

        $V_residual = $depreciacion->valor_residual; //12,50 %
        $VidaU_activo = $depreciacion->vida_util;    //20 años

        $G_anual = ($V_activo - $V_residual) / $VidaU_activo; 

        return redirect()->back();
    }
}
