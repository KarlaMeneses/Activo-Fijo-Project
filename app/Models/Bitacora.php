<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    protected $table = 'bitacora'; //usa el nombre de la base de datos
    protected $fillable = [
        'accion',
        'apartado',
        'afectado',
        'fecha_h',
        'id_user'
    ];
}
