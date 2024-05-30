<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }} Vehicule
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Create') }} Vehicule</h1>
                            <p class="mt-2 text-sm text-gray-700">Add a new {{ __('Vehicule') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('admin.vehicules.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="max-w-xl py-2 align-middle">
                                <form method="POST" action="{{ route('vehicules.store') }}"  role="form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="space-y-6">

                                        <div>
                                            <x-input-label for="marque" :value="__('Marque')"/>
                                            <x-text-input id="marque" name="marque" type="text" class="mt-1 block w-full" :value="old('marque', $vehicule?->marque)" autocomplete="marque" placeholder="Marque"/>
                                            {{-- <x-input-error class="mt-2" :messages="$errors->get('marque')"/> --}}
                                        </div>
                                        <div>
                                            <x-input-label for="modèle" :value="__('Modèle')"/>
                                            <x-text-input id="modèle" name="modèle" type="text" class="mt-1 block w-full" :value="old('modèle', $vehicule?->modèle)" autocomplete="modèle" placeholder="Modèle"/>
                                            {{-- <x-input-error class="mt-2" :messages="$errors->get('modèle')"/> --}}
                                        </div>
                                        <div>
                                            <x-input-label for="type_carburant" :value="__('Type Carburant')"/>
                                            <x-text-input id="type_carburant" name="type_carburant" type="text" class="mt-1 block w-full" :value="old('type_carburant', $vehicule?->type_carburant)" autocomplete="type_carburant" placeholder="Type Carburant"/>
                                            {{-- <x-input-error class="mt-2" :messages="$errors->get('type_carburant')"/> --}}
                                        </div>
                                        <div>
                                            <x-input-label for="immatriculation" :value="__('Immatriculation')"/>
                                            <x-text-input id="immatriculation" name="immatriculation" type="text" class="mt-1 block w-full" :value="old('immatriculation', $vehicule?->immatriculation)" autocomplete="immatriculation" placeholder="Immatriculation"/>
                                            {{-- <x-input-error class="mt-2" :messages="$errors->get('immatriculation')"/> --}}
                                        </div>
                                        <div>
                                            <x-input-label for="photos" :value="__('Photos')"/>
                                            <x-text-input id="photos" name="photos" type="text" class="mt-1 block w-full" :value="old('photos', $vehicule?->photos)" autocomplete="photos" placeholder="Photos"/>
                                            {{-- <x-input-error class="mt-2" :messages="$errors->get('photos')"/> --}}
                                        </div>
                                        <div>
                                            <x-input-label for="client_i_d" :value="__('Clientid')"/>
                                            <x-text-input id="client_i_d" name="clientID" type="text" class="mt-1 block w-full" :value="old('clientID', $vehicule?->clientID)" autocomplete="clientID" placeholder="Clientid"/>
                                            {{-- <x-input-error class="mt-2" :messages="$errors->get('clientID')"/> --}}
                                        </div>

                                        <div class="flex items-center gap-4">
                                            <button class="bg-blue-400 rounded">Submit</button>
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
