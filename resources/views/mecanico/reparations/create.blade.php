<!-- resources/views/mechanic/reparations/create.blade.php -->
@extends('mecanico.test')

@section('content')
<div class="container">
    <h1>Créer une fiche de réparation</h1>
    <form action="{{ route('mecanico.reparation.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="vehiculeID">Véhicule</label>
            <select name="vehiculeID" id="vehiculeID" class="form-control" required>
                @foreach($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}">{{ $vehicule->marque }} - {{ $vehicule->modele }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="mecanicienID">Mécanicien</label>
            <select name="mecanicienID" id="mecanicienID" class="form-control" required>
                @foreach($mecaniciens as $mecanicien)
                    <option value="{{ $mecanicien->id }}">{{ $mecanicien->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="piecesRechange">Pièces de rechange</label>
            <select name="piecesRechange[]" id="piecesRechange" class="form-control" multiple>
                @foreach($piecesRechange as $piece)
                    <option value="{{ $piece->id }}">{{ $piece->nom_piece }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantites">Quantités</label>
            <input type="text" name="quantites" id="quantites" class="form-control" placeholder="Ex: 1,2,1">
            <small class="form-text text-muted">Indiquez les quantités des pièces de rechange, séparées par des virgules.</small>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
