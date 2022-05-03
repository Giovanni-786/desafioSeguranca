@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center">{{ __('Dashboard') }}</div>

                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="d-flex justify-content-center">

                            <h2 style="display: block">Seja bem vindo(a)!</h2>  
                        </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" style="margin-top:20px"><a href="/register" style="color: white; text-decoration: none">Cadastrar novos usuários</a></button> 
                    </div>

                    <div class="d-flex justify-content-center" style="margin-top:20px">
                        <button type="button" class="btn btn-primary"> <a href="/admin/clients/register" style="color: white; text-decoration: none">Cadastrar novos clientes</a></button>  
                    </div>

                    <div class="d-flex justify-content-center" style="margin-top:20px">
                        <button type="button" class="btn btn-primary"> <a href="/admin/products" style="color: white; text-decoration: none">Cadastrar novos produtos</a></button>  
                    </div>
                    
                    <div class="d-flex justify-content-center" style="margin-top: 20px;">
                        <button type="button" class="btn btn-primary" style="margin-right: 20px"><a href="/admin/clients" style="color: white; text-decoration: none">Listar clientes</a></button>
                        <button type="button" class="btn btn-primary"><a href="/admin/users" style="color: white; text-decoration: none">Listar usuários</a></button> 
                        <button type="button" class="btn btn-primary" style="margin-left: 20px"><a href="/admin/products/list" style="color: white; text-decoration: none">Listar produtos</a></button> 
                    </div>

                    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
