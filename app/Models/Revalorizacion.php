<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revalorizacion extends Model
{
    use HasFactory;
    protected $table = 'revalorizacion';
    protected $fillable = ['tiempo_vida','valor','estado','created_at'];

}
