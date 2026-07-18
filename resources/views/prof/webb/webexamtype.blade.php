@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
<div class="py-3">
    <div class="">
        <div class="flex gap-3 items-center mt-2 mb-4">
            <a href="" 
                class="w-7 h-7 rounded-sm bg-vert flex justify-center items-center text-white">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <span class="text-black/30">Retour</span>
        </div>
        <div class="w-[70%] flex gap-5">
            <div class="w-20 h-20 rounded-md bg-black/5 flex justify-center items-center">
                <i class="fa-solid fa-receipt text-3xl text-rouge"></i>
            </div>
            <div class="w-[70%]">
                <h2 class="text-2xl font-semibold text-vert">{{ $examen->titre }}</h2>
                <p>{{ $examen->description }}</p>
                <div class="flex gap-4 text-sm">
                    <div class="flex   ">
                        Il y a <span class="inline-block  px-2 text-vert">3</span> types d'exercice
                    </div>
                    <div class="flex ">
                        Durée:  <span class=" px-3 text-rouge"> {{$examen->duree_minutes}} Minutes</span>
                    </div>
                </div>
                <div class="flex">
                    Status
                    <span @class([
                        'rounded-4xl border border-black/10 px-3',
                        'text-vert' => $examen->status == 'publie',
                        'text-black/50' => $examen->status == 'brouillon',
                        'text-rouge' => $examen->status == 'archive',
                    ])>
                        {{ $examen->status }}
                    </span>
                </div> 
            </div>
        </div>
        <div class="pt-3  flex justify-between items-start">
            <p class="w-[70%]">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur, dicta quibusdam eum sequi aperiam accusantium totam delectus quisquam iure, ab assumenda, reprehenderit laborum! Quia sint repudiandae ea. Quo, quod distinctio.
            </p>
            <div class="flex justify-end mt-4 text-white">
                <a href="{{ route('prof.examen.assignTypes', $examen->id) }}" class="inline-block p-1 px-5 rounded-md bg-rouge">
                    @if($examen->typesExercice->isEmpty())
                        + Ajouter type d'exercice
                    @else
                        Modifier les types
                    @endif
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div id="success-alert" class="bg-green-100/50 text-green-700 px-4 py-2 rounded-md my-4 flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button type="button" onclick="document.getElementById('success-alert').remove()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif
    
    @if($examen->typesExercice->isNotEmpty())
        <div class="flex gap-3 p-10 border border-black/3 rounded-md mt-5 bg-black/3">
            @foreach($examen->typesExercice as $type)
                @if(\Illuminate\Support\Facades\Route::has('prof.examen.web.' . $type->slug))
                    <a href="{{ route('prof.examen.web.' . $type->slug, $examen->id) }}"
                        class="inline-block p-2 px-5 border border-black/10 bg-vert text-white rounded-md">
                        {{ $type->nom }}
                    </a>
                @else
                    <span class="inline-block p-2 px-5 border border-black/10 bg-black/20 text-black/40 rounded-md" title="Bientôt disponible">
                        {{ $type->nom }}
                    </span>
                @endif
            @endforeach
        </div>
    @else
        <div class="p-10 rounded-md bg-black/3  mt-4">
            <i class="fa-solid fa-box-open text-3xl"></i>
            <p>Aucun type d'exercice n'a encore été ajouté à cet examen.</p>
        </div>
    @endif
    
</div>
@endsection