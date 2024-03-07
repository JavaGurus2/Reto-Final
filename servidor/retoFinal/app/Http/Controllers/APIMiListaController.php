<?php

namespace App\Http\Controllers;

use App\Models\miLista;
use Illuminate\Http\Request;

class APIMiListaController extends Controller
{
    public function anadir(Request $request)
    {
        //
        $validated = $request->validate([
            "referencia_id" => "required",
            "tipo" => "required",
        ]);

        miLista::create($validated);

        return response()->json(["data" => "creado"]);
    }

    public function eliminar(string $id)
    {
        $contenido = miLista::find($id);
        $contenido->delete();
        return response()->json(["data" => "borrado"]);
    }
    public function comprobar(Request $request)
    {
        $tipo = $request["tipo"];
        $referencia_id = $request["referencia_id"];

        if ($tipo == "serie") {
            $milistaItem = miLista::where('tipo', $tipo)
                ->where('referencia_id', $referencia_id)
                ->get();
        } elseif ($tipo == "pelicula") {
            $milistaItem = miLista::where('tipo', $tipo)
                ->where('referencia_id', $referencia_id)
                ->get();
        }
        return response()->json(compact('milistaItem'));
    }
}
