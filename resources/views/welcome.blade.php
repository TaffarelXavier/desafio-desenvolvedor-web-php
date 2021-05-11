@extends('layouts.app',['pageSlug'=>'index'])

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8">
                        <h1>{{ __('Seja bem-vindo ao DIXPO!') }}</h1>
                        <h3 class="text-lead text-light">
                            {{ __('Transformamos ideias em soluções para o mercado.') }}
                            Somos especialistas na criação de Aplicativos, Websites e Lojas Virtuais para o seu negócio.
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <a href="{{route("register")}}"><button type="button" class="btn btn-primary">Criar conta</button></a>
                        <a href="{{route("login")}}"><button type="button" class="btn btn-warning">Login</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
