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
        'id_categoria', 'id_ubicacion','vida_util'
    ];

    public function factura(){
        return $this->belongsTo('App\Models\Factura','id_factura','id');
    }

    public function ubicacion(){
        return $this->belongsTo('App\Models\Consulta','id_ubicacion','id');
    }
    public function bajaa()
    {
        return $this->hasMany(Baja::class, 'idactivo');
    }

}
