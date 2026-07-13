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
                Sujet pour la Rédaction
            </h2>

            <div class="mb-6">
    
                <label class="block font-semibold text-gray-700 mb-2">
                    Question
                </label>
        
                <textarea
                    rows="3"
                    placeholder="Saisissez la question pour le rédaction..."
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-green-500 outline-none resize-none"></textarea>
                    
            </div>

            <div class="mb-3">
                <label class="block font-semibold text-gray-700 mb-2">
                    Nombre de points
                </label>
                <input type="number" placeholder="" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" id="points-${items}">
            </div>

            <div class="mb-6">
                <label class="block font-semibold text-gray-700 mb-2">
                    Nombre maximum de mot
                </label>
                <input type="number" placeholder="" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" id="points-${items}">
            </div>

            <div class="flex justify-end">

                <button
                    class="bg-rouge text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 duration-200">
                    <i class="fa-solid fa-floppy-disk mr-2"></i>
                    Enregistrer
                </button>
    
            </div>
            
        </div>

        
        


        <!-- Bouton -->

        

    </div>

</div>

@endsection