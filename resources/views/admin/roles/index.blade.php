@extends('layouts.dashboard')

@section('title', __('Permission Roles'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Permission Roles') }}</li>
@endsection

@section('main')

<div class="mb-4">
    <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-outline-primary">{{ __('Create') }}</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>{{ __('Role') }}</th>
            <th>{{ __('Users #') }}</th>
            <th>{{ __('Permissions #') }}</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>{{ $role->users_count }}</td>
            <td>{{ count($role->permissions) }}</td>
            <td><a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-outline-dark">{{ __('Edit') }}</a></td>
            <td>
                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('Delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $roles->links() }}

@endsection