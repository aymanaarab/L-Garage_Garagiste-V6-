<div class="space-y-6">
    <div>
        <x-input-label for="description" :value="__('Description')"/>
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $reparation?->description)" autocomplete="description" placeholder="Description"/>
        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
    </div>
    <div>
        <x-input-label for="statut" :value="__('Statut')"/>
        <select id="statut" name="statut" class="mt-1 block w-full" :value="old('statut', $reparation?->statut)" autocomplete="statut">
            <option value="En attente" {{ ($reparation?->statut ?? old('statut')) == 'En attente' ? 'selected' : '' }}>En attente</option>
            <option value="En cours" {{ ($reparation?->statut ?? old('statut')) == 'En cours' ? 'selected' : '' }}>En cours</option>
            <option value="Terminée" {{ ($reparation?->statut ?? old('statut')) == 'Terminée' ? 'selected' : '' }}>Terminée</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('statut')"/>
    </div>
    <div>
        <x-input-label for="date_debut" :value="__('Date Debut')"/>
        <x-text-input id="date_debut" name="date_debut" type="date" class="mt-1 block w-full" :value="old('date_debut', $reparation?->date_debut)" autocomplete="date_debut" placeholder="Date Debut"/>
        <x-input-error class="mt-2" :messages="$errors->get('date_debut')"/>
    </div>
    <div>
        <x-input-label for="date_fin" :value="__('Date Fin')"/>
        <x-text-input id="date_fin" name="date_fin" type="date" class="mt-1 block w-full" :value="old('date_fin', $reparation?->date_fin)" autocomplete="date_fin" placeholder="Date Fin"/>
        <x-input-error class="mt-2" :messages="$errors->get('date_fin')"/>
    </div>
    <div>
        <x-input-label for="notes_mecanicien" :value="__('Notes Mecanicien')"/>
        <x-text-input id="notes_mecanicien" name="notes_mecanicien" type="text" class="mt-1 block w-full" :value="old('notes_mecanicien', $reparation?->notes_mecanicien)" autocomplete="notes_mecanicien" placeholder="Notes Mecanicien"/>
        <x-input-error class="mt-2" :messages="$errors->get('notes_mecanicien')"/>
    </div>
    <div>
        <x-input-label for="notes_client" :value="__('Notes Client')"/>
        <x-text-input id="notes_client" name="notes_client" type="text" class="mt-1 block w-full" :value="old('notes_client', $reparation?->notes_client)" autocomplete="notes_client" placeholder="Notes Client"/>
        <x-input-error class="mt-2" :messages="$errors->get('notes_client')"/>
    </div>
    <div>
        <x-input-label for="mecanicien_i_d" :value="__('Mecanicien')"/>
        <select id="mecanicien_i_d" name="mecanicienID" class="mt-1 block w-full" :value="old('mecanicienID', $reparation?->mecanicienID)" autocomplete="mecanicienID">
            @foreach($mecaniciens as $mecanicien)
                <option value="{{ $mecanicien->id }}" {{ ($reparation?->mecanicienID ?? old('mecanicienID')) == $mecanicien->id ? 'selected' : '' }}>
                    {{ $mecanicien->firstname }} {{ $mecanicien->lastname }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('mecanicienID')"/>
    </div>
    <div>
        <x-input-label for="vehicule_i_d" :value="__('Vehicule')"/>
        <select id="vehicule_i_d" name="vehiculeID" class="mt-1 block w-full" :value="old('vehiculeID', $reparation?->vehiculeID)" autocomplete="vehiculeID">
            @foreach($vehicules as $vehicule)
                <option value="{{ $vehicule->id }}" {{ ($reparation?->vehiculeID ?? old('vehiculeID')) == $vehicule->id ? 'selected' : '' }}>{{ $vehicule->marque }} {{ $vehicule->modele }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('vehiculeID')"/>
    </div>
    <div class="flex items-center gap-4">
        <button type="submit">Submit</button>
    </div>
</div>
