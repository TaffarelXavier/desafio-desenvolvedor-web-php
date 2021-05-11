@extends('layouts.app', ['pageSlug'=>'tea', 'class' => 'register-page', 'page' => _('Register Page'), 'contentClass' =>
'register-page'])

@section('content')
    <div class="row">
        <div class="col-md-7 mr-auto">
            <div class="card card-register">
                {{ Form::model($user, ['route' => ['users.update', $user], 'class' => 'form-horizontal', 'method' => 'put']) }}
                @csrf
                @include('users._form')
                {{ Form::close() }}
            </div>
        </div>

    </div>
@endsection
