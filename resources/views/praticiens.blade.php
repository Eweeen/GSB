@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<section>
        <h1>Praticiens</h1>

        <form method="POST" action="/praticiens" id="form">
            @csrf
            
            <div class="form-search">
                <select name="search_praticien" id="search_praticien">
                    @foreach ($praticiens as $pra)
                        <option value="{{ $pra->PRA_NUM }}">{{ $pra->PRA_NOM }} {{ $pra->PRA_PRENOM }}</option>
                    @endforeach
                </select>

                <button type="submit"><i class='bx bx-search-alt-2'></i></button>
            </div>

            <hr>

            <div class="form-group">
                <label for="PRA_NOM">Nom</label>
                <input type="text" id="PRA_NOM" name="PRA_NOM" value="{{ $praticien->PRA_NOM }}">
            </div>

            <div class="form-group">
                <label for="PRA_PRENOM">Prénom</label>
                <input type="text" id="PRA_PRENOM" name="PRA_PRENOM" value="{{ $praticien->PRA_PRENOM }}">
            </div>

            <div class="form-group">
                <label for="PRA_ADRESSE">Adresse</label>
                <input type="text" id="PRA_ADRESSE" name="PRA_ADRESSE" value="{{ $praticien->PRA_ADRESSE }}">
            </div>

            <div class="form-50">
                <label for="PRA_CP">Code Postale</label>
                <input type="text" id="PRA_CP" name="PRA_CP" value="{{ $praticien->PRA_CP }}">
            </div>

            <div class="form-50">
                <label for="PRA_VILLE">Ville</label>
                <input type="text" id="PRA_VILLE" name="PRA_VILLE" value="{{ $praticien->PRA_VILLE }}">
            </div>

            <div class="form-group">
                <label for="PRA_COEFNOTORIETE">Coef notoriété</label>
                <input type="text" id="PRA_COEFNOTORIETE" name="PRA_COEFNOTORIETE" value="{{ $praticien->PRA_COEFNOTORIETE }}">
            </div>

            <div class="form-group">
                <label for="TYP_CODE">Type</label>
                <input type="text" id="TYP_CODE" name="TYP_CODE" value="{{ $praticien->TYP_LIBELLE }}">
            </div>

            <div class="form-navigation">
                @if ($prevSibling)
                    <a href="/praticiens/{{ $prevSibling->PRA_NUM }}" class="btn">Précédent</a>
                @endif
                @if ($nextSibling)
                    <a href="/praticiens/{{ $nextSibling->PRA_NUM }}" class="btn">Suivant</a>
                @endif
            </div>

        </form>
    </section>
@endsection