<div class="space-y-6">
    <div>
        <x-input-label for="marque" :value="__('Marque')" />
        <x-text-input id="marque" name="marque" type="text" class="mt-1 block w-full" :value="old('marque', $vehicule?->marque)"
            autocomplete="marque" placeholder="Marque" />
        <x-input-error class="mt-2" :messages="$errors->get('marque')" />
    </div>
    <div>
        <x-input-label for="modèle" :value="__('Modèle')" />
        <x-text-input id="modèle" name="modèle" type="text" class="mt-1 block w-full" :value="old('modèle', $vehicule?->modèle)"
            autocomplete="modèle" placeholder="Modèle" />
        <x-input-error class="mt-2" :messages="$errors->get('modèle')" />
    </div>
    <div>
        <x-input-label for="type_carburant" :value="__('Type Carburant')" />
        <x-text-input id="type_carburant" name="type_carburant" type="text" class="mt-1 block w-full"
            :value="old('type_carburant', $vehicule?->type_carburant)" autocomplete="type_carburant" placeholder="Type Carburant" />
        <x-input-error class="mt-2" :messages="$errors->get('type_carburant')" />
    </div>
    <div>
        <x-input-label for="immatriculation" :value="__('Immatriculation')" />
        <x-text-input id="immatriculation" name="immatriculation" type="text" class="mt-1 block w-full"
            :value="old('immatriculation', $vehicule?->immatriculation)" autocomplete="immatriculation" placeholder="Immatriculation" />
        <x-input-error class="mt-2" :messages="$errors->get('immatriculation')" />
    </div>
    <div>
        <x-input-label for="photo" :value="__('Photo')" />
        <x-text-input id="photo" name="photo" type="file" class="mt-1 block w-full" :value="old('photo', $vehicule?->photo)"
            autocomplete="photo" placeholder="Photo" />
        <x-input-error class="mt-2" :messages="$errors->get('photo')" />
    </div>

    <div>
        <x-input-label for="client_i_d" :value="__('Clientid')" />
        <select id="client_i_d" name="clientID" class="mt-1 block w-full"
            :value="old('clientID', $vehicule?-> clientID)" autocomplete="clientID">
            @foreach ($clients as $client)
                <option value="{{ $client->id }}"
                    {{ ($vehicule?->clientID ?? old('clientID')) == $vehicule->id ? 'selected' : '' }}>
                    {{ $client->firstname }} {{ $client->lastname }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('clientId')" />
    </div>

    <div class="flex items-center gap-4">
        <button
            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            type="submit">Submit</button>
    </div>
</div>
