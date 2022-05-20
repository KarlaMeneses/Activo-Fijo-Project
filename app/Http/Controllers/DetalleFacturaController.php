<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleFacturaController extends Controller
{
    //
    public function store(Request $request) // almacena los datos que son pasados por el form
    {
        $credentials =   Request()->validate([ //validar los datos
            'codigo' => ['required'],
            'cantidad' => ['required'],
            'articulo' => ['required'],
            'valor_unitario' => ['required'],
         
            
        ]);
        $descuento =  ($request->cantidad * $request->valor_unitario) * ( $request->descuento / 100);
        $valor_total = ($request->cantidad * $request->valor_unitario) - $descuento;
       
            $detalle = DetalleFactura::create([
                'codigo'=>request('codigo'),
                'cantidad'=>request('cantidad'),
                'articulo'=>request('articulo'),
                'valor_unitario'=>request('valor_unitario'),
                'idfactura'=>request('idfactura'),
                'descuento'=> $descuento,
                'valor_total'=>$valor_total,
               
            ]); 
            $total = $request->totalneto + $valor_total;
            $iva = $total * (13/100);
            $totaliva = $total + $iva;
            //return $total;
            DB::table('facturas')->where('id', $request->idfactura)->update(['totalneto' => $total, 'iva' => $iva, 'totaliva' => $totaliva]);
           
            return back();
    }

    public function update(Request $request, $id)
    {
        $detalle = new DetalleFactura();
        $detalle->codigo = $request->codigo;
        $detalle->cantidad = $request->cantidad;
        $detalle->articulo = $request->articulo;
        $detalle->valor_unitario = $request->valor_unitario;  
        $detalle->descuento =  ($request->cantidad * $request->valor_unitario) * ( $request->descuento / 100);
        $detalle->valor_total = ($request->cantidad * $request->valor_unitario) - $detalle->descuento;
        $detalle->idfactura = $id;
        $detalle->save();
      

        $total = $request->totalneto + $detalle->valor_total;
        $iva = $request->totalneto * 0.13;
        $totaliva = $total + $iva;
        //return $total;
        DB::table('facturas')->where('id', $id)->update(['totalneto' => $total, 'iva' => $iva, 'totaliva' => $totaliva]);
       
        return back();
    }
}
