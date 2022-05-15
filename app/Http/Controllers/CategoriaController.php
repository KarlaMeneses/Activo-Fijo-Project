<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;



class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // categorias.index, te lista de la base de datos, las categorias que hay
    {
        $categorias = Categoria::all();
        //dd(json_decode(json_encode($categorias))); //
        // llama al model "categoria" y te trae todas las categorias de la base de datos
        return view('categoria.index', compact('categorias')); // te muestra la vista "categorias.index", pero antes de eso
    }                                                         // manda la variable categoria que contiene la inf de todas las categorias

    public function create() // categorias.create,, solo te lleva a la vista create
    {
        return view('categoria.create'); //la vista create es usada antes de registrar una categoria
    }

    public function show(Categoria $categoria)
    {
        return view('categoria.show', compact('categorias'));
    }



    public function store(Request $request) // es el boton para registrar a la base de datos una categoria
    {
        date_default_timezone_set("America/La_Paz"); // se define la zona horaria que usa Bolivia
        $request->validate([
            'nombre' => 'required|unique:categorias', //Se valida el nombre en categoria para que no se repitan antes de registrar una nueva
            'descripcion' => 'required|unique:categorias',
            'tipo_activo' => 'required|unique:categorias'
        ]);
        $categoria = Categoria::create($request->all()); // se crea una categoria con una funcion directa de laravel usando al model de referencia para solicitar los datos
        return redirect()->route('categorias.index', $categoria); // Se redirige a la vista categoria.index
    }


    public function update(Request $request, Categoria $categoria) // boton registrar
    {
        date_default_timezone_set("America/La_Paz"); // Se define zona horaria de bolivia
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'tipo_activo' => 'required',
            //se valida que no haya mas con el mismo nombre
        ]);
        $categoria->update($request->all());           // se usa una funcion de laravel para actualizar directo mediante paramestros del model
        return redirect()->route('categorias.index', $categoria); // Te retorna a la vista categorias.index

    }

    public function edit(Categoria $categoria)
    {
        return view('categoria.edit', compact('categoria'));
    }

    public function destroy(Categoria $categoria) // boton eliminar
    {
        date_default_timezone_set("America/La_Paz");            //se define la zona horaria que usa Bolivia
        $categoria->delete();                                   // elimina categoria seleccionada por la base de datos
        return redirect()->route('categorias.index');           // te retorna a la vita categoria.index
    }
}
