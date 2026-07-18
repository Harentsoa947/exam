@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
<div class="w-[70%] py-3">
    <div class="bg-white rounded-md">
        <h2 class="text-xl font-semibold mb-4">Modifier l'exercice de code</h2>
        <form action="{{ route('prof.examen.web.code.question.update', [$examen->id, $codeWeb->id, $question->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium">Instruction</label>
                <textarea name="instruction" rows="4" class="border rounded w-full p-2">{{ old('instruction', $question->instruction) }}</textarea>
                @error('instruction') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Langage</label>
                <select name="langage" class="border rounded w-full p-2">
                    @foreach(['php' => 'PHP', 'javascript' => 'JavaScript', 'python' => 'Python', 'html' => 'HTML', 'css' => 'CSS', 'java' => 'Java', 'c' => 'C', 'cpp' => 'C++'] as $value => $label)
                        <option value="{{ $value }}" {{ old('langage', $question->langage) == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('langage') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Code de départ (optionnel)</label>
                <textarea name="code_starter" rows="6" class="border rounded w-full p-2 font-mono text-sm">{{ old('code_starter', $question->code_starter) }}</textarea>
                @error('code_starter') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Points</label>
                <input type="number" name="points" value="{{ old('points', $question->points) }}" min="0.1" step="0.1" class="border rounded w-32 p-2">
                @error('points') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" id="submit-btn" class="bg-rouge text-white px-4 py-2 rounded">Enregistrer les modifications</button>
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