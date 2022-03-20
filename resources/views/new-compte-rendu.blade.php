@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<section>
        <h1>Comptes rendus</h1>

        <form method="POST" action="/comptes-rendus" id="form">
            @csrf

            <input type="hidden" id="row_medoc" name="row_medoc" value="0">

            @if ($errors->any())
                <ul class="">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <br>
            @endif

            <div class="form-group">
                <label for="Praticiens">Praticiens</label>
                <select name="PRA_NUM" id="PRA_NUM" required>
                    @foreach ($praticiens as $pra)
                        <option value="{{ $pra->PRA_NUM }}">{{ $pra->PRA_NOM }} {{ $pra->PRA_PRENOM }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="RAP_DATE">Date</label>
                <input type="datetime-local" id="RAP_DATE" name="RAP_DATE" value="{{ date('Y-m-d\TH:i') }}" required>
            </div>

            <div class="form-group">
                <label for="RAP_MOTIF">Motif</label>
                <input type="text" id="RAP_MOTIF" name="RAP_MOTIF" required>
            </div>

            <div class="form-group">
                <label for="RAP_BILAN">Bilan</label>
                <textarea name="RAP_BILAN" id="RAP_BILAN"></textarea>
            </div>

            <div class="form-group">
                <label for="Medicaments">Médicaments</label>
                <table>
                    <tbody id="table-container">
                    </tbody>
                </table>

                <div class="add-row">Ajouter un médicament</div>
            </div>

            <div class="form-navigation nav-cr">
                <a href="/comptes-rendus" class="btn btn-5">Retour</a>

                <button type="submit" class="btn">Ajouter</button>
            </div>
        </form>
    </section>
@endsection

@section ('script')
<script src="{{ asset('js/comptes-rendus.js') }}" defer></script>
<script>
    const medicaments = [
    @foreach ($medicaments as $med)
        {medDepotlegal: "{{ $med->MED_DEPOTLEGAL }}", medNomcommercial: "{{ $med->MED_NOMCOMMERCIAL }}"},
    @endforeach]
</script>
@endsection