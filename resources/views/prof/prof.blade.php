@extends('layouts.prof-layouts.layouthead')
@section('contenue-prof')
    <h1 class="text-vert text-2xl font-semibold mb-4">Examen planifié</h1>

    <div class="card shadow p-3 bg-gray-100 w-80 size-32">
        <div class="flex justify-between">
            <p>1/25</p>
            <p class="text-right" style="color: red">Call Français</p>
        </div>
        
        <p class="text-center py-3" style="font-size: 20px">Date: 12 Mars 2030</p>
        <div class="text-center">
            <a href="{{ route('prof.choix_sujet') }}" class="bg-rouge p-1 px-4 rounded-md bg-rouge-hover mx-auto">Crée sujet</a>
        </div>
        
    </div>
@endsection