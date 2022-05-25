<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;
    protected $table = 'detallefactura';
    protected $fillable = [
        'cantidad',
        'articulo',
        'valor_unitario',
        'valor_total',
        'idfactura',
        'descuento',
        'codigo'
    ];
    public function factura(){
        return $this->belongsTo(Factura::class,'idfactura');
    }
}
