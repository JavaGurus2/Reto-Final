<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MiLista;

class APIMiListaController extends Controller
{
    public function anadir(Request $request)
    {
        //
        $validated = $request->validate([
            "referencia_id" => "required",
            "tipo" => "required",
        ]);

        MiLista::create($validated);

        return response()->json(["data" => "creado"]);
    }

    public function eliminar(string $id)
    {
        $contenido = MiLista::find($id);
        $contenido->delete();
        return response()->json(["data" => "borrado"]);
    }
}
