<?php

namespace App\Http\Controllers;

use App\Models\Cooperative;
use App\Models\Collaborateur;
use App\Models\Secteur;
use App\Models\Categorie;
use App\Models\Commune;
use App\Models\Province;

use Illuminate\Http\Request;

class CooperativeController extends Controller
{
    public function index()
    {
        $cooperatives = Cooperative::with([ 'secteur', 'categorie', 'commune','province'])->get();
        return view('cooperative.index', compact('cooperatives'));
    }

    public function create()
    {
        $collaborateurs = Collaborateur::all();
        $secteurs = Secteur::all();
        $categories = Categorie::all();
        $communes = Commune::all();
        $provinces = Province::all();
        return view('cooperative.create', compact('collaborateurs', 'secteurs', 'categories', 'communes','provinces'));
    }

    public function store(Request $request)
    {
           $result= $request->validate([
            'NumCop' => 'required|numeric|max:100',
            'NomFr' => 'required|string|max:255',
            'NomAr' => 'required|string|max:255',
            'Telephonne' => 'required|string|max:20',
            'NbrMbr'=>'required|numeric|max:20',
            'NumInscrip' => 'required|string|max:100',
            'DateCreation' => 'required|date',
            'NumAnalytique' => 'required|string|max:100',
            'DejaBeneficie' => 'nullable',
            'NbrColl' => 'required|numeric|max:100',
            'NbrMem' => 'required|integer',
            'Num_Ordre' => 'required|integer',

            'Nbr_Benifiement' => 'required|integer',
            'Adresse' => 'required|string|max:255',
            'Informations' => 'nullable|string',
            'Secteur' => 'required|exists:secteur,Id',
            'Categorie' => 'required|exists:categorie,Id',
            'IdComm' => 'required|exists:commune,Id',
           
        ]);

        Cooperative::create($result);

        return redirect()->route('cooperatives.index')->with('success', 'Coopérative ajoutée avec succès');
    }

    public function show($id)
    {
        $cooperative = Cooperative::with(['collaborateurs', 'secteur', 'categorie', 'commune'])->findOrFail($id);
        return view('cooperative.show', compact('cooperative'));
    }

    public function edit($id)
    {
        $cooperative = Cooperative::findOrFail($id);
        $collaborateurs = Collaborateur::all();
        $secteurs = Secteur::all();
        $categories = Categorie::all();
        $communes = Commune::all();

        return view('cooperative.edit', compact('cooperative', 'collaborateurs', 'secteurs', 'categories', 'communes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'NumCop' => 'required|string|max:100',
            'NomFr' => 'required|string|max:255',
            'NomAr' => 'required|string|max:255',
            'Telephonne' => 'required|string|max:20',
            'NbrMbr'=>'required|string|max:20',
            'NumInscrip' => 'required|string|max:100',
            'DateCreation' => 'required|date',
            'NumAnalytique' => 'required|string|max:100',
            'DejaBeneficie' => 'required|boolean',
            'Nbr_Benifiement' => 'required|integer',
            'Adresse' => 'required|string|max:255',
            'Informations' => 'nullable|string',
            'NbrColl' => 'required|string|max:100',
            'Secteur' => 'required|exists:secteur,Id',
            'Categorie' => 'required|exists:categorie,Id',
            'IdComm' => 'required|exists:commune,Id',
        ]);

        $cooperative = Cooperative::findOrFail($id);
        $cooperative->update($request->all());

        return redirect()->route('cooperatives.index')->with('success', 'Coopérative mise à jour avec succès');
    }

    public function destroy($id)
    {
        $cooperative = Cooperative::findOrFail($id);
        $cooperative->delete();

        return redirect()->route('cooperatives.index')->with('success', 'Coopérative supprimée avec succès');
    }
}
