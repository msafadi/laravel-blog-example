@extends('layouts.dashboard')

@section('title', 'New Category')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active">New</li>
@endsection

@section('main')
<form action="{{ route('admin.categories.store') }}" method="post">
    @csrf
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="row mb-3">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <label for="status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <select class="form-select" id="status" name="status">
                <option value="public">Public</option>
                <option value="archived">Archived</option>
                <option value="private">Private</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection