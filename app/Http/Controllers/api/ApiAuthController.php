<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{

    public function login(Request $request)
    {

        $validate = $request->validate([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if (Auth::attempt($validate)) {
            $user = Auth::user();
            $response['token'] = $user->createToken('MyApp')->plainTextToken;
            $response['name'] = $user->name;
            $response['email'] = $user->email;
            return response()->json($response, 200);
        }         
        else {
            return response()->json(['message' => 'invalide credentials'], 401);
        }
    }
}
