<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::orderBy('created_at','desc')->get();
        return view('backend.hrm.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.hrm.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_card' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'qualification' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'joining_date' => 'required',
            'image' => 'required|image',
            'duty_start' => 'required',
            'duty_end' => 'required',
            'salary' => 'required'
        ]);

            $storagepath = $request->file('image')->store('public/employee');
            $fileName = basename($storagepath);

            $data = $request->all();
            $data['image'] = $fileName;

            Employee::create($data);

        return redirect()->route('employees.index')->with('success','employee added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return view('backend.hrm.employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        return view('backend.hrm.employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $request->validate([
            'id_card' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'qualification' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'joining_date' => 'required',
            'image' => 'required|image',
            'signature' => 'required|image',
            'duty_start' => 'required',
            'duty_end' => 'required',
            'salary' => 'required'
        ]);
            

        $data = $request->all();

        if($request->hasFile('image')){
            $file_path = "public/employee/".$employee->image;
            Storage::delete($file_path);

            $storagepath = $request->file('image')->store('public/employee');
            $fileName = basename($storagepath);
            $data['image'] = $fileName;

        }

        $employee->fill($data);
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $file_path = "public/employee/".$employee->image;
                Storage::delete($file_path);
        $employee->delete();
        return redirect()->back();
    }
}
