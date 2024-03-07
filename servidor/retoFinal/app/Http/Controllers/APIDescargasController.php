<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIDescargasController extends Controller
{
    //
    public function pelicula(Request $request)
    {
        $validated = $request->validate([
            "user_id" => "required",
            "pelicula_id" => "required"
        ]);

        DB::table('descarga_pelicula')->insert([
            'pelicula_id' => $validated['pelicula_id'],
            'user_id' => $validated['user_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function episodio(Request $request)
    {
        $validated = $request->validate([
            "user_id" => "required",
            "episodio_id" => "required"
        ]);
        DB::table('descarga_serie')->insert([
            'episodio_id' => $validated['pelicula_id'],
            'user_id' => $validated['user_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
