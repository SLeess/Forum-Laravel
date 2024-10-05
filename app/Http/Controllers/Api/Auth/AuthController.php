<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(AuthRequest $request){
        $user = User::where('email', $request->get('email'))->first();

                        //criptografa a senha e verifica se bate
        if(!$user || ! Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provited credentials are incorrect']
            ]);
        }

        //Logout others devices
        // if($request->has('logout_others_devices'))
            $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'token' => $token,
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function me(Request $request){
        $user = $request->user();
        return response()->json([
            'user' => $user,
        ]);
    }
}
