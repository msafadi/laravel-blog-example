@extends('layouts.dashboard')

@section('title', __('Users'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Users') }}</li>
@endsection

@section('main')

<div class="mb-4">
    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-primary">{{ __('Create') }}</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Type') }}</th>
            <th>{{ __('Role') }}</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->type }}</td>
            <td>{{ $user->role->name }}</td>
            <td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-dark">{{ __('Edit') }}</a></td>
            <td>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('Delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}

@endsection