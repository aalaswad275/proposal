<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
        return view('admin.student.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $requset->validate([
            'name' => 'required',
            'std_id' => 'required',
            'std_dept' => 'required',
            'std_level' => 'required',
            'std_semester' => 'required',
            'std_address' => 'required',
            'std_phone' => 'required',
            'std_email' => 'required',
            'std_supervisor' => 'required',
            'std_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image=null;
        if($request->hasFile('std_image')){
            $image = $request->file('std_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $image = $imageName;
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
        $student->std_image = $image;
        $student->save();
        return redirect()->route('student.index')->with('success', 'Student created successfully.');







    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $student = Student::find($id);
        return view('admin.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = Student::find($id);
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
           $requset->validate([
            'name' => 'required',
            'std_id' => 'required',
            'std_dept' => 'required',
            'std_level' => 'required',
            'std_semester' => 'required',
            'std_address' => 'required',
            'std_phone' => 'required',
            'std_email' => 'required',
            'std_supervisor' => 'required',
            'std_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $student = Student::find($id);
        $image=$student->std_image;
        if($request->hasFile('std_image'))
        {
            $image = $request->file('std_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $image = $imageName;
            $oldpath = public_path('images/'.$student->std_image);
            if(file_exists($oldpath)){
                unlink($oldpath);
            }

        }

        $student->name = $request->name;
        $student->std_id = $request->std_id;
        $student->std_dept = $request->std_dept;
        $student->std_level = $request->std_level;
        $student->std_semester = $request->std_semester;
        $student->std_address = $request->std_address;
        $student->std_phone = $request->std_phone;
        $student->std_email = $request->std_email;
        $student->std_supervisor = $request->std_supervisor;
        $student->std_image = $image;
        $student->save();
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $student = Student::find($id);
        $oldpath = public_path('images/'.$student->std_image);
        if(file_exists($oldpath)){
            unlink($oldpath);
        }
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }
}
