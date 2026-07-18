@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
    <div class="bg-white py-3 rounded-md">
        <h2 class="text-xl font-semibold mb-4 w-[60%] text-vert">Créer un Examen — {{ $examen->titre }} dans le type d'exercice Relier par flèche</h2>
        <div class="flex justify-between gap-4">
            
            <form action="{{ route('prof.examen.web.croiser.store', $examen->id) }}" method="POST"
                class="w-[70%]">
                @csrf
    
                <div class="mb-4 flex gap-3">
                    <label class="block  w-[5cm]  font-medium">Titre d'exercice relier par flèche</label>
                    <div class="flex-1">
                        <input type="text" name="titre" value="{{ old('titre') }}" class="border border-black/10 bg-black/3 rounded w-full p-2" placeholder="Ex: Relier par flèche Introduction HTML">
                        @error('titre') <p class="text-red-500 ">{{ $message }}</p> @enderror
                    </div>
                </div>
    
                <div class="mb-4 flex gap-3">
                    <label class="block  w-[5cm]  font-medium">Description</label>
                    <div class="flex-1">
                        <textarea name="description" rows="3" class="border border-black/10 bg-black/3 rounded w-full p-2"
                        placeholder="Ex: Decrivez votre examen que vous souhaiter ...">{{ old('description') }}</textarea>
                        @error('description') <p class="text-red-500 ">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="mb-4 flex gap-3">
                    <label class="block  w-[5cm]  font-medium">Note totale</label>
                    <div class="flex-1">
                        <input type="number" name="note_totale" value="{{ old('note_totale') }}" class="border border-black/10 bg-black/3 rounded p-2 w-[5cm]"
                        placeholder="Ex: 10">
                        @error('note_totale') <p class="text-red-500 ">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="mt-7 flex gap-3">
                    <div class="w-[5cm]"></div>
                    <button type="submit" class="bg-rouge text-white px-4 py-2 rounded">Créer exercice</button>
                </div>
            </form>
        </div>
    </div>
@endsection