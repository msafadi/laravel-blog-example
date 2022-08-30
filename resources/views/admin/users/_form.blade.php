
<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">{{ __('Role Name') }}</label>
    <div class="col-sm-10">
        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" value="{{ old('name', $user->name) }}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">{{ __('Email') }}</label>
    <div class="col-sm-10">
        <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) id="email" name="email" value="{{ old('email', $user->email) }}">
        @error('email')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="role_id" class="col-sm-2 col-form-label">{{ __('Role') }}</label>
    <div class="col-sm-10">
        <select @class(['form-control', 'is-invalid' => $errors->has('role_id')]) id="role_id" name="role_id">
            <option></option>
            @foreach(App\Models\Role::all() as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        @error('role_id')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>


<button class="btn btn-primary" type="submit">{{ __('Save') }}</button>