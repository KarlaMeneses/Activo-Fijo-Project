<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

/*PARA CREAR UN MODELO:
PHP ARTISAN MAKE:MODEL Nombreclase */

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'foto',
        'sexo',
        'edad',
        'cargo',
        'direccion',
        'telefono',
        'rol',
        'email',
        'password',
        'idempresa',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function compradoru()
    {
        return $this->hasMany(Factura::class, 'idcomprador');
    }

    public function usuario(){
        return $this->belongsTo(Empresa::class,'idempresa');
    }

    public function vendedoru()
    {
        return $this->hasMany(Factura::class, 'idvendedor');
    }
    public function adminlte_image()
    {
        return auth()->user()->foto;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
