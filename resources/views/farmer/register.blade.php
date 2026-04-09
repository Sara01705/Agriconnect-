@extends('layouts.app')

@section('content')

<h4 class="mb-3">Farmer Registration</h4>

<form method="POST" action="{{ route('farmer.register.submit') }}">
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
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>District</label>
        <input type="text" name="district" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>State</label>
        <input type="text" name="state" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-success">Register</button>
    <a href="{{ route('farmer.login') }}" class="btn btn-secondary">Back to Login</a>
</form>

@endsection
