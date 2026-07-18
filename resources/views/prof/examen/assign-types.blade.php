@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
<div class="bg-white p-4 rounded-md">
    <h2 class="text-xl font-semibold mb-1">{{ $examen->titre }}</h2>
    <p class="text-black/60 mb-4">Sélectionnez les types d'exercice pour cet examen</p>
    @if(session('success'))
        <div id="success-alert" class="bg-green-100/50 text-green-700 px-4 py-2 rounded-md my-4 flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button type="button" onclick="document.getElementById('success-alert').remove()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif
    <form action="{{ route('prof.examen.storeTypes', $examen->id) }}" method="POST">
        @csrf

        <div class="flex flex-wrap gap-3 mb-4">
            @foreach($typesExercice as $type)
                <label class="flex items-center gap-2 border rounded-md px-4 py-2 cursor-pointer">
                    <input type="checkbox" name="type_exercice_id[]" value="{{ $type->id }}"
                        {{ in_array($type->id, old('type_exercice_id', $examen->typesExercice->pluck('id')->toArray())) ? 'checked' : '' }}>
                    <i class="{{ $type->icone }}"></i>
                    {{ $type->nom }}
                </label>
            @endforeach
        </div>
        @error('type_exercice_id') <p class="text-red-500 text-sm mb-4">{{ $message }}</p> @enderror

        <button type="submit" class="bg-rouge text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection