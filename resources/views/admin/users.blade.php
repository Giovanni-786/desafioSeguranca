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
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h2>Usuários cadastrados</h2>
        <button type="button" class="btn btn-primary"><a href="/admin/usersencrypt" style="color: white; text-decoration: none">Listar usuários criptografados</a></button>
    </div>

    <div class="col-md-5 offset-md-9 dashboard-title-container" style="margin-bottom: 20px">
      <button type="button" class="btn btn-primary"><a href='/register' style="color: white; text-decoration: none">Cadastrar novos usuários</a></button>
      
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
                    <th scope="col">Email</th>
                 </tr>
               </thead>
             

            <tbody>
                @foreach ($users['data'] ?? '' as $user)
                     <tr>
                       {{-- <td scope="row">{{$loop->index + 1}}</td> --}}
                       <td>{{Crypt::decryptString($user->name)}}</td>
                       <td>{{Crypt::decryptString($user->email)}}</td>
                       <td>
                       
                     </tr>
                @endforeach
                
                
             </tbody>
            </table>

        {{-- <p> Você ainda não possui clientes cadastrados, <a href="{{route('admin.clients')}}">Cadastrar clientes</a></p> --}}

    </div>

    {{-- <a href="{{route('admin.logout')}}">Logout </a> --}}
@endsection