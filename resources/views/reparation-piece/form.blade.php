<div class="space-y-6">
    
    <div>
        <x-input-label for="reparation_i_d" :value="__('Reparationid')"/>
        <x-text-input id="reparation_i_d" name="reparationID" type="text" class="mt-1 block w-full" :value="old('reparationID', $reparationPiece?->reparationID)" autocomplete="reparationID" placeholder="Reparationid"/>
        <x-input-error class="mt-2" :messages="$errors->get('reparationID')"/>
    </div>
    <div>
        <x-input-label for="piece_de_rechange_i_d" :value="__('Piece De Rechangeid')"/>
        <x-text-input id="piece_de_rechange_i_d" name="piece_de_rechangeID" type="text" class="mt-1 block w-full" :value="old('piece_de_rechangeID', $reparationPiece?->piece_de_rechangeID)" autocomplete="piece_de_rechangeID" placeholder="Piece De Rechangeid"/>
        <x-input-error class="mt-2" :messages="$errors->get('piece_de_rechangeID')"/>
    </div>
    <div>
        <x-input-label for="quantité" :value="__('Quantité')"/>
        <x-text-input id="quantité" name="quantité" type="text" class="mt-1 block w-full" :value="old('quantité', $reparationPiece?->quantité)" autocomplete="quantité" placeholder="Quantité"/>
        <x-input-error class="mt-2" :messages="$errors->get('quantité')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>