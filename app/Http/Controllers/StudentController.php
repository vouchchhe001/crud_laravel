<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::latest()->paginate(10);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedData($request);

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student): RedirectResponse
    {
        $validated = $this->validatedData($request, $student);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }

    /**
     * Validate incoming student form data.
     */
    protected function validatedData(Request $request, ?Student $student = null): array
    {
        return $request->validate($this->rules($student));
    }

    /**
     * Get the validation rules for storing and updating students.
     */
    protected function rules(?Student $student = null): array
    {
        $studentId = $student?->id;

        return [
            'student_id' => [
                'required',
                'string',
                'max:255',
                Rule::unique('students', 'student_id')->ignore($studentId),
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($studentId),
            ],
            'phone' => ['nullable', 'string', 'max:20'],
            'date_of_birth' => ['nullable', 'date'],
            'gender' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string'],
        ];
    }
}
