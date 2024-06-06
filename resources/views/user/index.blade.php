@extends('layouts.admin')
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="sm:flex sm:items-center sm:justify-between">
                            <div class="sm:flex sm:items-center space-x-4">
                                <form action="{{ route('admin.users.import') }}" method="POST" enctype="multipart/form-data"
                                    class="flex items-center space-x-4">
                                    @csrf
                                    <div class="flex items-center justify-center">

                                        <label for="file-upload"
                                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md cursor-pointer hover:bg-blue-600 transition duration-300 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-5 h-5">

                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z">
                                                </path>

                                            </svg> </label>
                                        <input id="file-upload" type="file" class="hidden" />
                                    </div>


                                </form>
                                <a class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:ring focus:ring-yellow-300 active:bg-yellow-600 disabled:opacity-25 transition"
                                    href="{{ route('admin.users.export') }}">
                                    Export User Data
                                </a>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:flex-none">
                                <a href="{{ route('admin.users.create') }}"
                                    class="block rounded-md bg-blue-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Add new
                                </a>
                            </div>
                        </div>

                        <div class="flow-root mt-8">
                            <div class="overflow-x-auto">
                                <div class="inline-block min-w-full py-2 align-middle">
                                    <table class="w-full divide-y divide-gray-300">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    No</th>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Name</th>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Email</th>
                                                <th scope="col"
                                                    class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Role</th>
                                                <th scope="col"
                                                    class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @foreach ($users as $user)
                                                <tr class="even:bg-gray-50">
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{ $user->id }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{ $user->name }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{ $user->email }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{ $user->role }}</td>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                            method="POST">
                                                            <a href="{{ route('admin.users.show', $user->id) }}"
                                                                class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                                class="text-indigo-600 font-bold hover:text-indigo-900 mr-2">{{ __('Edit') }}</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('admin.users.destroy', $user->id) }}"
                                                                class="text-red-600 font-bold hover:text-red-900"
                                                                onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>

                                                        </form>



                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>



















                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
