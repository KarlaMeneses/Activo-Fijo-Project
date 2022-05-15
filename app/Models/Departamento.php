<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'departamentos'; //usa el nombre de la base de datos 
    protected $fillable = ['nombre', 'descripcion']; //atributos de la tabla
}

