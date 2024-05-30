<div class="space-y-6">

    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $user?->email)" autocomplete="email" placeholder="Email"/>
        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
    </div>
    <div>
        <x-input-label for="role" :value="__('Role')"/>
        <x-text-input id="role" name="role" type="text" class="mt-1 block w-full" :value="old('role', $user?->role)" autocomplete="role" placeholder="Role"/>
        <x-input-error class="mt-2" :messages="$errors->get('role')"/>
    </div>

    <div class="flex items-center gap-4">
        <button class="bg-blue-500 p-4 rounded">Submit</button>
    </div>
</div>
