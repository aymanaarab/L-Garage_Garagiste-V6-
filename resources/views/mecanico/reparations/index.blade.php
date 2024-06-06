@extends('mecanico.test')

@section('content')
<div class="container">
    <h1>Liste des Réparations</h1>
    <a href="{{ route('mecanico.reparation.create') }}" class="btn btn-primary">Créer une nouvelle réparation</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reparations as $reparation)
            <tr>
                <td>{{ $reparation->id }}</td>
                <td>{{ $reparation->description }}</td>
                <td>{{ $reparation->statut }}</td>
                <td>{{ $reparation->date_debut }}</td>
                <td>{{ $reparation->date_fin }}</td>
                <td>
                    <a href="{{ route('mecanico.reparation.edit', $reparation) }}" class="btn btn-warning">Éditer</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
