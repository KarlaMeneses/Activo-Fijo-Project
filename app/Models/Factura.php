<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendedor',
        'comprador',
        'nit',
        'ciudad',
        'direccion',
        'telefono',
        'email',
        'formapago',
        'fechaemitida',
        'totaliva',
        'iva',
        'tipo',
        'totalneto',
        'referencia',
        'idvendedor',
        'idcomprador',
        'foto',
    ];
  
    public function compradoru(){
        return $this->belongsTo(User::class,'idcomprador');
    }

    public function vendedoru(){
        return $this->belongsTo(User::class,'idvendedor');
    }

    public function factura()
    {
        return $this->hasMany(DetalleFactura::class, 'idfactura');
    }

    public function activofijo()
    {
        return $this->hasMany('App\Models\Activofijo','id_factura','id');
    }

}
