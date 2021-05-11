{{-- <div class="modal" tabindex="-1" id="exampleModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Atenção!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Deseja excluir esta notícia?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Confirmar</button>
        </div>
      </div>
    </div>
  </div> --}}

  {{-- {{ Form::open(['route' => [$route, $id], 'method' => 'delete']) }}
    <div class="modal fade" id="{{ $name . $id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog text-left" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancelar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (isset($mensagem))
                        {!! nl2br($mensagem) !!}
                    @else
                        Confirma a exclusão do registro?
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
{{ Form::close() }} --}}
