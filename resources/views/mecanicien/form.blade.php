<div class="space-y-6">
    
    <div>
        <x-input-label for="firstname" :value="__('Firstname')"/>
        <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $mecanicien?->firstname)" autocomplete="firstname" placeholder="Firstname"/>
        <x-input-error class="mt-2" :messages="$errors->get('firstname')"/>
    </div>
    <div>
        <x-input-label for="lastname" :value="__('Lastname')"/>
        <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $mecanicien?->lastname)" autocomplete="lastname" placeholder="Lastname"/>
        <x-input-error class="mt-2" :messages="$errors->get('lastname')"/>
    </div>
    <div>
        <x-input-label for="adresse" :value="__('Adresse')"/>
        <x-text-input id="adresse" name="adresse" type="text" class="mt-1 block w-full" :value="old('adresse', $mecanicien?->adresse)" autocomplete="adresse" placeholder="Adresse"/>
        <x-input-error class="mt-2" :messages="$errors->get('adresse')"/>
    </div>
    <div>
        <x-input-label for="tel" :value="__('Tel')"/>
        <x-text-input id="tel" name="tel" type="text" class="mt-1 block w-full" :value="old('tel', $mecanicien?->tel)" autocomplete="tel" placeholder="Tel"/>
        <x-input-error class="mt-2" :messages="$errors->get('tel')"/>
    </div>
    <div>
        <x-input-label for="user_id" :value="__('Userid')"/>
        <x-text-input id="user_id" name="userId" type="text" class="mt-1 block w-full" :value="old('userId', $mecanicien?->userId)" autocomplete="userId" placeholder="Userid"/>
        <x-input-error class="mt-2" :messages="$errors->get('userId')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>