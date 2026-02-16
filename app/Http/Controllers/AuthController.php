<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    //creo la función para registrar usuarios:
    public function register(Request $request){

        //PARTE A: Validación de datos. uNA VEZhe obtenido la información del request, voy a validarlo

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user'

        ]);

        //PARTE B: Si no consigo pasar la valdiación.....
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        //vale si que lo paso :
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'role' => $request->get('role')
        ]);
        $token = JWTAuth::fromUser($user);

       //PARTE C: Devuelvo el usuario ya creado

        return response()->json([
            'token' => $token,
            'user' => $user,
            'message' => 'Usuario registrado correctamente'
        ], 201);
    }
}
