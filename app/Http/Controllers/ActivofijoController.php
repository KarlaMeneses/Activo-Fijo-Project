<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Bitacora;
use App\Models\Departamento;
use App\Models\categoria;
use App\Models\Depreciacion;
use App\Models\Factura;
use App\Models\Ubicacion;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
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
        $categorias = categoria::all();
        return view('activosfijo.index', compact('activosfijo','categorias'));
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
        $categoria = categoria::all();
        return view('activosfijo.create', compact('depas', 'ubi', 'categoria'));
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
        $activofijo->foto = $request->foto;
        $activofijo->codigo = $request->codigo;
        $activofijo->nombre = $request->nombre;
        $activofijo->detalle = $request->detalle;
        $activofijo->id_categoria = $request->id_categoria;
        $activofijo->fecha_ingreso = $request->fecha_ingreso;
        $activofijo->estado = $request->estado;
        $activofijo->costo = $request->costo;
        $activofijo->proveedor = $request->proveedor;
        $activofijo->valor_residual= $request->valor_residual;
        $activofijo->v_actual = $request->costo;
        $ubicacion = Ubicacion::all();
        foreach ($ubicacion as $ubi) {
            if ($ubi->edificio == $request->id_ubicacion) {
                $activofijo->id_ubicacion = $ubi->id;
            }
        }

        $categoria = categoria::all();
        foreach ($categoria as $categoria) {
            if ($categoria->nombre == $request->id_categoria) {
                $activofijo->id_categoria = $categoria->id;
            }
        }
        $activofijo->id_factura = $request->id_factura;
        $activofijo->save();
        $activofijo = Activofijo::latest('id')->first();

        $cat = categoria::find($activofijo->id_categoria);
        //
        $anual = ($activofijo->costo - $activofijo->valor_residual) / $cat->vida_util;
        $activofijo->d_anual = $anual;
        //
        $contador = 0;
        $val = $activofijo->costo;
        for ($i = 1; $i <= $cat->vida_util; $i++) {
            $depreciacion = new Depreciacion();
            $depreciacion->año = $i;
            $val = $val - $anual;
            $depreciacion->valor = $val;
            $contador = $contador + $activofijo->d_anual; 
            $depreciacion->d_acumulada = $contador;
            $depreciacion->id_activo = $activofijo->id;
            $depreciacion->save();
        }
       
        $activofijo->save();

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Registró');
        $bita->apartado = encrypt('Activo Fijo');
        $afectado = $activofijo->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */

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
        $categoria = categoria::find($activofijo->id_categoria);
        $depreciacion = Depreciacion::all();
        return view('activosfijo.show', compact('activofijo', 'facturas', 'ubicaciones', 'departamentos', 'categoria', 'depreciacion'));
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
        $activofi->fecha_ingreso = $request->fecha_ingreso;
        $activofi->proveedor = $request->proveedor;
        $activofi->costo = $request->costo;
        $activofi->v_actual = $request->costo;
        $activofi->valor_residual = $request->valor_residual;
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

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Editó');
        $bita->apartado = encrypt('Activo Fijo');
        $afectado = $activofi->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
        return redirect()->route('activosfijo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $activofijo = Activofijo::find($id);
        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Eliminó');
        $bita->apartado = encrypt('Activo Fijo');
        $afectado = $activofijo->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
        $activofijo->delete();
        return redirect()->back();
    }

    public function calcular($id)
    {
        $activofijo = Activofijo::find($id);
        /*
        $V_activo = $activofijo->costo;
        $id_de = $activofijo->id_categoria;
        $categoria = categoria::find($id_de);

        $V_residual = $categoria->valor_residual; //12,50 %
        $VidaU_activo = $categoria->vida_util;    //20 años

        $G_anual = ($V_activo - $V_residual) / $VidaU_activo; 

        return redirect()->back();
        */

        /*
       //CALCULANDO EL TIEMPO
       $fecha1 = new DateTime($activofijo->fecha_ingreso);
       $actualf = Carbon::now()->toDateString();

       $fecha2 = new DateTime($actualf);
       $tiempo_transcurrido = $fecha1->diff($fecha2);
      
       $Tiempo = $tiempo_transcurrido->y; 
       //GET YEAR
       $activofijo->d_acumulada = $Tiempo * $activofijo->d_anual;

       */
        $activofijo->save();
        return redirect()->back();
    }


    public function reporte(Request $request, $id)
    {
        $user_c = Auth::user()->id;
        $id1 = 1;
        $empresa = Empresa::where('id', $id1)->first();
        $user = User::find($user_c);
        $activo = Activofijo::find($id);
        $i =$request->inicio;
        $f =$request->fin;
         $lol = $request;
         $ubicacion = Ubicacion::find($activo->id_ubicacion);
         $departamento = Departamento::find($ubicacion->id);
         $categoria = categoria::find($activo->id_categoria);

            $view = View::make('activosfijo.reporte', compact('activo','categoria','ubicacion','departamento', 'lol', 'empresa'))->render();

            $pdf = App::make('dompdf.wrapper');
            $pdf->setOptions([
                'logOutputFile' => storage_path('logs/log.htm'),
                'tempDir' => storage_path('logs/')
            ]);
    
            $pdf->loadHTML($view);
            return $pdf->stream();
    
   
    }

    public function reportedina(Request $request)
    {
        $user_c = Auth::user()->id;
        $id1 = 1;
        $empresa = Empresa::where('id', $id1)->first();
        $user = User::find($user_c);
        $activos = Activofijo::whereBetween('fecha_ingreso', [$request->inicio, $request->fin])->get();
        $i =$request->inicio;
        $f =$request->fin;
         $lol = $request;
        
            $view = View::make('activosfijo.reportedina', compact('activos','user', 'lol', 'empresa'))->render();

            $pdf = App::make('dompdf.wrapper');
            $pdf->setOptions([
                'logOutputFile' => storage_path('logs/log.htm'),
                'tempDir' => storage_path('logs/')
            ]);
    
            $pdf->loadHTML($view);
            return $pdf->stream();
    
   
    }

}
