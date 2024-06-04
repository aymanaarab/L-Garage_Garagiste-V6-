@extends('layouts.admin')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reparations Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Reparations List') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">Here you can manage all the reparations.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('admin.reparations.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add New</a>
                        </div>
                    </div>

                    <div class="flow-root mt-8 overflow-x-auto">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <table class="w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">No</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Description</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Status</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Start Date</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">End Date</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Mechanic Notes</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Client Notes</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Mechanic Name & Vehicule Name</th>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Actions</th>
                                        <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($reparations as $reparation)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ ++$i }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->statut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->date_debut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->date_fin }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->notes_mecanicien }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reparation->notes_client }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $reparation->mecanicien->firstname }}  |  {{ $reparation->vehicule->marque }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route('admin.reparations.destroy', $reparation->id) }}" method="POST">
                                                <a href="{{ route('admin.reparations.show', $reparation->id) }}" class="text-blue-600 hover:text-blue-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM5.707 8.293a1 1 0 011.414 0L10 10.586l2.879-2.88a1 1 0 111.414 1.415L11.415 12l2.878 2.879a1 1 0 11-1.414 1.414L10 13.414l-2.879 2.879a1 1 0 01-1.414-1.414L8.586 12 5.707 9.121a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>

                                                <a href="{{ route('admin.reparations.edit', $reparation->id) }}" class="ml-4 text-yellow-600 hover:text-yellow-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h2.586a1 1 0 01.707.293l9 9a1 1 0 010 1.414l-2.586 2.586a1 1 0 01-1.414 0l-9-9A1 1 0 013 7.586V5z" clip-rule="evenodd" />
                                                        <path fill-rule="evenodd" d="M7.707 13.707a1 1 0 010-1.414L15.293 5H13a1 1 0 110-2h4a1 1 0 011 1v4a1 1 0 01-2 0V6.414l-8.293 8.293a1 1 0 01-1.414-1.414L16.586 4H18a1 1 0 110 2h-4a1 1 0 01-1-1V5a1 1 0 112 0v1.586z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>

                                                <form action="{{ route('admin.reparations.destroy', $reparation->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="ml-4 text-red-600 hover:text-red-900" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this?')) this.closest('form').submit();">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M5 6a1 1 0 011-1h8a1 1 0 011 1v10a1 1 0 01-1 1H6a1 1 0 01-1-1V6zm9-2H6a3 3 0 00-3 3v10a3 3 0 003 3h8a3 3 0 003-3V7a3 3 0 00-3-3zm-2 10a1 1 0 11-2 0 1 1 0 012 0zm-4 0a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </form>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="mt-4 px-4">
                                {!! $reparations->withQueryString()->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
