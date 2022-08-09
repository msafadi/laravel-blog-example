@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-10">
        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" value="{{ old('name', $category->name) }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $category->description) }}</textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="image" class="col-sm-2 col-form-label">Image</label>
    <div class="col-sm-10">
        <img src="{{ $category->image_url }}" height="150">
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
        <select class="form-select form-control  @error('status') is-invalid @enderror" id="status" name="status">
            <option value="public" @selected(old('status', $category->status) == 'public')>Public</option>
            <option value="archived" @selected(old('status', $category->status) == 'archived')>Archived</option>
            <option value="private" @selected(old('status', $category->status) == 'private')>Private</option>
        </select>
        @error('status')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<button type="submit" class="btn btn-primary">Save</button>