@extends('layouts.prof-layouts.layouthead')
@section('contenue-prof')

<div class="flex items-center justify-between mb-8">
    <a href="{{ route('prof') }}">
        <div class="w-12 h-12 rounded-full bg-white shadow flex items-center justify-center hover:bg-rouge hover:red transition">
            <i class="fa-solid fa-arrow-left text-xl"></i>
        </div>
    </a>

    <h1 class="text-3xl font-bold text-vert">
        Informations Examen
    </h1>

    <div></div>
</div>

<div class="bg-white rounded-xl shadow-lg overflow-hidden">

    <div class="bg-vert text-white p-6">
        <h2 class="text-2xl font-bold">
            Examen <span>1 / 25</span>
        </h2>

        {{-- <p class="mt-2 opacity-90">
            Progression : 1 / 25 questions
        </p> --}}
    </div>

    <div class="p-8">

        <div class="grid md:grid-cols-2 gap-6">

            <div class="bg-gray-50 rounded-lg p-5 border-l-4 border-green-600">
                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-full bg-vert text-white flex items-center justify-center">
                        <i class="fa-solid fa-book"></i>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Catégorie
                        </p>

                        <h3 class="text-xl font-semibold">
                            Français
                        </h3>
                    </div>

                </div>
            </div>

            <div class="bg-gray-50 rounded-lg p-5 border-l-4 border-green-600">
                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-full bg-vert text-white flex items-center justify-center">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Créé par
                        </p>

                        <h3 class="text-xl font-semibold">
                            Mr l'admin
                        </h3>
                    </div>

                </div>
            </div>

            <div class="bg-gray-50 rounded-lg p-5 border-l-4 border-green-600">
                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-full bg-vert text-white flex items-center justify-center">
                        <i class="fa-solid fa-calendar-plus"></i>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Date de création
                        </p>

                        <h3 class="text-xl font-semibold">
                            18 Janvier 2030
                        </h3>
                    </div>

                </div>
            </div>

            <div class="bg-gray-50 rounded-lg p-5 border-l-4 border-red-500">
                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-full bg-rouge text-white flex items-center justify-center">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">
                            Date de l'examen
                        </p>

                        <h3 class="text-xl font-semibold">
                            30 Mars 2030
                        </h3>
                    </div>

                </div>
            </div>

        </div>

        <div class="mt-10 flex justify-end">

            <button
                class="bg-vert text-white px-8 py-3 rounded-lg font-semibold hover:opacity-90 transition">
                Crée le sujet
            </button>

        </div>

    </div>

</div>

@endsection