@extends('layouts.admin')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Mechanic') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($mechanic)
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                                <p id="firstname" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200">{{ $mechanic->firstname }}</p>
                            </div>
                            <div>
                                <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <p id="lastname" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200">{{ $mechanic->lastname }}</p>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <p id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200">{{ $mechanic->email }}</p>
                            </div>
                            <div>
                                <label for="adresse" class="block text-sm font-medium text-gray-700">Address</label>
                                <p id="adresse" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200">{{ $mechanic->adresse }}</p>
                            </div>
                            <div>
                                <label for="tel" class="block text-sm font-medium text-gray-700">Telephone</label>
                                <p id="tel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200">{{ $mechanic->tel }}</p>
                            </div>
                        </div>
                    @else
                        <p>Mechanic not found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
