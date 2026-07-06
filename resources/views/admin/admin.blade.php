@extends('admin.layoutsAdmin.master')
@section('titre', 'Dashboard')
@section('titre_en_tete', 'Accueil Dashboard')
@section('contenue')
    <!-- cartes de statistiques -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card p-3 border-0 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-1 fw-bold" style="color: green;">Examen en cours</div>
                    <div class="text-end d-flex align-items-center pb-1">
                        <select name="" id="" class="" style="height: 40px; border: black; cursor: pointer;">
                            <option value="" selected >Tous</option>
                            <option value="">Call Français</option>
                            <option value="">Bureautique</option>
                        </select>
                    </div>
                </div>
                <div class="">
                    <div class="h3 mb-0 mt-3 text-center">
                        {{-- si mode sombre text-white --}}
                        <a href="" class="white_text">
                            <!-- Pas d'examen -->
                            12
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card p-3 border-0 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-1 fw-bold" style="color: rgb(22, 0, 190);">Examen planifié</div>
                    <div class="text-end d-flex align-items-center pb-1">
                        <select name="" id="" class="" style="height: 40px; border: black; cursor: pointer;">
                            <option value="" selected >Tous</option>
                            <option value="">Call Français</option>
                            <option value="">Bureautique</option>
                        </select>
                    </div>
                </div>
                <div class="">
                    <div class="h3 mb-0 mt-3 text-center">
                        {{-- si mode sombre text-white --}}
                        <a href="" class="white_text">
                            <!-- Pas d'examen -->
                            42
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="ms-auto" style="width: 500px; ">
            <div class="card p-3 border-0 shadow-sm">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="fw-bold">Examen crée : <strong style="color: red;">120</strong></h3>
                    </div>
                    
                    <div>
                        <select name="" id="" class="form-control">
                            <option value="">Tous</option>
                            <option value="">Janvier</option>
                            <option value="">Février</option>
                            <option value="">Mars</option>
                            <option value="">Avril</option>
                            <option value="" >Mai</option>
                            <option value="">Juin</option>
                            <option value="" selected>Juillet</option>
                            <option value="">Août</option>
                            <option value="">Septembre</option>
                            <option value="">Novembre</option>
                            <option value="">Décembre</option>
                            <option value="">Janvier</option>
                        </select>
                    </div>
                    <div>
                        <select name="" id="" class="form-control">
                            <option value="">Tous</option>
                            <option value="">2024</option>
                            <option value="">2025</option>
                            <option value="" selected>2026</option>
                            <option value="">2027</option>
                            <option value="">2028</option>
                        </select>
                    </div>
                </div>
                
                <table class="table principal_color mt-3">
                    <tbody>
                        <tr>
                            <td class="principal_color"><a href="" class="principal_color">Call Français</a></td>
                            <td class="principal_color">30</td>
                        </tr>
                        <tr>
                            <td class="principal_color"><a href="" class="principal_color">Call Anglais</a></td>
                            <td class="principal_color">60</td>
                        </tr>
                        <tr>
                            <td class="principal_color"><a href="" class="principal_color">Bureautique</a></td>
                            <td class="principal_color">90</td>
                        </tr>
                    </tbody>
                </table>
                <div class="mx-auto">
                    <a href="" class="btn btn-primary btn-sm" id="btnIcon" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#voir_plus"> 
                        <strong id="btnText" class="ms-1">
                            Voir plus <i id="btnIcon" class="bi bi-plus"></i>
                        </strong>
                    </a>
                </div>
                <div class="collapse" id="voir_plus">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><a href="">Call Anglais</a></td>
                                <td>60</td>
                            </tr>
                            <tr>
                                <td><a href="">Bureautique</a></td>
                                <td>90</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center mb-3" id="voir_moins">
                        <a class="btn btn-primary btn-sm"
                        data-bs-toggle="collapse"
                        href="#voir_plus">
                            Voir moins <i class="bi bi-dash"></i>
                        </a>
                    </div>
                </div>
                

                <!-- Bouton Voir moins en bas -->
                
                <!-- <div class="mx-auto">
                    <a href="" class="btn btn-primary btn-sm" > <strong class="ms-1">Voir moins <i class="bi bi-plus"></i></strong></a>
                </div> -->
            </div>
        </div>    
    </div>
    <div class="statistiques mt-4 row">
        <div class="col-12 col-sm-8">
            <div class="card p-3 border-0 shadow-sm">
                <h5 class="fw-bold mb-3">Nombre d'élèves par examen</h5>
                <canvas id="monGraphique" style="max-height: 400px; width: 100%;"></canvas>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card p-3 border-0 shadow-sm">
                <h5 class="fw-bold mb-3">Elèves par catégorie</h5>
                <canvas id="donut" style="max-height: 400px; width: 100%;"></canvas>
            </div>
        </div>
    </div>
@endsection