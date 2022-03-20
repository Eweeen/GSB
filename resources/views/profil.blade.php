@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<section>
        <h1>Profil</h1>

        <form method="POST" action="/profil" id="form">
            @csrf

            <div class="form-group">
                <label for="VIS_NOM">Nom</label>
                <input type="text" id="VIS_NOM" name="VIS_NOM" value="{{ $visiteur->VIS_NOM }}" required>
            </div>

            <div class="form-group">
                <label for="VIS_PRENOM">Prénom</label>
                <input type="text" id="VIS_PRENOM" name="VIS_PRENOM" value="{{ $visiteur->Vis_PRENOM }}" required>
            </div>

            <div class="form-group">
                <label for="VIS_DATEEMBAUCHE">Date embauche</label>
                <input type="text" id="VIS_DATEEMBAUCHE" name="VIS_DATEEMBAUCHE" value="{{ $visiteur->VIS_DATEEMBAUCHE }}" disabled>
            </div>

            <div class="form-group">
                <label for="VIS_ADRESSE">Adresse</label>
                <input type="text" id="VIS_ADRESSE" name="VIS_ADRESSE" value="{{ $visiteur->VIS_ADRESSE }}">
            </div>

            <div class="form-50">
                <label for="VIS_CP">Code Postale</label>
                <input type="text" id="VIS_CP" name="VIS_CP" value="{{ $visiteur->VIS_CP }}">
            </div>

            <div class="form-50">
                <label for="VIS_VILLE">Ville</label>
                <input type="text" id="VIS_VILLE" name="VIS_VILLE" value="{{ $visiteur->VIS_VILLE }}">
            </div>

            <div class="form-50">
                <label for="SEC_CODE">Secteur</label>
                <select name="SEC_CODE" id="SEC_CODE">
                    <option value="{{ $visiteur->SEC_CODE }}" required>{{ $visiteur->SEC_LIBELLE }}</option>
                    @foreach ($secteurs as $secteur)
                        @if ($visiteur->SEC_CODE !== $secteur->SEC_CODE)
                            <option value="{{ $secteur->SEC_CODE }}">{{ $secteur->SEC_LIBELLE }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-50">
                <label for="LAB_CODE">Labo</label>
                <select name="LAB_CODE" id="LAB_CODE">
                    <option value="{{ $visiteur->LAB_CODE }}" selected>{{ $visiteur->LAB_NOM }}</option>
                    @foreach ($labos as $labo)
                        @if ($visiteur->LAB_CODE !== $labo->LAB_CODE)
                            <option value="{{ $labo->LAB_CODE }}">{{ $labo->LAB_NOM }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-button">
                <button type="submit" class="btn">Modifier</button>
            </div>
        </form>

        @if(Session::has('message'))
            <div class="alert alert-success">
                <p>{{ Session::get('message') }} <i class='bx bx-x'></i></p>
            </div>
        @endif
        
    </section>
@endsection