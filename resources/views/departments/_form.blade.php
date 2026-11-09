@csrf
<div class="form-group">
    <label for="name">Department Name</label>
    <input id="name" name="name" value="{{ old('name', $department->name ?? '') }}" required>
    @error('name') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="form-group">
    <label for="code">Code</label>
    <input id="code" name="code" value="{{ old('code', $department->code ?? '') }}" required>
    @error('code') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description">{{ old('description', $department->description ?? '') }}</textarea>
    @error('description') <div class="error">{{ $message }}</div> @enderror
</div>
<button class="btn" type="submit">{{ $submitLabel }}</button>
<a class="btn btn-light" href="{{ route('departments.index') }}">Cancel</a>
