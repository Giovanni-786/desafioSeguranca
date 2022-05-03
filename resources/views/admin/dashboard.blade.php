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
        <h2>Clientes</h2>
        <button type="button" class="btn btn-primary"><a href='/admin/clientsencrypt' style="color: white; text-decoration: none">Listar clientes encriptografados</a></button>
    </div>

    <div class="col-md-5 offset-md-9 dashboard-title-container" style="margin-bottom: 20px">
      <button type="button" class="btn btn-primary"><a href='/admin/clients/register' style="color: white; text-decoration: none">Cadastrar novos clientes</a></button>
      
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
                    <th scope="col">RG</th>
                    <th scope="col">CPF</th>
                 </tr>
               </thead>
            <tbody>
                @foreach ($clients['data'] ?? '' as $client)
                     <tr>
                       <td>{{Crypt::decryptString($client->name)}}</td>
                       <td>{{Crypt::decryptString($client->cpf)}}</td>
                       <td>{{Crypt::decryptString($client->rg)}}</td>
                       <td>
                        <form action="/admin/{{$client->id}}/clients" method="POST">
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