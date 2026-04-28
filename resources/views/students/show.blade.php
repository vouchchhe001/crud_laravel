<x-layouts.app title="Student Details" heading="Student Profile" subheading="A focused view of one student record with quick actions.">
    <div class="stack">
        <div class="section-head">
            <div>
                <h2>{{ $student->first_name }} {{ $student->last_name }}</h2>
                <p>Student ID: {{ $student->student_id }}</p>
            </div>
            <div class="actions">
                <a class="button button-secondary" href="{{ route('students.edit', $student) }}">Edit</a>
                <a class="button button-secondary" href="{{ route('students.index') }}">Back</a>
            </div>
        </div>

        <div class="detail-grid">
            <div class="detail-item">
                <span>Email</span>
                {{ $student->email }}
            </div>
            <div class="detail-item">
                <span>Phone</span>
                {{ $student->phone ?: 'N/A' }}
            </div>
            <div class="detail-item">
                <span>Date of Birth</span>
                {{ $student->date_of_birth?->format('d M Y') ?: 'N/A' }}
            </div>
            <div class="detail-item">
                <span>Gender</span>
                {{ $student->gender ?: 'N/A' }}
            </div>
            <div class="detail-item" style="grid-column: 1 / -1;">
                <span>Address</span>
                {{ $student->address ?: 'N/A' }}
            </div>
        </div>

        <div class="card">
            <div class="section-head">
                <div>
                    <h3>Record Details</h3>
                    <p>Helpful timestamps for this profile.</p>
                </div>
            </div>
            <div class="detail-grid">
                <div class="detail-item">
                    <span>Created At</span>
                    {{ $student->created_at?->format('d M Y, h:i A') }}
                </div>
                <div class="detail-item">
                    <span>Updated At</span>
                    {{ $student->updated_at?->format('d M Y, h:i A') }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
