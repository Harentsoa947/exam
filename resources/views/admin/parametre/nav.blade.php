<div class="mt-5">
    <ul class="nav nav-tabs nav-justified">
        <li class="nav-item">
            <a href="{{route('admin.param.admin')}}"
            @class([
                'nav-link white_text', 
                'active fw-bold special_card' => request()->routeIs('admin.param.admin')
            ])
            style="{{ request()->routeIs('admin.param.admin') ? 'border-bottom: 2px solid #0000002a' : '' }}">
                Accueil
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.param.admin.apparence') }}" 
            @class([
                'nav-link white_text', 
                'active fw-bold special_card' => request()->routeIs('admin.param.admin.apparence')
            ])
            style="{{ request()->routeIs('admin.param.admin.apparence') ? 'border-bottom: 2px solid #0000002a' : '' }}">
                Couleurs graphique
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link white_text">Autre</a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link white_text">Autre</a>
        </li>
    </ul>
</div>