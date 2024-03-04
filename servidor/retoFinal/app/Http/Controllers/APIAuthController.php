<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class APIAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = JWTAuth::fromUser(Auth::user());
            $user = Auth::user();
            return response()->json(["token" => $token, "usuario" => $user]);
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function UserDP(Request $request)
    {

        $user = User::where('email', $request['referencia'])->first();
        $binaryData = file_get_contents($request->file("imagen"));
        $base64 = base64_encode($binaryData);
        $user->update([
            "imagen" => $base64,
            "name" => $request['nombre'],
            "email" => $request['email'],
        ]);

        return response()->json(["data" => 'Actualizado', 'usuario' => $user]);
    }

    public function UserC(Request $request)
    {

        $user = User::where('email', $request['referencia'])->first();

        if (password_verify($request['passwordA'], $user->password)) {
            $user->update([
                "password" => Hash::make($request['passwordN'])
            ]);

            return response()->json(["data" => 'Actualizado', 'usuario' => $user]);
        } else {
            return response()->json(["data" => 'Error', 'usuario' => $user]);
        }
    }
}
