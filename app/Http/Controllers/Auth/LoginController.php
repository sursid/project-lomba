<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('components.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:strict,filter'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return response()->json([
                'code' => 200,
                'status' => true,
                'message' => 'Login berhasil',
                'redirect' => '/sosmed',
            ], 200);
        }

        return response()->json([
            'code' => 200,
            'status' => false,
            'message' => 'Email atau password salah',
        ], 200);
    }
}