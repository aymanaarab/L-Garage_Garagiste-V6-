<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FactureRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $factures = Facture::paginate();

        return view('facture.index', compact('factures'))
            ->with('i', ($request->input('page', 1) - 1) * $factures->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $facture = new Facture();

        return view('facture.create', compact('facture'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FactureRequest $request): RedirectResponse
    {
        Facture::create($request->validated());

        return Redirect::route('admin.factures.index')
            ->with('success', 'Facture created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $facture = Facture::find($id);

        return view('facture.show', compact('facture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $facture = Facture::find($id);

        return view('facture.edit', compact('facture'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FactureRequest $request, Facture $facture): RedirectResponse
    {
        $facture->update($request->validated());

        return Redirect::route('admin.factures.index')
            ->with('success', 'Facture updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Facture::find($id)->delete();

        return Redirect::route('admin.factures.index')
            ->with('success', 'Facture deleted successfully');
    }
}
