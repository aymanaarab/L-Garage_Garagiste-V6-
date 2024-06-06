@extends('mecanico.test')

@section('content')
    <div class="overflow-x-auto">
        <h1>Liste des Réparations</h1>
        <a href="{{ route('mecanico.reparation.create') }}" class="btn btn-primary">Créer une nouvelle réparation</a>
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">ID</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Description</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Statut</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date de début</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date de fin</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Actions</th>
                    <th class="px-4 py-2"></th>

                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($reparations as $reparation)
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $reparation->id }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $reparation->description }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $reparation->statut }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $reparation->date_debut }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $reparation->date_fin }}</td>
                        <td class="whitespace-nowrap px-4 py-2">
                            <a href="{{ route('mecanico.reparation.edit', $reparation) }}"
                                class="select-none rounded-lg border border-gray-900 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
