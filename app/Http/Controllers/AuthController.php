<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//Rol
use Spatie\Permission\Models\Role as ModelsRole;


class AuthController extends Controller
{

  //Implementacion de funcion para crear un usuario
  public function create(Request $request)
  {
    $rules = [
      'name' => 'required|string|max:100',
      'email' => 'required|string|email|max:100|unique:users',
      'password' => 'required|string|min:8',
    ];

    $validator = Validator::make($request->input(), $rules);
    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'errors' => $validator->errors()->all()
      ], 400);
    }
    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password)
    ]);
    $user->assignRole('3');                           //asignando  rol de usuario
    return response()->json([
      'status' => true,
      'message' => 'User Create successfully',
      'token' => $user->createToken('API TOKEN')->plainTextToken
    ], 200);
  }

  //Implemntacion para login de un usuario existente
  public function login(Request $request)
  {
    $rules = [
      'email' => 'required',
      'password' => 'required'
    ];

    $validator = Validator::make($request->input(), $rules);

    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'errors' => $validator->errors()->all()
      ], 400);
    }

    if (!Auth::attempt($request->only('email', 'password'))) {
      return response()->json([
        'status' => false,
        'errors' => ['Unauthorized'],
      ], 401);
    }

    $user = User::where('email', $request->email)->first();

    return response()->json([
      'status' => true,
      'message' => 'User Logged in successfully',
      'data' => $user,
      'token' => $user->createToken('API TOKEN')->plainTextToken
    ], 200);
  }

  //Implementacion de funcion para logout de un usuario q se logio
  public function logout(Request $request)
  {
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'Successfully logged out']);
  }
}
