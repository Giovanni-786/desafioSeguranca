@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de Produtos') }}</div>
                
                <div class="card-body">
                    
                    <form method="POST" action="{{ route('admin.products.do') }}">
                        @csrf

                        @if($errors->all())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{$error}}
                              </div>
                            @endforeach
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estoque" class="col-md-4 col-form-label text-md-right">{{ __('Estoque  ') }}</label>

                            <div class="col-md-6">
                                <input id="estoque" type="text" class="form-control @error('estoque') is-invalid @enderror" name="estoque" value="{{ old('estoque') }}" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="preco_custo" class="col-md-4 col-form-label text-md-right">{{ __('Preço de custo') }}</label>

                            <div class="col-md-6">
                                <input id="preco_custo" type="number" step=any class="form-control" name="preco_custo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="preco_custo" class="col-md-4 col-form-label text-md-right">{{ __('Preço de venda') }}</label>

                            <div class="col-md-6">
                                <input id="preco_venda" type="number" class="form-control" name="preco_venda">
                            </div>
                        </div>

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Criar') }}
                                </button>
                                <button type="button" class="btn btn-primary"><a href="/admin" style="color: white; text-decoration: none">Voltar</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
