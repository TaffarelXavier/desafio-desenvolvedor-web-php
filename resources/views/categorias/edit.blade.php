<div class="content">
    <div class="block block-rounded block-bordered">
        <div class="block-content block-content-full">
            {{ Form::model($categoria, ['route' => ['categorias.update', $categoria], 'class' => 'form-horizontal', 'method' => 'put']) }}
            @include('categorias._form')
            {{ Form::close() }}
        </div>
    </div>
</div>
