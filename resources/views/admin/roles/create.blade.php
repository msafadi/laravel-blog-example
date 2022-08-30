@extends('layouts.dashboard')

@section('title', __('Permission Roles'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Permission Roles') }}</li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
@endsection

@section('main')

<form action="{{ route('admin.roles.store') }}" method="post">
    @csrf

    @include('admin.roles._form')
</form>

@endsection