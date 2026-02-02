<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;
use App\Models\Staff;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index', compact('students'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.student.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'std_id' => 'required',
            'std_dept' => 'required',
            'std_level' => 'required',
            'std_semester' => 'required',
            'std_address' => 'required',
            'std_phone' => 'required',
            'std_email' => 'required|email',
            'std_supervisor' => 'required',
            'std_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('std_image')) {
            $image = $request->file('std_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $student = new Student();

$student->name = $request->name;
$student->std_id = $request->std_id;
$student->std_dept = $request->std_dept;
$student->std_level = $request->std_level;
$student->std_semester = $request->std_semester;
$student->std_address = $request->std_address;
$student->std_phone = $request->std_phone;
$student->std_email = $request->std_email;
$student->std_supervisor = $request->std_supervisor;
$student->std_image = $imageName;

$student->save();

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('admin.student.show', compact('student'));
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        $departments = Department::all();
        $supervisors = Staff::all();
        return view('Admin.student.edit', compact('student', 'departments', 'supervisors'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'std_id' => 'required',
            'std_dept' => 'required',
            'std_level' => 'required',
            'std_semester' => 'required',
            'std_address' => 'required',
            'std_phone' => 'required',
            'std_email' => 'required|email',
            'std_supervisor' => 'required',
            'std_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $student = Student::findOrFail($id);
        $imageName = $student->std_image;

        if ($request->hasFile('std_image')) {
            if ($imageName && file_exists(public_path('images/' . $imageName))) {
                unlink(public_path('images/' . $imageName));
            }

            $image = $request->file('std_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $student->update([
            'name' => $request->name,
            'std_id' => $request->std_id,
            'std_dept' => $request->std_dept,
            'std_level' => $request->std_level,
            'std_semester' => $request->std_semester,
            'std_address' => $request->std_address,
            'std_phone' => $request->std_phone,
            'std_email' => $request->std_email,
            'std_supervisor' => $request->std_supervisor,
            'std_image' => $imageName,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        if ($student->std_image && file_exists(public_path('images/' . $student->std_image))) {
            unlink(public_path('images/' . $student->std_image));
        }

        $student->delete();

        return redirect()->route('student.index')
            ->with('success', 'Student deleted successfully.');
    }
}
