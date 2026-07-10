@extends('layouts.prof-layouts.layouthead')
@section('contenue-prof')
<div class="float-left">
    <a href="{{ route('prof') }}">
        <i class="fa-solid fa-arrow-left shadow bg-white p-3 rounded cursor-pointer mb-4" style="color: red"></i>
    </a>
</div>

{{-- <h1 class="text-vert text-2xl font-semibold mb-4">Choix partie sujet</h1> --}}
<div class="max-w-2xl mx-auto bg-gray-100 rounded-xl shadow-lg overflow-hidden">
    <div class="flex items-center justify-between my-3 p-4 uppercase ">
        <h1 class="font-bold text-vert">Call Français (1/25)</h1>
        <p>12 Mars 2030</p>
    </div>

    <div class="ps-7 ">
        <a href="" class="bg-rouge text-white rounded-lg px-4 py-2">Importer pdf</a>
    </div>
    
    
    <table class="w-full">
        <tbody>
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Durée de l'examen</td>
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
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">QCM <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('prof.choix_sujet.qcm') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Construire
                    </a>
                </td>
            </tr>

            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Rédaction <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">
                    <button class="px-4 py-2 bg-rouge text-white rounded-lg hover:bg-blue-700 transition">
                        Fini
                    </button>
                    {{-- <a href="{{ route('prof.choix_sujet.qcm') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Construire
                    </a> --}}
                </td>
                <td class="px-6 py-4 text-right">20 Questions</td>
            </tr>

            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Relier par flèche <span style="color: red" class="font-bold">*</span></td>
                
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('prof.choix_sujet.relier_fleche') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Construire
                    </a>
                </td>
                <td class="px-6 py-4 text-right">1 Question</td>
            </tr>

            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Mots croisés <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('prof.chois_sujet.mots_croises') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Construire
                    </a>
                </td>
            </tr>

            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Compréhension du texte <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Construire
                    </button>
                </td>
            </tr>

            <tr class="border-b hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Jeu de pendule <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Construire
                    </button>
                </td>
            </tr>

            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-700">Rédaction <span style="color: red" class="font-bold">*</span></td>
                <td class="px-6 py-4 text-right">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Construire
                    </button>
                </td>
            </tr>

            
        </tbody>
        
    </table>
    <div class="flex items-center justify-center my-3">
        <button class="px-4 py-2 bg-rouge text-white rounded-lg hover:bg-blue-700 transition">
            Envoyer le sujet
        </button>
    </div>
    
</div>
@endsection