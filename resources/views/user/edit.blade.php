@extends('layouts.admin')

@section('content')
<h1>Edit User</h1>
<form action="{{ route('admin.users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}">
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation">
    </div>
    <div>
        <label>Role</label>
        <input type="text" name="role" value="{{ old('role', $user->role) }}">
    </div>
    <button type="submit">Update</button>
</form>
@endsection
