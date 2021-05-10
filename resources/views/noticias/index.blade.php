@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="card-title">Todas as notícias</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right">
                                <a href={{ route('noticias.create') }} class="btn btn-primary" href="">Adicionar Nova
                                    Notícia</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Pesquisar notícias" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            @if ($noticias->count() > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Autor</th>
                                            <th>Categoria</th>
                                            <th class="text-right">Data</th>
                                            <th class="text-right">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($noticias as $noticia)
                                            <tr id="noticia__{{ $noticia->id }}">
                                                <td>{{ $noticia->titulo }}</td>
                                                <td>
                                                    {{ strtoupper($noticia->autor->name) }}
                                                </td>
                                                <td>{{strtoupper($noticia->categoria->nome)}}</td>
                                                <td class="text-right">{{datetime($noticia->created_at, null,'d/m/Y')}}</td>
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-info btn-sm btn-icon"
                                                        href={{ route('noticias.edit', $noticia->id) }}>
                                                        <i class="tim-icons icon-pencil"></i>
                                                    </a>
                                                    <button type="button" rel="tooltip" data-id="{{ $noticia->id }}"
                                                        class="btn btn-danger btn-sm btn-icon excluir-noticia">
                                                        <i class="tim-icons icon-trash-simple"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-primary d-flex align-items-center justify-content-between " role="alert">
                                    Não há nenhuma notícia até agora.
                                    <a class="btn btn-primary" href={{ route('noticias.create') }}>
                                        Adicionar nova
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atenção!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja excluir esta notícia?</p>
                    <input type="hidden" id="noticia-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="excluir-noticia">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
