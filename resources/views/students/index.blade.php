<x-layouts.app title="Students" heading="Student Directory" subheading="Track every learner, keep records tidy, and move quickly between actions.">
    <div class="stats">
        <div class="card stat-card">
            <p>Total Students</p>
            <strong>{{ $students->total() }}</strong>
        </div>
        <div class="card stat-card">
            <p>Current Page</p>
            <strong>{{ $students->currentPage() }}</strong>
        </div>
        <div class="card stat-card">
            <p>Per Page</p>
            <strong>{{ $students->perPage() }}</strong>
        </div>
    </div>

    <div class="table-card">
        <div class="section-head">
            <div>
                <h2>All Students</h2>
                <p>Browse, open, edit, or remove student records.</p>
            </div>
            <a class="button button-primary" href="{{ route('students.create') }}">New Student</a>
        </div>

        @if ($students->count())
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td data-label="Student ID">{{ $student->student_id }}</td>
                            <td data-label="Name">{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td data-label="Email">{{ $student->email }}</td>
                            <td data-label="Phone">{{ $student->phone ?: 'N/A' }}</td>
                            <td data-label="Gender">{{ $student->gender ?: 'N/A' }}</td>
                            <td data-label="Actions">
                                <div class="table-actions">
                                    <a class="button button-secondary" href="{{ route('students.show', $student) }}">View</a>
                                    <a class="button button-secondary" href="{{ route('students.edit', $student) }}">Edit</a>
                                    <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button button-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $students->links() }}
            </div>
        @else
            <div class="empty-state">
                <h3>No students yet</h3>
                <p>Create the first student record to start building the directory.</p>
            </div>
        @endif
    </div>
</x-layouts.app>
