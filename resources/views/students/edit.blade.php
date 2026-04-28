<x-layouts.app title="Edit Student" heading="Edit Student" subheading="Update student information and keep the profile current.">
    <div class="card stack">
        <div class="section-head">
            <div>
                <h2>Edit {{ $student->first_name }} {{ $student->last_name }}</h2>
                <p>Review the values below, then save your changes.</p>
            </div>
        </div>

        <form action="{{ route('students.update', $student) }}" method="POST" class="stack">
            @csrf
            @method('PUT')
            @include('students._form', ['submitLabel' => 'Update Student', 'student' => $student])
        </form>
    </div>
</x-layouts.app>
