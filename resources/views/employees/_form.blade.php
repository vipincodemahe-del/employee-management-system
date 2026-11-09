@csrf
<div class="grid">
    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" name="name" value="{{ old('name', $employee->name ?? '') }}" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', $employee->email ?? '') }}" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input id="phone" name="phone" value="{{ old('phone', $employee->phone ?? '') }}" required>
        @error('phone') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="date_of_birth">Date of Birth</label>
        <input id="date_of_birth" type="date" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth?->format('Y-m-d') ?? '') }}" required>
        @error('date_of_birth') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="">Select gender</option>
            @foreach (['male' => 'Male', 'female' => 'Female', 'other' => 'Other'] as $value => $label)
                <option value="{{ $value }}" @selected(old('gender', $employee->gender ?? '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('gender') <div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="form-group">
        <label for="department_id">Department</label>
        <select id="department_id" name="department_id" required>
            <option value="">Select department</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" @selected((string) old('department_id', $employee->department_id ?? '') === (string) $department->id)>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
        @error('department_id') <div class="error">{{ $message }}</div> @enderror
    </div>
</div>
<div class="form-group">
    <label for="address">Address</label>
    <textarea id="address" name="address" required>{{ old('address', $employee->address ?? '') }}</textarea>
    @error('address') <div class="error">{{ $message }}</div> @enderror
</div>
<div class="form-group">
    <label for="profile_photo">Profile Photo</label>
    @if ($employee->photoUrl())
        <p><img class="avatar" src="{{ $employee->photoUrl() }}" alt="Current photo"></p>
    @endif
    <input id="profile_photo" type="file" name="profile_photo" accept="image/*">
    @error('profile_photo') <div class="error">{{ $message }}</div> @enderror
</div>
<button class="btn" type="submit">{{ $submitLabel }}</button>
<a class="btn btn-light" href="{{ route('employees.index') }}">Cancel</a>
