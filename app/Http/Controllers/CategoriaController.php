<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Categoria;
use App\Models\Depreciacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class CategoriaController extends Controller
{
    public function index()
    {
        $cate = Categoria::all();
        return view('categoria.index', compact('cate'));
    }
    public function show($id)
    {
    
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function store(Request $request)
    {
     date_default_timezone_set("America/La_Paz"); // se define la zona horaria que usa Bolivia
        $request->validate([
            'nombre' => 'required', //Se valida el nombre en depreciaciones para que no se repitan antes de registrar una nueva
            'descripcion' => 'required',
            'tipo_activo' => 'required',

            'vida_util' => 'required',
            'coeficiente' => 'required',
        ]);
        //$cate = Depreciacion::create($request->all()); // se crea una categoria con una funcion directa de laravel usando al model de referencia para solicitar los datos

        $cate = new Categoria();
        $cate->nombre = $request->nombre;
        $cate->descripcion = $request->descripcion;
        $cate->tipo_activo = $request->tipo_activo;
        $cate->vida_util = $request->vida_util;
        $cate->coeficiente = $request->coeficiente;
        $cate->save();

         /* ------------BITACORA----------------- */
         $bita = new Bitacora();
         $bita->accion = encrypt('Registró');
         $bita->apartado = encrypt('Categoria');
         $afectado = $cate->id;
         $bita->afectado = encrypt($afectado);
         $fecha_hora = date('m-d-Y h:i:s a', time());
         $bita->fecha_h = encrypt($fecha_hora);
         $bita->id_user = Auth::user()->id;
         $ip = $request->ip();
         $bita->ip = encrypt($ip);
         $bita->save();
         /* ----------------------------------------- */

        return redirect()->route('categorias.index'); // Se redirige a la vista ubicaiones.index
    }

    public function edit($id)
    {
        $cate = Categoria::find($id);
        return view('categoria.edit', compact('cate'));
    }

    public function update(Request $request, $id)
    {
        $cate = Categoria::find($id);
        $cate->nombre = $request->nombre;
        $cate->descripcion = $request->descripcion;
        $cate->tipo_activo = $request->tipo_activo;
        $cate->vida_util = $request->vida_util;
        $cate->coeficiente = $request->coeficiente;
        $cate->save();

        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Editó');
        $bita->apartado = encrypt('Categoria');
        $afectado = $cate->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
        return redirect()->route('categorias.index');
    }

    public function destroy(Request $request, $id)
    {
        $cate = Categoria::find($id);
        /* ------------BITACORA----------------- */
        $bita = new Bitacora();
        $bita->accion = encrypt('Eliminó');
        $bita->apartado = encrypt('Categoria');
        $afectado = $cate->id;
        $bita->afectado = encrypt($afectado);
        $fecha_hora = date('m-d-Y h:i:s a', time());
        $bita->fecha_h = encrypt($fecha_hora);
        $bita->id_user = Auth::user()->id;
        $ip = $request->ip();
        $bita->ip = encrypt($ip);
        $bita->save();
        /* ----------------------------------------- */
        $cate->delete();
        return redirect()->back();
    }
}
