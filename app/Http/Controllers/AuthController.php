<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function viewlogin (){
    return view('auth.login');
   }

   public function login (LoginRequest $request){
    $sredentials = [
        'email' => $request->email,
        'password' => $request->password
    ];

    
    if (Auth::attempt($sredentials)) {
        $request->session()->regenerate();

        return redirect()->route('admin.category.index');
    } 

    return redirect()->route('auth.login');
   }

   public function logout (Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('auth.login');    
   }
}
