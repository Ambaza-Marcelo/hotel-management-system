@extends('layouts.app')
@section('title','edit employee')
@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form novalidate id="entryForm" action="{{route('employees.update',$employee->id)}}" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="name">Name<span class="text-danger"></span></label>
                                        <input autofocus type="text" class="form-control" name="name" value="{{$employee->name }}" required minlength="2" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="designation">Designation<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="designation" value="{{$employee->designation}}">
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('designation') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="qualification">Qualification</label>
                                        <input type="text" class="form-control" name="qualification" value="{{$employee->qualification}}"  maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('qualification') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="gender">Gender<span class="text-danger"></span>
                                        <select id="gender" class="form-control" name="gender">
                                        	<option>male</option>
                                        	<option>female</option>
                                        </select>
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="religion">Religion<span class="text-danger"></span>
                                        <select id="religion" class="form-control" name="religion">
                                        	<option>catholic</option>
                                        	<option>islam</option>
                                        	<option>SDA</option>
                                            <option>pentecote</option>
                                            <option>Methodiste libre</option>
                                        </select>
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('religion') }}</span>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="email">Email<span class="text-black"></span>
                                        </label>
                                        <input  type="email" class="form-control" name="email"  value="{{$employee->email}}" maxlength="100">
                                        <span class="fa fa-envelope form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="phone_no">Phone/Mobile No.<span class="text-danger"></span></label>
                                        <input  type="text" class="form-control" name="phone_no" value="{{$employee->phone_no}}" min="8" maxlength="15">
                                        <span class="fa fa-phone form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="id_card">ID Card No.<span class="text-danger">*</span></label>
                                        <input  type="text" class="form-control" name="id_card" value="{{$employee->id_card}}" minlength="4" maxlength="50">
                                        <span class="fa fa-id-card form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('id_card') }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="joining_date">Joining Date<span class="text-danger"></span></label>
                                        <input type='date' class="form-control date_picker2" name="joining_date" value="{{$employee->joining_date}}" minlength="10" maxlength="255" />
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="dob">Date of Birth Day<span class="text-danger"></span>
                                        </label>
                                        <input type="date" class="form-control date_picker2" name="dob" value="{{$employee->dob}}">
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="duty_start">Duty Start</label>
                                        <input type='time' class="form-control time_picker" name="duty_start" value="{{$employee->duty_start}}" maxlength="8" />
                                        <span class="fa fa-clock-o form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('duty_start') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="duty_end">Duty End</label>
                                        <input type='time' class="form-control time_picker" name="duty_end" value="{{$employee->duty_end}}" maxlength="8" />
                                        <span class="fa fa-clock-o form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('duty_end') }}</span>
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{$employee->address}}">
                                        <span class="fa fa-location-arrow form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="photo">Photo<br><span class="text-black"></span></label>
                                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="photo" value="{{$employee->photo}}">
                                        <span class="glyphicon glyphicon-open-file form-control-feedback" style="top:30px;"></span>
                                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="photo">Salary<br><span class="text-black"></span></label>
                                        <input  type="number" class="form-control" name="salary" value="{{$employee->salary}}">
                                        <span class="text-danger">{{ $errors->first('salary') }}</span>
                                    </div>
                                </div>
                            </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Save</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
     </div>
 </div>
@endsection