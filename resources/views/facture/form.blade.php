<div class="space-y-6">

    <div>
        <x-input-label for="reparation_i_d" :value="__('Reparationid')"/>
        <x-text-input id="reparation_i_d" name="reparationID" type="text" class="mt-1 block w-full" :value="old('reparationID', $facture?->reparationID)" autocomplete="reparationID" placeholder="Reparationid"/>
        <x-input-error class="mt-2" :messages="$errors->get('reparationID')"/>
    </div>
    <div>
        <x-input-label for="charges_supplementaires" :value="__('Charges Supplementaires')"/>
        <x-text-input id="charges_supplementaires" name="charges_supplementaires" type="text" class="mt-1 block w-full" :value="old('charges_supplementaires', $facture?->charges_supplementaires)" autocomplete="charges_supplementaires" placeholder="Charges Supplementaires"/>
        <x-input-error class="mt-2" :messages="$errors->get('charges_supplementaires')"/>
    </div>
    <div>
        <x-input-label for="montant_total" :value="__('Montant Total')"/>
        <x-text-input id="montant_total" name="montant_total" type="text" class="mt-1 block w-full" :value="old('montant_total', $facture?->montant_total)" autocomplete="montant_total" placeholder="Montant Total"/>
        <x-input-error class="mt-2" :messages="$errors->get('montant_total')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-button>Submit</x-button>
    </div>
</div>
