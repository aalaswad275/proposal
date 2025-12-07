<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StuPro;
use App\Models\Student;
use App\Models\Project;
class StuProController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $stuPro = StuPro::all();
        return view('Admin.StuPro.index', compact('stuPro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $students = Student::all();
        $projects = Project::all();
        return view('Admin.StuPro.create', compact('students', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datavalidate= $request->validate([
            'student_id'=>"required",
            'project_id'=>"required",
            'description'=>"nullable",

        ]);
        $stuPro= new StuPro();
        // sql               نموذج
        $stuPro->student_id = $request->student_id;
        $stuPro->project_id = $request->project_id;
        $stuPro->description = $request->description;
        $stuPro->save();

        return redirect()->route('stuPro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $stuPro = StuPro::find($id);
        return view('Admin.StuPro.show',compact('stuPro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $stuPro = StuPro::find($id);
        $students = Student::all();
        $projects = Project::all();
        return view('Admin.StuPro.edit', compact('stuPro', 'students', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $datavalidate= $request->validate([
            'student_id'=>"required",
            'project_id'=>"required",
            'description'=>"nullable",

        ]);
        $stuPro= StuPro::find($id);
        // sql               نموذج
        $stuPro->student_id = $request->student_id;
        $stuPro->project_id = $request->project_id;
        $stuPro->description = $request->description;
        $stuPro->save();

        return redirect()->route('stuPro.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $stuPro = StuPro::find($id);
        $stuPro->delete();
        return redirect()->route('stuPro.index');
        
    }
}
