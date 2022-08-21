@extends('layouts.dashboard')

@section('title', 'Edit User Profile')

@section('main')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.profile.update') }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="name" class="col-md-3">Name</label>
        <div class="col-md-9">
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" @class(['form-control', 'is-invalid' => $errors->has('name')])>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-3">Email</label>
        <div class="col-md-9">
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" @class(['form-control', 'is-invalid' => $errors->has('email')])>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-3">Password</label>
        <div class="col-md-9">
            <a href="{{ route('admin.password.edit') }}">Change password</a>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>

@endsection