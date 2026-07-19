@extends('layouts.prof-layouts.layouthead')
@section('contenue-prof')
<div class="float-left">
    <a href="{{ route('prof') }}">
        <i class="fa-solid fa-arrow-left shadow bg-white p-3 rounded cursor-pointer mb-4" style="color: red"></i>
    </a>
</div>

<div class="flex justify-end me-7">
    <button class="bg-rouge text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 duration-200 font-medium">
        <i class="fa-solid fa-plus me-3"></i>
        Ajouter
    </button>
</div>

<div class="mx-auto mt-5 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden w-full">
    
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-6 bg-gray-50 border-b border-gray-100 gap-4">
        <div>
            <h1 class="font-bold text-2xl text-vert uppercase tracking-wide">Call Français (1/25)</h1>
            <p class="text-sm text-gray-400 mt-1">Configuration globale de l'épreuve</p>
        </div>
        <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-xl shadow-sm border border-gray-100 text-gray-600 font-semibold text-sm">
            <i class="fa-regular fa-calendar text-rouge"></i>
            <span>12 Mars 2030</span>
        </div>
    </div>

    <div class="p-6 border-b border-gray-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white">
        <a href="" class="inline-flex items-center gap-2 bg-rouge/10 text-rouge hover:bg-rouge hover:text-white rounded-xl px-5 py-2.5 font-semibold text-sm transition-all duration-200 border border-rouge/20 shadow-sm">
            <i class="fa-solid fa-file-pdf"></i>
            Importer PDF
        </a>
        
        <div class="inline-flex items-center bg-gray-50 border border-gray-200 rounded-xl shadow-sm overflow-hidden focus-within:border-vert transition-colors">
            <span class="px-4 py-3 text-sm font-bold text-gray-500 bg-gray-100/80 border-r border-gray-200 whitespace-nowrap">
                Durée de l'examen
            </span>
            <input type="number" value="120" min="1" class="w-20 px-3 py-2 text-center font-bold text-gray-800 bg-transparent focus:outline-none">
            <span class="px-4 py-3 bg-transparent text-gray-500 text-xs font-semibold uppercase tracking-wider">
                minutes
            </span>
        </div>
    </div>

    <div class="w-full overflow-x-auto custom-scrollbar">
        <table class="w-full text-sm text-left text-gray-600 min-w-[900px] border-collapse">
            <thead>
                <tr class="bg-gray-50/70 text-xs uppercase text-gray-500 font-bold border-b border-gray-100">
                    <th scope="col" class="px-6 py-4">Type de sujet</th>
                    <th scope="col" class="px-6 py-4 text-center">Nombre de questions</th>
                    <th scope="col" class="px-6 py-4 text-center">Nombre de points</th>
                    <th scope="col" class="px-6 py-4 text-right pr-12">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                <tr class="hover:bg-gray-50/60 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-800">
                        QCM<span class="text-rouge ml-1 font-bold">*</span>
                    </td>
                    <td class="px-6 py-4 text-center font-bold text-gray-700">
                        <span class="inline-block px-3 py-1 bg-gray-100 text-gray-800 rounded-lg text-xs">20</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200">
                            <i class="fa-solid fa-star mr-1 text-amber-500 text-[10px]"></i>
                            12 pts
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right pr-12">
                        <div class="flex flex-wrap gap-2 justify-end items-center">
                            <a href="{{ route('prof.choix_sujet.qcm') }}" class="w-9 h-9 flex items-center justify-center bg-vert text-white rounded-xl hover:bg-vert/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-pen text-sm"></i>  
                            </a>
                            <a href="{{ route('prof.choix_sujet.qcm.vue') }}" class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-eye text-sm"></i>
                            </a>
                            <a href="" class="w-9 h-9 flex items-center justify-center bg-rouge text-white rounded-xl hover:bg-rouge/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-trash text-sm"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50/60 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-800">
                        Relier par flèche<span class="text-rouge ml-1 font-bold">*</span>
                    </td>
                    <td class="px-6 py-4 text-center font-bold text-gray-700">
                        <span class="inline-block px-3 py-1 bg-gray-100 text-gray-800 rounded-lg text-xs">1</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200">
                            <i class="fa-solid fa-star mr-1 text-amber-500 text-[10px]"></i>
                            19 pts
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right pr-12">
                        <div class="flex flex-wrap gap-2 justify-end items-center">
                            <a href="{{ route('prof.choix_sujet.relier_fleche') }}" class="w-9 h-9 flex items-center justify-center bg-vert text-white rounded-xl hover:bg-vert/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-pen text-sm"></i>
                            </a>
                            <a href="{{ route('prof.choix_sujet.relier_fleche.vue') }}" class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-eye text-sm"></i>
                            </a>
                            <a href="" class="w-9 h-9 flex items-center justify-center bg-rouge text-white rounded-xl hover:bg-rouge/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-trash text-sm"></i>  
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50/60 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-800">
                        Mots croisés<span class="text-rouge ml-1 font-bold">*</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-block px-2.5 py-1 bg-orange-50 text-orange-700 border border-orange-100 rounded-lg text-xs font-medium italic">Pas encore définie</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200">
                            <i class="fa-solid fa-star mr-1 text-amber-500 text-[10px]"></i>
                            1 pt
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right pr-12">
                        <div class="flex flex-wrap gap-2 justify-end items-center">
                            <a href="{{ route('prof.choix_sujet.mots_croises') }}" class="w-9 h-9 flex items-center justify-center bg-vert text-white rounded-xl hover:bg-vert/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-pen text-sm"></i>
                            </a>
                            <a href="" class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-eye text-sm"></i>
                            </a>
                            <a href="" class="w-9 h-9 flex items-center justify-center bg-rouge text-white rounded-xl hover:bg-rouge/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-trash text-sm"></i>  
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50/60 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-800">
                        Compréhension du texte<span class="text-rouge ml-1 font-bold">*</span>
                    </td>
                    <td class="px-6 py-4 text-center font-bold text-gray-700">
                        <span class="inline-block px-3 py-1 bg-gray-100 text-gray-800 rounded-lg text-xs">19</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200">
                            <i class="fa-solid fa-star mr-1 text-amber-500 text-[10px]"></i>
                            19 pts
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right pr-12">
                        <div class="flex flex-wrap gap-2 justify-end items-center">
                            <a href="{{ route('prof.choix_sujet.comprehension') }}" class="w-9 h-9 flex items-center justify-center bg-vert text-white rounded-xl hover:bg-vert/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-pen text-sm"></i>
                            </a>
                            <a href="" class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-eye text-sm"></i>
                            </a>
                            <a href="" class="w-9 h-9 flex items-center justify-center bg-rouge text-white rounded-xl hover:bg-rouge/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-trash text-sm"></i>  
                            </a>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50/60 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-800">
                        Jeu de pendu<span class="text-rouge ml-1 font-bold">*</span>
                    </td>
                    <td class="px-6 py-4 text-center font-bold text-gray-700">
                        <span class="inline-block px-3 py-1 bg-gray-100 text-gray-800 rounded-lg text-xs">19</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200">
                            <i class="fa-solid fa-star mr-1 text-amber-500 text-[10px]"></i>
                            19 pts
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right pr-12">
                        <div class="flex flex-wrap gap-2 justify-end items-center">
                            <a href="{{ route('prof.choix_sujet.pendule') }}" class="w-9 h-9 flex items-center justify-center bg-vert text-white rounded-xl hover:bg-vert/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-pen text-sm"></i>
                            </a>
                            <a href="" class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-eye text-sm"></i>
                            </a>
                            <a href="" class="w-9 h-9 flex items-center justify-center bg-rouge text-white rounded-xl hover:bg-rouge/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-trash text-sm"></i>  
                            </a>
                        </div>  
                    </td>
                </tr>

                <tr class="hover:bg-gray-50/60 transition-colors">
                    <td class="px-6 py-4 font-semibold text-gray-800">
                        Rédaction<span class="text-rouge ml-1 font-bold">*</span>
                    </td>
                    <td class="px-6 py-4 text-center font-bold text-gray-700">
                        <span class="inline-block px-3 py-1 bg-gray-100 text-gray-800 rounded-lg text-xs">19</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold bg-amber-50 text-amber-700 rounded-full border border-amber-200">
                            <i class="fa-solid fa-star mr-1 text-amber-500 text-[10px]"></i>
                            19 pts
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right pr-12">
                        <div class="flex flex-wrap gap-2 justify-end items-center">
                            <a href="{{ route('prof.choix_sujet.redaction') }}" class="w-9 h-9 flex items-center justify-center bg-vert text-white rounded-xl hover:bg-vert/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-pen text-sm"></i>
                            </a>
                            <a href="" class="w-9 h-9 flex items-center justify-center bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-eye text-sm"></i>
                            </a>
                            <a href="" class="w-9 h-9 flex items-center justify-center bg-rouge text-white rounded-xl hover:bg-rouge/90 shadow-sm transition-all duration-200 hover:scale-105">
                                <i class="fa-solid fa-trash text-sm"></i>  
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="flex items-center justify-center p-6 bg-gray-50 border-t border-gray-100">
        <button class="px-8 py-3 bg-vert text-white font-semibold rounded-xl shadow-md hover:bg-vert/95 transition-all duration-200 hover:scale-105 flex items-center gap-2">
            <i class="fa-solid fa-paper-plane text-xs"></i>
            Envoyer le sujet
        </button>
    </div>
</div>
@endsection