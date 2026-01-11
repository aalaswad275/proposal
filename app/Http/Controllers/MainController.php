<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Project;
use App\Models\StuPro;

class MainController extends Controller
{
    //
    public function index()
    {
        $departments = Department::all();
        $student = Student::all();
        $staff = Staff::all();
        $projects = Project::all();
        $stupros = StuPro::all();

        return view('welcome', compact('departments', 'student', 'staff', 'projects', 'stupros'));
    }
    public function about()
    {
        return view('main.about');
    }
    public function contact()
    {
        return view('main.contact');
    }
}
