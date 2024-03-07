<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Serie;
use App\Models\Pelicula;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function descargasPeliculas()
    {
        return $this->belongsToMany(Pelicula::class, 'descarga_pelicula')->withTimestamps();
    }

    public function descargasSeries()
    {
        return $this->belongsToMany(Serie::class, 'descarga_serie', 'user_id', 'episodio_id')->withTimestamps();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "imagen",
        "rol"
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
        'password' => 'hashed',
    ];
}
