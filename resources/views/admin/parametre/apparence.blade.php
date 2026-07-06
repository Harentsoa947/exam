@extends('admin.layoutsAdmin.master')
@section('titre', 'Dashboard Settings')
@section('titre_en_tete', 'Dashboard Settings')
@section('contenue')
    @include('admin.parametre.nav')
    <div class="p-4 special_card">
        <div class="row">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="secondary_color">Call Français</td>
                            <td class="secondary_color">Call Anglais</td>
                            <td class="secondary_color">Bureautique</td>
                            <td class="secondary_color">Dev web</td>
                            <td class="secondary_color">Python</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="secondary_color"><input type="color" name="" id="" value="red"></td>
                            <td class="secondary_color"><input type="color" name="" id="" value="#23a981"></td>
                            <td class="secondary_color"><input type="color" name="" id="" value="#216981"></td>
                            <td class="secondary_color"><input type="color" name="" id="" value="#237"></td>
                            <td class="secondary_color"><input type="color" name="" id=""></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mx-auto">
                    <button class="btn btn-primary">Mettre à jour</button>
                </div>
            </div>
        </div>
    </div>
@endsection