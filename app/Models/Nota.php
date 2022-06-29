<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table = 'notas';
    protected $fillable = ['ayuda','codigo','proveedor','direccion','telefono','totales','fecha_entrega','foto','tipo','adquirente','fecha_venta','encargado','cargo'];

}
