<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('index') }}" class="simple-text logo-mini">DIX </a>
            <a href="{{ route('index') }}" class="simple-text logo-normal">{{ _('BPO') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'noticias') class="active " @endif>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fas fa-newspaper"></i>
                    <p>{{ _('Notícias') }}</p>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'noticias') class="active " @endif>
                            <a href="{{ route('noticias.index') }}">
                                <i class="fas fa-newspaper"></i>
                                <p>{{ _('Todas as noticías') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'noticas.create') class="active " @endif>
                            <a href="{{ route('noticias.create') }}">
                                <i class="tim-icons icon-simple-add"></i>
                                <p>{{ _('Adicionar nova') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'categorias') class="active " @endif>
                            <a href="{{ route('categorias.index') }}">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                <p>{{ _('Categorias') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @if (Auth::user()->level == 0)
                <li @if ($pageSlug == 'users') class="active " @endif>
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-users"></i>
                        <p>{{ _('Usuários') }}</p>
                    </a>
                    <div class="collapse show" id="laravel-examples">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'users') class="active " @endif>
                                <a href="{{ route('users.index') }}">
                                    <i class="fa fa-users"></i>
                                    <p>{{ _('Todos Usuários') }}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'users.create') class="active " @endif>
                                <a href="{{ route('users.create') }}">
                                    <i class="tim-icons icon-simple-add"></i>
                                    <p>{{ _('Adicionar novo') }}</p>
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>
            @endif
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                    <p>{{ _('Sair') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
