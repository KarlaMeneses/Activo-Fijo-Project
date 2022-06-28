<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Departamento;
use App\Models\Factura;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
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
        return view('activosfijo.create',compact('depas','ubi'));
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
        $activofijo->codigo=$request->codigo;
        $activofijo->nombre=$request->nombre;
        $activofijo->detalle=$request->detalle;
        $activofijo->tipo=$request->tipo;
        $activofijo->fecha_ingreso=$request->fecha_ingreso;
        $activofijo->proveedor=$request->proveedor;
        $activofijo->costo=$request->costo;
        $activofijo->vida_util=$request->vida_util;
        $activofijo->v_residual=$request->costo;
        $activofijo->estado=$request->estado;
        
        $ubicacion = Ubicacion::all();
        foreach ($ubicacion as $ubi) {
            if ($ubi->edificio == $request->id_ubicacion ) {
                $activofijo->id_ubicacion= $ubi->id;
            }
        }
        $activofijo->id_factura=$request->id_factura;
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
        return view('activosfijo.show', compact('activofijo', 'facturas', 'ubicaciones', 'departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
