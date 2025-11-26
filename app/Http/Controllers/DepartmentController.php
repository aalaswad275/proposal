<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dept = Department::all();
        return view('Admin.Department.index', compact('dept'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.Department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // تاكيد البيانات
        $datavalidate= $request->validate([
            'name'=>"required|max=255",
            'code'=>"nullable",
            'description'=>"nullable",

        ]);
        $dept= new Deaprtment();
        // sql               نموذج
        $dept->name = $request->name;
        $dept->code = $request->code;
        $dept->description = $request->description;
        $dept->save();

        return redirect()->route('department.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $dept = Department::find($id);
        return view('Admin.Departemnt.show',compact('dept'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         $dept = Department::find($id);
        return view('Admin.Departemnt.edit',compact('dept'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $datavalidate= $request->validate([
            'name'=>"required|max=255",
            'code'=>"nullable",
            'description'=>"nullable",

        ]);
        $dept=  Deaprtment::find($id);
        // sql               نموذج
        $dept->name = $request->name;
        $dept->code = $request->code;
        $dept->description = $request->description;
        $dept->save();

        return redirect()->route('department.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dept = Department::find($id);
    }
}
