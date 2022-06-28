<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
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
    public function store(Request $request, $id)
    {
        $detallenota = new Detallenota();
        $detallenota->cantidad = $request->cantidad;
        $detallenota->detalle = $request->detalle;
        $detallenota->precio_uni = $request->precio_uni;
        $detallenota->total = $request->total;
        $detallenota->id_notas = $id;
        $detallenota->save();
        return back();
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
        $detallenota->nombre = $request->nombre;
        $detallenota->detalle = $request->detalle;
        $detallenota->precio_uni = $request->precio_uni;
        $detallenota->total = $request->cantidad * $request->precio_uni;
        $detallenota->id_notas = $id;
        $detallenota->id_facturas = 1;
        $detallenota->save();

        $total = $request->nota_totales + $detallenota->total;
        //return $total;
        DB::table('notas')->where('id', $id)->update(['totales' => $total]);

        //AQUI SE TIENE QUE INSERTAR LOS ACTIVOS A LA TABLA DE ACTIVOS

        $date = date('Y-m-d', time()); //POR SI SE REGISTRAN ACTIVOS DEL MES PASADO verifica (NO ACTIVO)
        $nota = Nota::find($id);
        if ($nota->tipo == 'compra') {
            for ($i = 0; $i < $request->cantidad; $i++) {
                DB::table('activosfijo')->insert(
                    [   //nota compra
                        [
                            'nombre' => $request->nombre,
                            'detalle' => $request->detalle,
                            'estado' => 'espera',
                            'costo' => $request->precio_uni,
                            'proveedor' => $nota->proveedor,
                            'v_residual' => $request->precio_uni,
                            'estado' => "No activo",
                            'fecha_ingreso' => $date
                        ],
                    ]
                );
            }
        }
        $actifijo = Activofijo::latest('id')->first();
        $detallenota->id_activosfijo = $actifijo->id;
        $detallenota->save();
        return back();
    }

    public function detalle_destroy(Request $request, $id)
    {
        $detalle = Detallenota::find($id);
        $total = $request->nota_totales -  $detalle->total;
        if ($total < 0) {
            $total = 0;
        }
        Detallenota::destroy($id);
        DB::table('notas')->where('id', $request->id_nota)->update(['totales' => $total]);

        //ELIMINAR DE LOS ACTIVOS FIJOS
        //$tipo_nota = DB::table('activosfijo')->where('tipo', 'compra')->get();
        //if ($tipo_nota == 'compra') {
         /*el bueno for ($i = 0; $i < $detalle->cantidad; $i++) {
                DB::table('activosfijo')->where('detalle', $detalle->detalle)->delete();
            }*/
        //}

        return back();
    }
}
