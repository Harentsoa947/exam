
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <div class="py-20">
        <div class="">
            <img src="/images/logo.png" alt="" class="w-[2cm] m-auto">
        </div>
        <div class="w-[11cm] m-auto  p-4 text-center">
            <h3 class="text-2xl font-semibold mb-4">Binvenus dans l'examen de l'hopes formation</h3>
            <form action="">
                <input type="email" name="" id="" class="py-2 border-b-2 border-black/10 w-full outline-0  focus:border-green-800"
                placeholder="Email..">
                <input type="password" name="" id="password" class="py-2 border-b-2 border-black/10 w-full mt-3 outline-0 focus:border-green-800"
                placeholder="Email..">
                <div class="mt-2 text-left">
                    <input type="checkbox" name="" id="afficherPassword">
                    <label for="afficherPassword">Afficher mot de passe</label>
                </div>
                <button type="submit" class="p-1 rounded-md w-full bg-black/50 mt-5">
                    Connexion
                </button>
            </form>
            <div class="text-center mt-2">
                S'inscrire en tans que 
                <a href="" class="hover:underline">admin ?</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const checkbox = document.getElementById('afficherPassword');

        checkbox.addEventListener('change', function () {
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
<body>
    
</body>
</html>