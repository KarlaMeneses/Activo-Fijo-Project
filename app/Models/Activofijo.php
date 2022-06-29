<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activofijo extends Model
{
    use HasFactory;
    protected $table = 'activosfijo';
    protected $fillable = [
        'codigo','nombre', 'detalle', 'tipo', 'fecha_ingreso', 'proveedor','costo','vida_util','v_residual', 'estado', 'id_factura',
        'id_categoria', 'id_ubicacion','id_depreciacion','d_anual'
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
