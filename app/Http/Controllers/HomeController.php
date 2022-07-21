<?php

namespace App\Http\Controllers;

use App\Models\Activofijo;
use App\Models\Depreciacion;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activos = Activofijo::all();
        $depreciacione = Depreciacion::all();
        foreach ($activos as $activofijo) {
            //CALCULANDO EL TIEMPO
            $fecha1 = new DateTime($activofijo->fecha_ingreso);
            $actualf = Carbon::now()->toDateString();
            $fecha2 = new DateTime($actualf);
            $tiempo_transcurrido = $fecha1->diff($fecha2);
            $Tiempo = $tiempo_transcurrido->y;
            //GET YEAR
            if ($Tiempo >= 1) {
                //$activofijo->v_actual = $activofijo->v_actual - ($Tiempo * $activofijo->d_anual);  
                foreach ($depreciacione as $depreciacion) {
                    if (($depreciacion->id_activo == $activofijo->id) && ($depreciacion->año == $Tiempo)) {
                        $activofijo->v_actual = $depreciacion->valor;
                        $activofijo->save();
                    }
                }
            }
            
        }
     
        $user = User::find(auth()->user()->id);
        $id = 1;
        $empresa = Empresa::where('id', $id)->first();

        return view('home', compact('user', 'empresa'));
    }
}
