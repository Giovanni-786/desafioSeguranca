<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{

    public function all(Request $request){
    
        if(Auth::check() === true){
            $user = User::select('*')->get();
            $users = array('data' => json_decode($user));
            
            return view("admin.users", ["users"=>$users]);
        }           
    }

    public function allEncrypt(Request $request){
    
        if(Auth::check() === true){
            $user = User::select('*')->get();
            $users = array('data' => json_decode($user));
            
            return view("admin.usersEncrypt", ["users"=>$users]);
        }           
    }
    public function destroy($id){

        $user = Auth::user();

        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect('admin/users/')->with('msg', 'Usuário excluído com sucesso!');
    }


}
