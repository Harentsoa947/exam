@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
    <div class="py-3">
        <div class="flex gap-3 items-center my-2">
            <a href="{{ route('prof.examen.web.code', $examen->id) }}" 
                class="w-7 h-7 rounded-sm bg-vert flex justify-center items-center text-white">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <span class="text-black/30">Retour</span>
        </div>
        @include('layouts.admin-layouts.examen.layout-exam-dev')
        <div class="border border-black/10 mt-2 rounded-md overflow-hidden min-h-90">
            <div class="flex justify-between items-end gap-5 p-2 bg-black/5  ">
                <div>
                    <h2 class="text-2xl font-semibold">{{ $codeWeb->titre }}</h2>
                    <p>{{ $codeWeb->description }}</p>
                </div>
                <a href="{{ route('prof.examen.web.code.question.create', [$examen->id, $codeWeb->id]) }}" class="bg-rouge p-1 px-4 rounded-md text-white">
                    + Créer nouvel exercice
                </a>
            </div>
    
            @if(session('success'))
                <div id="success-alert" class="bg-green-100/50 text-green-700 px-4 py-2 rounded-md mt-4 flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <button type="button" onclick="document.getElementById('success-alert').remove()">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif
    
            <div class="px-2">
                @forelse($questions as $index => $question)
                    <div class="py-3 border-b border-black/10 ">
                        <div class="flex gap-5 justify-between">
                            <div class="w-10 h-10 bg-black/5 rounded-sm flex justify-center items-center">
                                <span class="text-vert">{{ $index + 1 }}</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <h4 class="text-base font-semibold">{{ $question->instruction }}</h4>
                                    <div class="flex gap-3 items-center">
                                        <a href="{{ route('prof.examen.web.code.question.edit', [$examen->id, $codeWeb->id, $question->id]) }}" class="text-black/60">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <form action="{{ route('prof.examen.web.code.question.destroy', [$examen->id, $codeWeb->id, $question->id]) }}" method="POST" onsubmit="return confirm('Supprimer cet exercice ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="flex gap-3 mt-1">
                                    <div class="flex text-sm">
                                        Langage: <span class="border border-black/10 rounded-full px-3 text-rouge">{{ strtoupper($question->langage) }}</span>
                                    </div>
                                    <div class="flex text-sm">
                                        Point: <span class="border border-black/10 rounded-full px-3 text-vert">{{ $question->points }}</span>
                                    </div>
                                    {{-- <div class="flex text-sm">
                                        Rendus: <span class="border border-black/10 rounded-full px-3 text-black/50">{{ $question->reponses_count }}</span>
                                    </div> --}}
                                </div>
                                @if($question->code_starter)
                                    <pre class="bg-black/5 rounded-md p-3 text-sm mt-2 overflow-x-auto"><code>{{ $question->code_starter }}</code></pre>
                                @endif
                            </div>
                            
                        </div>
                    </div>
                @empty
                    <div class="p-10 my-2 rounded-md bg-black/5 text-center">
                        <i class="fa-solid fa-box-open text-2xl"></i>
                        <p>Aucun exercice de code n'a encore été créé.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection