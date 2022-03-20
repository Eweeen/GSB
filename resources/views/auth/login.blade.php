@extends('layouts.app')

@section('content')
    <div class="container-login">
        <a href="/">
            <img src="{{ asset('img/GSB.png') }}" alt="Logo GSB">
        </a>
        
        <form method="POST" action="{{ route('login') }}" id="form" class="form-login">
            @csrf

            <!-- Session Status -->
            <x-auth-session-status class="status" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="errors" :errors="$errors" />
            
            <!-- Name -->
            <div class="form-group">
                <label for="VIS_NOM">Nom</label>
                <input type="text" id="VIS_NOM" name="VIS_NOM" value="{{ old('VIS_NOM') }}" required autofocus>
            </div>
            
            <!-- Password -->
            <div class="form-group">
                <label for="VIS_DATEEMBAUCHE">Date (ex: 23-jan-2000)</label>
                <input type="password" id="VIS_DATEEMBAUCHE" name="VIS_DATEEMBAUCHE" required autocomplete="current-password">
            </div>
            
            <div class="form-button">
                <button type="submit" class="btn">Connexion</button>
            </div>
        </form>
    </div>
@endsection