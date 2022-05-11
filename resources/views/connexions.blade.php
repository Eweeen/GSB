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
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
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