<?php

namespace App\Http\Controllers;

use App\Models\Mecanicien;
use App\Models\PieceRechange;
use App\Models\Reparation;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReparationMecanico extends Controller
{

    public function index()
    {
        $mecanicien = Mecanicien::where('userID', Auth::id())->first();
        // dd($mecanicien->id);
        if ($mecanicien) {
            $reparations = Reparation::where('mecanicienID', $mecanicien->id)->get();
            // dd($reparations);
            return view('mecanico.reparations.index', compact('reparations'));
        } else {
            return view('mecanico.reparations.index');
        }
    }
    public function create()
    {
        $vehicules = Vehicule::all();
        $piecesRechange = PieceRechange::all();
        $mecaniciens = Mecanicien::all();
        return view('mecanico.reparations.create', compact('vehicules', 'piecesRechange', 'mecaniciens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'vehiculeID' => 'required|exists:vehicules,id',
            'piecesRechange' => 'array',
            'piecesRechange.*' => 'exists:pieces_rechange,id',
            'quantites' => 'string',
            'mecanicienID' => 'required|exists:mecaniciens,id',
        ]);

        $reparation = Reparation::create([
            'description' => $request->description,
            'statut' => 'en attente',
            'date_debut' => now(),
            'mecanicienID' => Auth::id(),
            'vehiculeID' => $request->vehiculeID,
        ]);

        $quantites = explode(',', $request->quantites);
        foreach ($request->piecesRechange as $index => $pieceId) {
            $reparation->piecesDeRechange()->attach($pieceId, ['quantité' => $quantites[$index]]);
        }

        return redirect()->route('mecanico.index')->with('success', 'Fiche de réparation créée avec succès.');
    }

    public function edit(Reparation $reparation)
    {
        $vehicules = Vehicule::all();
        $piecesRechange = PieceRechange::all();
        $mecaniciens = Mecanicien::all();
        return view('mecanico.reparations.edit', compact('reparation', 'vehicules', 'piecesRechange', 'mecaniciens'));
    }

    public function update(Request $request, Reparation $reparation)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'statut' => 'required|string|in:en attente,en cours,terminée',
            'piecesRechange' => 'array',
            'piecesRechange.*' => 'exists:pieces_rechange,id',
            'quantites' => 'string',
            'mecanicienID' => 'required|exists:mecaniciens,id',
        ]);

        $reparation->update([
            'description' => $request->description,
            'statut' => $request->statut,
            'date_fin' => $request->statut == 'terminée' ? now() : null,
            'mecanicienID' => $request->mecanicienID,
            'vehiculeID' => $request->vehiculeID,
        ]);

        $reparation->piecesDeRechange()->detach();
        $quantites = explode(',', $request->quantites);
        foreach ($request->piecesRechange as $index => $pieceId) {
            $reparation->piecesDeRechange()->attach($pieceId, ['quantité' => $quantites[$index]]);
        }

        return redirect()->route('mecanico.index')->with('success', 'Fiche de réparation mise à jour avec succès.');
    }
}
