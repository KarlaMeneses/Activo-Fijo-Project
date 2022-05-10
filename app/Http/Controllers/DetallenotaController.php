<?php

namespace App\Http\Controllers;

use App\Models\Detallenota;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnCallback;

class DetallenotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $detallenota = new Detallenota();
        $detallenota->cantidad = $request->cantidad;
        $detallenota->detalle = $request->detalle;
        $detallenota->precio_uni = $request->precio_uni;
        $detallenota->total = $request->total;
        $detallenota->save();
        return view('nota.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function detalle_update(Request $request, $id)
    {
        $detallenota = new Detallenota();
        $detallenota->cantidad = $request->cantidad;
        $detallenota->detalle = $request->detalle;
        $detallenota->precio_uni = $request->precio_uni;
        $detallenota->total = $request->cantidad * $request->precio_uni;
        $detallenota->id_notas = $id;
        $detallenota->save();

        $total = $request->nota_totales + $request->total;
        DB::table('notas')->where('id', $id)->update(['totales' => $total]);
        return back();
    }

    public function detalle_destroy(Request $request, $id)
    {
        $detalle = Detallenota::find($id);
        $total = $request->nota_totales -  $detalle->total;
        Detallenota::destroy($id);
        DB::table('notas')->where('id', $request->id_nota)->update(['totales' => $total]);
        return back();
    }
}
