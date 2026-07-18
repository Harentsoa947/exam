@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
    <div class="py-3">
        <div class="flex gap-3 items-center my-2">
            <a href="" 
                class="w-7 h-7 rounded-sm bg-vert flex justify-center items-center text-white">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
            <span class="text-black/30">Retour</span>
        </div>
        @include('layouts.admin-layouts.examen.layout-exam-dev')
        <div class="">
            <div class="flex justify-between items-start my-3">
                <div class="w-[70%]"> 
                    <h3 class="font-semibold text-base pb-1">Relier par flèche</h3>
                    <p>Veniam delectus nulla iusto inventore ex magnam hic, ullam porro consequuntur magni, debitis exercitationem sapiente modi eum, vero asperiores maiores maxime non?</p>
                </div>
                <div class=" flex justify-end mt-4">
                    <a href="{{route('prof.examen.web.fleche.create', $examen->id)}}" class="p-1 px-3 inline-block rounded-md bg-rouge ">
                        Créer nouveau exercice
                    </a>
                </div>
            </div>
           
            @forelse($relierWebs as $index => $relierWeb)
                <div class="py-2 flex gap-7 justify-between border-b border-black/10 my-2">
                    <div class="w-20 h-20 rounded-md bg-black/3 flex justify-center items-center">
                        <span class="font-bold">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold">{{ $relierWeb->titre }}</h3>
                        <p>{{ $relierWeb->description }}</p>
                        <div class="flex gap-3">
                            <div class="flex text-sm">
                                Durée: <span class="border border-black/10 rounded-full px-3 inline-block text-rouge">Libre</span>
                            </div>
                            <div class="flex text-sm">
                                Question: <span class="border border-black/10 rounded-full px-3 inline-block text-vert">{{ $relierWeb->relier_web_questions_count }}</span> 
                                
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{route('prof.examen.web.fleche.question.index', [$examen->id, $relierWeb->id])}}" class="text-vert">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                        <a href="" class="text-black/60">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <form action="{{ route('prof.examen.web.fleche.destroy', [$examen->id, $relierWeb->id]) }}" method="POST" onsubmit="return confirm('Supprimer {{ $relierWeb->titre }} ? Cette action supprimera aussi toutes ses questions.')">
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
    </div>
@endsection