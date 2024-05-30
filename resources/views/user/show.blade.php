@extends('layouts.admin')

@section('content')
<h1>User Details</h1>
<p>Name: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Role: {{ $user->role }}</p>
<a href="{{ route('admin.users.edit', $user) }}">Edit</a>
<form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
@endsection
