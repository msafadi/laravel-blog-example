<div class="form-group">
    <label for="title">Title</label>
    <input type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) id="title" name="title" value="{{ old('title', $post->title) }}">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="category_id">Category</label>
    <select @class(['form-control', 'is-invalid' => $errors->has('category_id')]) id="category_id" name="category_id">
        <option></option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected($category->id == old('category_id', $post->category_id))>{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="published_at">Publish Date</label>
    <input type="datetime-local" @class(['form-control', 'is-invalid' => $errors->has('published_at')]) id="published_at" name="published_at" value="{{ old('published_at', $post->published_at) }}">
    @error('published_at')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <div class="custom-control custom-switch">
        <input type="checkbox" name="featured" value="1" class="custom-control-input" id="featured" @checked(old('featured', $post->featured) == 1)>
        <label class="custom-control-label" for="featured">Featured post.</label>
    </div>
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea @class(['form-control', 'is-invalid' => $errors->has('content')]) id="content" name="content">{{ old('content', $post->content) }}</textarea>
    @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row mb-3">
    <label for="image" class="col-sm-2 col-form-label">Image</label>
    <div class="col-sm-10">
        <img src="{{ $post->image_url }}" height="150">
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
        <select class="form-select form-control @error('status') is-invalid @enderror" id="status" name="status">
            <option value="published" @selected(old('status', $post->status) == 'published')>Published</option>
            <option value="draft" @selected(old('status', $post->status) == 'draft')>Draft</option>
            <option value="private" @selected(old('status', $post->status) == 'private')>Private</option>
        </select>
        @error('status')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<button type="submit" class="btn btn-primary">Save</button>

<script src="{{ asset('js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>