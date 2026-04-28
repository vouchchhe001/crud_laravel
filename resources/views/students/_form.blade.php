@php
    $student = $student ?? null;
@endphp

<div class="grid two">
    <div class="field">
        <label for="student_id">Student ID</label>
        <input id="student_id" name="student_id" type="text" value="{{ old('student_id', $student?->student_id) }}" required>
        @error('student_id')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="field">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $student?->email) }}" required>
        @error('email')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="field">
        <label for="first_name">First Name</label>
        <input id="first_name" name="first_name" type="text" value="{{ old('first_name', $student?->first_name) }}" required>
        @error('first_name')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="field">
        <label for="last_name">Last Name</label>
        <input id="last_name" name="last_name" type="text" value="{{ old('last_name', $student?->last_name) }}" required>
        @error('last_name')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="field">
        <label for="phone">Phone</label>
        <input id="phone" name="phone" type="text" value="{{ old('phone', $student?->phone) }}">
        @error('phone')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="field">
        <label for="date_of_birth">Date of Birth</label>
        <input
            id="date_of_birth"
            name="date_of_birth"
            type="date"
            value="{{ old('date_of_birth', optional($student?->date_of_birth)->format('Y-m-d')) }}"
        >
        @error('date_of_birth')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    <div class="field">
        <label for="gender">Gender</label>
        <select id="gender" name="gender">
            <option value="">Select gender</option>
            @foreach (['Male', 'Female', 'Other'] as $gender)
                <option value="{{ $gender }}" @selected(old('gender', $student?->gender) === $gender)>{{ $gender }}</option>
            @endforeach
        </select>
        @error('gender')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="field">
    <label for="address">Address</label>
    <textarea id="address" name="address">{{ old('address', $student?->address) }}</textarea>
    @error('address')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="actions" style="margin-top: 20px;">
    <button class="button button-primary" type="submit">{{ $submitLabel }}</button>
    <a class="button button-secondary" href="{{ route('students.index') }}">Cancel</a>
</div>
