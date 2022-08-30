@extends('layouts.dashboard')

@section('title', 'Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('main')

    @can('create', App\Models\Category::class)
    <div class="mb-5">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-primary">New</a>
    </div>
    @endcan

    @if($success)
    <div class="alert alert-success">
        {{ $success }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th></th>
                <th>Name</th>
                <th>Posts #</th>
                <th>Status</th>
                <th>Created At</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                    <img src="{{ $category->image_url }}" height="60">
                </td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->posts_count }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    @can('update', $category)
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                    @endcan
                </td>
                <td>
                    @can('delete', $category)
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}

@endsection
