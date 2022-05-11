@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<section>
        <h1>Mes connexions</h1>

        <a href="/profil">Mon profil</a>

        <form action="/connexions" method="POST">
            @csrf

            <select name="mois" id="mois">
                <option value="01">Janvier</option>
                <option value="02">Février</option>
                <option value="03">Mars</option>
                <option value="04">Avril</option>
                <option value="05">Mai</option>
                <option value="06">Juin</option>
                <option value="07">Juillet</option>
                <option value="08">Août</option>
                <option value="09">Septembre</option>
                <option value="10">Octobre</option>
                <option value="11">Novembre</option>
                <option value="12">Décembre</option>
            </select>

            <input type="submit" value="Valider">
        </form>

        <h2>Dernière connexion</h2>
        <p>{{ $connexions[0]->date }}</p>

        <h2>Anciennes connexions</h2>
        @foreach ($connexions as $connexion)
            @if ($connexion->date !== $connexions[0]->date)
                <p>{{ $connexion->date }}</p>
            @endif
        @endforeach
    </section>

    <script src="{{ asset('js/connexions.js') }}"></script>
@endsection