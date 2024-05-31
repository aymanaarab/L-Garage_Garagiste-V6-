<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ReparationRequest;
use App\Models\Mecanicien;
use App\Models\Vehicule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReparationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $reparations = Reparation::paginate();

        return view('reparation.index', compact('reparations'))
            ->with('i', ($request->input('page', 1) - 1) * $reparations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $reparation = new Reparation();
        $mecaniciens = Mecanicien::all();
        $vehicules = Vehicule::all();


        return view('reparation.create', compact('reparation','mecaniciens', 'vehicules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'description' => 'required',
            'statut' => 'required|in:En attente,En cours,Terminée',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'notes_mecanicien' => 'nullable',
            'notes_client' => 'nullable',
            'mecanicienID' => 'required|exists:mecaniciens,id',
            'vehiculeID' => 'required|exists:vehicules,id',
        ]);

        Reparation::create($validatedData);
        return Redirect::route('admin.reparations.index')
            ->with('success', 'Reparation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $reparation = Reparation::find($id);

        return view('reparation.show', compact('reparation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $reparation = Reparation::find($id);
        $mecaniciens = Mecanicien::all();
        $vehicules = Vehicule::all();

        return view('reparation.edit', compact('reparation','mecaniciens', 'vehicules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reparation $reparation): RedirectResponse
    {
        $validatedData = $request->validate([
            'description' => 'required',
            'statut' => 'required|in:En attente,En cours,Terminée',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'notes_mecanicien' => 'nullable',
            'notes_client' => 'nullable',
            'mecanicienID' => 'required|exists:mecaniciens,id',
            'vehiculeID' => 'required|exists:vehicules,id',
        ]);

        $reparation->update($validatedData);

        return Redirect::route('admin.reparations.index')
            ->with('success', 'Reparation updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Reparation::find($id)->delete();

        return Redirect::route('admin.reparations.index')
            ->with('success', 'Reparation deleted successfully');
    }
}
