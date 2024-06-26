<?php

namespace App\Http\Controllers;

use App\Models\Mecanicien;
use App\Models\PieceRechange;
use App\Models\RendezVou;
use App\Models\Reparation;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function index()
    {
        $mecanicien = Mecanicien::where('userID', Auth::id())->first();
        // dd($mecanicien->id);
        if ($mecanicien) {
            $rendezvous = RendezVou::where('mecanicienID', $mecanicien->id)->get();
            // dd($rendezvous);
            return view('mecanico.appointements.index', compact('rendezvous'));
        } else {
            return view('mecanico.appointements.index');
        }
    }
    public function create()
    {
        $vehicules = Vehicule::all();
        $piecesRechange = PieceRechange::all();
        $mecaniciens = Mecanicien::all();
        return view('mecanico.appointements.create', compact('vehicules', 'piecesRechange', 'mecaniciens'));
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
        return view('mecanico.appointements.edit', compact('reparation', 'vehicules', 'piecesRechange', 'mecaniciens'));
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

    public function createrep(Request $request)
    {


        $validatedData = $request->validate([
            'description' => 'required',
            'statut' => 'required|in:En attente,En cours,Terminée',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'notes_mecanicien' => 'nullable',
            'clientID' => 'required',
            'notes_client' => 'nullable',
            'mecanicienID' => 'required|exists:mecaniciens,id',
            'vehiculeID' => 'required|exists:vehicules,id',
        ]);

        $rendezVous = RendezVou::where('clientID', $validatedData['clientID'])
            ->where('mecanicienID', $validatedData['mecanicienID'])
            ->first();
        $rendezVous->update([
            'statut' => 'Confirmé' ,
        ]);

        Reparation::create($validatedData);


    }

}
