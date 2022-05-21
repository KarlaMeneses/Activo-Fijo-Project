<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\User;
class FacturaController extends Controller
{
    // COMPRAAA
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
   
    public function storecompra(Request $request) // almacena los datos que son pasados por el form
    {
        $credentials =   Request()->validate([ //validar los datos
            'idcomprador' => ['required'],
            'vendedor' => ['required'],
            'nit' => ['required'],
            'ciudad' => ['required'],
            'direccion' => ['required'],
            'telefono' => ['required'], 
            'email' => ['required'],
            'formapago' => ['required'],
            'fechaemitida' => ['required'],
            'tipo' => ['required'],
            
        ]);
       
            $factura= Factura::create([
                'idcomprador'=>request('idcomprador'),
                'vendedor'=>request('vendedor'),
                'nit'=>request('nit'),
                'telefono'=>request('telefono'),
                'ciudad'=>request('ciudad'),
                'direccion'=> request('direccion'),
                'email'=>request('email'),
                'formapago'=>request('formapago'),
                'fechaemitida'=>request('fechaemitida'),
                'tipo'=>request('tipo'),
                'referencia'=>request('referencia'),
            ]); 
            $factura = Factura::latest('id')->first();
            $id = $factura->id;
            
           $detalles = DetalleFactura::all();
     
        return redirect()->route('factura.facturacompra.edit', compact('id','factura','detalles'));
    }

    public function editcompra($id)
    {
        $users = User::all();
        $factura = Factura::findOrFail($id);
        $detalles = DetalleFactura::all();
        return view('factura.facturacompra.edit', compact('factura', 'detalles','users'));
    }

    public function updatecompra(Request $request, $id)
    {
        $factura = Factura::findOrFail($id);
        $factura->vendedor = $request->input('vendedor');
        $factura->idcomprador = $request->input('idcomprador');
        $factura->direccion = $request->input('direccion');
        $factura->telefono = $request->input('telefono');
        $factura->email = $request->input('email');
        $factura->fechaemitida = $request->input('fechaemitida');
        $factura->totaliva = $request->input('totaliva');
        $factura->iva = $request->input('totaliva');
        $factura->save();
        return redirect()->route('notas.index');
    }
    public function destroycompra($id)
    {
        $factura = Factura::find($id);
        $factura->delete();
        return redirect()->back();
    }
    // VENTAAA
    public function indexventa()
    {
        $facturas = Factura::all();
        return view('factura.facturaventa.index', compact('facturas'));
    }
    public function createventa()
    {
       $users = User::all();
        return view('factura.facturaventa.create', compact('users'));
    }

    public function storeventa(Request $request) // almacena los datos que son pasados por el form
    {
        $credentials =   Request()->validate([ //validar los datos
            'idvendedor' => ['required'],
            'comprador' => ['required'],
            'nit' => ['required'],
            'ciudad' => ['required'],
            'direccion' => ['required'],
            'telefono' => ['required'], 
            'email' => ['required'],
            'formapago' => ['required'],
            'fechaemitida' => ['required'],
            'tipo' => ['required'],
            
        ]);
       
            $factura= Factura::create([
                'comprador'=>request('comprador'),
                'idvendedor'=>request('idvendedor'),
                'nit'=>request('nit'),
                'telefono'=>request('telefono'),
                'ciudad'=>request('ciudad'),
                'direccion'=> request('direccion'),
                'email'=>request('email'),
                'formapago'=>request('formapago'),
                'fechaemitida'=>request('fechaemitida'),
                'tipo'=>request('tipo'),
                
            ]); 
            $factura = Factura::latest('id')->first();
            $id = $factura->id;
            
           $detalles = DetalleFactura::all();
     
        return redirect()->route('factura.facturaventa.edit', compact('id','factura','detalles'));
    }

}
