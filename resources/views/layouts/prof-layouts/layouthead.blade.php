<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
     @vite(['resources/sass/app.scss','resources/css/app.css', 'resources/js/app.js'])
     
</head>

<body class="text-black/60">
    @include('layouts.prof-layouts.layoutsed')
    <script>
        const prof_id = "{{ session('proffesseur')['id'] ?? '' }}";
    </script>
    @if (request()->routeIs('prof.choix_sujet.qcm'))
        <script>

            const oldQuestions = @json(old('questions', []))
        </script>
        <script src="{{ asset('js/qcm.js') }}"></script>
    @endif
    @if (request()->routeIs('prof.choix_sujet.relier_fleche'))
        <script>
            const oldCouples = @json(old('couples', []))
        </script>
        <script src="https://cdn.jsdelivr.net/npm/leader-line-new@1.1.9/leader-line.min.js"></script>
        <script src="{{ asset('js/fleche.js') }}"></script>
        <script src="{{ asset('js/relation.js') }}"></script>
    @endif
    @if (request()->routeIs('prof.choix_sujet.mots_croises'))
        <script>
            const oldGrille = @json(old('grille', []));
        </script>
        <script src="{{ asset('js/mots_croises.js') }}"></script>
    @endif
    @if (request()->routeIs('prof.choix_sujet.pendule'))
        <script src="{{ asset('js/pendule.js') }}"></script>
    @endif
    @if (request()->routeIs('prof.choix_sujet.comprehension'))
        {{ Route::currentRouteName() }}
        <script>
            console.log('test');
            const oldQuest = @json(old('question_comprehension', []));
            const oldRep = @json(old('reponse_comprehension', []));
        </script>
        <script src="{{ asset('js/comprehension.js') }}"></script>
    @endif
</body>
</html>