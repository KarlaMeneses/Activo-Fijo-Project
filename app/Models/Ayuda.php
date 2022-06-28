<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayuda extends Model
{
    use HasFactory;
    protected $table = 'ayudas'; //usa el nombre de la base de datos 
    protected $fillable = ['foto', 'descripcion']; //atributos de la tabla
}
