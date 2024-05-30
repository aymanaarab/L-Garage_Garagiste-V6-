@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Client Details</h1>
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <p><strong>First Name:</strong> {{ $client->firstname }}</p>
        <p><strong>Last Name:</strong> {{ $client->lastname }}</p>
        <p><strong>Address:</strong> {{ $client->adresse }}</p>
        <p><strong>Telephone:</strong> {{ $client->tel }}</p>
        <p><strong>User ID:</strong> {{ $client->userId }}</p>
        <a href="{{ route('admin.clients.index') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 mt-4">Back to List</a>
    </div>
</div>
@endsection
