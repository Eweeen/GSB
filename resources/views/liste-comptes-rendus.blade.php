@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<section>
        <h1>Comptes rendus</h1>

        <a href="/comptes-rendus/create" class="btn-link">Nouveau</a>

        <div class="list">
            @if (count($crs) > 0)
                @foreach ($crs as $cr)
                    <a href="/comptes-rendus/{{ $cr->RAP_NUM }}" class="items" draggable="false">
                        <span class="item">
                            {{ $cr->PRA_NOM }} {{ $cr->PRA_PRENOM }} : {{ $cr->RAP_MOTIF }}
                        </span>

                        <span class="infos">
                            {{ date('d/m/Y', strtotime($cr->RAP_DATE)) }}
                        </span>
                    </a>
                @endforeach
            @else
                <div class="items">
                    <span class="item">Aucuns comptes rendus.</span>
                </div>
            @endif
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                <p>{{ Session::get('message') }} <i class='bx bx-x'></i></p>
            </div>
        @endif
    </section>
@endsection