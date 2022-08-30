@extends('layouts.dashboard')

@section('title', 'Create Post')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">{{ __('Posts') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
@endsection

@section('main')

    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @include('admin.posts._form')
    </form>

@endsection