@extends('layouts.student-layouts.layoutexamen')
@section('exercice-content')
<div class="">
    {{-- <h3 class="text-xl font-semibold mb-4">{{ $qcmWeb->titre }}</h3>

    @foreach($qcmWeb->qcmWebQuestions as $index => $question)
        <div class="border rounded-md p-4 mb-4">
            <p class="font-semibold mb-2">{{ $index + 1 }}. {{ $question->enonce }}</p>
            @foreach($question->qcmWebChoices as $choice)
                <label class="flex items-center gap-2 mb-1">
                    <input type="radio" name="reponse[{{ $question->id }}]" value="{{ $choice->id }}">
                    {{ $choice->texte }}
                </label>
            @endforeach
        </div>
    @endforeach --}}
    <div class="">
        <div class="my-10">
            <div class="flex justify-between">
                <span>Question</span>
                <span>1/10</span>
            </div>
            <div class="rounded-full h-3 overflow-hidden bg-black/10">
               <div class="w-[80%] h-full bg-sgress"></div>
            </div>
        </div>
         <div class="">
            <div class="flex justify-between gap-5">
                <div class="flex-1 relative pb-5">
                    <h3 class="mb-7 text-base font-semibold">Inona ny tena vahaolana tsara hanaovana ity examen ity?</h3>
                    <span class="absolute bottom-1 left-0">
                        Chronomètre: <span class="text-rouge font-semibold">03s</span>
                    </span>
                </div>
                <div class="flex-1">
                    <img src="/images/bureau.png" alt=""
                    class="w-full border border-black/10 rounded-md overflow-hidden mb-2">
                </div>
            </div>
            <div class="border-t-2 rounded-md border-black/10 my-2 py-3 shadow">
                <form action="" class="p-4">
                    <label for=""
                    class="flex gap-3 py-2 border-b border-black/10">
                        <input type="checkbox" name="" id="">
                        <p>Ny mvavaka ihany no vahaolana tsara indrindra</p>
                    </label>
                    <label for=""
                    class="flex gap-3 py-2 border-b border-black/10">
                        <input type="checkbox" name="" id="">
                        <p>Ny mvavaka ihany no vahaolana tsara indrindra</p>
                    </label>
                    <label for=""
                    class="flex gap-3 py-2 border-b border-black/10">
                        <input type="checkbox" name="" id="">
                        <p>Ny mvavaka ihany no vahaolana tsara indrindra</p>
                    </label>
                    <label for=""
                    class="flex gap-3 py-2 border-b border-black/10">
                        <input type="checkbox" name="" id="">
                        <p>Ny mvavaka ihany no vahaolana tsara indrindra</p>
                    </label>
                    <div class="flex justify-end mt-7">
                        <button class="p-2 px-5 rounded-md bg-rouge text-white">Valider</button>
                    </div>
                </form>
            </div>
         </div>
    </div>
</div>

<style>
    .bg-sgress{
        background: linear-gradient(rgb(80, 80, 80) , rgb(160, 160, 160), rgb(104, 104, 104));
    }
</style>
@endsection