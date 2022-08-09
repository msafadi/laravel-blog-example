@extends('layouts.dashboard')

@section('title', 'Edit Category')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('main')
<form action="{{ route('admin.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    
    @include('admin.categories._form')
</form>

@endsection