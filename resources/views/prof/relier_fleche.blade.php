@extends('layouts.prof-layouts.layouthead')
@section('contenue-prof')
<div class="float-left">
    <a href="{{ route('prof.choix_sujet') }}">
        <i class="fa-solid fa-arrow-left shadow bg-white p-3 rounded cursor-pointer mb-4" style="color: red"></i>
    </a>
</div>
<div class="min-h-screen p-8">
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-lg p-4 sm:p-6 md:p-8">

        <h2 class="text-3xl font-bold text-gray-800 mb-8">
            Relier par flèche
        </h2>
    
        <!-- Nombre de couples -->
        <div class="mb-8">
            <label class="block font-semibold text-gray-700 mb-2">
                Nombre de couples
            </label>
    
            <input
                type="number" id="nombreCouples"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>
        
        
        <!-- Bloc principal -->
        <div id="bloc_principal"></div>
    
    </div>    
</div>
    
@endsection