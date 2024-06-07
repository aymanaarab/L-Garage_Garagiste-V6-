@extends('layouts.admin')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Vehicules') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Vehicules') }}</h1>
                                <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Vehicules') }}.</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a type="button" href="{{ route('admin.vehicules.create') }}"
                                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                                    new</a>
                            </div>
                        </div>

                        <div class="flow-root">
                            <div class="mt-8 overflow-x-auto">
                                <div class="inline-block min-w-full py-2 align-middle">
                                    <table class="w-full divide-y divide-gray-300">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    No</th>

                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Marque</th>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Modèle</th>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Type Carburant</th>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Immatriculation</th>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Photo</th>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    ClientName</th>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Actions</th>

                                                <th scope="col"
                                                    class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @foreach ($vehicules as $vehicule)
                                                <tr class="even:bg-gray-50">
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">
                                                        {{ ++$i }}</td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{ $vehicule->marque }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{ $vehicule->modèle }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{ $vehicule->type_carburant }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{ $vehicule->immatriculation }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        @if ($vehicule->photo)
                                                            {{-- <img src="{{ asset('storage/' . $vehicule->photo) }}" alt="Photo of {{ $vehicule->marque }}" style="width: 100px; height: auto;"> --}}
                                                            <div>
                                                                <div class="relative flex flex-col h-64 overflow-hidden text-gray-700 transition-opacity bg-white shadow-md cursor-pointer w-96 rounded-xl bg-clip-border hover:opacity-90"
                                                                    data-dialog-target="image-dialog">
                                                                    <img class="object-cover object-center w-full h-full"
                                                                        src="{{ asset('storage/' . $vehicule->photo) }}"
                                                                        alt="Photo of {{ $vehicule->marque }}" />
                                                                </div>
                                                                <div data-dialog-backdrop="image-dialog"
                                                                    data-dialog-backdrop-close="true"
                                                                    class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
                                                                    <div class="relative m-4 w-3/4 min-w-[75%] max-w-[75%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl"
                                                                        role="dialog" data-dialog="image-dialog">
                                                                        <div
                                                                            class="flex items-center justify-between p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
                                                                            <div class="flex items-center gap-3">
                                                                                <img src="{{ asset('storage/' . $vehicule->photo) }}"
                                                                                    alt="Photo of {{ $vehicule->marque }}"
                                                                                    class="relative inline-block object-cover object-center rounded-full h-9 w-9" />
                                                                                <div class="flex flex-col -mt-px">
                                                                                    <p
                                                                                        class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                                                                        {{ $vehicule->marque }} </p>
                                                                                    <p
                                                                                        class="block font-sans text-xs antialiased font-normal text-gray-700">
                                                                                        {{ $vehicule->model }} </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex items-center gap-2">
                                                                                <button
                                                                                    class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-blue-gray-500 transition-all hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                                                    type="button" data-ripple-dark="true">
                                                                                    <span
                                                                                        class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="currentColor"
                                                                                            aria-hidden="true"
                                                                                            class="w-5 h-5">
                                                                                            <path
                                                                                                d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                                                                            </path>
                                                                                        </svg>
                                                                                    </span>
                                                                                </button>
                                                                                <button
                                                                                    class="select-none rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                                                    type="button" data-ripple-light="true">
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="relative p-0 font-sans text-base antialiased font-light leading-relaxed border-t border-b border-t-blue-gray-100 border-b-blue-gray-100 text-blue-gray-500">
                                                                            <img class="h-[48rem] w-full object-cover object-center"
                                                                                src="{{ asset('storage/' . $vehicule->photo) }}"
                                                                                alt="Photo of {{ $vehicule->marque }}" />
                                                                        </div>
                                                                        <div
                                                                            class="flex flex-wrap items-center justify-between p-4 shrink-0 text-blue-gray-500">
                                                                            <div class="flex items-center gap-16">
                                                                                <div>
                                                                                    <p
                                                                                        class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700">
                                                                                    </p>
                                                                                    <p
                                                                                        class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                                                                    </p>
                                                                                </div>
                                                                                <div>
                                                                                    <p
                                                                                        class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700">
                                                                                    </p>
                                                                                    <p
                                                                                        class="block font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <button
                                                                                class="flex select-none items-center gap-3 rounded-lg border border-blue-gray-500 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-blue-gray-500 transition-all hover:opacity-75 focus:ring focus:ring-blue-gray-200 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                                                type="button" data-ripple-dark="true">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 24 24" fill="currentColor"
                                                                                    aria-hidden="true" class="w-4 h-4">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M15.75 4.5a3 3 0 11.825 2.066l-8.421 4.679a3.002 3.002 0 010 1.51l8.421 4.679a3 3 0 11-.729 1.31l-8.421-4.678a3 3 0 110-4.132l8.421-4.679a3 3 0 01-.096-.755z"
                                                                                        clip-rule="evenodd"></path>
                                                                                </svg>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            No photo available
                                                        @endif
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{ $vehicule->client->firstname }}
                                                        {{ $vehicule->client->lastname }}</td>

                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                        <form
                                                            action="{{ route('admin.vehicules.destroy', $vehicule->id) }}"
                                                            method="POST">
                                                            <a href="{{ route('admin.vehicules.show', $vehicule->id) }}"
                                                                class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                            <a href="{{ route('admin.vehicules.edit', $vehicule->id) }}"
                                                                class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('admin.vehicules.destroy', $vehicule->id) }}"
                                                                class="text-red-600 font-bold hover:text-red-900"
                                                                onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="mt-4 px-4">
                                        {!! $vehicules->withQueryString()->links() !!}
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
