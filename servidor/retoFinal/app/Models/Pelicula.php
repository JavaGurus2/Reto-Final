<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Actore;
use App\Models\User;


class Pelicula extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, "pelicula_categoria");
    }

    public function actores()
    {
        return $this->belongsToMany(Actore::class, "pelicula_actor", "pelicula_id", "actor_id");
    }

    public function descargas()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
