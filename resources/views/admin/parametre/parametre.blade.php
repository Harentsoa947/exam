@extends('admin.layoutsAdmin.master')
@section('titre', 'Dashboard Settings')
@section('titre_en_tete', 'Dashboard Settings')
@section('contenue')
    @include('admin.parametre.nav')
    <div class="p-4 special_card">
        <div class="row">
            <div class="section1 col-12 col-lg-6">
                <h5>Indicateur de performance </h5>
            </div>
            <div class="col-12 col-lg-6 special_card">
                <div class="d-flex justify-content-center gap-5 mb-4">
                    <table class="table">
                        <tbody class="text-center">
                            <tr class="">
                                <td class="bg-primary text-white">Statue exam</td>
                                <td class="secondary_color border">Examen en cours / planifié</td>
                                <td class="secondary_color border">Profs / Etudiant actifs </td>
                            </tr>
                            <tr>
                                <td class="principal_color"></td>
                                <td class="secondary_color pt-3 border"><input type="radio" name="sect1" id="" class="ms-2 radio-xl"></td>
                                <td class="secondary_color pt-3 border"><input type="radio" name="sect1" id="" class="ms-2 radio-xl"></td>
                            </tr>
                            <tr class="">
                                <td class="bg-primary text-white">Affichage création exam</td>
                                <td class="secondary_color border">Carte </td>
                                <td class="secondary_color border">Courbe graphique </td>
                            </tr>
                            <tr>
                                <td class="principal_color" style="border: none"></td>
                                <td class="secondary_color border"><input type="radio" name="sect2" id="" class="ms-2 radio-xl"></td>
                                <td class="secondary_color border"><input type="radio" name="sect2" id="" class="ms-2 radio-xl"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>        
            </div>
        </div>
        <hr>
        <div class="row mt-4">
            <div class="section1 col-12 col-lg-6">
                <h5>Statistiques Global </h5>
            </div>
            <div class="col-12 col-lg-6">
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="principal_color"></td>
                                <td class="secondary_color">Affichage</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="bg-primary text-white">Elève par examen</td>
                                <td class="secondary_color">
                                    <select name="" id="" class="form-control">
                                        <option value="">Line chart</option>
                                        <option value="">Bar chart</option>
                                        <option value="">Polar Area Chart</option>
                                        <option value="">Radar Chart</option>
                                        <option value="">Scatter Chart</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="bg-primary text-white">Elève par catégorie</td>
                                <td class="secondary_color">
                                    <select name="" id="" class="form-control">
                                        <option value="">Doughnut chart</option>
                                        <option value="">Polar Area Chart</option>
                                        <option value="">Radar Chart</option>
                                        <option value="">Scatter Chart</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                        
                    </table>
                    
                    
                </div>   
                <div>

                </div>             
            </div>
        </div>
        
        
    </div>
@endsection