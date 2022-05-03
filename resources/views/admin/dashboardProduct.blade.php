@extends('layouts.app')
@section('content') 
   
<style>

td
{
 max-width: 100px;
 overflow: hidden;
 text-overflow: ellipsis;
 white-space: nowrap;
}
</style>

<?php
  
?>

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h2>Produtos</h2>
        <button type="button" class="btn btn-primary"><a href='/admin/products/listencrypt' style="color: white; text-decoration: none">Listar produtos encriptografados</a></button>
    </div>

    <div class="col-md-5 offset-md-9 dashboard-title-container" style="margin-bottom: 20px">
      <button type="button" class="btn btn-primary"><a href='/admin/products' style="color: white; text-decoration: none">Cadastrar novo produto</a></button>
      
      <button type="button" class="btn btn-primary"><a href="/admin" style="color: white; text-decoration: none">Voltar</a></button>
  </div>

    <div class="col-md-10 offset-md-1 dashboard-clients-container">
 
        @if(session('msg'))
        <div class="alert alert-success">
          {{ session('msg') }}
        </div>
        @endif
             <table class="table">
               <thead>
                 <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Preco de custo</th>
                    <th scope="col">Preco de venda</th>
                 </tr>
               </thead>
            <tbody>
                @foreach ($products['data'] ?? '' as $product)
                     <tr>
                       <td>{{Crypt::decryptString($product->nome)}}</td>
                       <td>{{Crypt::decryptString($product->estoque)}}</td>
                       <td>{{Crypt::decryptString($product->preco_custo)}}</td>
                       <td>{{Crypt::decryptString($product->preco_venda)}}</td>
                       <td>
                        <form action="/admin/{{$product->id}}/products" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger delete-btn">Excluir</button>
                        </form> 
                        </td>
                     </tr>
                @endforeach
                
                
             </tbody>
            </table>

        {{-- <p> Você ainda não possui clientes cadastrados, <a href="{{route('admin.clients')}}">Cadastrar clientes</a></p> --}}

    </div>

    {{-- <a href="{{route('admin.logout')}}">Logout </a> --}}
@endsection