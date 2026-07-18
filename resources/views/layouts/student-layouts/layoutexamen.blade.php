@extends('layouts.layoutheadd')
@section('contenue')
<div class="sticky top-0 bg-white z-40 bg-vert">
    <div class="container-2 flex justify-end items-center py-1 border-b border-black/10">
        {{-- <h2 class="text-lg font-semibold text-white">{{ $examen->titre }}</h2> --}}
        <div id="timer" class="border-2 border-white text-white px-5 py-1 rounded-md text-base font-bold">
            --:--
        </div>
    </div>
</div>
{{-- window.location.href = "{{ route('student.examen.terminer', $examen->id) }}"; --}}

<div class="mt-4 container-2">
    @yield('exercice-content')
</div>

<script>
let secondesRestantes = {{ $secondesRestantes }};

function updateTimer() {
    const minutes = Math.floor(secondesRestantes / 60);
    const secondes = secondesRestantes % 60;
    document.getElementById('timer').innerText =
        String(minutes).padStart(2, '0') + ':' + String(secondes).padStart(2, '0');

    if (secondesRestantes <= 0) {
        clearInterval(timerInterval);
        alert('Le temps est écoulé !');
        window.location.href = "";
        return;
    }
    
    secondesRestantes--;
}

updateTimer();
const timerInterval = setInterval(updateTimer, 1000);
</script>
@endsection