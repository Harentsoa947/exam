@extends('layouts.prof-layouts.layouthead')
@section('contenue-prof')
<div class="float-left">
    <a href="{{ route('prof.choix_sujet') }}">
        <i class="fa-solid fa-arrow-left shadow bg-white p-3 rounded cursor-pointer mb-4" style="color: red"></i>
    </a>
</div>
<div class="min-h-screen p-8">

    <div class="max-w-6xl mx-auto">

        <!-- Paramètres -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">

            <h2 class="text-3xl font-bold text-gray-800 mb-6">
                Paramètres du QCM
            </h2>

            <label class="block text-gray-700 font-semibold mb-2">
                Nombre total de questions (20 maximum)
            </label>

            <input
                type="number"
                min="1"
                max="10"
                placeholder="Ex : 10"
                id="total"
                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none">

        </div>

        <!-- Question -->
        <div id="qcm"></div>
        


        <!-- Bouton -->

        <div class="flex justify-end">

            <button
                class="bg-rouge text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 duration-200">
                <i class="fa-solid fa-floppy-disk mr-2"></i>
                Enregistrer
            </button>

        </div>

    </div>

</div>
@endsection