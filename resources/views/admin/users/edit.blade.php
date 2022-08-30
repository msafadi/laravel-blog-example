@extends('layouts.dashboard')

@section('title', __('Permission Roles'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Permission Roles') }}</li>
    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
@endsection

@section('main')

<form action="{{ route('admin.users.update', $user->id) }}" method="post">
    @csrf
    @method('put')
    
    @include('admin.users._form')
</form>

@endsection