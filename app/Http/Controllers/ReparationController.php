<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ReparationRequest;
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

        return view('reparation.create', compact('reparation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReparationRequest $request): RedirectResponse
    {
        Reparation::create($request->validated());

        return Redirect::route('reparations.index')
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

        return view('reparation.edit', compact('reparation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReparationRequest $request, Reparation $reparation): RedirectResponse
    {
        $reparation->update($request->validated());

        return Redirect::route('reparations.index')
            ->with('success', 'Reparation updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Reparation::find($id)->delete();

        return Redirect::route('reparations.index')
            ->with('success', 'Reparation deleted successfully');
    }
}
