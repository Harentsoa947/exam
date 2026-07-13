@extends('layouts.prof-layouts.layouthead')

@section('contenue-prof')

<div class="max-w-6xl mx-auto">

    <div class="mb-6">
        <a href="{{ route('prof.choix_sujet') }}"
            class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white shadow hover:shadow-lg transition">
            <i class="fa-solid fa-arrow-left text-red-600 text-lg"></i>
        </a>
    </div>

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
                    placeholder="Entrer un indice..."
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

        </div>

        <div class="text-center mt-8">

            <button
                id="apper"
                class="bg-vert text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 duration-200">

                <i class="fa-solid fa-eye mr-2"></i>

                Aperçu

            </button>

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

</div>

@endsection