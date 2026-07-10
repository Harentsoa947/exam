@extends('layouts.prof-layouts.layouthead')
@section('contenue-prof')
<div class="float-left">
    <a href="{{ route('prof.choix_sujet') }}">
        <i class="fa-solid fa-arrow-left shadow bg-white p-3 rounded cursor-pointer mb-4" style="color: red"></i>
    </a>
</div>
<div class="min-h-screen p-8 mt-5">
    <div class="max-w-10xl mx-auto bg-gray-100 rounded-2xl shadow-lg p-4 sm:p-6 md:p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">
            Mots croisés
        </h2>
        
        <div class="flex justify-center gap-10">
            <div class="">
                <label class="block font-semibold text-gray-700 mb-2">
                    Nombre de ligne
                </label>
        
                <input
                    type="number" id="nbr_ligne"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <div class="">
                <label class="block font-semibold text-gray-700 mb-2">
                    Nombre de colonne
                </label>
        
                <input
                    type="number" id="nbr_colonne"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
        </div>


        <div class="flex justify-center mt-6">
            <button id="creation" class="px-6 py-3 mb-5 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:scale-105 active:scale-95 transition duration-300">
                Créer
            </button>
        </div>
        
       
        <div id="cases"></div>
    </div> 
</div>
    
@endsection