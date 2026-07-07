<!-- petits écrans-->
<nav class="navbar d-lg-none px-3 principal_color">
    <span class="navbar-brand text-white">Admin</span>
    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
        <span class="navbar-toggler-icon "></span>
    </button>
</nav>

<!-- sidebar -->
<div class="offcanvas-lg offcanvas-start principal_color sidebar-fixed pe-2" tabindex="-1" id="sidebarMenu">
    <div class="offcanvas-header d-lg-none">
        <h5 class="offcanvas-title text-white">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"></button>
    </div>
    
    <div class="offcanvas-body d-flex flex-column p-3 h-100">
        <!-- Logo / Titre -->
        
        <a href="#" 
            class="d-flex align-items-center mb-4 me-md-auto active fs-4 fw-bold white_text">
            <i class="bi bi-speedometer2 me-2"></i> Administration
        </a>
        
        <!-- Liens du menu -->
        <ul class="nav nav-pills flex-column mb-auto w-100 navigation">
            <li class="nav-item">
                {{-- dropdown-toggle  --}}
                <a href="{{ route('admin') }}" 
                    @class([
                            'nav-link align-middle px-3 py-2 mb-1 d-flex align-items-center justify-content-between', 
                            'active white_text' => request()->routeIs('admin'),
                            'white_text_50' => !request()->routeIs('admin')
                        ])
                    aria-current="page">
                    <div>
                        <i class="bi bi-house-door me-2"></i> Accueil
                    </div>
                    
                </a>
            </li>
            <li>
                <a href="#" class="nav-link white_text_50 align-middle px-3 py-2 mb-1 hover-link">
                    <i class="bi bi-people me-2"></i> Prof / Etudiant
                </a>
            </li>
            <li>
                <a href="#" class="nav-link white_text_50 align-middle px-3 py-2 mb-1">
                    <i class="bi bi-box-seam me-2"></i> Examen
                </a>
            </li>
            <li>
                <a href="#" class="nav-link white_text_50 align-middle px-3 py-2 mb-1">
                    <i class="bi bi-graph-up me-2"></i> Statistiques
                </a>
            </li>
            <li>
                <!-- text-white-50 text-white -->
                <a href="#"
                    data-bs-toggle="collapse" data-bs-target="#settings" 
                    aria-expanded="{{ request()->routeIs('admin.param*') ? 'true' : 'false' }}"
                    @class([
                        'nav-link align-middle px-3 py-2 mb-1 d-flex align-items-center justify-content-between dropdown-toggle', 
                        'active text-white' => request()->routeIs('admin.param.*'),
                        'white_text_50' => !request()->routeIs('admin.param.*')
                    ])>
                    <div>
                        <i class="bi bi-gear me-2"></i> 
                        Paramètres
                    </div>
                </a>
                <div
                    @class([
                        'collapse secondary_color', 
                        'show' => request()->routeIs('admin.param.*')
                    ])
                    id="settings">
                    <ul class="ms-3 white_text_50">
                        <li>
                            <a 
                            href="{{ route('admin.param.admin') }}"
                            @class([
                                'white_text' => request()->routeIs('admin.param.admin'),
                                'white_text_50' => !request()->routeIs('admin.param.admin')
                            ])
                            >
                                Admin
                            </a>
                        </li>
                        <li>Profs</li>
                        <li>Elèves</li>
                    </ul>
                </div>
                
            </li>
        </ul>
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="hover:underline">
                Deconnexion
            </button>
        </form>
        
        <hr>
        
        <div>
            <a href="#" class="nav-link white_text_50 align-middle px-3 py-2 mb-1">
                
                <div class="theme">
                    {{-- <i class="bi bi-moon"></i> Sombre --}}
                    <i class="bi bi-sun"></i> Clair
                </div>
                
            </a>
        </div>
        <!-- Profil utilisateur en bas -->
        <div class="dropdown d-lg-none">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <strong class="me-2">Rakoto</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item px-3 py-2 text-decoration-none text-white d-block" href="#">Mon profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item px-3 py-2 text-decoration-none text-white d-block" href="#">Déconnexion</a></li>
            </ul>
        </div>
    </div>
</div>