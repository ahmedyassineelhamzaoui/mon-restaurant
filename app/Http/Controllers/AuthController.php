<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        if($request->input('email')=='admin@adminano.com' && $request->input('password')=='eRROR404@'){
            $user=$request->input('email');
            return redirect()->to('dashboard')->with('success',$user);;
        }else{
            return redirect()->to('login')->withErrors('Invalid login credentials');
        }
  
    }
    public function logout(Request $request)
    {
    
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
  
    }

}
