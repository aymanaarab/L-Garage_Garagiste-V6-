@extends('layouts.admin')
@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        {{ __('Reparations Management') }}
    </h2>
</x-slot>

<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-xl font-semibold text-gray-900">{{ __('Reparations List') }}</h1>
                    <p class="text-sm text-gray-600 mt-1">Here you can manage all the reparations.</p>
                </div>
                <div>
                    <a href="{{ route('admin.reparations.create') }}" class="inline-block bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded hover:bg-indigo-500">Add New</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mechanic Notes</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client Notes</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mechanic ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehicle ID</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($reparations as $reparation)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ ++$i }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->statut }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->date_debut }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->date_fin }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->notes_mecanicien }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->notes_client }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->mecanicienID }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->vehiculeID }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form action="{{ route('admin.reparations.destroy', $reparation->id) }}" method="POST">
                                        <a href="{{ route('admin.reparations.show', $reparation->id) }}" class="text-blue-600 hover:text-blue-900">Show</a>
                                        <a href="{{ route('admin.reparations.edit', $reparation->id) }}" class="ml-4 text-yellow-600 hover:text-yellow-900">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.reparations.destroy', $reparation->id) }}" class="ml-4 text-red-600 hover:text-red-900" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this?')) this.closest('form').submit();">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $reparations->withQueryString()->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
