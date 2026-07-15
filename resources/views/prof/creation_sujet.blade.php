@extends('layouts.prof-layouts.layouthead')
@section('contenue-prof')
<div class="float-left">
    <a href="{{ route('prof') }}">
        <i class="fa-solid fa-arrow-left shadow bg-white p-3 rounded cursor-pointer mb-4" style="color: red"></i>
    </a>
</div>

{{-- <h1 class="text-vert text-2xl font-semibold mb-4">Choix partie sujet</h1> --}}
<div class="flex justify-end me-7">
    <button
        class="bg-rouge text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 duration-200">
        <i class="fa-solid fa-plus me-3"></i>
        Ajouter
    </button>

</div>
<div class="mx-auto mt-5 bg-gray-100 rounded-xl shadow-lg overflow-hidden">
    <div class="flex items-center justify-between my-3 p-4 uppercase ">
        <h1 class="font-bold text-vert">Call Français (1/25)</h1>
        <p>12 Mars 2030</p>
    </div>

    <div class="ps-7 ">
        <a href="" class="bg-rouge text-white rounded-lg px-4 py-2">Importer pdf</a>
    </div>
    
    
    <table class="mx-auto rounded-2xl bg-white">
        <tbody class="text-center">
            <tr class="">
                <td class="px-6 py-4 font-bold text-gray-700">Durée de l'examen</td>
                <td class="px-6 py-4 text-right">
                    <select name="heure" class="border rounded px-2 py-1">
                        @for ($i = 0; $i < 6; $i++)
                            @if ($i == 1)
                                <option value="{{ $i }}" selected>{{ $i }} h</option>        
                            @else
                                    <option value="{{ $i }}">{{ $i }} h</option>    
                            @endif
                            
                        @endfor
                    </select>
                    
                    <select name="minute" class="border rounded px-2 py-1">
                        @for ($i = 0; $i < 60; $i++)
                            <option value="{{ $i }}">{{ $i }} min</option>    
                        @endfor
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="w-full">
        <tbody>
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-bold text-gray-700">Type de sujet</td>
                <td class="px-6 py-4 text-right font-bold text-gray-700">Nombre de question</td>
                <td class="px-6 py-4 text-right font-bold text-gray-700">Nombre de points</td>
                <td class="px-6 py-4 text-right font-bold text-gray-700">Action</td>
            </tr>
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">QCM<span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">20</td>
                <td class="px-6 py-4 text-right">12</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('prof.choix_sujet.qcm') }}" class="px-4 py-2  bg-vert text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fa-solid fa-pen"></i> Construire
                    </a>
                    <a href="" class="px-4 py-2 bg-red-500 rounded-lg ms-4 text-white">
                        <i class="fa-solid fa-trash"></i> Enlever
                    </a>
                </td>
            </tr>

            {{-- <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Rédaction <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">
                    <button class="px-4 py-2 bg-rouge text-white rounded-lg hover:bg-blue-700 transition">
                        Fini
                    </button>
                </td>
                <td class="px-6 py-4 text-right">20 Questions</td>
            </tr> --}}

            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Relier par flèche <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">1</td>
                <td class="px-6 py-4 text-right">19</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('prof.choix_sujet.relier_fleche') }}" class="px-4 py-2 bg-vert text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fa-solid fa-pen"></i> Construire
                    </a>
                    <a href="" class="px-4 py-2 bg-red-500 rounded-lg ms-4 text-white">
                        <i class="fa-solid fa-trash"></i> Enlever
                    </a>
                </td>
                
            </tr>

            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Mots croisés <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">Pas encore définie</td>
                <td class="px-6 py-4 text-right">1</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('prof.choix_sujet.mots_croises') }}" class="px-4 py-2 bg-vert text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fa-solid fa-pen"></i> Construire
                    </a>
                    <a href="" class="px-4 py-2 bg-red-500 rounded-lg ms-4 text-white">
                        <i class="fa-solid fa-trash"></i> Enlever
                    </a>
                </td>
            </tr>

            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Compréhension du texte <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">19</td>
                <td class="px-6 py-4 text-right">19</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('prof.choix_sujet.comprehension') }}" class="px-4 py-2  bg-vert text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fa-solid fa-pen"></i> Construire
                    </a>
                    <a href="" class="px-4 py-2 bg-red-500 rounded-lg ms-4 text-white">
                        <i class="fa-solid fa-trash"></i> Enlever
                    </a>
                </td>
            </tr>

            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Jeu de pendu <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">19</td>
                <td class="px-6 py-4 text-right">19</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('prof.choix_sujet.pendule') }}" class="px-4 py-2  bg-vert text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fa-solid fa-pen"></i> Construire
                    </a>
                    <a href="" class="px-4 py-2 bg-red-500 rounded-lg ms-4 text-white">
                        <i class="fa-solid fa-trash"></i> Enlever
                    </a>
                </td>
            </tr>

            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Rédaction <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">19</td>
                <td class="px-6 py-4 text-right">19</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('prof.choix_sujet.redaction') }}" class="px-4 py-2  bg-vert text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fa-solid fa-pen"></i> Construire
                    </a>
                    <a href="" class="px-4 py-2 bg-red-500 rounded-lg ms-4 text-white">
                        <i class="fa-solid fa-trash"></i> Enlever
                    </a>
                </td>
            </tr>

            
        </tbody>
    </table>
    <div class="flex items-center justify-center my-3">
        <button class="px-4 py-2 bg-rouge text-white rounded-lg hover:bg-blue-700 transition">
            <i class="fa-solid fa-paper-plane me-3"></i>
            Envoyer le sujet
        </button>
    </div>
    
</div>
@endsection