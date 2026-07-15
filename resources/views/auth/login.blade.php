<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    @vite(['resources/sass/app.scss','resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="py-15 text-black/60">
        <div class="w-[11cm] m-auto rounded-md text-center px-4">
            <div class="mb-4">
                <img src="/images/logo.png" alt="" class="w-[2cm] m-auto">
            </div>
            <h3 class="text-2xl font-semibold mb-4 text-vert">Bienvenue dans l'examen de l'hopes formation</h3>

            @if (session('error'))
                <div class="text-left text-red-600 text-sm mb-3">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <input type="email" name="email" value="{{ old('email') }}" class="py-2 border-b-2 border-black/10 w-full outline-0 focus:border-[rgb(104,167,2)]"
                placeholder="Email..">
                @error('email')
                    <div class="text-left text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror

                <input type="password" name="password" id="password" class="py-2 border-b-2 border-black/10 w-full outline-0 focus:border-[rgb(104,167,2)] mt-5"
                placeholder="Mot de passe">
                @error('password')
                    <div class="text-left text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror

                <div class="mt-2 text-left">
                    <input type="checkbox" name="" id="afficherPassword">
                    <label for="afficherPassword">Afficher mot de passe</label>
                </div>

                <button type="submit" class="p-1 rounded-md w-full mt-5 bg-rouge">
                    Connexion
                </button>
            </form>

            <div class="text-center mt-2">
                S'inscrire en tant que
                <a href="{{ route('admin.register') }}" class="text-vert hover:underline">admin ?</a>
            </div>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const checkbox = document.getElementById('afficherPassword');

        checkbox.addEventListener('change', function () {
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>
</html>