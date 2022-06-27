<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoliActivo extends Model
{
    use HasFactory;
    protected $table = 'soli_activo';
    protected $fillable = ['item','unidad','cantidad', ''];
}
