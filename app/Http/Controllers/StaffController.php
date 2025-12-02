<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Staff;
use App\Models\Department;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $staffs = Staff::all();
        return view('staff.index', compact('staffs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //\
        $departments = Department::all();
        return view('staff.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'staff_id' => 'required',
            'staff_dept' => 'required',
            'staff_position' => 'required',
            'staff_phone' => 'required',
            'staff_email' => 'required',
            'staff_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image=null;
        if($request->hasFile('staff_image')){
            $image = $request->file('staff_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $image = $imageName;
        }
        $staff = new Staff();
        $staff->name = $request->name;
        $staff->staff_id = $request->staff_id;
        $staff->staff_dept = $request->staff_dept;
        $staff->staff_position = $request->staff_position;
        $staff->staff_phone = $request->staff_phone;
        $staff->staff_email = $request->staff_email;
        $staff->staff_image = $image;
        $staff->save();
        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $staff = Staff::find($id);
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $staff = Staff::find($id);
        $departments = Department::all();
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'staff_id' => 'required',
            'staff_dept' => 'required',
            'staff_position' => 'required',
            'staff_phone' => 'required',
            'staff_email' => 'required',
            'staff_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image=null;
        if($request->hasFile('staff_image')){
            $image = $request->file('staff_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $image = $imageName;
        }
        $staff = Staff::find($id);
        $staff->name = $request->name;
        $staff->staff_id = $request->staff_id;
        $staff->staff_dept = $request->staff_dept;
        $staff->staff_position = $request->staff_position;
        $staff->staff_phone = $request->staff_phone;
        $staff->staff_email = $request->staff_email;
        $staff->staff_image = $image;
        $staff->save();
        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $staff = Staff::find($id);
        $oldpath = public_path('images/'.$staff->staff_image);
        if(file_exists($oldpath)){
            unlink($oldpath);
        }
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
    
}
