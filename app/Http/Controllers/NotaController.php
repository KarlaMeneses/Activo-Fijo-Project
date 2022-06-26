<?php

namespace App\Http\Controllers;

use App\Models\Detallenota;
use App\Models\Nota;
use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Http\Request;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

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
        $nota->foto = $request->foto;
        $nota->tipo = 'compra';
        $nota->save();
        $nota = Nota::latest('id')->first();

/*
        
        $Nayuda = DB::table('notas')->get('codigo')->last();
        if ($Nayuda->codigo == null) {
            $Nayuda = DB::table('notas')->where('id', $nota->id)->update(['codigo' => 'Book_' . 0]);
        }

        $Nayuda = DB::table('notas')->get('codigo')->last();

        $inc = $Nayuda->codigo;

        $k = substr($inc, 5, 1); // 3

        $inc = substr($inc, 0, 5); //Book_
        $ss = intval($k) + 1;
        $inc = $inc . $ss;
        $Nayuda = DB::table('notas')->where('id', $nota->id)->update(['codigo' => $inc]);
        return $inc;

        if ($Nayuda->codigo == null) {

            //$Nayuda = DB::table('notas')->where('id', $nota->id)->update(['codigo' => 'Book_' . $inc]);
            return $Nayuda;
        }
        /*
        if ($Nayuda->ayuda == null) {
            DB::table('notas')->where('id', $nota->id)->update(['ayuda' => 1]);

        }else {
            DB::table('notas')->where('id', $nota->id)->update(['ayuda' => $Nayuda->ayuda + 1]);
        }

        $code = DB::table('notas')->get('ayuda')->last();

        DB::table('notas')->where('id', $nota->id)->update(['codigo' => 'Book_'.$code->ayuda]);
*/
        $detallenotas = Detallenota::all();
        return redirect()->route('notas.edit', compact('nota', 'detallenotas'));
    }


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
        $nota->foto = $request->input('foto');
        $nota->totales = $request->input('totales');
        $nota->save();

        $sindetalle = DB::table('detallenotas')->where('id_notas', $nota->id)->get();
        if ($sindetalle == '[]') {
            return back();
        }
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
        $nota = Nota::find($id);
        $nota->delete();
        return redirect()->back();
    }
    public function reporte(Request $request, $id)
    {
        $nota = Nota::find($id);
        $detalles = Detallenota::select('*')->where('id_notas', $nota->id)->get();
        $view = View::make('notas.reporte', compact('nota', 'detalles'))->render();
        // return $view;


        $pdf = App::make('dompdf.wrapper');

        $pdf->setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ]);

        $pdf->loadHTML($view);


        //return view('reporte.reporteComercioPrint', compact('comercio', 'fechainicio', 'fechafin', 'pedidos', 'resumen', 'resumenpagos','productos'));
        return $pdf->stream();
    }
    public function reportehtml(Request $request, $id)
    {
        $nota = Nota::find($id);
        $detalles = Detallenota::select('*')->where('id_notas', $nota->id)->get();
        $view = View::make('notas.reporte', compact('nota', 'detalles'))->render();
        return $view;
    }
}
