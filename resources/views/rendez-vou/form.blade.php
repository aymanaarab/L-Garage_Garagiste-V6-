

<div class="space-y-6">
    {{-- <div>
        <x-input-label for="client_i_d" :value="__('Clientid')"/>
        <x-text-input id="client_i_d" name="clientID" type="number" class="mt-1 block w-full" :value="old('clientID', $rendezVou?->clientID)" autocomplete="clientID" placeholder="Clientid"/>
        <x-input-error class="mt-2" :messages="$errors->get('clientID')"/>
    </div> --}}
    {{-- <div>
        <x-input-label for="vehicule_i_d" :value="__('Vehiculeid')"/>
        <x-text-input id="vehicule_i_d" name="vehiculeID" type="number" class="mt-1 block w-full" :value="old('vehiculeID', $rendezVou?->vehiculeID)" autocomplete="vehiculeID" placeholder="Vehiculeid"/>
        <x-input-error class="mt-2" :messages="$errors->get('vehiculeID')"/>
    </div> --}}
    <div>
        <x-input-label for="client_i_d" :value="__('Clientid')"/>
        <select id="client_i_d" name="clientID" class="mt-1 block w-full" :value="old('clientID', $rendezVou?->clientID)" autocomplete="clientID">
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ ($rendezVou?->clientID ?? old('clientID')) == $client->id ? 'selected' : '' }}>{{ $client->firstname }} {{ $client->lastname }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('clientId')"/>
    </div>
    <div>
        <x-input-label for="mecanic_i_d" :value="__('MecanicId')"/>
        <select id="mecanic_i_d" name="mecanicienId" class="mt-1 block w-full" :value="old('mecanicienId', $rendezVou?->mecanicienId)" autocomplete="mecanicienId">
            @foreach($mecanics as $mecanic)
                <option value="{{ $mecanic->id }}" {{ ($rendezVou?->mecanicienId ?? old('mecanicienId')) == $mecanic->id ? 'selected' : '' }}>{{ $mecanic->firstname }} {{ $mecanic->lastname }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('mecanicienId')"/>
    </div>

    <div>
        <x-input-label for="date_rendez_vous" :value="__('Date Rendez Vous')"/>
        <x-text-input id="date_rendez_vous" name="date_rendez_vous" type="date" class="mt-1 block w-full" :value="old('date_rendez_vous', $rendezVou?->date_rendez_vous)" autocomplete="date_rendez_vous" placeholder="Date Rendez Vous"/>
        <x-input-error class="mt-2" :messages="$errors->get('date_rendez_vous')"/>
    </div>
    <div>
        <x-input-label for="heure_rendez_vous" :value="__('Heure Rendez Vous')"/>
        <x-text-input id="heure_rendez_vous" name="heure_rendez_vous" type="time" class="mt-1 block w-full" :value="old('heure_rendez_vous', $rendezVou?->heure_rendez_vous)" autocomplete="heure_rendez_vous" placeholder="Heure Rendez Vous"/>
        <x-input-error class="mt-2" :messages="$errors->get('heure_rendez_vous')"/>
    </div>
    <div>
        <x-input-label for="statut" :value="__('Statut')"/>
        <select id="statut" name="statut" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" :value="old('statut', $rendezVou?->statut)" autocomplete="statut">
            <option value="Demandé">Demandé</option>
            <option value="Confirmé">Confirmé</option>
            <option value="Terminé">Terminé</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('statut')"/>
    </div>
    <div>
        <x-input-label for="etat_vehicule" :value="__('Etat Vehicule')"/>
        <textarea id="etat_vehicule" name="etat_vehicule" class="mt-1 block w-full" :value="old('etat_vehicule', $rendezVou?->etat_vehicule)" autocomplete="etat_vehicule" placeholder="Etat Vehicule"></textarea>
        <x-input-error class="mt-2" :messages="$errors->get('etat_vehicule')"/>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="block rounded-md bg-gradient-to-r from-blue-300 to-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    </div>
</div>
