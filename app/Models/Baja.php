<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Baja extends Model
{
    use HasFactory;
    protected $table = 'bajas'; //usa el nombre de la base de datos 
    protected $fillable = [
        'fechasolicitada',
        'causadebaja',
        'estado',
        'fechaaceptada',
        'idactivo'
    ];
    public function bajaa(){
        return $this->belongsTo(Activofijo::class,'idactivo');
    }

    public static function eliminarBaja(Request $request)
    {
        $banner = Baja::findOrFail($request->id);
        $banner->delete();
    }
}
