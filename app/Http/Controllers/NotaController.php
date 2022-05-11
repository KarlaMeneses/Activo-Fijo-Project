<?php

namespace App\Http\Controllers;

use App\Models\Detallenota;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Nota::all();
        return view('notas.index', compact('notas'));
    }

    public function indexVenta()
    {
        $notas = Nota::all();
        return view('notasventa.index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nota = nota::findOrFail(1);

        $detallenotas = Detallenota::all();
        return view('notas.create', compact('nota', 'detallenotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nota = new Nota();
        $nota->proveedor = $request->proveedor;
        $nota->direccion = $request->direccion;
        $nota->telefono = $request->telefono;
        $nota->fecha_entrega = $request->fecha_entrega;
        $nota->totales = $request->totales;
        $nota->save();
        //habilitar el detalle
        $nota_obj = Nota::latest('id')->first();
        //$nota_id = $nota_obj->id;
        $auxi = true;
        return redirect()->route('home')->with(compact('auxi'));
        //return redirect()->back()->with(compact('nota_id'));
        //  return redirect()->back();
    }

    /*   public function detalle_create(Request $request){
        return $request->id_nota;
    }*/


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Nota::find($id);
        $detallenotas = Detallenota::all();
        return view('notas.show', compact('nota', 'detallenotas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = nota::findOrFail($id);
        $detallenotas = Detallenota::all();
        return view('notas.edit', compact('nota', 'detallenotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        $nota = Nota::findOrFail($nota->id);
        $nota->proveedor = $request->input('proveedor');
        $nota->direccion = $request->input('direccion');
        $nota->telefono = $request->input('telefono');
        $nota->fecha_entrega = $request->input('fecha_entrega');
        $nota->totales = $request->input('totales');
        $nota->save();
        return redirect()->route('notas.index');
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
    /*
    public function total_update(Request $request, $id)
    {
        DB::table('notas')->where('id', $id)->update(['totales' => $request->totales]);
        return back();
    }*/
}
