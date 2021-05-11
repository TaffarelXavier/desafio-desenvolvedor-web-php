@extends('layouts.app', [
'pageSlug' =>'users',
'class' => 'register-page',
'contentClass' =>'register-page'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Usuários</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Adicionar
                                    usuário</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <table class="table tablesorter " id="">
                                <thead class=" text-primary">
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Nível</th>
                                        <th scope="col">Data da criação</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr id="users__{{ $user->id }}">
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                {{ levels($user->level) }}
                                            </td>
                                            <td>{{ datetime($user->created_at, null, 'd/m/Y') }}</td>
                                            <td class="td-actions text-right">
                                                @if (Auth::user()->id == $user->id)
                                                    <a rel="tooltip" class="btn btn-info btn-sm btn-icon"
                                                        href={{ route('users.edit', $user->id) }}>
                                                        <i class="tim-icons icon-pencil"></i>
                                                    </a>
                                                    <button type="button" rel="tooltip" data-id="{{ $user->id }}"
                                                        class="btn btn-danger btn-sm btn-icon excluir-user">
                                                        <i class="tim-icons icon-trash-simple"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer py-4">

                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modalUsers">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atenção!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja excluir este usuário?</p>
                    <input type="hidden" id="user-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="excluir-user">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
