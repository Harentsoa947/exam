@extends('layouts.admin-layouts.layouthead')
@section('contenue-admin')
<div class="flex justify-between">
    <div class="w-[70%]">
        <h2 class="text-vert text-2xl font-semibold">Tous les étudiants</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aliquid, delectus modi dolore consequatur at?</p>
    </div>
    <div class="">
        <a href="{{ route('admin.etudiant.ajout') }}" 
            class="bg-rouge p-4 text-white rounded-md bg-rouge-hover mt-1">
            Ajout étudiant
        </a>
    </div>
</div>
<div class="w-full bg-black/2 mt-4 rounded py-1">
    <div class="flex justify-between gap-5 p-2 border-b border-black/10">
        <div class="w-15 h-15 rounded-md bg-black/5 overflow-hidden">
            <img src="" alt=""
            class="w-full h-full object-cover">
        </div>
        <div class="flex-1">
            <h3 class="font-semibold">Zinarilala safidiniaina</h3>
            <p class="text-sm">niaina@gmail.com</p>
            <div class="flex gap-3 text-sm">
                <div class="flex ">
                    Domaine  <span class="rounded-4xl border border-black/10  px-3 text-rouge">web</span>
                </div>
                <div class="flex">
                    Status <span class="rounded-4xl border border-black/10  px-3 text-vert">actif</span>
                </div>
                <div class="flex">
                    Domaine : web
                </div>
            </div>
        </div>
        <div class="">
            <div class="flex gap-3">
                <a class="text-vert" href="#">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
                <a class="text-red-600">
                    <i class="fa-regular fa-trash-can"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection