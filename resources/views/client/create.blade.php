@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Create Client</h1>
        <form action="{{ route('admin.clients.store') }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <table class="w-full">
                <tbody>
                    <tr>
                        <td class="px-4 py-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">
                                First Name
                            </label>
                            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('firstname')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="px-4 py-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="lastname">
                                Last Name
                            </label>
                            <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('lastname')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="adresse">
                                Address
                            </label>
                            <input type="text" name="adresse" id="adresse" value="{{ old('adresse') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('adresse')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="px-4 py-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tel">
                                Telephone
                            </label>
                            <input type="text" name="tel" id="tel" value="{{ old('tel') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('tel')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </td>


                    </tr>
                    <tr>
                        <td class="px-4 py-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </td>
                        <td class="px-4 py-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Password
                            </label>
                            <input type="text" name="password" id="password" value="{{ old('password') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                                Confirm Password
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="flex items-center justify-center mt-6">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create
                </button>
            </div>
        </form>
    </div>
@endsection
