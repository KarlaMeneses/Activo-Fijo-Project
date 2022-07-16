<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depreciacion extends Model
{
        use HasFactory;
    protected $table = 'depreciaciones'; //usa el nombre de la base de datos 
    protected $fillable = [
        'año',
        'd_acumulada',
        'id_activo',
    ];
}
