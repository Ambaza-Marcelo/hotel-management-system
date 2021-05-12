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
            'photo' => 'required|image',
            'signature' => 'required|image',
            'duty_start' => 'required',
            'duty_end' => 'required',
        ]);
             if($request->hasFile('photo')) {
            $storagepath = $request->file('photo')->store('public/employee');
            $fileName = basename($storagepath);
            $data['photo'] = $fileName;
            }
            else{
                $data['photo'] = $request->get('oldPhoto','');
            }

            if($request->hasFile('signature')) {
                $storagepath = $request->file('signature')->store('public/employee/signature');
                $fileName = basename($storagepath);
                $data['signature'] = $fileName;
            }
            else{
                $data['signature'] = $request->get('oldSignature','');
            }

        Employee::create($request->all());
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
            'photo' => 'required|image',
            'signature' => 'required|image',
            'duty_start' => 'required',
            'duty_end' => 'required',
        ]);
             if($request->hasFile('photo')) {
            $storagepath = $request->file('photo')->store('public/employee');
            $fileName = basename($storagepath);
            $data['photo'] = $fileName;

            //if file change then delete old one
            $oldFile = $request->get('oldPhoto','');
            if( $oldFile != ''){
                $file_path = "public/employee/".$oldFile;
                Storage::delete($file_path);
            }
        }
        else{
            $data['photo'] = $request->get('oldPhoto','');
        }

        if($request->hasFile('signature')) {
            $storagepath = $request->file('signature')->store('public/employee/signature');
            $fileName = basename($storagepath);
            $data['signature'] = $fileName;

            //if file change then delete old one
            $oldFile = $request->get('oldSignature','');
            if( $oldFile != ''){
                $file_path = "public/employee/signature/".$oldFile;
                Storage::delete($file_path);
            }
        }
        else{
            $data['signature'] = $request->get('oldSignature','');
        }

        $employee->update($request->all());

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
    }
}
