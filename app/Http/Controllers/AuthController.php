<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            "name"=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        ModelsUser::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password'])
        ]);
        return response()->json(['status'=>true]);
    }
    public function login(Request $request){
        $request->validate(['email'=>'required', 'password'=>'required']);
         $logIn = Auth::attempt(['email'=>$request->email, 'password'=>$request->password]);
        
         if($logIn){
            $user = Auth::user();
            $token = $user->createToken('main')->plainTextToken;
            return response()->json(['status'=>true, 'token'=>$token]);
         }
         return response()->json(['error'=>'Email or password is incorrect']);
    }
}
