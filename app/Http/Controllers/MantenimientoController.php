<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Bitacora;
use App\Models\Mantenimiento;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class MantenimientoController extends Controller
{
    public function index()

    {
        /*  $data = Mantenimiento::whereBetween('fecha_ini', ['2022-04-22', '2022-04-25'])->get();
        dd($data);   */
        $mantes = Mantenimiento::all();
        $activos = Activofijo::all();
        return view('mantenimiento.index', compact('mantes', 'activos'));
    }

    public function create()
    {
        $activos = Activofijo::all();
        return view('mantenimiento.create', compact('activos'));
    }

    public function store(Request $request)
    {
        $mante = new Mantenimiento();
        $mante->problema    = $request->problema;
        $mante->proveedor   = $request->proveedor;
        $mante->tiempo      = $request->tiempo;
        $mante->costo       = 0;
        $mante->fecha_ini   = $request->fecha_ini;
        $mante->fecha_fin   = '2000-01-01';
        $mante->fecha_aprox = $request->fecha_aprox;
        $mante->estado      = "En Proceso";
        $mante->solucion    = "En Espera";
        $mante->id_activo   = $request->id_activo;
        $mante->save();

        $activo = Activofijo::find($mante->id_activo);
        $activo->estado = 'En Mantenimiento';
        $activo->save();
        
        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Registró');
        $bita->apartado = encrypt('Mantenimiento');
        $afectado = $mante->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
        return redirect()->route('mantenimientos.index'); // Se redirige a la vista categoria.index
    }

    public function edit($id)
    {
        $mante = Mantenimiento::find($id);
        $activos = Activofijo::all();
        return view('mantenimiento.edit', compact('mante', 'activos'));
    }

    public function update(Request $request, $id)
    {
        $mante = Mantenimiento::find($id);
        $mante->problema    = $request->problema;
        $mante->proveedor   = $request->proveedor;
        $mante->tiempo      = $request->tiempo;
        $mante->costo       = $request->costo;
        $mante->fecha_ini   = $request->fecha_ini;
        $mante->fecha_fin   = $request->fecha_fin;
        $mante->fecha_aprox = $mante->fecha_aprox;
        $mante->estado      = $request->estado;
        $mante->solucion    = $request->solucion;
        $mante->id_activo   = $request->id_activo;
        $mante->save();

        $activo = Activofijo::find($mante->id_activo);

        if ($mante->estado == 'Finalizado' ) {
            $activo->estado = 'Activo';
        } else {
            $activo->estado = 'En Mantenimiento';
        }    

        $activo->save(); 

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Editó');
        $bita->apartado = encrypt('Mantenimiento');
        $afectado = $mante->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
        return redirect()->route('mantenimientos.index');
    }

    public function show($id)
    {
        $mante = Mantenimiento::find($id);
        $activos = Activofijo::all();
        return view('mantenimiento.show', compact('mante', 'activos'));
    }


    public function destroy(Request $request, $id)
    {
        $mante = Mantenimiento::find($id);
        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Eliminó');
        $bita->apartado = encrypt('Mantenimiento');
        $afectado = $mante->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
        $mante->delete();
        return redirect()->back();
    }

    public function reporte(Request $request)
    {
        $user_c = Auth::user()->id;
        $activos = Activofijo::all();
        $user = User::find($user_c);
        $i =$request->inicio;
        $f =$request->fin;
        $mantes = Mantenimiento::whereBetween('fecha_ini', [$request->inicio, $request->fin])->get();
        $total =0;

        foreach ($mantes as $mante) {
            $total = $total + $mante->costo;
        }
   

        $view = View::make('mantenimiento.reporte', compact('mantes','user','total','i','f','activos'))->render();

        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ]);

        $pdf->loadHTML($view);
        return $pdf->stream();
    }

    public function reporte_vista()
    {
    
        return view('mantenimiento.reporte_vista');
    }
}
