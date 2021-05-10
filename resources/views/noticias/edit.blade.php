<div class="content">
    <div class="block block-rounded block-bordered">
        <div class="block-content block-content-full">
            {{ Form::model($noticia, ['route' => ['noticias.update', $noticia], 'class' => 'form-horizontal', 'method' => 'put' ]) }}
            @include('noticias._form')
            {{ Form::close() }}

            {{-- {{ Form::model($bvc, ['route' => ['contabil.bvc.update', $bvc], 'class' => 'form-horizontal', 'method' => 'put']) }}
            @include('contabil.bvc._form')
        {{ Form::close() }} --}}
        </div>
    </div>
</div>
