<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'iduser',
        'nit',
        'ciudad',
        'direccion',
        'telefono',
        'email',
        'formapago',
        'cantidad',
        'vunitario',
        'vtotal',
        'tipo',
        'vendedor',
        'referencia',
        'articulo',
        'comprador',
        'descripcion',
        'idnota',
        'foto',
    ];
    public function user(){
        return $this->belongsTo(User::class,'iduser');
    }

}
