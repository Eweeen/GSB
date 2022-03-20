<?php

namespace App\Http\Controllers;

use App\Models\Praticien;
use Illuminate\Http\Request;

class PraticienController extends Controller
{

    public function index()
    {
        $praticiens = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')->orderBy('PRA_NUM')->get();
        $villes = Praticien::select('PRA_VILLE')->groupBy('PRA_VILLE')->get();

        return view('search-praticiens', compact('praticiens', 'villes'));
    }

    public function store(Request $request)
    {
        return redirect('/praticiens/'.$request->search_praticien);
    }

    public function show($id)
    {
        $praticien = Praticien::where('PRA_NUM', $id)->join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')->firstOrFail();
        $praticiens = Praticien::all();
        $prevSibling = Praticien::select('PRA_NUM')->where('PRA_NUM', ($id - 1))->first();
        $nextSibling = Praticien::select('PRA_NUM')->where('PRA_NUM', ($id + 1))->first();

        return view('praticiens', compact('prevSibling', 'nextSibling', 'praticien', 'praticiens'));
    }

    public function search(Request $request)
    {
        $praticiens = Praticien::join('type_praticien', 'praticien.TYP_CODE', '=', 'type_praticien.TYP_CODE')
        ->where('PRA_NOM', 'like', $request->pra.'%')
        ->whereIn("praticien.TYP_CODE", $request->type)
        ->orderBy('PRA_NUM')
        ->get();

        return response()->json([$praticiens]);
    }

}
