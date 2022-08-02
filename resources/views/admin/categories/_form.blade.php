<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
    </div>
</div>
<div class="row mb-3">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <textarea class="form-control" id="description" name="description">{{ $category->description }}</textarea>
    </div>
</div>
<div class="row mb-3">
    <label for="image" class="col-sm-2 col-form-label">Image</label>
    <div class="col-sm-10">
        <input type="file" class="form-control" id="image" name="image">
    </div>
</div>
<div class="row mb-3">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
        <select class="form-select form-control" id="status" name="status">
            <option value="public" @selected($category->status == 'public')>Public</option>
            <option value="archived" @selected($category->status == 'archived')>Archived</option>
            <option value="private" @selected($category->status == 'private')>Private</option>
        </select>
    </div>
</div>
<button type="submit" class="btn btn-primary">Save</button>