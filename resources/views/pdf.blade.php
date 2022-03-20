<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>

    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        body, html {
            font-family: Arial, sans-serif;
            font-size: 18px;
            padding: 60px;
        }
        h1 {
            margin-bottom: 60px;
        }
        .logo {
            position: absolute;
            top: 60px;
            right: 60px;
            height: 60px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group p {
            margin-top: 5px;
            padding: 10px 20px;
            border: 1px solid #333333;
            border-radius: 5px;
        }
        table {
            width: 100%;
            margin-top: 5px;
            border-collapse: collapse;
            border-radius: 5px;
        }
        th, td {
            padding: 10px 20px;
            border: 1px solid #333333;
        }
        tr td:nth-child(1), tr th:nth-child(1) {
            width: 60%;
        }
        tr td:nth-child(2), tr th:nth-child(2) {
            text-align: center;
        }
    </style>
</head>
<body>
    <section>
        <h1>Compte rendu {{ $compteRendu->RAP_NUM }}</h1>

        <img src="{{ public_path('img/gsb.png') }}" alt="Logo GSB" class="logo">

        <div class="container">
            <div class="form-group">
                <h3>Praticien</h3>
                <p>{{ $compteRendu->PRA_NOM }} {{ $compteRendu->PRA_PRENOM }}</p>
            </div>
            <div class="form-group">
                <h3>Ville</h3>
                <p>{{ $compteRendu->PRA_VILLE }}</p>
            </div>
            <div class="form-group">
                <h3>Date</h3>
                <p>{{ date('d/m/Y', strtotime($compteRendu->RAP_DATE)) }}</p>
            </div>
            <div class="form-group">
                <h3>Motif</h3>
                <p>{{ $compteRendu->RAP_MOTIF }}</p>
            </div>
            @if ($compteRendu->RAP_BILAN)
            <div class="form-group">
                <h3>Bilan</h3>
                <p>{{ $compteRendu->RAP_BILAN }}</p>
            </div>
            @endif
            <div class="form-group">
                <h3>Médicaments</h3>
                @if (count($medicaments) > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Nom médicaments</th>
                                <th>Quantité</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicaments as $medicament)
                            <tr>
                                <td>{{ $medicament->MED_NOMCOMMERCIAL }}</td>
                                <td>{{ $medicament->OFF_QTE }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Aucuns médicaments.</p>
                @endif
            </div>
        </div>
    </section>
</body>
</html>