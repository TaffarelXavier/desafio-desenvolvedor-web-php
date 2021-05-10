<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('DIX BPO') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('White Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Painel') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel"></i>
                    <span class="nav-link-text">{{ __('Notícias') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('noticias.index') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Todas as noticías') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Adicionar nova') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('users.index') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Categorias') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @if (Auth::user()->level == 0)
                <li @if ($pageSlug == 'icons') class="active " @endif>
                    <a href="{{ route('pages.icons') }}">
                        <i class="tim-icons icon-atom"></i>
                        <p>{{ _('Usuários') }}</p>
                    </a>
                    <div class="collapse show" id="laravel-examples">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'users') class="active " @endif>
                                <a href="{{ route('users.index') }}">
                                    <i class="tim-icons icon-single-02"></i>
                                    <p>{{ _('Usuários') }}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'profile') class="active " @endif>
                                <a href="{{ route('users.create') }}">
                                    <i class="tim-icons icon-single-02"></i>
                                    <p>{{ _('Adicionar novo') }}</p>
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>
