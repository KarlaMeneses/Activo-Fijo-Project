<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{

    use HasFactory;
    protected $table = 'responsables';
    protected $fillable = ['motivo', 'nombre2', 'firma1', 'firma1', 'fecha', 'id_user', 'id_ubicacion'];/*INVESTIGAR PARA QUE SIRVE ESTA LINEA */
}
