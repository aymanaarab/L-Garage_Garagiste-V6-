<div class="space-y-6">




    <div>
        <x-input-label for="reparation_i_d" :value="__('Reparationid')" />

        <select id="reparation_i_d" name="reparationID" class="mt-1 block w-full"
            :value="old('reparationID', $reparationPiece ?-> reparationID)" autocomplete="reparationID"
            placeholder="Reparationid">
            @foreach ($reparations as $reparation)
                <option value="{{ $reparation->id }}"
                    {{ ($reparationPiece?->reparationID ?? old('reparationID ')) == $reparation->id ? 'selected' : '' }}>
                    {{ $reparation->description }} </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('reparationID ')" />
    </div>


    <div>
        <x-input-label for="SpartID" :value="__('Piece De Rechangeid')" />

        <select id="SpartID" id="Spart_I_D" name="SpartID" class="mt-1 block w-full"
            :value="old('SpartID', $reparationPiece ? - > SpartID)"
            autocomplete="SpartID" placeholder="Piece De Rechangeid">
            @foreach ($pieces as $piece)
                <option value="{{ $piece->id }}"
                    {{ ($reparationPiece?->SpartID ?? old('SpartID ')) == $piece->id ? 'selected' : '' }}>
                    {{ $piece->nom_piece }} </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('SpartID ')" />
    </div>
    <div>
        <x-input-label for="quantité" :value="__('Quantité')" />
        <x-text-input id="quantité" name="quantité" type="number" class="mt-1 block w-full" :value="old('quantité', $reparationPiece?->quantité)"
            autocomplete="quantité" placeholder="Quantité" />
        <x-input-error class="mt-2" :messages="$errors->get('quantité')" />
    </div>



    <div class="flex items-center gap-4">
        <button type="submit">Submit</button>
    </div>
</div>
