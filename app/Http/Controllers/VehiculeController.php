<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vehicules = Vehicule::paginate();

        return view('vehicule.index', compact('vehicules'))
            ->with('i', ($request->input('page', 1) - 1) * $vehicules->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $vehicule = new Vehicule();

        return view('vehicule.create', compact('vehicule'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculeRequest $request): RedirectResponse
    {
        Vehicule::create($request->validated());

        return Redirect::route('vehicules.index')
            ->with('success', 'Vehicule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $vehicule = Vehicule::find($id);

        return view('vehicule.show', compact('vehicule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $vehicule = Vehicule::find($id);

        return view('vehicule.edit', compact('vehicule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculeRequest $request, Vehicule $vehicule): RedirectResponse
    {
        $vehicule->update($request->validated());

        return Redirect::route('vehicules.index')
            ->with('success', 'Vehicule updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Vehicule::find($id)->delete();

        return Redirect::route('vehicules.index')
            ->with('success', 'Vehicule deleted successfully');
    }
}
