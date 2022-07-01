<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activofijo extends Model
{
    use HasFactory;
    protected $table = 'activosfijo';
    protected $fillable = [
        'codigo', 'foto', 'nombre', 'detalle', 'tipo', 'fecha_ingreso', 'proveedor', 'costo', 'vida_util', 'v_residual', 'estado', 'id_factura',
        'id_categoria', 'id_ubicacion', 'id_depreciacion', 'd_anual'
    ];

    public function bajaa()
    {
        return $this->hasMany(Baja::class, 'idactivo');
    }
}
