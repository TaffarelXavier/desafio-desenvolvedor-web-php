@extends('layouts.app', ['pageSlug' => 'categorias'])
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="card-title">Todas as categorias</h2>
                            <span>Somente administradores podem adicionar novas categorias</span>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right">
                                <a href={{ route('categorias.create') }} class="btn btn-primary" href="">Adicionar Nova
                                    Categoria</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div>
                            <div class="form-group">
                                <form action="" method="get">
                                    <input type="search" name="q" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ isset($params['q']) ? $params['q'] : '' }}"
                                        placeholder="Pesquisar categorias" autofocus>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            @if ($categorias->count() > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NOME</th>
                                            <th class="text-right">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorias as $categoria)
                                            <tr id="categorias__{{ $categoria->id }}">
                                                <td>
                                                    {{ strtoupper($categoria->nome) }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <a rel="tooltip" class="btn btn-info btn-sm btn-icon"
                                                        href={{ route('categorias.edit', $categoria->id) }}>
                                                        <i class="tim-icons icon-pencil"></i>
                                                    </a>
                                                    <button type="button" rel="tooltip" data-id="{{ $categoria->id }}"
                                                        class="btn btn-danger btn-sm btn-icon excluir-categoria">
                                                        <i class="tim-icons icon-trash-simple"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-primary d-flex align-items-center justify-content-between "
                                    role="alert">
                                    Não há nenhuma notícia até agora.
                                    <a class="btn btn-primary" href={{ route('categorias.create') }}>
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

    <div class="modal" tabindex="-1" id="modalCategorias">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atenção!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja excluir esta notícia?</p>
                    <input type="hidden" id="categoria-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="excluir-categoria">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
