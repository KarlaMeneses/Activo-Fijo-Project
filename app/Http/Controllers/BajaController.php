<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Baja;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;
class BajaController extends Controller
{
    //
    public function index()
    {
        $bajas = Baja::all();
        return view('baja.index', compact('bajas'));
    }

    public function create()
    {
       $activos = Activofijo::all();
        return view('baja.create', compact('activos'));
    }
   
    public function store(Request $request) // almacena los datos que son pasados por el form
    {
        $credentials =   Request()->validate([ //validar los datos
            'idactivo' => ['required'],
            'fechasolicitada' => ['required'],
            'estado' => ['required'],
            'causadebaja' => ['required'],
            
            
        ]);
       
            $baja= Baja::create([
                'idactivo'=>request('idactivo'),
                'fechasolicitada'=>request('fechasolicitada'),
                'estado'=>request('estado'),
                'causadebaja'=>request('causadebaja'),
                
            ]); 
          
     
        return redirect()->route('baja.index');
    }

    public function edit($id)
    {
        $activos = Activofijo::all();
        $baja = Baja::findOrFail($id);
        return view('baja.edit', compact('baja', 'activos'));
    }

    public function update(Request $request, $id)
    {
        $baja = Baja::findOrFail($id);
        $baja->idactivo = $request->input('idactivo');
        $baja->fechasolicitada = $request->input('fechasolicitada');
        $baja->estado = $request->input('estado');
        $baja->causadebaja = $request->input('causadebaja');
        $baja->fechaaceptada = $request->input('fechaaceptada');
        $baja->save();
        return redirect()->route('baja.index');
    }

    public function destroy($id)
    {
        $baja = Baja::find($id);
        $baja->delete();
        return redirect()->back();
    }

    public function reporte(Request $request)
    {
        $user_c = Auth::user()->id;
        $id = 1;
        $empresa = Empresa::where('id', $id)->first();
        $baja = Baja::find($id);
        $activo = Activofijo::where('id', $baja->idactivo)->first();
      
        
   

            $view = View::make('baja.reporte', compact('baja','activo', 'empresa'))->render();

            $pdf = App::make('dompdf.wrapper');
            $pdf->setOptions([
                'logOutputFile' => storage_path('logs/log.htm'),
                'tempDir' => storage_path('logs/')
            ]);
    
            $pdf->loadHTML($view);
            return $pdf->stream();
        

     
    }
}
