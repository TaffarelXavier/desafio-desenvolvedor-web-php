@extends('layouts.app', ['pageSlug'=>'users.create', 'class' => 'register-page', 'page' => _('Register Page'), 'contentClass' =>
'register-page'])

@section('content')
    <div class="row">
        <div class="col-md-7 mr-auto">
            <div class="card card-register">
                {{ Form::open(['route' => 'users.store', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form-user']) }}
                @csrf
                @include('users._form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
