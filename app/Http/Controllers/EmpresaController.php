<?php

namespace App\Http\Controllers;

use App\Exports\EmpresaExport;
use App\Models\Bitacora;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class EmpresaController extends Controller
{
    //

    public function index()
    {
        $empresas = Empresa::all();
        return view('empresa.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresa.create');
    }

    public function store(Request $request) 
    {
        $credentials =   Request()->validate([
            'nombre' => ['required'],
            'direccion' => ['required'],
            'nit' => ['required'],
            'email' => ['required'],
            'juridica' => ['required'], 
            'telefono' => ['required'],
            
        ]);
       
            $empresa= Empresa::create([
                'nombre'=>request('nombre'),
                'direccion'=>request('direccion'),
                'nit'=>request('nit'),
                'telefono'=>request('telefono'),
                'juridica'=>request('juridica'), 
                'foto'=>request('foto'),
                'email'=>request('email'),
            ]); 

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Registró');
        $bita->apartado = encrypt('Empresa');
        $afectado = $empresa->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
       

        return redirect()->route('empresa.index');
    }

    public function reporte(Request $request)
    {
        $user_c = Auth::user()->id;
      
        $user = User::find($user_c);
        
         $lol = $request;
        $empresas = Empresa::whereBetween('created_at', [$request->inicio, $request->fin])->get();
        if($request->tipo == 'pdf'){
        $view = View::make('empresa.reporte', compact('empresas','user', 'lol'))->render();

        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ]);

        $pdf->loadHTML($view);
        return $pdf->stream();
        }

        if($request->tipo == 'excel'){
            return Excel::download(new EmpresaExport($request), 'empresas.xlsx');
           }
           if($request->tipo == 'html'){
            return  $view = View::make('empresa.reporte', compact('empresas','user', 'lol'))->render();
           }

    }

    public function edit()
    {
        $id = 1;
        $empresa = Empresa::where('id', $id)->first();
    
        return view('empresa.edit', compact('empresa'));
    }


    public function update(Request $request)
    {
        $id = 1;
        $empresa = Empresa::where('id', $id)->first();
        $empresa->nombre = $request->input('nombre');
        $empresa->direccion = $request->input('direccion');
        $empresa->nit = $request->input('nit');
        $empresa->telefono = $request->input('telefono');
        $empresa->email = $request->input('email');
        $empresa->foto = $request->input('foto');
        $empresa->save();

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Editó');
        $bita->apartado = encrypt('Empresa');
        $afectado = $empresa->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
        return redirect()->route('home');
    }

    public function destroy(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Eliminó');
        $bita->apartado = encrypt('Empresa');
        $afectado = $empresa->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
        $empresa->delete();
        return redirect()->back();
    }

    public function show( $id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.show', compact('empresa'));
    }


}
