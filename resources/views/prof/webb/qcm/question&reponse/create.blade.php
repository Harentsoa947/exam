@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
<div class="">
    <div class="w-[60%]  py-3">
        <div class="bg-white  rounded-md">
            <h2 class="text-xl font-semibold mb-4">Ajouter une question — {{ $qcmWeb->titre }}</h2>
        
            @if($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <form action="{{ route('prof.examen.web.qcm.question.store', [$examen->id, $qcmWeb->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="question-block  rounded-md mb-4">
                    <div class="mb-2">
                        <label class="block text-sm font-medium">Énoncé</label>
                        <textarea name="questions[0][enonce]" rows="2" class="border rounded w-full p-2" required></textarea>
                    </div>

                    <div class="mb-2">
                        <label class="block text-sm font-medium mb-1">Média (optionnel)</label>
                        <div class="flex gap-4 mb-2">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="media_type_0" value="aucun" class="media-type-radio" data-index="0" checked>
                                Aucun
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="media_type_0" value="image" class="media-type-radio" data-index="0">
                                Image
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="media_type_0" value="video" class="media-type-radio" data-index="0">
                                Vidéo
                            </label>
                        </div>

                        <div class="media-image-block hidden">
                            <input type="file" name="questions[0][image]" accept="image/*" class="border rounded w-full p-2">
                        </div>
                        <div class="media-video-block hidden">
                            <input type="file" name="questions[0][video]" accept="video/*" class="border rounded w-full p-2">
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="block text-sm font-medium">Points</label>
                       <input type="number" name="questions[0][points]" value="1" min="0.1" step="0.1" class="border rounded w-32 p-2">
                    </div>

                    <div class="mb-2">
                        <label class="block text-sm font-medium">Type de réponse</label>
                        <select name="questions[0][reponse_type]" class="reponse-type border rounded w-full p-2" onchange="toggleReponseType(this, 0)">
                            <option value="single" selected>Réponse simple</option>
                            <option value="multiple">Réponse multiple</option>
                            <option value="true_false">Vrai / Faux</option>
                        </select>
                    </div>

                    <div class="choices-block">
                        <label class="block text-sm font-medium mb-1">Choix</label>
                        <div class="choices-container space-y-2">
                            <div class="flex gap-2 items-center">
                                <input type="radio" class="est-correcte-input" name="questions[0][correct_choice]" value="0">
                                <input type="text" name="questions[0][choices][0][texte]" placeholder="Choix 1" class="border rounded p-2 flex-1">
                            </div>
                            <div class="flex gap-2 items-center">
                                <input type="radio" class="est-correcte-input" name="questions[0][correct_choice]" value="1">
                                <input type="text" name="questions[0][choices][1][texte]" placeholder="Choix 2" class="border rounded p-2 flex-1">
                            </div>
                        </div>
                        <button type="button" class="add-choice text-vert underline text-sm mt-2">+ Ajouter un choix</button>
                    </div>

                    <div class="vrai-faux-block hidden mt-2">
                        <label class="block text-sm font-medium mb-1">Bonne réponse</label>
                        <div class="flex gap-4">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="questions[0][vrai_faux_correct]" value="vrai"> Vrai
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="questions[0][vrai_faux_correct]" value="faux"> Faux
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-rouge text-white px-4 py-2 rounded">Enregistrer la question</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// --- Fisafidianana Image / Vidéo / Aucun (tsy azo roa miaraka) ---
document.addEventListener('change', function (e) {
    if (e.target.classList.contains('media-type-radio')) {
        const block = e.target.closest('.question-block');
        const imageBlock = block.querySelector('.media-image-block');
        const videoBlock = block.querySelector('.media-video-block');
        const imageInput = imageBlock.querySelector('input[type="file"]');
        const videoInput = videoBlock.querySelector('input[type="file"]');

        if (e.target.value === 'image') {
            imageBlock.classList.remove('hidden');
            videoBlock.classList.add('hidden');
            videoInput.value = ''; // mamafa ny fichier video efa voafidy
        } else if (e.target.value === 'video') {
            imageBlock.classList.add('hidden');
            videoBlock.classList.remove('hidden');
            imageInput.value = ''; // mamafa ny fichier image efa voafidy
        } else {
            imageBlock.classList.add('hidden');
            videoBlock.classList.add('hidden');
            imageInput.value = '';
            videoInput.value = '';
        }
    }
});

// --- Fisafidianana reponse_type (single / multiple / true_false) ---
function toggleReponseType(select, qIndex) {
    const block = select.closest('.question-block');
    const choicesBlock = block.querySelector('.choices-block');
    const vraiFauxBlock = block.querySelector('.vrai-faux-block');
    const estCorrecteInputs = block.querySelectorAll('.est-correcte-input');

    if (select.value === 'true_false') {
        choicesBlock.classList.add('hidden');
        vraiFauxBlock.classList.remove('hidden');
    } else {
        choicesBlock.classList.remove('hidden');
        vraiFauxBlock.classList.add('hidden');

        estCorrecteInputs.forEach((input, i) => {
            if (select.value === 'single') {
                input.type = 'radio';
                input.name = `questions[${qIndex}][correct_choice]`;
                input.value = i;
            } else {
                input.type = 'checkbox';
                input.name = `questions[${qIndex}][choices][${i}][est_correcte]`;
                input.value = '1';
                input.checked = false;
            }
        });
    }
}

// --- Fanampiana choix vaovao ---
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('add-choice')) {
        const block = e.target.closest('.question-block');
        const container = block.querySelector('.choices-container');
        const choiceIndex = container.querySelectorAll('input[type="text"]').length;
        const reponseType = block.querySelector('.reponse-type').value;

        const inputType = reponseType === 'single' ? 'radio' : 'checkbox';
        const inputName = reponseType === 'single'
            ? `questions[0][correct_choice]`
            : `questions[0][choices][${choiceIndex}][est_correcte]`;
        const inputValue = reponseType === 'single' ? choiceIndex : '1';

        const div = document.createElement('div');
        div.className = 'flex gap-2 items-center';
        div.innerHTML = `
            <input type="${inputType}" class="est-correcte-input" name="${inputName}" value="${inputValue}">
            <input type="text" name="questions[0][choices][${choiceIndex}][texte]" placeholder="Choix ${choiceIndex + 1}" class="border rounded p-2 flex-1">
        `;
        container.appendChild(div);
    }
});
</script>
@endsection