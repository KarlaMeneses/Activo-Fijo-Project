<?php

namespace App\Http\Controllers;

use App\Models\categoria;
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
        $categoria = categoria::all();
        //dd(json_decode(json_encode($categoria)));//
        // llama al model "categoria" y te trae todas las categorias de la base de datos
        return view('categorias.index', compact('categoria')); // te muestra la vista "categorias.index", pero antes de eso
    }                                                         // manda la variable categoria que contiene la inf de todas las categorias



}
