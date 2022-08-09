@extends('layouts.dashboard')

@section('title', 'New Category')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active">New</li>
@endsection

@section('main')
<form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    
    @include('admin.categories._form')
</form>

@endsection