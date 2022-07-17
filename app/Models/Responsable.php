<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{

    use HasFactory;
    protected $table = 'responsables';
    protected $fillable = ['codigo', 'activo', 'cargo', 'estado', 'fecha', 'id_user', 'id_ubicacion'];
}
