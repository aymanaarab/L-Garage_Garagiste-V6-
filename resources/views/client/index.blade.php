@extends('layouts.admin')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Clients') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Client List</h3>
                        <a href="{{ route('admin.clients.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add
                            Client</a>
                    </div>
                    <div class="overflow-x-auto">
                        <div class="py-12">
                            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <div class="overflow-x-auto">
                                            <table class="w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>

                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            N </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            First Name
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Last Name
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Address
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Telephone
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            User ID
                                                        </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Vehicules </th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @foreach ($clients as $client)
                                                        <tr>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ $client->id }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ $client->firstname }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ $client->lastname }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ $client->adresse }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ $client->tel }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ $client->userId }}
                                                            </td>
                                                            <td>
                                                                <ul>

                                                                    @foreach ($client->vehicules as $vehicule)
                                                                        <li>
                                                                            {{ $vehicule->marque }} </li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                                <a href="{{ route('admin.clients.show', $client->id) }}"
                                                                    class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                                                                <a href="{{ route('admin.clients.edit', $client->id) }}"
                                                                    class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                                                                <form
                                                                    action="{{ route('admin.clients.destroy', $client->id) }}"
                                                                    method="POST" class="inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="text-red-600 hover:text-red-900">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>
@endsection
