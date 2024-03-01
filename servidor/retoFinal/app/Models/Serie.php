<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Temporada;
use App\Models\Episodio;
use App\Models\User;



class Serie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function descargas()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, "serie_categoria");
    }
}
