@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<section>
    <h1>Praticiens</h1>
    
    <div class="form-search" style="margin-top: 20px;">
        <div class="filter_container">
            <button id="button-filter"><i class='bx bx-filter-alt'></i></button>
            <div class="filter_nav">
                <p>Type :</p>
                <label>
                    <input type="checkbox" name="type[]" id="mh" value="MH">Médecin Hospitalier
                </label>
                <label>
                    <input type="checkbox" name="type[]" id="mv" value="MV">Médecine de Ville
                </label>
                <label>
                    <input type="checkbox" name="type[]" id="ph" value="PH">Pharmacien Hospitalier
                </label>
                <label>
                    <input type="checkbox" name="type[]" id="po" value="PO">Pharmacien Officine
                </label>
                <label>
                    <input type="checkbox" name="type[]" id="ps" value="PS">Personnel de santé
                </label>

                <span class="filter-btn">Appliquer</span>
                <!-- <br> -->
                <!-- <p>Ville :</p> -->
                @foreach ($villes as $ville)
                <!-- <label>
                    <input type="checkbox" name="ville" id="">{{ $ville->PRA_VILLE }}
                </label> -->
                @endforeach
            </div>
        </div>


        <input type="text" id="input-search" class="input" placeholder="Chercher des praticiens...">
        <button id="search-button"><i class='bx bx-search-alt-2'></i></button>
    </div>

    <div class="list">
        @foreach ($praticiens as $praticien)
        <a href="/praticiens/{{ $praticien->PRA_NUM }}" class="items" draggable="false">
            <span class="item">
                <i class='bx bxs-contact'></i>
                {{ $praticien->PRA_NOM }} {{ $praticien->PRA_PRENOM }} ({{ $praticien->TYP_LIBELLE }})
            </span>

            <span class="infos">
                {{ $praticien->PRA_ADRESSE }}, {{ $praticien->PRA_CP }} {{ $praticien->PRA_VILLE }}
            </span>
        </a>
        @endforeach
    </div>
        
</section>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('libs/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    <script>
        let listPra = [
            @foreach ($praticiens as $praticien)
                {
                    num: '{{ $praticien->PRA_NUM }}',
                    nom: '{{ $praticien->PRA_NOM }}',
                    prenom: '{{ $praticien->PRA_PRENOM }}',
                    adresse: '{{ $praticien->PRA_ADRESSE }}',
                    cp: '{{ $praticien->PRA_CP }}',
                    ville: '{{ $praticien->PRA_VILLE }}',
                    type: '{{ $praticien->TYP_LIBELLE }}',
                },
            @endforeach
        ];

        function search(){
            let input = $('#input-search');
            let list = $('input[name="type[]"]');
            let typeList = [];

            for (let i = 0; i < list.length; i++){
                if (list[i].checked){
                    typeList.push(list[i].value);
                }
            }

            if (!typeList.includes('MH') && !typeList.includes('MV') && !typeList.includes('PH') && !typeList.includes('PO') && !typeList.includes('PS')){
                typeList = ['MH','MV','PH','PO','PS'];
            }

            axios.post('/praticiens/search', {
                pra: input.val(),
                type: typeList,
            })
            .then((response) => {
                let resultHTML = "";

                response.data[0].forEach(
                    resultItem => resultHTML += `<a href="/praticiens/${resultItem.PRA_NUM}" class="items" draggable="false">
                                                    <span class="item">
                                                        <i class='bx bxs-contact'></i>
                                                        ${resultItem.PRA_NOM} ${resultItem.PRA_PRENOM} (${resultItem.TYP_LIBELLE})
                                                    </span>

                                                    <span class="infos">
                                                        ${resultItem.PRA_ADRESSE}, ${resultItem.PRA_CP} ${resultItem.PRA_VILLE}
                                                    </span>
                                                </a>`
                );

                $('.list').html(resultHTML);
            });

            document.querySelector('.filter_nav').classList.remove('active');
        }

        $('.filter-btn').on('click', function (){
            search();
        });

        $('#search-button').on('click', function (){
            search();
        });
    </script>
@endsection