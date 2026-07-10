@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
<form action="{{ route('admin.prof.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
        <label class="block text-sm font-medium">Anarana</label>
        <input type="text" name="name" value="{{ old('name') }}" class="border rounded w-full p-2">
        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="border rounded w-full p-2">
        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium">Catégorie</label>
        <select name="categorie_id" class="border rounded w-full p-2">
            <option value="">-- Choisir --</option>
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}" @selected(old('categorie_id') == $categorie->id)>
                    {{ $categorie->nom }}
                </option>
            @endforeach
        </select>
        @error('categorie_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>
{{-- 
    <div class="mb-4">
        <label class="block text-sm font-medium">Fichier</label>
        <input type="file" name="file" class="border rounded w-full p-2">
        @error('file') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div> --}}

    <button type="submit" class="bg-rouge text-white px-4 py-2 rounded">Enregistrer</button>
</form>
@endsection
