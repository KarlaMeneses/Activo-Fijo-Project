<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresa';
    protected $fillable = [
    'id',
    'nombre',
    'nit',
    'direccion',
    'email',
    'juridica',
    'foto',
    'telefono',
    ];


    public function usuario()
    {
        return $this->hasMany(User::class, 'idempresa');
    }

}
