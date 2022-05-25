<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;
    protected $table = 'mantenimientos'; //usa el nombre de la base de datos 
    protected $fillable = [
        'problema',
        'costo',
        'duracion',
        'fecha_ini',
        'fecha_fin',
        'solucion'
    ];
}
