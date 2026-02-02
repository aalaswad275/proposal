<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Department;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $projects = Project::with(['student','staff','department'])->get();
        return view('Admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        $students     = Student::all();
        $staffs       = Staff::all();
        $departments  = Department::all();

        return view('Admin.projects.create', compact(
            'students','staffs','departments'
        ));
    }

    /**
     * Store a newly created project.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string',
            'description'   => 'required',
            'project_type'  => 'required|in:student,staff',
            'department_id'=> 'required',
            'file'          => 'nullable|mimes:pdf,docx,zip|max:4096',
        ]);

        $fileName = null;
        if ($request->hasFile('file')) {
            $file     = $request->file('file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('projects'), $fileName);
        }
$project = new Project();

$project->title         = $request->title;
$project->description   = $request->description;
$project->project_type  = $request->project_type;
$project->student_id    = $request->project_type == 'student' ? $request->student_id : null;
$project->staff_id      = $request->project_type == 'staff' ? $request->staff_id : null;
$project->department_id = $request->department_id;
$project->file          = $fileName;

$project->save();

        return redirect()->route('projects.index')
                         ->with('success','Project added successfully');
    }

    /**
     * Display the specified project.
     */
    public function show($id)
    {
        $project = Project::with(['student','staff','department'])->findOrFail($id);
        return view('Admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the project.
     */
    public function edit($id)
    {
        $project     = Project::findOrFail($id);
        $students    = Student::all();
        $staffs      = Staff::all();
        $departments = Department::all();

        return view('Admin.projects.edit', compact(
            'project','students','staffs','departments'
        ));
    }

    /**
     * Update the specified project.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'project_type'  => 'required|in:student,staff',
            'department_id'=> 'required',
            'file'          => 'nullable|mimes:pdf,docx,zip|max:4096',
        ]);

        if ($request->hasFile('file')) {
            if ($project->file && file_exists(public_path('projects/'.$project->file))) {
                unlink(public_path('projects/'.$project->file));
            }

            $file     = $request->file('file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('projects'), $fileName);
            $project->file = $fileName;
        }

        $project->update([
            'title'         => $request->title,
            'description'   => $request->description,
            'project_type'  => $request->project_type,
            'student_id'    => $request->project_type == 'student' ? $request->student_id : null,
            'staff_id'      => $request->project_type == 'staff'   ? $request->staff_id   : null,
            'department_id'=> $request->department_id,
        ]);

        return redirect()->route('projects.index')
                         ->with('success','Project updated successfully');
    }

    /**
     * Remove the specified project.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->file && file_exists(public_path('projects/'.$project->file))) {
            unlink(public_path('projects/'.$project->file));
        }

        $project->delete();

        return redirect()->route('projects.index')
                         ->with('success','Project deleted successfully');
    }
}
