@extends('layouts.dashboard')

@section('title', __('admin.Posts'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('admin.Posts') }}</li>
@endsection

@section('main')

<div class="mb-5">
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">{{ trans('admin.Create') }}</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>@lang('admin.ID')</th>
            <th></th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Category') }}</th>
            <th>{{ __('Comments #') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Published At') }}</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><img src="{{ $post->image_url }}" height="60"></td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>{{ $post->comments_count }}</td>
            <td>{{ $post->status }}</td>
            <td>{{ $post->published_at }}</td>
            <td><a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-outline-success">Edit</a></td>
            <td>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}

@endsection