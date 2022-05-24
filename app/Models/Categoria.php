<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias'; //usa el nombre de la base de datos 
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'id_depreciacion',
        'created_at',
        'updated_at'
    ];
}
