
<div class="content">
    <div class="block block-rounded block-bordered">
        <div class="block-content block-content-full">
            {{ Form::open(['route' => 'noticias.store', 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form-noticia']) }}
                @include('noticias._form')
            {{ Form::close() }}
        </div>
    </div>
</div>