<?php

namespace App\Http\Controllers;

use App\Models\PieceRechange;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PieceRechangeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PieceRechangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pieceRechanges = PieceRechange::paginate();

        return view('piece-rechange.index', compact('pieceRechanges'))
            ->with('i', ($request->input('page', 1) - 1) * $pieceRechanges->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pieceRechange = new PieceRechange();

        return view('piece-rechange.create', compact('pieceRechange'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PieceRechangeRequest $request): RedirectResponse
    {
        PieceRechange::create($request->validated());

        return Redirect::route('admin.piece-rechanges.index')
            ->with('success', 'PieceRechange created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pieceRechange = PieceRechange::find($id);

        return view('piece-rechange.show', compact('pieceRechange'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pieceRechange = PieceRechange::find($id);

        return view('piece-rechange.edit', compact('pieceRechange'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PieceRechangeRequest $request, PieceRechange $pieceRechange): RedirectResponse
    {
        $pieceRechange->update($request->validated());

        return Redirect::route('admin.piece-rechanges.index')
            ->with('success', 'PieceRechange updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PieceRechange::find($id)->delete();

        return Redirect::route('admin.piece-rechanges.index')
            ->with('success', 'PieceRechange deleted successfully');
    }
}
