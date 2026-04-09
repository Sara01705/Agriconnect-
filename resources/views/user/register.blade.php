@extends('layouts.app')

@section('content')

<h4>User Registration</h4>

<form method="POST" action="{{ route('user.register.submit') }}">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
<label>Phone Number</label>
<input type="text" name="phone" class="form-control" required>
</div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-success">Register</button>
    <a href="{{ route('user.login') }}" class="btn btn-secondary">Back to Login</a>
</form>

@endsection
