<?php

namespace App\Http\Controllers;

use Session;
use PDF;
use App\Models\Praticien;
use App\Models\Rapport_Visite;
use App\Models\Offrir;
use App\Models\Medicament;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompteRenduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comptesRendus = Rapport_Visite::join('praticien', 'rapport_visite.PRA_NUM', '=', 'praticien.PRA_NUM')
                                        ->where('VIS_MATRICULE', auth()->id())
                                        ->orderByDesc('RAP_DATE')
                                        ->get();

        return view('liste-comptes-rendus', ['crs' => $comptesRendus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $praticiens = Praticien::all();
        $medicaments = Medicament::all();

        return view('new-compte-rendu', ['praticiens' => $praticiens, 'medicaments' => $medicaments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'PRA_NUM' => ['required', 'string'],
            'RAP_DATE' => ['required', 'date'],
            'RAP_MOTIF' => ['required', 'string'],
            'RAP_BILAN' => ['nullable', 'string'],
        ]);

        $last_rap = Rapport_Visite::orderByDesc('RAP_NUM')->first();

        $rapport = Rapport_Visite::create([
            'VIS_MATRICULE' => auth()->id(),
            'RAP_NUM' => $last_rap->RAP_NUM + 1,
            'PRA_NUM' => $request->PRA_NUM,
            'RAP_DATE' => $request->RAP_DATE,
            'RAP_BILAN' => $request->RAP_BILAN,
            'RAP_MOTIF' => $request->RAP_MOTIF
        ]);

        for ($i = 0; $i < $request->row_medoc; $i++){
            $med = 'med'.($i + 1);
            $quantite = 'quantite'.($i + 1);

            $medocs = Offrir::create([
                'VIS_MATRICULE' => auth()->id(),
                'RAP_NUM' => $rapport->RAP_NUM,
                'MED_DEPOTLEGAL' => $request->$med,
                'OFF_QTE' => $request->$quantite
            ]);
        }

        Session::flash('message', "Votre compte rendu a bien été créé.");

        return redirect('/comptes-rendus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compteRendu = Rapport_Visite::join('praticien', 'rapport_visite.PRA_NUM', '=', 'praticien.PRA_NUM')
                                        ->where('VIS_MATRICULE', auth()->id())
                                        ->where('RAP_NUM', $id)
                                        ->orderByDesc('RAP_DATE')
                                        ->firstOrFail();

        $medicaments = Offrir::join('medicament', 'offrir.MED_DEPOTLEGAL', '=', 'medicament.MED_DEPOTLEGAL')
                                ->where('offrir.RAP_NUM', $id)
                                ->get();

        return view('comptes-rendus', compact('compteRendu', 'medicaments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download_pdf($id)
    {
        $compteRendu = Rapport_Visite::join('praticien', 'rapport_visite.PRA_NUM', '=', 'praticien.PRA_NUM')
                                    ->where('VIS_MATRICULE', auth()->id())
                                    ->where('RAP_NUM', $id)
                                    ->firstOrFail();

        $medicaments = Offrir::join('medicaments', 'offrir.MED_DEPOTLEGAL', '=', 'medicament.MED_DEPOTLEGAL')
                                    ->where('offrir.RAP_NUM', $id)
                                    ->get();

        $pdf = PDF::loadView('pdf', compact('compteRendu', 'medicaments'));
        
        return $pdf->download('comptes-rendus-'.$compteRendu->RAP_NUM.'.pdf');
    }
}
