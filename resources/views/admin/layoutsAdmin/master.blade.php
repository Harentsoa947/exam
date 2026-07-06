<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>@yield('titre')</title>
</head>
<body>
    @include('admin/layoutsAdmin/header')

    <!-- accueil dashboard  -->
    <main class="main-content p-4 secondary_color">
        <div class="container-fluid">
            {{-- en tête --}}
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom">
                <div>
                    <h1 class="h2">@yield('titre_en_tete')</h1>
                </div>
                <div class="input-group" style="height: 35px; width: 15rem;">
                    <input type="search" class="form-control border-end-0" placeholder="Rechercher" style="height: 100%;">
                    <span class="input-group-text bg-white border-start-0 text-muted" style="height: 100%;">
                        <i class="bi bi-search"></i>
                    </span>
                </div>
                <div class="d-flex justify-content-between d-none d-md-flex">
                    <div class="pe-2 white_text">
                        <h4>Rakoto</h4>
                        <p>Administrateur</p>
                    </div>
                    <div class="image_user ps-4" style="border-left: 2px solid;">
                        <img src="{{ asset('images/person_4.jpg') }}" alt="person_4.jpg" style="cursor: pointer;border-radius:50%;" data-bs-toggle="dropdown" class="dropdown-toggle"  aria-expanded="false">
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item px-3 py-2 text-decoration-none white_text d-block" href="#">Mon profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item px-3 py-2 text-decoration-none white_text d-block" href="#">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @yield('contenue')    
        </div>
        
    </main>

    @include('admin/layoutsAdmin/footer')

    
</body>
</html>