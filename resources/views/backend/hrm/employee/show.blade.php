@extends('layouts.app')
@section('title','show employee')
@section('content')

    <section class="content main-contents">
        <div class="row">
            <div class="col-md-12">
                <div id="printableArea">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="box box-info">
                                <div class="box-body box-profile">
                                    <img class="profile-user-img img-responsive img-circle" src="@if($employee->photo ){{ asset('storage/employee')}}/{{ $employee->photo }} @else {{ asset('images/marcelo.jpg')}} @endif">
                                    <h3 class="profile-username text-center">{{$employee->name}}</h3>
                                    <p class="text-muted text-center">{{$employee->designation}}</p>
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>ID Card No.</b> <a class="pull-right">{{$employee->id_card}}</a>
                                        </li>
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Phone</b> <a class="pull-right">{{$employee->phone_no}}</a>
                                        </li>
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Email</b> <a class="pull-right">{{$employee->email}}</a>
                                        </li>
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Date of Birth Day</b> <a class="pull-right">{{$employee->dob}}</a>
                                        </li>
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Duty Start</b> <a class="pull-right">{{$employee->duty_start}}</a>
                                        </li>
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Duty End</b> <a class="pull-right">{{$employee->duty_end}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            {{--<div class="box box-info">--}}
                            {{--<div class="box-header with-border">--}}
                            {{--<h3 class="box-title">Profile</h3>--}}
                            {{--</div>--}}

                            {{--<div class="box-body">--}}
                            {{--<strong><i class="fa fa-info margin-r-5"></i> Gender</strong>--}}
                            {{--<p class="text-muted">{{$employee->gender}}</p>--}}

                            {{--<hr>--}}
                            {{--<strong><i class="fa fa-book margin-r-5"></i> Qualification</strong>--}}
                            {{--<p class="text-muted">{{$employee->qualification}}</p>--}}

                            {{--<hr>--}}

                            {{--<strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>--}}
                            {{--<p class="text-muted">{{$employee->address}}</p>--}}

                            {{--<hr>--}}

                            {{--<strong><i class="fa fa-info margin-r-5"></i> Religion</strong>--}}
                            {{--<p class="text-muted">{{$employee->religion}}</p>--}}

                            {{--<hr>--}}

                            {{--<strong><i class="fa fa-calendar margin-r-5"></i> Join Date</strong>--}}
                            {{--<p class="text-muted">{{$employee->joining_date}}</p>--}}

                            {{--<hr>--}}
                            {{--<strong><i class="fa fa-clock-o margin-r-5"></i> Shift</strong>--}}
                            {{--<p class="text-muted">{{$employee->shift}}</p>--}}

                            {{--<hr>--}}
                            {{--<strong><i class="fa fa-clock-o margin-r-5"></i> Duty Start</strong>--}}
                            {{--<p class="text-muted">{{$employee->duty_start}}</p>--}}

                            {{--<hr>--}}
                            {{--<strong><i class="fa fa-clock-o margin-r-5"></i> Duty End</strong>--}}
                            {{--<p class="text-muted">{{$employee->duty_end}}</p>--}}
                            {{--<hr>--}}
                            {{--<strong><i class="fa fa-pencil margin-r-5"></i> Signature</strong>--}}
                            {{--@if($employee->signature )--}}
                            {{--<img class="img-responsive" src="{{ asset('storage/employee/signature')}}/{{ $employee->signature }}">--}}
                            {{--@endif--}}

                            {{--</div>--}}
                            {{--<!-- /.box-body -->--}}
                            {{--</div>--}}
                        </div>

                        <div class="col-sm-9">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                                    <li><a href="#leaveStats" data-toggle="tab">Leave Balance</a></li>
                                    <li><a href="#attendance" id="tabAttendance" data-pk="{{$employee->id}}" data-toggle="tab">Attendance</a></li>
                                    {{--<li><a href="#salary" data-toggle="tab">Salary</a></li>--}}
                                    {{--<li><a href="#payment" data-toggle="tab">Payment</a></li>--}}
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Full Name</label>
                                            </div>
                                            <div class="col-md-3">
                                                <p for="">: {{$employee->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Qualification</label>
                                            </div>
                                            <div class="col-md-3">
                                                <p for="">: {{$employee->qualification}}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Designation</label>
                                            </div>
                                            <div class="col-md-3">
                                                <p for="">: {{$employee->designation}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Gender</label>
                                            </div>
                                            <div class="col-md-3">
                                                <p for="">: {{$employee->gender}}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Religion</label>
                                            </div>
                                            <div class="col-md-3">
                                                <p for="">: {{$employee->religion}}</p>
                                            </div>
                                        </div>
                                        @if($employee->leave_date)
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Join Date</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <p for="">: {{$employee->joining_date->format('d/m/Y')}}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Leave Date</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <p for="">: {{$employee->leave_date->format('d/m/Y')}}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Join Date</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <p for="">: {{$employee->joining_date}}</p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Address</label>
                                            </div>
                                            <div class="col-md-3">
                                                <p for="">: {{$employee->address}}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Signature</label>
                                            </div>
                                            <div class="col-md-3">
                                                @if($employee->signature )
                                                    <img class="img-responsive" src="{{ asset('storage/employee/signature')}}/{{ $employee->signature }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="leaveStats">
                                        <div class="row tile_count text-center">
                                            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count tile_stats_count_nb">
                                                <span class="count_top"><i class="fa fa-2x fa-level-down text-green"></i><b class="text-info"> Casual Leave(CL)</b></span>
                                                <div class="count text-blue">@if(isset($usedLeaves[1])){{$usedLeaves[1]}}@else 0 @endif/@if(isset($metas['total_casual_leave'])){{$metas['total_casual_leave']}}@else 0 @endif</div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                                                <span class="count_top"><i class="fa fa-2x fa-level-down text-green"></i><b class="text-info"> Undefined Leave(UL)</b></span>
                                                <div class="count text-purple">@if(isset($usedLeaves[3])){{$usedLeaves[3]}}@else 0 @endif/∞</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="attendance">
                                        <table id="attendanceTable" class="table table-responsive table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                            <tbody>

                                            </tbody>
                                            </thead>
                                        </table>
                                    </div>

                                    {{--<div class="tab-pane" id="salary">--}}
                                    {{----}}
                                    {{--</div>--}}
                                    {{--<div class="tab-pane" id="payment">--}}
                                    {{----}}
                                    {{--</div>--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection