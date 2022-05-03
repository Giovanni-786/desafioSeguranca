<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public function index(Request $request) {

        if(Auth::check() === true){
            
            return view('admin.registerProduct');
        }

        return redirect()->route('admin.login');        
    }

    public function create(Request $request){
        
         Product::create([
            'nome' => Crypt::encryptString($request['nome']),
            'estoque' => Crypt::encryptString($request['estoque']),
            'preco_custo' => Crypt::encryptString($request['preco_custo']),
            'preco_venda' => Crypt::encryptString($request['preco_venda'])
        ]);


        return redirect('admin/products/list');

    }


    public function destroy($id){

        $user = Auth::user();
        $user_id = $user->id ?? "";

        $client = Product::where('id', $id)->first();
        $client->delete();
        return redirect('admin/products/list')->with('msg', 'Produto excluído com sucesso!');
    }


    public function show(Request $request){
        
        if(Auth::check() === true){
            $product = Product::select('*')->get();
            $product = array('data' => json_decode($product));
            
            return view("admin.dashboardProduct", ["products"=>$product]);
            
        }else{
            return redirect()->route('admin.login');        
        }
    }

    public function showEncrypt(Request $request){
        
        if(Auth::check() === true){
            $product = Product::select('*')->get();
            $product = array('data' => json_decode($product));
            
            return view("admin.dashboardProductEncrypt", ["products"=>$product]);
            
        }else{
            return redirect()->route('admin.login');        
        }
    }
}
