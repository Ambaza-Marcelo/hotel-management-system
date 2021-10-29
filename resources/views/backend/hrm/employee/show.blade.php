@extends('layouts.app')
@section('title','show employee')
@section('content')
<div class="container">
    <section class="content main-contents">
        <div class="row">
            <div class="col-md-12">
                <div id="printableArea">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="box box-info">
                                <div class="box-body box-profile">
                                    <img class="profile-user-img img-responsive img-circle" src="@if($employee->image ){{ asset('storage/employee')}}/{{ $employee->image }} @else {{ asset('images/marcelo.jpg')}} @endif">
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
                        </div>
                        <br><br><br>
                        <div class="col-sm-3">
                            <div class="box box-info">
                                <div class="box-body box-profile">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Qualification </b> <a class="pull-right">{{$employee->qualification}}</a>
                                        </li>
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Designation</b> <a class="pull-right">{{$employee->designation}}</a>
                                        </li>
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Gender</b> <a class="pull-right">{{$employee->gender}}</a>
                                        </li>
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Religion</b> <a class="pull-right">{{$employee->religion}}</a>
                                        </li>
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Address</b> <a class="pull-right">{{$employee->address}}</a>
                                        </li>
                                        <li class="list-group-item" style="background-color: #FFF">
                                            <b>Signature</b><a class="pull-right">{{$employee->salary}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection