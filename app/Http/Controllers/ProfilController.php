<?php

namespace App\Http\Controllers;

use App\Models\Visiteur;
use App\Models\Secteur;
use App\Models\Labo;
use Illuminate\Http\Request;
use Session;

class ProfilController extends Controller
{
    public function index()
    {
        $trySecteur = Visiteur::where('VIS_MATRICULE', auth()->id())->join('secteur', 'visiteur.SEC_CODE', '=', 'secteur.SEC_CODE')->first();
        $tryLabo = Visiteur::where('VIS_MATRICULE', auth()->id())->join('labo', 'visiteur.LAB_CODE', '=', 'labo.LAB_CODE')->first();

        if ($trySecteur && $tryLabo){
            $visiteur = Visiteur::where('VIS_MATRICULE', auth()->id())->join('secteur', 'visiteur.SEC_CODE', '=', 'secteur.SEC_CODE')->join('labos', 'visiteurs.LAB_CODE', '=', 'labos.LAB_CODE')->first();
        } 
        elseif ($trySecteur) {
            $visiteur = Visiteur::where('VIS_MATRICULE', auth()->id())->join('secteur', 'visiteur.SEC_CODE', '=', 'secteur.SEC_CODE')->first();
        } 
        elseif ($tryLabo){
            $visiteur = Visiteur::where('VIS_MATRICULE', auth()->id())->join('labo', 'visiteur.LAB_CODE', '=', 'labo.LAB_CODE')->first();
        }
        else {
            $visiteur = Visiteur::where('VIS_MATRICULE', auth()->id())->first();
        }

        $secteurs = Secteur::all();
        $labos = Labo::all();

        return view('profil', compact('visiteur', 'secteurs', 'labos'));
    }

    public function store(Request $request)
    {
        $visiteur = Visiteur::find(auth()->id());

        $request->validate([
            'VIS_NOM' => ['required', 'string'],
            'VIS_PRENOM' => ['required', 'string'],
            'VIS_ADRESSE' => ['nullable', 'string'],
            'VIS_CP' => ['nullable', 'string'],
            'VIS_VILLE' => ['nullable', 'string'],
            'SEC_CODE' => ['nullable', 'string'],
            'LAB_CODE' => ['nullable', 'string'],
        ]);

        $visiteur->VIS_NOM = $request->VIS_NOM;
        $visiteur->VIS_PRENOM = $request->VIS_PRENOM;
        $visiteur->VIS_ADRESSE = $request->VIS_ADRESSE;
        $visiteur->VIS_CP = $request->VIS_CP;
        $visiteur->VIS_VILLE = $request->VIS_VILLE;
        $visiteur->SEC_CODE = $request->SEC_CODE;
        $visiteur->LAB_CODE = $request->LAB_CODE;
        $visiteur->save();

        Session::flash('message', "Vos informations ont bien été modifiées.");

        return redirect('/profil');
    }

}
