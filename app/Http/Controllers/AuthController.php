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
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
             'name' => 'required|string|max:100',
              'name' => 'required|string|max:100',
               'name' => 'required|string|max:100'
        ]);
    }
}
