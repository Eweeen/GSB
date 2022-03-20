@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<section>
        <h1>Comptes rendus</h1>

        <form id="form">
            <div class="form-group">
                <label for="Praticien">Praticien</label>
                <input type="text" id="Praticien" name="Praticien" value="{{ $compteRendu->PRA_NOM }} {{ $compteRendu->PRA_PRENOM }}">
            </div>
            
            <div class="form-group">
                <label for="PRA_VILLE">Ville</label>
                <input type="text" id="PRA_VILLE" name="PRA_VILLE" value="{{ $compteRendu->PRA_VILLE }}">
            </div>

            <div class="form-group">
                <label for="RAP_DATE">Date</label>
                <input type="text" id="RAP_DATE" name="RAP_DATE" value="{{ date('d/m/Y', strtotime($compteRendu->RAP_DATE)) }}">
            </div>

            <div class="form-group">
                <label for="RAP_MOTIF">Motif</label>
                <input type="text" id="RAP_MOTIF" name="RAP_MOTIF" value="{{ $compteRendu->RAP_MOTIF }}">
            </div>

            <div class="form-group">
                <label for="Medicaments">Médicaments</label>
                @if (count($medicaments) > 0)
                <table>
                    <tbody>
                        @foreach ($medicaments as $med)
                            <tr>
                                <td><input type="text" value="{{ $med->MED_NOMCOMMERCIAL }}"></td>
                                <td><input type="number" value="{{ $med->OFF_QTE }}"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Aucuns médicaments.</p>
                @endif
            </div>

            <div class="form-navigation nav-cr">
                <a href="/comptes-rendus" class="btn btn-5">Retour</a>

                <div>
                    <a href="/comptes-rendus/downlaod-pdf/{{ $compteRendu->RAP_NUM }}" class="btn">
                        <i class='bx bx-cloud-download'></i> PDF
                    </a>
                    
                    <a href="/comptes-rendus/create" class="btn">Nouveau</a>
                </div>
            </div>
        </form>
    </section>
@endsection