<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }} Client
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Create') }} Client</h1>
                            <p class="mt-2 text-sm text-gray-700">Add a new {{ __('Client') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('admin.clients.index') }}"
                                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="max-w-xl py-2 align-middle">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('admin.clients.store') }}" role="form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="space-y-6">
                                        <div>
                                            <x-input-label for="firstname" :value="__('Firstname')" />
                                            <x-text-input id="firstname" name="firstname" type="text"
                                                class="mt-1 block w-full" :value="old('firstname', $client?->firstname)" autocomplete="firstname"
                                                placeholder="Firstname" />
                                            <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
                                        </div>
                                        <div>
                                            <x-input-label for="lastname" :value="__('Lastname')" />
                                            <x-text-input id="lastname" name="lastname" type="text"
                                                class="mt-1 block w-full" :value="old('lastname', $client?->lastname)" autocomplete="lastname"
                                                placeholder="Lastname" />
                                            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                                        </div>
                                        <div>
                                            <x-input-label for="adresse" :value="__('Adresse')" />
                                            <x-text-input id="adresse" name="adresse" type="text"
                                                class="mt-1 block w-full" :value="old('adresse', $client?->adresse)" autocomplete="adresse"
                                                placeholder="Adresse" />
                                            <x-input-error class="mt-2" :messages="$errors->get('adresse')" />
                                        </div>
                                        <div>
                                            <x-input-label for="tel" :value="__('Tel')" />
                                            <x-text-input id="tel" name="tel" type="text"
                                                class="mt-1 block w-full" :value="old('tel', $client?->tel)" autocomplete="tel"
                                                placeholder="Tel" />
                                            <x-input-error class="mt-2" :messages="$errors->get('tel')" />
                                        </div>
                                        <div>
                                            <x-input-label for="user_id" :value="__('Userid')" />
                                            <x-text-input id="user_id" name="userId" type="text" class="mt-1 block w-full" :value="old('userId', $client?->userId)" autocomplete="userId" placeholder="Userid" />
                                            <x-input-error class="mt-2" :messages="$errors->get('userId')" />
                                        </div>

                                        <div class="flex items-center gap-4">
                                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
