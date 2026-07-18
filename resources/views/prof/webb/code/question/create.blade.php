@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
<div class="w-[70%] py-3">
    <div class="bg-white p-4 rounded-md">
        <h2 class="text-xl font-semibold mb-4">Ajouter un exercice de code — {{ $codeWeb->titre }}</h2>

        <form action="{{ route('prof.examen.web.code.question.store', [$examen->id, $codeWeb->id]) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-base font-medium">Instruction</label>
                <textarea name="instruction" rows="4" class="border rounded w-full p-2" placeholder="Ex: Écrivez une fonction qui calcule la somme de deux nombres.">{{ old('instruction') }}</textarea>
                @error('instruction') <p class="text-red-500 text-base mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-base font-medium">Langage</label>
                <select name="langage" class="border rounded w-full p-2">
                    <option value="php" {{ old('langage') == 'php' ? 'selected' : '' }}>PHP</option>
                    <option value="javascript" {{ old('langage') == 'javascript' ? 'selected' : '' }}>JavaScript</option>
                    <option value="html" {{ old('langage') == 'html' ? 'selected' : '' }}>HTML</option>
                    <option value="css" {{ old('langage') == 'css' ? 'selected' : '' }}>CSS</option>
                    <option value="laravel" {{ old('langage') == 'laravel' ? 'selected' : '' }}>C</option>
                </select>
                @error('langage') <p class="text-red-500 text-base mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-base font-medium">Code de départ (optionnel)</label>
                <textarea name="code_starter" rows="6" class="border rounded w-full p-2 font-mono text-base" placeholder="function somme($a, $b) {&#10;    // votre code ici&#10;}">{{ old('code_starter') }}</textarea>
                @error('code_starter') <p class="text-red-500 text-base mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-base font-medium">Points</label>
                <input type="number" name="points" value="{{ old('points', 1) }}" min="0.1" step="0.1" class="border rounded w-32 p-2">
                @error('points') <p class="text-red-500 text-base mt-1">{{ $message }}</p> @enderror
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