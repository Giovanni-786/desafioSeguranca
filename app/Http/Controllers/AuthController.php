<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard(Request $request){

        // $user = User::where('id', $request->id)->first();
        // $user_id = $user->id;

        $user = Auth::user();
        $user_id = $user->id ?? "";

        if(Auth::check() === true){
            return view('admin.index', ["user_id"=>$user_id]);
        }

        return redirect()->route('admin.login');        
        
    }

    public function loginInfo(){

        return view('admin.loginForm');
    }

    public function login(Request $request){
        
        

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->withInput()->withErrors(['O e-mail informado é inválido!']);
        }
        
        $credentials = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        

        if(Auth::attempt($credentials)){
            $user = User::where('email', $request->email)->first();
            $user_id = $user->id;
            return view('admin.index', ["user_id"=>$user_id]);
        }else{
            return redirect()->back()->withInput()->withErrors(['Login ou senha inválido!']);
        }
        
    }

    public function clients(){
        if(Auth::check() === false){
            return view('admin.login');
        }else{
            return view('admin.clients');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');
    }
}
