<x-layouts.app title="Create Student" heading="Add Student" subheading="Enter the student details below to create a new record.">
    <div class="card stack">
        <div class="section-head">
            <div>
                <h2>Create Student</h2>
                <p>Fill in the form carefully so your records stay consistent.</p>
            </div>
        </div>

        <form action="{{ route('students.store') }}" method="POST" class="stack">
            @csrf
            @include('students._form', ['submitLabel' => 'Save Student'])
        </form>
    </div>
</x-layouts.app>
