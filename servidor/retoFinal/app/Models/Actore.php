<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pelicula;
use App\Models\Serie;


class Actore extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function peliculas()
    {
        return $this->belongsToMany(Pelicula::class);
    }

    public function series()
    {
        return $this->belongsToMany(Serie::class);
    }
}
