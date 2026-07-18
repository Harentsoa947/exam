@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
    <div class="w-[60%] py-10">
    <div class="bg-white p-4 rounded-md">
        <h2 class="text-xl font-semibold mb-4">Ajouter un devoir — {{ $fichierWeb->titre }}</h2>

        <form action="{{ route('prof.examen.web.download-upload.qeustion.store', [$examen->id, $fichierWeb->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium">Instruction</label>
                <textarea name="instruction" rows="4" class="border rounded w-full p-2" placeholder="Ex: Réalisez une page HTML respectant la maquette fournie, puis déposez votre fichier .zip">{{ old('instruction') }}</textarea>
                @error('instruction') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Fichier à fournir aux étudiants (optionnel)</label>
                <input type="file" name="fichier_prof" class="border rounded w-full p-2">
                <p class="text-xs text-black/50 mt-1">Formats acceptés : pdf, doc, docx, zip, rar (max 10 Mo)</p>
                @error('fichier_prof') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Points</label>
                <input type="number" name="points" value="{{ old('points', 1) }}" min="0.1" step="0.1" class="border rounded w-32 p-2">
                @error('points') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" id="submit-btn" class="bg-rouge text-white px-4 py-2 rounded">Enregistrer</button>
        </form>
    </div>
</div>

<script>
document.querySelector('form').addEventListener('submit', function () {
    const btn = document.getElementById('submit-btn');
    btn.disabled = true;
    btn.innerText = 'Enregistrement...';
});
</script>
@endsection