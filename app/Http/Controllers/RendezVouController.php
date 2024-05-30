<?php

namespace App\Http\Controllers;

use App\Models\RendezVou;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RendezVouRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RendezVouController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $rendezVous = RendezVou::paginate();

        return view('rendez-vou.index', compact('rendezVous'))
            ->with('i', ($request->input('page', 1) - 1) * $rendezVous->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $rendezVou = new RendezVou();

        return view('rendez-vou.create', compact('rendezVou'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RendezVouRequest $request): RedirectResponse
    {
        RendezVou::create($request->validated());

        return Redirect::route('rendez-vous.index')
            ->with('success', 'RendezVou created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $rendezVou = RendezVou::find($id);

        return view('rendez-vou.show', compact('rendezVou'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $rendezVou = RendezVou::find($id);

        return view('rendez-vou.edit', compact('rendezVou'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RendezVouRequest $request, RendezVou $rendezVou): RedirectResponse
    {
        $rendezVou->update($request->validated());

        return Redirect::route('rendez-vous.index')
            ->with('success', 'RendezVou updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        RendezVou::find($id)->delete();

        return Redirect::route('rendez-vous.index')
            ->with('success', 'RendezVou deleted successfully');
    }
}
