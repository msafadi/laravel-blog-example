@extends('layouts.dashboard')

@section('title', 'Comments')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Comments</li>
@endsection

@section('main')

<table class="table">
    <thead>
        <tr>
            <th>Comment</th>
            <th>Author</th>
            <th>Post</th>
            <th>Status</th>
            <th>Created At</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment)
        <tr>
            <td>{{ $comment->body }}</td>
            <td>{{ $comment->name }}<br>{{ $comment->email }}</td>
            <td>{{ $comment->post_id }}</td>
            <td>{{ $comment->status }}</td>
            <td>{{ $comment->created_at }}</td>
            <td><a href="{{ route('admin.comments.edit', $comment->id) }}" class="btn btn-sm btn-outline-success">Edit</a></td>
            <td>
                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection