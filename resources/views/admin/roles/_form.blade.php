
<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">{{ __('Role Name') }}</label>
    <div class="col-sm-10">
        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" value="{{ old('name', $role->name) }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">{{ __('Permissions') }}</label>
    <div class="col-sm-10">

        @foreach(config('permissions') as $code => $label)
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="permissions[]" value="{{ $code }}" id="{{ $code }}" @checked( $role->hasPermission($code) )>
            <label class="custom-control-label" for="{{ $code }}">{{ $label }}</label>
        </div>
        @endforeach
        
        @error('permissions')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<button class="btn btn-primary" type="submit">{{ __('Save') }}</button>