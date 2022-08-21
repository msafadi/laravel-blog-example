@extends('layouts.dashboard')

@section('title', 'Edit User Profile')

@section('main')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.password.update') }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="current_password" class="col-md-3">Current Password</label>
        <div class="col-md-9">
            <input type="password" id="current_password" name="current_password" @class(['form-control', 'is-invalid' => $errors->has('current_password')])>
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-3">New Password</label>
        <div class="col-md-9">
            <input type="password" id="password" name="password" @class(['form-control', 'is-invalid' => $errors->has('password')])>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password_confirmation" class="col-md-3">Confirm New Password</label>
        <div class="col-md-9">
            <input type="password" id="password_confirmation" name="password_confirmation" @class(['form-control', 'is-invalid' => $errors->has('password_confirmation')])>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>

</form>

@endsection