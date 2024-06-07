<!-- resources/views/mechanic/reparations/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Éditer une fiche de réparation</h1>
    <form action="{{ route('mecanico.reparation.update', $reparation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ $reparation->description }}" required>
        </div>
        <div class="form-group">
            <label for="vehiculeID">Véhicule</label>
            <select name="vehiculeID" id="vehiculeID" class="form-control" required>
                @foreach($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}" {{ $vehicule->id == $reparation->vehiculeID ? 'selected' : '' }}>{{ $vehicule->marque }} - {{ $vehicule->modele }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="mecanicienID">Mécanicien</label>
            <select name="mecanicienID" id="mecanicienID" class="form-control" required>
                @foreach($mecaniciens as $mecanicien)
                    <option value="{{ $mecanicien->id }}" {{ $mecanicien->id == $reparation->mecanicienID ? 'selected' : '' }}>{{ $mecanicien->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="statut">Statut</label>
            <select name="statut" id="statut" class="form-control" required>
                <option value="en attente" {{ $reparation->statut == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="en cours" {{ $reparation->statut == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminée" {{ $reparation->statut == 'terminée' ? 'selected' : '' }}>Terminée</option>
            </select>
        </div>
        <div class="form-group">
            <label for="piecesRechange">Pièces de rechange</label>
            <select name="piecesRechange[]" id="piecesRechange" class="form-control" multiple>
                @foreach($piecesRechange as $piece)
                    <option value="{{ $piece->id }}" {{ $reparation->piecesDeRechange->contains($piece->id) ? 'selected' : '' }}>{{ $piece->nom_piece }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantites">Quantités</label>
            <input type="text" name="quantites" id="quantites" class="form-control" value="{{ implode(',', $reparation->piecesDeRechange->pluck('pivot.quantité')->toArray()) }}">
            <small class="form-text text-muted">Indiquez les quantités des pièces de rechange, séparées par des virgules.</small>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
