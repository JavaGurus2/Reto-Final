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
            "user_id"
        ]);

        miLista::create($validated);

        return response()->json(["data" => "creado"]);
    }

    public function eliminar(Request $request)
    {
        $contenido = miLista::find($request["id"]);
        $contenido->delete();
        return response()->json(["data" => "borrado"]);
    }
    public function comprobar(Request $request)
    {
        $tipo = $request["tipo"];
        $referencia_id = $request["referencia_id"];
        $user_id = $request["user_id"];

        $milistaItem = miLista::where('tipo', $tipo)
            ->where('referencia_id', $referencia_id)
            ->where('user_id', $user_id)
            ->get();

        return response()->json(compact('milistaItem'));
    }
}
