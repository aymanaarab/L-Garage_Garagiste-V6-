<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">
        First Name
    </label>
    <input type="text" name="firstname" id="firstname" value="{{ old('firstname', $client->firstname ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('firstname')
    <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="lastname">
        Last Name
    </label>
    <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $client->lastname ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('lastname')
    <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="adresse">
        Address
    </label>
    <input type="text" name="adresse" id="adresse" value="{{ old('adresse', $client->adresse ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('adresse')
    <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="tel">
        Telephone
    </label>
    <input type="text" name="tel" id="tel" value="{{ old('tel', $client->tel ?? '') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('tel')
    <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        Email
    </label>
    <input type="text" name="email" id="email" value="{{ old('tel', $client->email ?? '') }}"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('email')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
    </label>
    <input type="password" name="password" id="password"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
    @error('password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
        Confirm Password
    </label>
    <input type="password" name="password_confirmation" id="password_confirmation"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>

