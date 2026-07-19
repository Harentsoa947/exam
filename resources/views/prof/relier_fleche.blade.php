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
    
        <form action="{{ route('post.relier_fleche') }}" method="post">
            @csrf
            <!-- Nombre de couples -->
            <div class="mb-8">
                <label class="block font-semibold text-gray-700 mb-2">
                    Nombre de couples
                </label>

                <input
                    type="number" id="nombreCouples" name="nbr_relation"  value="{{ old('nbr_relation') ?? '' }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>


            <!-- Bloc principal -->
            <div id="bloc_principal"></div>
        </form>
        
    
    </div>    
</div>
    
@endsection