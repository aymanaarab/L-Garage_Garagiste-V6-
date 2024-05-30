<div class="space-y-6">

    <div>
        <x-input-label for="description" :value="__('Description')"/>
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $reparation?->description)" autocomplete="description" placeholder="Description"/>
        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
    </div>
    <div>
        <x-input-label for="statut" :value="__('Statut')"/>
        <x-text-input id="statut" name="statut" type="text" class="mt-1 block w-full" :value="old('statut', $reparation?->statut)" autocomplete="statut" placeholder="Statut"/>
        <x-input-error class="mt-2" :messages="$errors->get('statut')"/>
    </div>
    <div>
        <x-input-label for="date_debut" :value="__('Date Debut')"/>
        <x-text-input id="date_debut" name="date_debut" type="text" class="mt-1 block w-full" :value="old('date_debut', $reparation?->date_debut)" autocomplete="date_debut" placeholder="Date Debut"/>
        <x-input-error class="mt-2" :messages="$errors->get('date_debut')"/>
    </div>
    <div>
        <x-input-label for="date_fin" :value="__('Date Fin')"/>
        <x-text-input id="date_fin" name="date_fin" type="text" class="mt-1 block w-full" :value="old('date_fin', $reparation?->date_fin)" autocomplete="date_fin" placeholder="Date Fin"/>
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
        <x-input-label for="mecanicien_i_d" :value="__('Mecanicienid')"/>
        <x-text-input id="mecanicien_i_d" name="mecanicienID" type="text" class="mt-1 block w-full" :value="old('mecanicienID', $reparation?->mecanicienID)" autocomplete="mecanicienID" placeholder="Mecanicienid"/>
        <x-input-error class="mt-2" :messages="$errors->get('mecanicienID')"/>
    </div>
    <div>
        <x-input-label for="vehicule_i_d" :value="__('Vehiculeid')"/>
        <x-text-input id="vehicule_i_d" name="vehiculeID" type="text" class="mt-1 block w-full" :value="old('vehiculeID', $reparation?->vehiculeID)" autocomplete="vehiculeID" placeholder="Vehiculeid"/>
        <x-input-error class="mt-2" :messages="$errors->get('vehiculeID')"/>
    </div>

    <div class="flex items-center gap-4">
        <button>Submit</button>
    </div>
</div>
