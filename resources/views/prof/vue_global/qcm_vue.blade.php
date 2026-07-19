@extends('layouts.prof-layouts.layouthead')
@section('contenue-prof')
<div class="mb-6">
    <a href="{{ route('prof.choix_sujet') }}" class="inline-block group">
        <i class="fa-solid fa-arrow-left shadow-md bg-white p-3 rounded-lg cursor-pointer transition-all group-hover:scale-105" style="color: red"></i>
    </a>
</div>
<div class="flex w-full min-h-screen">
    <div class="flex-1 w-0 overflow-hidden p-4 sm:p-6">
        <div class="mb-8">
            <h1 class="text-center font-bold text-2xl sm:text-4xl text-gray-800">Sujet QCM</h1>
        </div>
        @if(empty($session_qcm))
            <div class="p-6 bg-white rounded-xl shadow-sm border border-gray-100 text-center font-medium text-gray-500" style="border-radius: 1rem">
                Aucun sujet disponible pour le moment.
            </div>
        @else
            <div class="w-full overflow-x-auto bg-white rounded-xl shadow-md border border-gray-100 custom-scrollbar"style="border-radius: 1rem">
                <table class="w-full text-sm text-left text-gray-600 min-w-[800px] border-collapse" >
                    <thead class="text-xs uppercase bg-gray-50 text-gray-700 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold">Date</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Professeur</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Question</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Points</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Type de question</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Réponse attendue</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Choix possibles</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Supprimer</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($session_qcm as $qcm)
                        {{-- @dd($qcm) --}}
                            <tr class="bg-white hover:bg-gray-50/80 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $qcm['date'] ?? ''}}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $professeurs->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center justify-center px-3 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200 shadow-sm">
                                        <i class="fa-solid fa-star mr-1 text-amber-500 text-[10px]"></i>
                                        {{ $qcm['points']}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 max-w-sm">
                                    <div class="font-semibold text-gray-800 leading-relaxed break-words">
                                        {{ $qcm['text_question'] }}
                                    </div>
                                </td>
                                @if ($qcm['mult_bool'] == 'mult')
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium bg-blue-50 text-blue-700 rounded-md border border-blue-100">
                                            <span class="w-1.5 h-1.5 mr-1.5 bg-blue-500 rounded-full"></span>
                                            Choix multiple
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 text-xs font-bold bg-emerald-50 text-emerald-700 rounded-md border border-emerald-200">
                                            <?php
                                                $indice = $qcm['choix_multiple'];
                                                $ind = (int)$indice - 1;
                                                $i = $qcm['proposition'][$ind];
                                            ?>
                                            {{-- @dd($i) --}}
                                            {{ $i }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1.5 max-w-xs">
                                            @foreach ($qcm['proposition'] as $proposition)
                                                <span class="px-2 py-0.5 text-xs font-semibold bg-gray-100 text-gray-700 rounded-md border border-gray-200 shadow-sm">{{ $proposition }}</span>    
                                            @endforeach
                                        </div>
                                    </td>
                                @elseif($qcm['mult_bool'] == 'bool')
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium bg-green-50 text-purple-700 rounded-md border border-purple-100">
                                            <span class="w-1.5 h-1.5 mr-1.5 bg-purple-500 rounded-full"></span>
                                            Vraie ou Faux
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 text-xs font-bold bg-emerald-50 text-emerald-700 rounded-md border border-emerald-200">{{ $qcm['bonne_reponse_bool'] == 'faux' ? 'Faux' : 'Vraie'}}</span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-400 italic font-light">Aucun choix alternatif</td>
                                @endif
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <a href="" class="inline-flex items-center justify-center w-9 h-9 bg-rouge text-white rounded-xl hover:bg-rouge/90 shadow-sm transition-all duration-200 hover:scale-105">
                                        <i class="fa-solid fa-trash text-sm"></i>
                                    </a>
                                </td>
                                
                            </tr>
                        @endforeach
                        {{-- <tr class="bg-white hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">Jean</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">12-06-26</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center justify-center px-3 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200 shadow-sm">
                                    <i class="fa-solid fa-star mr-1 text-amber-500 text-[10px]"></i>
                                    2.5 pts
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium bg-blue-50 text-blue-700 rounded-md border border-blue-100">
                                    <span class="w-1.5 h-1.5 mr-1.5 bg-blue-500 rounded-full"></span>
                                    Choix multiple
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 text-xs font-bold bg-emerald-50 text-emerald-700 rounded-md border border-emerald-200">AA</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1.5 max-w-xs">
                                    <span class="px-2 py-0.5 text-xs font-semibold bg-gray-100 text-gray-700 rounded-md border border-gray-200 shadow-sm">AA</span>
                                    <span class="px-2 py-0.5 text-xs font-semibold bg-gray-100 text-gray-700 rounded-md border border-gray-200 shadow-sm">BB</span>
                                    <span class="px-2 py-0.5 text-xs font-semibold bg-gray-100 text-gray-700 rounded-md border border-gray-200 shadow-sm">CC</span>
                                    <span class="px-2 py-0.5 text-xs font-semibold bg-gray-100 text-gray-700 rounded-md border border-gray-200 shadow-sm">DD</span>
                                </div>
                            </td>
                            
                        </tr> --}}
                        
                        {{-- <tr class="bg-gray-50/30 hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">12-08-26</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium bg-green-50 text-purple-700 rounded-md border border-purple-100">
                                    <span class="w-1.5 h-1.5 mr-1.5 bg-purple-500 rounded-full"></span>
                                    Vraie ou Faux
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 text-xs font-bold bg-emerald-50 text-emerald-700 rounded-md border border-emerald-200">Vraie</span>
                            </td>
                            <td class="px-6 py-4 text-gray-400 italic font-light">Aucun choix alternatif</td>
                            
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        @endempty
        
    </div>
</div>


@endsection