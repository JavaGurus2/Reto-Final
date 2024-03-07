<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Episodio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(ActoresSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PeliculasSeeder::class);
        $this->call(SeriesSeeder::class);
        $this->call(TemporadasSeeder::class);
        $this->call(EpisodiosSeeder::class);
    }
}
