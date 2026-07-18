@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
<div class="py-3">
    <div class="flex items-center gap-3 my-3">
        <a href="{{route('prof.examen.web.fleche.question.index' ,[$examen->id, $relierWeb->id])}}" class="bg-vert rounded-md w-7 h-7 flex justify-center items-center text-white ">
            <i class="fa-solid fa-angle-left"></i>
        </a>
        Retour
    </div>
    <div class="w-[60%]">
        <h2 class="text-2xl font-semibold text-vert">Créer votre execrice relier par flèche</h2>
        <p class="py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem ad optio distinctio pariatur, neque libero?</p>
        @if(session('success'))
            <div id="success-alert" class="bg-green-100/50 text-green-700 px-4 py-2 rounded-md mt-4 flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button type="button" onclick="document.getElementById('success-alert').remove()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif
        <form method="POST" action="{{ route('prof.examen.web.fleche.question.store',[$examen->id,$relierWeb->id]) }}">
            @csrf
            <div class="w-full pb-4 border-b-2 border-black/20">
                <div class="mb-2">
                    <label class="inline-block w-full">Question</label>
                    <textarea name="enonce" class="form-control w-full  p-2 border border-black/10 rounded-md bg-black/3"></textarea>
                    @error('enonce')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class="w-[11cm] flex justify-between gap-5">
                    <div class="flex-1">
                        <label>Points</label>
                        <input type="number" name="points" value="1"
                        class="border border-black/10 rounded-md bg-black/3 p-2">
                        @error('points')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
        
                    <div class="flex-1">
                        <label>Ordre Question</label>
                        <input type="number" name="ordre" value="1" 
                        class="border border-black/10 rounded-md bg-black/3 p-2">
                        @error('ordre')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-between py-2">
                <h4 class="font-semibold text-base">Colone gauche</h4>
                <h4 class="font-semibold text-base">Colone droite</h4>
            </div>
            <div id="tablePaires" >
                <div class="paire flex  justify-between gap-10">
                    <div class="flex-1 flex gap-2">
                        <input class="form-control border w-full border-black/10 rounded-md p-2 bg-black/3" 
                            name="element_gauche[]">
                        <input class="form-control border border-black/10 rounded-md p-2 w-[1cm] text-center bg-black/3" 
                            type="number" name="order_left[] " value="1">
                    </div>
                    <div class="flex-1 flex gap-2">
                        <input class="form-control border border-black/10 rounded-md p-2 w-[1cm] text-center bg-black/3" 
                            type="number" name="order_right[]" value="1">   
                        <input class="form-control border w-full border-black/10 rounded-md p-2 bg-black/3" 
                            name="element_droit[]">
                    </div>
                </div>
                @error('element_gauche[]')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
                @error('element_droit[]')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="mt-5">
                <button type="button" id="addRow" class="bg-black/50 rounded-md p-2 px-5 text-white">
                    <i class="fa-solid fa-plus"></i> Ajouter une paire
                </button>
    
                <button class="btn btn-success bg-rouge rounded-md p-2 px-5 text-white">
                    Enregistrer
                </button>
            </div>

        </form>
    </div>
</div>


<script>
    const table = document.getElementById('tablePaires');

    document.getElementById('addRow').addEventListener('click', function () {

        table.insertAdjacentHTML('beforeend', `
            <div class="paire flex justify-between gap-10 mt-3 relative">

                <div class="flex-1 flex gap-2">
                    <input class=" border w-full border-black/10 rounded-md p-2 bg-black/3"
                        name="element_gauche[]">

                    <input class="border border-black/10 rounded-md p-2 w-[1cm] text-center bg-black/3"
                        type="number"
                        name="order_left[]"
                        value="1">
                </div>

                <div class="flex-1 flex gap-2">

                    <input class="border border border-black/10 rounded-md p-2 w-[1cm] text-center bg-black/3"
                        type="number"
                        name="order_right[]"
                        value="1">

                    <input class=" border w-full border-black/10 rounded-md p-2 bg-black/3"
                        name="element_droit[]">
                </div>
                <button type="button"
                    class="remove absolute top-0 -right-10 bg-red-500/70 text-white px-2 rounded">
                    X
                </button>

            </div>
        `);

    });

    document.addEventListener('click', function(e){

        if(e.target.classList.contains('remove')){
            e.target.closest('.paire').remove();
        }

    });
</script>
@endsection