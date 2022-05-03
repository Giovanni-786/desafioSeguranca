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
        <h2>Produtos com criptografia</h2>
        
    </div>

    <div class="col-md-5 offset-md-9 dashboard-title-container" style="margin-bottom: 20px">
      <button type="button" class="btn btn-primary"><a href='/admin/products' style="color: white; text-decoration: none">Cadastrar novo produto</a></button>
      
      <button type="button" class="btn btn-primary"><a href="/admin/products/list" style="color: white; text-decoration: none">Voltar</a></button>
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
                       <td>{{$product->nome}}</td>
                       <td>{{$product->estoque}}</td>
                       <td>{{$product->preco_custo}}</td>
                       <td>{{$product->preco_venda}}</td>
                     </tr>
                @endforeach
                
                
             </tbody>
            </table>

        {{-- <p> Você ainda não possui clientes cadastrados, <a href="{{route('admin.clients')}}">Cadastrar clientes</a></p> --}}

    </div>

    {{-- <a href="{{route('admin.logout')}}">Logout </a> --}}
@endsection