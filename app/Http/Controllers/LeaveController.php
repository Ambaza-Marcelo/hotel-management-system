<?php

namespace App\Http\Controllers;

use App\Leave;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $employees = Employee::pluck('name','id');
        $leaves = Leave::all();
        return view('backend.hrm.leave.index',compact(
            'leaves',
            'employees',
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employees = Employee::pluck('name','id');
        $leave = null;
        $leave_type = null;

        return view('backend.hrm.leave.create',compact(
            'leave',
            'leave_type',
            'employees'
        ));
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
            'employee_id' => 'required',
            'leave_type' => 'required',
            'leave_date_start' => 'required',
            'leave_date_end' => 'required',
            'document' => 'nullable|mimes:jpeg,jpg,png,pdf,docx,txt|max:2048',
            'description' => 'nullable|max:500',
        ]);

        $dayCount = 1;
        $leaveDateStart = $request->get('leave_date_start');
        $leaveDateEnd = null;
        if(strlen($request->get('leave_date_end',''))) {
            $leaveDateEnd = $request->get('leave_date_end');
            if($leaveDateEnd<$leaveDateStart){
                return redirect()->back()->with('error','Leave End date can\'t be less than start date!');
            }
        }

        $data = $request->all();
        if($request->hasFile('document')) {
            $storagepath = $request->file('document')->store('public/leave');
            $fileName = basename($storagepath);
            $data['document'] = $fileName;
        }
        else{
            $data['document'] = $request->get('oldDocument','');
        }

        if(strlen($request->get('leave_date_end',''))){

            $start_time = strtotime($leaveDateStart);
            $end_time = strtotime($leaveDateEnd);
            for($i=$start_time; $i<=$end_time; $i+=86400)
            {
               $data['leave_date'] = date('d/m/Y', $i);
               Leave::create($data);

            }

            $message = $dayCount." days leave added!";

        }
        else {
            // now save employee
            Leave::create($data);
            $message = "Leave added!";
        }

        return redirect()->route('leaves.index')->with('success', $message);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
        $leave_type = $leave->get('leave_type');
        return view('backend.hrm.leave.edit',compact('leave',
            'leave_type'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
         $request->validate([
            'employee_id' => 'required',
            'leave_type' => 'required',
            'leave_date_start' => 'required',
            'document' => 'nullable|mimes:jpeg,jpg,png,pdf,docx,txt|max:2048',
            'description' => 'nullable|max:500',
        ]);

        $this->validate($request->all());

        if($request->has('update_status')){
            $leave->status = $request->get('status');
            $leave->save();
            return redirect()->route('leaves.index')->with('success', 'Leave Updated!');
        }

        $leaveDate = Carbon::createFromFormat('d/m/Y',$request->get('leave_date'))->format('Y-m-d');

        $data = $request->all();
        unset($data['employee_id']);

        if($request->hasFile('document')) {
            $storagepath = $request->file('document')->store('public/leave');
            $fileName = basename($storagepath);
            $data['document'] = $fileName;

            //if file change then delete old one
            $oldFile = $request->get('oldDocument','');
            if( $oldFile != ''){
                $file_path = "public/leave/".$oldFile;
                Storage::delete($file_path);
            }
        }
        else{
            $data['document'] = $request->get('oldDocument','');
        }

        $leave->fill($data);
        $leave->save();


        return redirect()->route('leaves.index')->with('success', 'Leave Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
