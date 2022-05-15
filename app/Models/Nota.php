<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table = 'notas';
    protected $fillable = ['proveedor','direccion','telefono','fecha_entrega','totales','fecha_envio',
    'fecha_entrega','lugar_entrega','nro_egreso','almacen','entregado_a','id_responsable','orden'];
}
