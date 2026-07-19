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
            <h1 class="text-center font-bold text-2xl sm:text-4xl text-gray-800">Exercice : Relier par flèches</h1>
        </div>

        <!-- Tableau pour l'exercice de relier par flèches (Statique) -->
        <div class="w-full overflow-x-auto bg-white rounded-xl shadow-md border border-gray-100 custom-scrollbar" style="border-radius: 1rem">
            <table class="w-full text-sm text-left text-gray-600 min-w-[900px] border-collapse">
                <thead class="text-xs uppercase bg-gray-50 text-gray-700 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold">Professeur</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Consigne / Question</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Points</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Éléments (Gauche)</th>
                        <th scope="col" class="px-6 py-4 text-center font-semibold">Liaison</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Correspondances (Droite)</th>
                        <th scope="col" class="px-6 py-4 text-center font-semibold">Supprimer</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-100">
                    <!-- Ligne d'exemple 1 -->
                    <tr class="bg-white hover:bg-gray-50/80 transition-colors">
                        <!-- 1. Professeur -->
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Jean Dupont
                        </td>

                        <!-- 2. Consigne -->
                        <td class="px-6 py-4 max-w-xs">
                            <div class="font-semibold text-gray-800 leading-relaxed break-words">
                                Associez chaque capitale européenne à son pays respectif.
                            </div>
                            <span class="inline-block mt-1 text-[11px] font-medium bg-purple-50 text-purple-700 px-2 py-0.5 rounded border border-purple-100 uppercase tracking-wider">
                                Relier par flèches
                            </span>
                        </td>

                        <!-- 3. Points -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center justify-center px-3 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200 shadow-sm">
                                <i class="fa-solid fa-star mr-1 text-amber-500 text-[10px]"></i>
                                3.0 pts
                            </span>
                        </td>

                        <!-- 4. Éléments de gauche -->
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-2 max-w-xs">
                                <span class="px-3 py-1.5 text-xs font-medium bg-gray-50 text-gray-700 rounded-lg border border-gray-200 shadow-sm block break-words">
                                    <span class="inline-block w-4 h-4 text-center bg-gray-200 text-gray-600 rounded-full text-[10px] mr-1 font-bold">1</span>
                                    Paris
                                </span>
                                <span class="px-3 py-1.5 text-xs font-medium bg-gray-50 text-gray-700 rounded-lg border border-gray-200 shadow-sm block break-words">
                                    <span class="inline-block w-4 h-4 text-center bg-gray-200 text-gray-600 rounded-full text-[10px] mr-1 font-bold">2</span>
                                    Berlin
                                </span>
                                <span class="px-3 py-1.5 text-xs font-medium bg-gray-50 text-gray-700 rounded-lg border border-gray-200 shadow-sm block break-words">
                                    <span class="inline-block w-4 h-4 text-center bg-gray-200 text-gray-600 rounded-full text-[10px] mr-1 font-bold">3</span>
                                    Madrid
                                </span>
                            </div>
                        </td>

                        <!-- 5. Flèches indicatrices -->
                        <td class="px-6 py-4 text-center text-gray-300">
                            <div class="flex flex-col gap-2.5 justify-center items-center">
                                <div class="h-8 flex items-center justify-center">
                                    <i class="fa-solid fa-right-long text-gray-400 text-xs"></i>
                                </div>
                                <div class="h-8 flex items-center justify-center">
                                    <i class="fa-solid fa-right-long text-gray-400 text-xs"></i>
                                </div>
                                <div class="h-8 flex items-center justify-center">
                                    <i class="fa-solid fa-right-long text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </td>

                        <!-- 6. Éléments de droite -->
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-2 max-w-xs">
                                <span class="px-3 py-1.5 text-xs font-medium bg-emerald-50 text-emerald-800 rounded-lg border border-emerald-200 shadow-sm block break-words">
                                    <span class="inline-block w-4 h-4 text-center bg-emerald-200 text-emerald-700 rounded-full text-[10px] mr-1 font-bold">1</span>
                                    France
                                </span>
                                <span class="px-3 py-1.5 text-xs font-medium bg-emerald-50 text-emerald-800 rounded-lg border border-emerald-200 shadow-sm block break-words">
                                    <span class="inline-block w-4 h-4 text-center bg-emerald-200 text-emerald-700 rounded-full text-[10px] mr-1 font-bold">2</span>
                                    Allemagne
                                </span>
                                <span class="px-3 py-1.5 text-xs font-medium bg-emerald-50 text-emerald-800 rounded-lg border border-emerald-200 shadow-sm block break-words">
                                    <span class="inline-block w-4 h-4 text-center bg-emerald-200 text-emerald-700 rounded-full text-[10px] mr-1 font-bold">3</span>
                                    Espagne
                                </span>
                            </div>
                        </td>
                        
                        <!-- 7. Action Supprimer -->
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <a href="#" class="inline-flex items-center justify-center w-9 h-9 bg-rouge text-white rounded-xl hover:bg-rouge/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-trash text-sm"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- Ligne d'exemple 2 -->
                    <tr class="bg-white hover:bg-gray-50/80 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Marie Claire
                        </td>
                        <td class="px-6 py-4 max-w-xs">
                            <div class="font-semibold text-gray-800 leading-relaxed break-words">
                                Relier les animaux à leur cri.
                            </div>
                            <span class="inline-block mt-1 text-[11px] font-medium bg-purple-50 text-purple-700 px-2 py-0.5 rounded border border-purple-100 uppercase tracking-wider">
                                Relier par flèches
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center justify-center px-3 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200 shadow-sm">
                                <i class="fa-solid fa-star mr-1 text-amber-500 text-[10px]"></i>
                                2.0 pts
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-2 max-w-xs">
                                <span class="px-3 py-1.5 text-xs font-medium bg-gray-50 text-gray-700 rounded-lg border border-gray-200 shadow-sm block break-words">
                                    <span class="inline-block w-4 h-4 text-center bg-gray-200 text-gray-600 rounded-full text-[10px] mr-1 font-bold">1</span>
                                    Le Chien
                                </span>
                                <span class="px-3 py-1.5 text-xs font-medium bg-gray-50 text-gray-700 rounded-lg border border-gray-200 shadow-sm block break-words">
                                    <span class="inline-block w-4 h-4 text-center bg-gray-200 text-gray-600 rounded-full text-[10px] mr-1 font-bold">2</span>
                                    Le Chat
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center text-gray-300">
                            <div class="flex flex-col gap-2.5 justify-center items-center">
                                <div class="h-8 flex items-center justify-center">
                                    <i class="fa-solid fa-right-long text-gray-400 text-xs"></i>
                                </div>
                                <div class="h-8 flex items-center justify-center">
                                    <i class="fa-solid fa-right-long text-gray-400 text-xs"></i>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-2 max-w-xs">
                                <span class="px-3 py-1.5 text-xs font-medium bg-emerald-50 text-emerald-800 rounded-lg border border-emerald-200 shadow-sm block break-words">
                                    <span class="inline-block w-4 h-4 text-center bg-emerald-200 text-emerald-700 rounded-full text-[10px] mr-1 font-bold">1</span>
                                    Il aboie
                                </span>
                                <span class="px-3 py-1.5 text-xs font-medium bg-emerald-50 text-emerald-800 rounded-lg border border-emerald-200 shadow-sm block break-words">
                                    <span class="inline-block w-4 h-4 text-center bg-emerald-200 text-emerald-700 rounded-full text-[10px] mr-1 font-bold">2</span>
                                    Il miaule
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <a href="#" class="inline-flex items-center justify-center w-9 h-9 bg-rouge text-white rounded-xl hover:bg-rouge/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-trash text-sm"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection