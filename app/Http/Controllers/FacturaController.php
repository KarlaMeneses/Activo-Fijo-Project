<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\User;
class FacturaController extends Controller
{
    //
    public function indexcompra()
    {
        $facturas = Factura::all();
        return view('factura.facturacompra.index', compact('facturas'));
    }

    public function createcompra()
    {
       $users = User::all();
        return view('factura.facturacompra.create', compact('users'));
    }
    public function createventa()
    {
       $users = User::all();
        return view('factura.facturaventa.create', compact('users'));
    }
    public function storecompra(Request $request) // almacena los datos que son pasados por el form
    {
        $credentials =   Request()->validate([ //validar los datos
            'iduser' => ['required'],
            'nit' => ['required'],
            'ciudad' => ['required'],
            'direccion' => ['required'],
            'telefono' => ['required'], 
            'email' => ['required'],
            'formapago' => ['required'],
            'cantidad' => ['required'],
            'vunitario' => ['required'],
            'vtotal' => ['required'],
            'tipo' => ['required'],
            
        ]);
       
            $factura= Factura::create([
                'iduser'=>request('iduser'),
                'nit'=>request('nit'),
                'telefono'=>request('telefono'),
                'ciudad'=>request('ciudad'),
                'direccion'=> request('direccion'),
                'email'=>request('email'),
                'formapago'=>request('formapago'),
                'cantidad'=>request('cantidad'),
                'vunitario'=>request('vunitario'),
                'vtotal'=>request('vtotal'),
                'tipo'=>request('tipo'),
                'articulo'=>request('articulo'),
                'descripcion'=>request('descripcion'),
                'vendedor'=>request('vendedor'),
                'referencia'=>request('referencia'),
            ]); 
        
     
      
      

        return redirect()->route('factura.facturacompra.index');
    }
}
