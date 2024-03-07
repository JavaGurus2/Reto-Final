<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->rol === NULL) {
            auth()->logout(); // Cerrar sesión del usuario
            return redirect()->route('login')->with('error', 'No puedes acceder, no tienes rol asignado');
        }

        return redirect()->intended($this->redirectTo);
    }
}
