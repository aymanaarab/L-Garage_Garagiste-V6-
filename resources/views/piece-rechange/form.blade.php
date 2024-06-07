<div class="space-y-6">

    <div>
        <x-input-label for="nom_piece" :value="__('Nom Piece')"/>
        <x-text-input id="nom_piece" name="nom_piece" type="text" class="mt-1 block w-full" :value="old('nom_piece', $pieceRechange?->nom_piece)" autocomplete="nom_piece" placeholder="Nom Piece"/>
        <x-input-error class="mt-2" :messages="$errors->get('nom_piece')"/>
    </div>
    <div>
        <x-input-label for="référence_piece" :value="__('Référence Piece')"/>
        <x-text-input id="référence_piece" name="référence_piece" type="text" class="mt-1 block w-full" :value="old('référence_piece', $pieceRechange?->référence_piece)" autocomplete="référence_piece" placeholder="Référence Piece"/>
        <x-input-error class="mt-2" :messages="$errors->get('référence_piece')"/>
    </div>
    <div>
        <x-input-label for="fournisseur" :value="__('Fournisseur')"/>
        <x-text-input id="fournisseur" name="fournisseur" type="text" class="mt-1 block w-full" :value="old('fournisseur', $pieceRechange?->fournisseur)" autocomplete="fournisseur" placeholder="Fournisseur"/>
        <x-input-error class="mt-2" :messages="$errors->get('fournisseur')"/>
    </div>
    <div>
        <x-input-label for="prix" :value="__('Prix')"/>
        <x-text-input id="prix" name="prix" type="number" class="mt-1 block w-full" :value="old('prix', $pieceRechange?->prix)" autocomplete="prix" placeholder="Prix"/>
        <x-input-error class="mt-2" :messages="$errors->get('prix')"/>
    </div>
    <div>
        <x-input-label for="stock" :value="__('Stock')"/>
        <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full" :value="old('stock', $pieceRechange?->stock)" autocomplete="stock" placeholder="Stock"/>
        <x-input-error class="mt-2" :messages="$errors->get('stock')"/>
    </div>

    <div class="flex items-center gap-4">
        <button>Submit</button>
    </div>
</div>
