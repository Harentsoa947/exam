@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
<div class="py-3">
    <div class="flex gap-3 items-center my-2">
        <a href="{{ route('prof.examen.web.qcm', $examen->id) }}" 
            class="w-7 h-7 rounded-sm bg-vert flex justify-center items-center text-white">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
        <span class="text-black/30">Retour</span>
    </div>
    @include('layouts.admin-layouts.examen.layout-exam-dev')
    <div class=" m-auto py-3 min-h-[101vh]">
        <div class="flex justify-between gap-5 border-b bg-black/3 border-black/10 p-2">
            <div class="flex-1 flex gap-5">
                <div class="w-15 h-15 rounded-md bg-black/5 flex justify-center items-center">
                    <i class="fa-solid fa-receipt text-2xl text-vert"></i>
                </div>
                <div class="">
                    <h3 class="text-xl font-semibold">{{ $fichierWeb->titre }}</h3>
                    <div class="flex gap-3">
                        <div class="flex text-sm">
                            Durée: <span class="border border-black/10 rounded-full px-3 inline-block text-rouge">Libre</span>
                        </div>
                        <div class="flex text-sm">
                            Question: <span class="border border-black/10 rounded-full px-3 inline-block text-vert"> {{ $questions->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <a href="{{ route('prof.examen.web.download-upload.qeustion.create', [$examen->id, $fichierWeb->id]) }}" 
                    class="bg-rouge p-1 px-4 inline-block rounded-md text-white">
                    Créer nouvelle question
                </a>
            </div>
        </div>

        @if(session('success'))
            <div id="success-alert" class="bg-green-100/50 text-green-700 px-4 py-2 rounded-md mt-4 flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button type="button" onclick="document.getElementById('success-alert').remove()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        <div class="p-2 border border-black/5">
        @forelse($questions as $index => $question)
            <div class="py-3 border-b border-black/10">
                <div class="flex gap-5 justify-between">
                    <div class="w-10 h-10 bg-black/5 rounded-sm flex justify-center items-center">
                        <span class="text-vert">{{ $index + 1 }}</span>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-base font-semibold">{{ $question->instruction }}</h4>
                        <div class="flex gap-3 mt-1">
                            <div class="flex text-sm">
                                Point: <span class="border border-black/10 rounded-full px-3 text-vert">{{ $question->points }}</span>
                            </div>
                            <div class="flex text-sm">
                                Rendus: <span class="border border-black/10 rounded-full px-3 text-rouge">{{ $question->reponses_count }}</span>
                            </div>
                        </div>
                        @if($question->fichier_prof)
                            <a href="{{ asset('fichiers/prof/' . $question->fichier_prof) }}" target="_blank" class="text-vert text-sm underline mt-1 inline-block">
                                <i class="fa-solid fa-paperclip"></i> Télécharger le fichier fourni
                            </a>
                        @endif
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('prof.examen.web.download-upload.qeustion.edit', [$examen->id, $fichierWeb->id, $question->id]) }}" class="text-black/60">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <form action="{{ route('prof.examen.web.download-upload.qeustion.destroy', [$examen->id, $fichierWeb->id, $question->id]) }}" method="POST" onsubmit="return confirm('Supprimer ce devoir ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="p-10 rounded-md bg-black/5 text-center">
                <i class="fa-solid fa-box-open text-2xl"></i>
                <p>Aucun devoir n'a encore été créé.</p>
            </div>
        @endforelse
    </div>
    </div>
</div>

    <style>
        .reponse-wrapper {
            overflow: hidden;
            max-height: 0;
            opacity: 0;
            transform: translateY(-8px);
            transition: max-height 0.35s ease, opacity 0.3s ease, transform 0.3s ease;
        }

        .reponse-wrapper.open {
            opacity: 1;
            transform: translateY(0);
        }

        .rotate-icon {
            transform: rotate(180deg);
        }
    </style>
    <script>
    function toggleReponse(button) {
        const block = button.closest('.border-b');
        const wrapper = block.querySelector('.reponse-wrapper');
        const inner = block.querySelector('.reponse');
        const icon = button.querySelector('i');

        const isOpen = wrapper.classList.contains('open');

        if (isOpen) {
            wrapper.style.maxHeight = '0px';
            wrapper.classList.remove('open');
            icon.classList.remove('rotate-icon');
        } else {
            wrapper.style.maxHeight = inner.scrollHeight + 'px';
            wrapper.classList.add('open');
            icon.classList.add('rotate-icon');
        }
    }
    </script>
@endsection