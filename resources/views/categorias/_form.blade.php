@extends('layouts.app', ['pageSlug' => 'categorias'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="card-title">Alterar categoria</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <label for="nome">Nome</label>
                            {!! Form::text('nome', null, ['class' => 'form-control', 'autofocus', 'id' => 'nome', 'maxlength' => 255, 'placeholder' => 'Título', 'required']) !!}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6 col-lg-6 col-md-6 mt-6">
                            <label for="slug">Slug</label>
                            {!! Form::text('slug', null, ['class' => 'form-control', 'autofocus', 'id' => 'slug', 'maxlength' => 255, 'placeholder' => 'Título', 'required']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-md-6 mt-6 mt-4">
                            <button type="submit" class="btn btn-primary">
                                @if (isset($categoria))
                                    Salvar Alterações
                                @else
                                    Salvar
                                @endif
                            </button>

                            <a href={{ route('categorias.index') }} class="btn btn-default">
                                Voltar
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
