@extends('layouts.dashboard')

@section('title', 'Edit Post')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('main')

    <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.posts._form')
    </form>

@endsection