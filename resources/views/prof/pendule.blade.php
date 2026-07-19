@extends('layouts.prof-layouts.layouthead')

@section('contenue-prof')

<div class="max-w-6xl mx-auto">

    <div class="mb-6">
        <a href="{{ route('prof.choix_sujet') }}"
            class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white shadow hover:shadow-lg transition">
            <i class="fa-solid fa-arrow-left text-red-600 text-lg"></i>
        </a>
    </div>


    @if ($errors->any())
            <div class="mb-6">
                @foreach ($errors->all() as $erreur)
                    <div class="flex items-center p-4 mb-2 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div>{{ $erreur }}</div>
                    </div>  
                @endforeach
            </div>
        @endif


        @if (session('success'))
            {{ session('success') }}
        @endif

    <form action="{{ route('post.pendule') }}" method="post">
        @csrf
        <div class="bg-white rounded-3xl shadow-xl p-8">

            <h2 class="text-3xl font-bold text-gray-800 mb-8">
                Création du jeu de pendu
            </h2>

            
            <div class="grid md:grid-cols-2 gap-8">
            
                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Mot ou texte à deviner
                    </label>

                    <input
                        id="reponse"
                        type="text"
                        name="mots"
                        value="{{ old('mots') ?? '' }}"
                        placeholder="Entrer la réponse..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Indice
                    </label>

                    <input
                        id="indice"
                        type="text"
                        name="indice"
                        value="{{ old('indice') ?? '' }}"
                        placeholder="Entrer un indice..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

            </div>
            
            <div class="text-center mt-8">

                <a
                    id="apper"
                    class="bg-vert text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 duration-200">

                    <i class="fa-solid fa-eye mr-2"></i>

                    Aperçu

                </a>

            </div>

            <div class="mt-10 flex justify-center">

                <div class="bg-gray-100 rounded-2xl p-6 shadow-inner">

                    <table
                        id="contenue"
                        class="border-separate border-spacing-1">
                    </table>

                </div>

            </div>

        </div>

        <div class="flex justify-end mt-8">

            <button
                class="bg-rouge text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 duration-200">

                <i class="fa-solid fa-floppy-disk mr-2"></i>

                Enregistrer

            </button>

        </div>
    </form>
</div>

@endsection