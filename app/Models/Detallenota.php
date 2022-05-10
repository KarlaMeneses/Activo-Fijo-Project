<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallenota extends Model
{
    use HasFactory;
    protected $table = 'detallenotas';
    protected $fillable = ['cantidad','detalle','precio_uni','total','id_notas'];

}
