<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index(){
        return User::all();
      
    }

  public function login (Request $request){
    $request->validate([
    "email"=>["required","email"],
    "password"=>["required"]
    ]);
   $user = User::where("email", $request->email)->first();

   if (!$user|| !Hash::check($request->password, $user->password)){
    throw ValidationException::withMessages([
        "email"=>["Las credenciales proporcionadas son incorrectas."]
    ]);
   }
   $token= $user->createToken("auth_token")->plainTextToken;
   return response()->json([
    "acces_token"=>$token,
    "token_type"=>"Bearer",
    "user"=>$user

   ]);

  }
}
