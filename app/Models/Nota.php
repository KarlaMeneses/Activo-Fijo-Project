<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table = 'notas';
    protected $fillable = ['unidad','concepto','precio_uni','importe','condicion_pago','fecha_envio',
    'fecha_entrega','lugar_entrega','nro_egreso','almacen','entregado_a','id_responsable','orden'];
}