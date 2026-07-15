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
                Sujet pour le compréhension du texte
            </h2>


            <div class="mb-3">
                <label class="block font-semibold text-gray-700 mb-2">
                    Nombre de points
                </label>
                <input type="number" placeholder="" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" id="">
            </div>


            <div class="mb-3">
                <label class="block font-semibold text-gray-700 mb-2">
                    Titre
                </label>
                <input type="text" placeholder="" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" id="">
            </div>

            <div class="mb-6">
    
                <label class="block font-semibold text-gray-700 mb-2">
                    Texte en question
                </label>
        
                <textarea
                    rows="17"
                    placeholder="Copier ou saississez le texte ici"
                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-green-500 outline-none resize-none"></textarea>
                    
            </div>


            <div class="mb-3">
                <label class="block font-semibold text-gray-700 mb-2">
                    Nombre de question
                </label>
                <input type="number" placeholder="" class="w-60 rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" id="question">
            </div>

            

            <div id="quest"></div>

            {{-- <div class="mx-15">
                <div class="question_reponse px-4 rounded-2xl pt-5 border">
                    <div class="mb-3">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Question 1
                        </label>
                        <input type="text" placeholder="Entrez le question" class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" id="  ">
                    </div>
                    <div class="mb-3">
                        <label class="block font-semibold text-gray-700 mb-2">
                            Réponse 1
                        </label>
                        <input type="text" placeholder="Entrez la réponse attendue" class="w-full rounded-lg border border-green-300 px-4 py-2 focus:ring-2 focus:ring-green-500 outline-none" id="  ">
                    </div>
                </div>
            </div> --}}

            <div class="flex justify-end mt-4">

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