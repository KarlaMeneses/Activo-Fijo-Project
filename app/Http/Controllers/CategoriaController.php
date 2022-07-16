<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Depreciacion;
use Illuminate\Http\Request;
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
        //bitacora
        activity()->useLog('gestionar depreciaciones')->log('Registro')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $cate->id;
        $lastActivity->save();

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
        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        $cate = Categoria::find($id);
        $cate->delete();
        return redirect()->back();
    }
}
