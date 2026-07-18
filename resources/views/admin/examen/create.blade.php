@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
    <div class="bg-white h-full rounded-md p-4">
    <h2 class="text-vert text-2xl font-semibold mb-4">Créer un examen</h2>
     @if(session('success'))
        <div id="success-alert" class="bg-green-100/50 text-green-700 px-4 py-2 rounded-md mb-4 flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button type="button" onclick="document.getElementById('success-alert').remove()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif
    <form action="{{ route('admin.examen.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium">Titre</label>
            <input type="text" name="titre" value="{{ old('titre') }}" class="border rounded w-full p-2">
            @error('titre') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" rows="4" class="border rounded w-full p-2">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Catégorie</label>
            <select name="categorie_id" class="border rounded w-full p-2">
                <option value="">-- Sélectionner une catégorie --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
            @error('categorie_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Durée (minutes)</label>
            <input type="number" name="duree_minutes" value="{{ old('duree_minutes') }}" class="border rounded w-full p-2">
            @error('duree_minutes') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Statut</label>
            <select name="status" class="border rounded w-full p-2">
                <option value="brouillon" {{ old('status') == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                <option value="publie" {{ old('status') == 'publie' ? 'selected' : '' }}>Publié</option>
                <option value="archive" {{ old('status') == 'archive' ? 'selected' : '' }}>Archivé</option>
            </select>
            @error('status') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-rouge text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection