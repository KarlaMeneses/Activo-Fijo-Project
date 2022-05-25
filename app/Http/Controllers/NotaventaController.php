<?php

namespace App\Http\Controllers;

use App\Models\Detallenota;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
class NotaventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $nota = Nota::findOrFail(1);

        $detallenotas = Detallenota::all();
        return view('notasventa.create', compact('nota', 'detallenotas'));
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
        
        $nota->adquirente = $request->adquirente;
        $nota->telefono = $request->telefono;
        $nota->fecha_venta = $request->fecha_venta;
        $nota->encargado = $request->encargado;
        $nota->cargo = $request->cargo;
        $nota->tipo = 'venta';
        $nota->save();
        $nota = Nota::latest('id')->first();
        $id = $nota->id;
        $detallenotas = Detallenota::all();
        return redirect()->route('notasventa.edit', $nota->id);
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
        return view('notasventa.show', compact('nota', 'detallenotas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notaventa = nota::findOrFail($id);
        $detallenotas = Detallenota::all();
        return view('notasventa.edit', compact('id','detallenotas'));
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

    public function reedit(Request $request)
    {
        $nota = Nota::findOrFail($request->input('id'));
        $nota->adquirente = $request->input('adquirente');
        $nota->telefono = $request->input('telefono');
        $nota->fecha_venta = $request->input('fecha_venta');
        $nota->encargado = $request->input('encargado');
        $nota->cargo = $request->input('cargo');
        $nota->totales = $request->input('totales');
        $nota->save();
        return redirect()->route('notasventa.index');
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
        $view = View::make('notasventa.reporte', compact('nota','detalles'))->render();
         $pdf = App::make('dompdf.wrapper');
         
         $pdf->setOptions([
             'logOutputFile' => storage_path('logs/log.htm'),
                 'tempDir' => storage_path('logs/')
         ]);
       
      $pdf->loadHTML($view);
        return $pdf->stream();   
 
                
            
    }
}
