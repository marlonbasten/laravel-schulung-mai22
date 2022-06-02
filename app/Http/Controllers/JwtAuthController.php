<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JwtAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:jwt'])->except('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->guard('jwt')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        dd($token);
    }
}
