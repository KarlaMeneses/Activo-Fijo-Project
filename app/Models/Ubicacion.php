<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table = 'ubicacion'; //usa el nombre de la base de datos 
    protected $fillable = ['edificio', 'ciudad','pais','id_departamento'];
    //atributos de la tabla
    public function activofijo()
    {
        return $this->hasMany('App\Models\Activofijo','id_ubicacion','id');
    }
}
