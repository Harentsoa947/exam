@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
    <div class="py-3">
        @include('layouts.admin-layouts.examen.layout-exam-dev') 
        <div class="my-3">
            <div class="flex justify-between items-start">
                <div class="w-[70%]">
                    <h3 class="text-base font-semibold pb-1">Mots Croiser</h3>
                    <p class="">Corrupti dolorum earum ipsum unde totam officia at ducimus provident ut, in animi ad tempora veniam voluptatem ipsa quisquam quod corporis omnis.</p>
                </div>
                <a href="{{route('prof.examen.web.croiser.create', $examen->id)}}"  class="bg-rouge rounded-md p-1 text-white px-4">
                    Ajouter nouveau exercice
                </a>
            </div>
            <div class="">

            </div>
        </div>
        @forelse($motsCroisesWebs as $index => $motsCroisesWeb)
        <div class="py-2 flex gap-7 justify-between border-b border-black/10 my-2">
            <div class="w-20 h-20 rounded-md bg-black/3 flex justify-center items-center">
                <span class="font-bold">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
            </div>
            <div class="flex-1">
                <h3 class="text-1xl font-semibold">{{ $motsCroisesWeb->titre }}</h3>
                <p>{{ $motsCroisesWeb->description }}</p>
                <div class="flex gap-3">
                    <div class="flex text-sm">
                        Durée: <span class="border border-black/10 rounded-full px-3 inline-block text-rouge">Libre</span>
                    </div>
                    {{-- <div class="flex text-sm">
                        Question: <span class="border border-black/10 rounded-full px-3 inline-block text-vert">{{ $motsCroisesWeb->relier_web_questions_count }}</span> 
                        
                    </div> --}}
                </div>
            </div>
            <div class="flex gap-4">
                <a href="{{route('prof.examen.web.fleche.question.index', [$examen->id, $motsCroisesWeb->id])}}" class="text-vert">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
                <a href="" class="text-black/60">
                    <i class="fa-solid fa-pen"></i>
                </a>
                <form action="{{ route('prof.examen.web.croiser.destroy', [$examen->id, $motsCroisesWeb->id]) }}" method="POST" onsubmit="return confirm('Supprimer {{ $motsCroisesWeb->titre }} ? Cette action supprimera aussi toutes ses questions.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="p-10 rounded-md bg-black/5 text-center mt-4">
            <i class="fa-solid fa-box-open text-2xl"></i>
            <p>Aucun QCM n'a encore été créé pour cet examen.</p>
        </div>
    @endforelse
    </div>
@endsection