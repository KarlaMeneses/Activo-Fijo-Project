<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Depreciacion;
use Illuminate\Http\Request;


class CategoriaController extends Controller
{
    public function index()
    {
        $cates  = Categoria::all();
        $depres = Depreciacion::all();
        return view('categoria.index', compact('cates', 'depres'));
    }
    public function show($id)
    {
        $cates = Categoria::find($id);
        $depres = Depreciacion::all();
        return view('categoria.show', compact('cates', 'depres'));
    }
    public function create()
    {
        $depres = Depreciacion::all();
        return view('categoria.create', compact('depres'));
    }
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz"); // se define la zona horaria que usa Bolivia

        $cate = new Categoria();
        $cate->nombre = $request->nombre;
        $cate->descripcion = $request->descripcion;
        $cate->estado = $request->estado;
        $cate->id_depreciacion = $request->id_depreciacion;
        $cate->save();
        return redirect()->route('categorias.index'); // Se redirige a la vista ubicaiones.index
    }

    public function edit($id)
    {
        $cate = Categoria::find($id);
        $depres = Depreciacion::all();
        return view('categoria.edit', compact('cate', 'depres'));
    }

    public function update(Request $request, $id)
    {

        $cate = Categoria::find($id);
        $cate->nombre = $request->nombre;
        $cate->descripcion = $request->descripcion;
        $cate->estado = $request->estado;
        $cate->id_depreciacion = $request->id_depreciacion;
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
