@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="card-title">Adicionar nova notícia</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            {{ $noticia->titulo }}
                        </div>
                        <div class="col-sm-12 col-lg-12 col-md-12 mt-4">
                            {!! Form::text('resumo', null, ['placeholder' => 'Resumo', 'class' => 'form-control', 'id' => 'titulo', 'maxlength' => 10000]) !!}
                        </div>
                        <div class="col-sm-12 col-lg-12 col-md-12 mt-4">
                            {!! Form::textarea('conteudo', null, ['placeholder' => 'Conteúdo', 'rows' => '4', 'class' => 'form-control', 'id' => 'titulo', 'maxlength' => 255, 'required']) !!}
                        </div>
                        <div class="col-sm-12 col-lg-12 col-md-12 mt-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" name="mostrar" type="checkbox">
                                    Mostrar notícia?
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-12 col-md-12 mt-4">
                            {{-- {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!} --}}
                        </div>
                        <div class="col-sm-12 col-lg-12 col-md-12 mt-4">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
