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
    public function comprobar(Request $request)
    {
        $tipo = $request["tipo"];
        $referencia_id = $request["referencia_id"];

        if ($tipo == "serie") {
            $milistaItem = MiLista::where('tipo', $tipo)
                ->where('referencia_id', $referencia_id)
                ->get();
        } elseif ($tipo == "pelicula") {
            $milistaItem = MiLista::where('tipo', $tipo)
                ->where('referencia_id', $referencia_id)
                ->get();
        }
        return response()->json(compact('milistaItem'));
    }
}
