<div class="card-body">
    <h4>Cadastrar usuário</h4>
    <hr />
    <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="tim-icons icon-single-02"></i>
            </div>
        </div>
        {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'autofocus', 'id' => 'titulo', 'maxlength' => 255, 'placeholder' => 'Nome', 'required']) !!}
        @include('alerts.feedback', ['field' => 'name'])
    </div>
    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="tim-icons icon-email-85"></i>
            </div>
        </div>
        {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'autofocus', 'id' => 'email', 'maxlength' => 255, 'placeholder' => 'Email', 'required']) !!}
        @include('alerts.feedback', ['field' => 'email'])
    </div>

    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
        @if (isset($user))
            {!! Form::select('level', levels(), $user->level, ['class' => 'form-control']) !!}
        @else
            {!! Form::select('level', levels(), null, ['class' => 'form-control']) !!}
        @endif
    </div>

    <div class="input-group mt-4 mb-0">
        <h4>Alteração de Senha</h4>
    </div>

    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="tim-icons icon-lock-circle"></i>
            </div>
        </div>
        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
            placeholder="{{ _('Password') }}">
        @include('alerts.feedback', ['field' => 'password'])
    </div>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="tim-icons icon-lock-circle"></i>
            </div>
        </div>
        <input type="password" name="password_confirmation" class="form-control"
            placeholder="{{ _('Confirm Password') }}">
    </div>
</div>
<div class="card-footer">
    <div class="row">
        <div class="col-sm-6 col-lg-6 col-md-6">
            <button type="submit" class="btn btn-primary">
                @if (isset($categoria))
                    Salvar Alterações
                @else
                    Salvar
                @endif
            </button>

            <a href={{ route('users.index') }} class="btn btn-default">
                Voltar
            </a>
        </div>
    </div>

</div>
