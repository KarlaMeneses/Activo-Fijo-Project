<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activofijo extends Model
{
    use HasFactory;
    protected $table = 'activosfijo';
    protected $fillable = [
        'codigo', 'detalle', 'costo', 'fecha_ingreso', 'proveedor', 'estado', 'id_factura',
        'id_categoria', 'id_ubicacion'
    ];
}
