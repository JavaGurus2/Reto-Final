<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User; // Asegúrate de que esta sea la ruta correcta al modelo User
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|string|max:255',
            'imagen' => 'nullable',
            'rol' => 'boolean'
        ]);

        // Guardar la nueva imagen si se proporciona
        if ($request->hasFile('imagen')) {
            Storage::delete(str_replace('storage/', 'public/', $user->imagen));
            $imagen = $request->file('imagen')->store('public/imagenes');
            $user->imagen = str_replace('public/', 'storage/', $imagen);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->rol = $request->input('rol');


        $user->save();
        return redirect()->route('perfil')->with('success', 'Perfil editado correctamente');
    }
}
