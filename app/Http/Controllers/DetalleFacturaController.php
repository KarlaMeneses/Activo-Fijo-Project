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

    public function destroy(Request $request, $id)
    {
        $detalle = DetalleFactura::find($id);
        $total = $request->totalneto -  $detalle->valor_total;
        $iva = $total * (13/100);
        $totaliva = $total + $iva;
        if ($total < 0) {
            $total = 0; 
        }
        DetalleFactura::destroy($id);
        DB::table('facturas')->where('id', $request->idfactura)->update(['totalneto' => $total,'iva' => $iva, 'totaliva' => $totaliva]);
        return back();
    }
}
