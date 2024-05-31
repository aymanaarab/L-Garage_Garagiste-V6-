<?php

namespace App\Http\Controllers;

use App\Models\ReparationPiece;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ReparationPieceRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReparationPieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $reparationPieces = ReparationPiece::paginate();

        return view('reparation-piece.index', compact('reparationPieces'))
            ->with('i', ($request->input('page', 1) - 1) * $reparationPieces->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $reparationPiece = new ReparationPiece();

        return view('reparation-piece.create', compact('reparationPiece'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReparationPieceRequest $request): RedirectResponse
    {
        ReparationPiece::create($request->validated());

        return Redirect::route('reparation-pieces.index')
            ->with('success', 'ReparationPiece created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $reparationPiece = ReparationPiece::find($id);

        return view('reparation-piece.show', compact('reparationPiece'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $reparationPiece = ReparationPiece::find($id);

        return view('reparation-piece.edit', compact('reparationPiece'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReparationPieceRequest $request, ReparationPiece $reparationPiece): RedirectResponse
    {
        $reparationPiece->update($request->validated());

        return Redirect::route('reparation-pieces.index')
            ->with('success', 'ReparationPiece updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ReparationPiece::find($id)->delete();

        return Redirect::route('reparation-pieces.index')
            ->with('success', 'ReparationPiece deleted successfully');
    }
}