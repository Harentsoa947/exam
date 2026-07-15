@extends('layouts.prof-layouts.layouthead')

@section('contenue-prof')

<div class="space-y-8">

    {{-- En-tête --}}
    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-3xl font-bold text-vert">
                Tableau de bord
            </h1>

            <p class="text-gray-500 mt-2">
                Retrouvez tous les examens qui vous sont attribués et poursuivez la création de vos sujets.
            </p>
        </div>

    </div>

    {{-- Statistiques --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-green-600">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500">
                        Examens
                    </p>

                    <h2 class="text-3xl font-bold mt-2">
                        8
                    </h2>

                </div>

                <i class="fa-solid fa-book-open text-4xl text-vert"></i>

            </div>

        </div>

        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-yellow-500">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500">
                        Planifiés
                    </p>

                    <h2 class="text-3xl font-bold mt-2">
                        3
                    </h2>

                </div>

                <i class="fa-solid fa-calendar text-4xl text-yellow-500"></i>

            </div>

        </div>

        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-green-500">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500">
                        Prêts
                    </p>

                    <h2 class="text-3xl font-bold mt-2">
                        4
                    </h2>

                </div>

                <i class="fa-solid fa-circle-check text-4xl text-green-500"></i>

            </div>

        </div>

        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-red-500">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500">
                        Terminés
                    </p>

                    <h2 class="text-3xl font-bold mt-2">
                        1
                    </h2>

                </div>

                <i class="fa-solid fa-flag-checkered text-4xl text-red-500"></i>

            </div>

        </div>

    </div>


    {{-- Liste des examens --}}
    <div>

        <h2 class="text-2xl font-semibold mb-5">
            Mes examens
        </h2>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
            {{-- Examen en attente --}}
            <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">

                <div class="p-5 flex justify-between items-start">

                    <div class="flex items-center gap-4">

                        <div class="bg-vert text-white w-14 h-14 rounded-full flex items-center justify-center">

                            <div class="text-center">
                                <p class="text-xl font-bold">
                                    01
                                </p>

                                <p class="text-xs">
                                    /25
                                </p>
                            </div>

                        </div>


                        <div>

                            <h3 class="text-xl font-bold text-vert">
                                CALL Français
                            </h3>

                            <div class="text-gray-500 text-sm mt-2 space-y-1">

                                <p>
                                    <i class="fa-solid fa-calendar-days mr-2"></i>
                                    12 Mars 2030 à 08:30
                                </p>
                            
                                <p>
                                    <i class="fa-solid fa-clock mr-2"></i>
                                    Durée : 2 heures
                                </p>
                            
                            </div>

                        </div>

                    </div>


                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fa-solid fa-clock mr-1"></i>
                        En Attente
                    </span>


                </div>



                <div class="px-5 pb-5">


                    <div class="bg-gray-50 rounded-lg p-4 mb-5">

                        <div class="flex justify-between items-center">

                            <span class="text-gray-500">
                                Examen de l'année
                            </span>

                            <span class="font-bold">
                                1 / 25
                            </span>

                        </div>

                    </div>



                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Création du sujet
                            </span>

                            <span class="text-vert font-semibold">
                                12 / 25 questions
                            </span>

                        </div>


                        <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">

                            <div class="bg-vert h-full rounded-full"
                                style="width:48%">
                            </div>

                        </div>


                        <p class="text-gray-500 text-sm mt-2">
                            13 questions restantes
                        </p>

                    </div>



                    <div class="flex justify-between items-center mt-6">


                        <a href="{{ route('prof.info_examen') }}"
                        class="text-vert font-semibold hover:underline">

                            <i class="fa-solid fa-circle-info mr-1"></i>
                            Informations

                        </a>


                        <a href="{{ route('prof.choix_sujet') }}"
                        class="bg-rouge text-white px-5 py-2 rounded-lg hover:opacity-90">

                            <i class="fa-solid fa-pen mr-1"></i>
                            Construire

                        </a>


                    </div>


                </div>


            </div>




            {{-- Design pour des 3 états --}}

            {{-- Examen en attente --}}
            {{-- <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">

                <div class="p-5 flex justify-between items-start">

                    <div class="flex items-center gap-4">

                        <div class="bg-vert text-white w-14 h-14 rounded-full flex items-center justify-center">

                            <div class="text-center">
                                <p class="text-xl font-bold">
                                    01
                                </p>

                                <p class="text-xs">
                                    /25
                                </p>
                            </div>

                        </div>


                        <div>

                            <h3 class="text-xl font-bold text-vert">
                                CALL Français
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                12 Mars 2030
                            </p>

                        </div>

                    </div>


                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fa-solid fa-clock mr-1"></i>
                        En Attente
                    </span>


                </div>



                <div class="px-5 pb-5">


                    <div class="bg-gray-50 rounded-lg p-4 mb-5">

                        <div class="flex justify-between items-center">

                            <span class="text-gray-500">
                                Examen de l'année
                            </span>

                            <span class="font-bold">
                                1 / 25
                            </span>

                        </div>

                    </div>



                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Création du sujet
                            </span>

                            <span class="text-vert font-semibold">
                                12 / 25 questions
                            </span>

                        </div>


                        <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">

                            <div class="bg-vert h-full rounded-full"
                                style="width:48%">
                            </div>

                        </div>


                        <p class="text-gray-500 text-sm mt-2">
                            13 questions restantes
                        </p>

                    </div>



                    <div class="flex justify-between items-center mt-6">


                        <a href="{{ route('prof.info_examen') }}"
                        class="text-vert font-semibold hover:underline">

                            <i class="fa-solid fa-circle-info mr-1"></i>
                            Informations

                        </a>


                        <a href="{{ route('prof.choix_sujet') }}"
                        class="bg-rouge text-white px-5 py-2 rounded-lg hover:opacity-90">

                            <i class="fa-solid fa-pen mr-1"></i>
                            Construire

                        </a>


                    </div>


                </div>


            </div> --}}


            {{-- Examen prêt --}}
            {{-- <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">

                <div class="p-5 flex justify-between items-start">

                    <div class="flex items-center gap-4">

                        <div class="bg-vert text-white w-14 h-14 rounded-full flex items-center justify-center">

                            <div class="text-center">
                                <p class="text-xl font-bold">
                                    05
                                </p>

                                <p class="text-xs">
                                    /25
                                </p>
                            </div>

                        </div>


                        <div>

                            <h3 class="text-xl font-bold text-vert">
                                CALL Français
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                20 Avril 2030
                            </p>

                        </div>

                    </div>


                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                        <i class="fa-solid fa-circle-check mr-1"></i>
                        Prêt
                    </span>


                </div>



                <div class="px-5 pb-5">


                    <div class="bg-gray-50 rounded-lg p-4 mb-5">

                        <div class="flex justify-between items-center">

                            <span class="text-gray-500">
                                Examen de l'année
                            </span>

                            <span class="font-bold">
                                5 / 25
                            </span>

                        </div>

                    </div>



                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Création du sujet
                            </span>

                            <span class="text-green-600 font-semibold">
                                25 / 25 questions
                            </span>

                        </div>


                        <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">

                            <div class="bg-green-500 h-full rounded-full"
                                style="width:100%">
                            </div>

                        </div>


                        <p class="text-green-600 text-sm mt-2">
                            <i class="fa-solid fa-check mr-1"></i>
                            Sujet terminé et prêt pour l'examen.
                        </p>

                    </div>



                    <div class="flex justify-between items-center mt-6">


                        <a href="{{ route('prof.info_examen') }}"
                        class="text-vert font-semibold hover:underline">

                            <i class="fa-solid fa-circle-info mr-1"></i>
                            Informations

                        </a>


                        <a href="{{ route('prof.info_examen') }}"
                        class="bg-vert text-white px-5 py-2 rounded-lg hover:opacity-90">

                            <i class="fa-solid fa-eye mr-1"></i>
                            Voir le sujet

                        </a>


                    </div>


                </div>


            </div> --}}


            {{-- Examen terminé --}}
            {{-- <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">

                <div class="p-5 flex justify-between items-start">

                    <div class="flex items-center gap-4">

                        <div class="bg-gray-700 text-white w-14 h-14 rounded-full flex items-center justify-center">

                            <div class="text-center">
                                <p class="text-xl font-bold">
                                    10
                                </p>

                                <p class="text-xs">
                                    /25
                                </p>
                            </div>

                        </div>


                        <div>

                            <h3 class="text-xl font-bold text-vert">
                                CALL Français
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                10 Janvier 2030
                            </p>

                        </div>

                    </div>


                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">

                        <i class="fa-solid fa-flag-checkered mr-1"></i>
                        Terminé

                    </span>


                </div>



                <div class="px-5 pb-5">


                    <div class="bg-gray-50 rounded-lg p-4 mb-5">

                        <div class="flex justify-between items-center">

                            <span class="text-gray-500">
                                Examen de l'année
                            </span>

                            <span class="font-bold">
                                10 / 25
                            </span>

                        </div>

                    </div>



                    <div>

                        <div class="flex justify-between mb-2">

                            <span class="font-medium">
                                Création du sujet
                            </span>

                            <span class="text-red-600 font-semibold">
                                25 / 25 questions
                            </span>

                        </div>


                        <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">

                            <div class="bg-red-500 h-full rounded-full"
                                style="width:100%">
                            </div>

                        </div>


                        <p class="text-red-600 text-sm mt-2">

                            <i class="fa-solid fa-lock mr-1"></i>

                            Examen terminé, consultation uniquement.

                        </p>

                    </div>



                    <div class="flex justify-between items-center mt-6">


                        <a href="{{ route('prof.info_examen') }}"
                        class="text-vert font-semibold hover:underline">

                            <i class="fa-solid fa-circle-info mr-1"></i>
                            Informations

                        </a>


                        <a href="{{ route('prof.info_examen') }}"
                        class="bg-gray-700 text-white px-5 py-2 rounded-lg hover:opacity-90">

                            <i class="fa-solid fa-eye mr-1"></i>
                            Consulter

                        </a>


                    </div>


                </div>


            </div> --}}

        </div>

    </div>

</div>

@endsection