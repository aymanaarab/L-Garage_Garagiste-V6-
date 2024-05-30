<div class="space-y-6">

    <div>
        <x-input-label for="marque" :value="__('Marque')"/>
        <x-text-input id="marque" name="marque" type="text" class="mt-1 block w-full" :value="old('marque', $vehicule?->marque)" autocomplete="marque" placeholder="Marque"/>
        <x-input-error class="mt-2" :messages="$errors->get('marque')"/>
    </div>
    <div>
        <x-input-label for="modèle" :value="__('Modèle')"/>
        <x-text-input id="modèle" name="modèle" type="text" class="mt-1 block w-full" :value="old('modèle', $vehicule?->modèle)" autocomplete="modèle" placeholder="Modèle"/>
        <x-input-error class="mt-2" :messages="$errors->get('modèle')"/>
    </div>
    <div>
        <x-input-label for="type_carburant" :value="__('Type Carburant')"/>
        <x-text-input id="type_carburant" name="type_carburant" type="text" class="mt-1 block w-full" :value="old('type_carburant', $vehicule?->type_carburant)" autocomplete="type_carburant" placeholder="Type Carburant"/>
        <x-input-error class="mt-2" :messages="$errors->get('type_carburant')"/>
    </div>
    <div>
        <x-input-label for="immatriculation" :value="__('Immatriculation')"/>
        <x-text-input id="immatriculation" name="immatriculation" type="text" class="mt-1 block w-full" :value="old('immatriculation', $vehicule?->immatriculation)" autocomplete="immatriculation" placeholder="Immatriculation"/>
        <x-input-error class="mt-2" :messages="$errors->get('immatriculation')"/>
    </div>
    <div>
        <x-input-label for="photos" :value="__('Photos')"/>
        <x-text-input id="photos" name="photos" type="text" class="mt-1 block w-full" :value="old('photos', $vehicule?->photos)" autocomplete="photos" placeholder="Photos"/>
        <x-input-error class="mt-2" :messages="$errors->get('photos')"/>
    </div>
    <div>
        <x-input-label for="client_i_d" :value="__('Clientid')"/>
        <x-text-input id="client_i_d" name="clientID" type="text" class="mt-1 block w-full" :value="old('clientID', $vehicule?->clientID)" autocomplete="clientID" placeholder="Clientid"/>
        <x-input-error class="mt-2" :messages="$errors->get('clientID')"/>
    </div>

    <div class="flex items-center gap-4">
        <button>Submit</button>
    </div>
</div>
