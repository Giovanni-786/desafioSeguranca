<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ClientController extends Controller
{
    public function index(Request $request) {

        
        $user = User::where('id', $request->id)->first(); 
        
        $user = array('data' => json_decode($user));
        
        if(Auth::check() === true){
            
            return view('admin.registerClient', ["user_id"=>$user]);
        }

        return redirect()->route('admin.login');        
    }

    public function create(Request $request){
        
         Client::create([
            'name' => Crypt::encryptString($request['name']),
            'cpf' => Crypt::encryptString($request['cpf']),
            'rg' => Crypt::encryptString($request['rg'])           
        ]);


        return redirect('admin/'.$request['user_id']);

    }


    public function destroy($id){

        $user = Auth::user();
        $user_id = $user->id ?? "";

        $client = Client::where('id', $id)->first();
        $client->delete();
        return redirect('admin/clients')->with('msg', 'Cliente excluído com sucesso!');
    }


    public function show(Request $request){
        
        if(Auth::check() === true){
            $client = Client::select('*')->get();
            $client = array('data' => json_decode($client));
            
            return view("admin.dashboard", ["clients"=>$client]);
            
        }else{
            return redirect()->route('admin.login');        
        }
    }

    public function showEncrypt(Request $request){
        
        if(Auth::check() === true){
            $client = Client::select('*')->get();
            $client = array('data' => json_decode($client));
            
            return view("admin.dashboardEncrypt", ["clients"=>$client]);
            
        }else{
            return redirect()->route('admin.login');        
        }
    }
}
