<?php

namespace App\Http\Controllers;

use App\Models\Mecanicien;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MecanicienRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MecanicienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $mecaniciens = Mecanicien::paginate();

        return view('mecanicien.index', compact('mecaniciens'))
            ->with('i', ($request->input('page', 1) - 1) * $mecaniciens->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $mecanicien = new Mecanicien();

        return view('mecanicien.create', compact('mecanicien'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MecanicienRequest $request): RedirectResponse
    {
        Mecanicien::create($request->validated());

        return Redirect::route('mecaniciens.index')
            ->with('success', 'Mecanicien created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $mecanicien = Mecanicien::find($id);

        return view('mecanicien.show', compact('mecanicien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $mecanicien = Mecanicien::find($id);

        return view('mecanicien.edit', compact('mecanicien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MecanicienRequest $request, Mecanicien $mecanicien): RedirectResponse
    {
        $mecanicien->update($request->validated());

        return Redirect::route('mecaniciens.index')
            ->with('success', 'Mecanicien updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Mecanicien::find($id)->delete();

        return Redirect::route('mecaniciens.index')
            ->with('success', 'Mecanicien deleted successfully');
    }
}
