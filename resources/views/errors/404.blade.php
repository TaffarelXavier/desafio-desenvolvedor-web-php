@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
           <h1>{{ $message }}</h1>
            <br /><br />

            <a href="{{ URL::previous() }}">Voltar</a>
        </div>
    </div>
@endsection
