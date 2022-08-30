@extends('layouts.dashboard')

@section('title', __('Permission Roles'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Permission Roles') }}</li>
    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
@endsection

@section('main')

<form action="{{ route('admin.roles.update', $role->id) }}" method="post">
    @csrf
    @method('put')
    
    @include('admin.roles._form')
</form>

@endsection