@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    <section>
        <h1>Home</h1>
        
        <p class="text-container">
            Bienvenue chez Galaxy Swiss Gourdin, vous retrouverez ci-dessous vos comptes rendus ainsi que la liste des praticiens partenaires.
        </p>
        
        <a href="/comptes-rendus" class="btn-home">
            <i class='bx bxs-file'></i>
            Comptes rendus
        </a>
        
        <a href="/praticiens" class="btn-home">
            <i class='bx bxs-contact'></i>
            Praticiens
        </a>
    </section>
@endsection