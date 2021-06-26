@extends('layouts.app')

@section('content')
<style>
    .badge-download {
        background-color: transparent !important;
        color: #464443 !important;
    }
    .list-group-item-text{
      font-size: 12px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="side-navbar">
            @include('layouts.leftside-menubar')
        </div>
        <div class="col-md-10" id="main-container">
            <div class="panel panel-default" style="border-top: 0px;">
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="col-sm-16">
                            <div class="panel panel-default" style="background-color: rgba(242,245,245,0.8);">
                                <div class="panel-body">
                                    <h3>@lang('Welcome to') {{Auth::user()->hotel->name}}</h3>
                                    @lang('hfjjjdjjfjjjkjfjjefh.')
                                </div>
                            </div>
                            
                        </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-14">
                            <div class="">
                                <span class=""></i></span>

                                <div class="jumbotron">
                                    <img src="{{asset('images/clipart5.png')}}" alt="subscribers">
                                    <span>Subscribers</span>
                                    <span"><small></small></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-14">
                            <div class="">
                                <div class="jumbotron">
                                    <img src="{{asset('images/clipart3.png')}}" alt="photos">
                                    <span class="i">Photos</span>
                                    <span class=""></span>
                                </div>
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-14">
                            <div class="">
                                <span class=""></i></span>

                                <div class="jumbotron">
                                    <img src="{{asset('images/clipart2.png')}}" alt="subscribers">
                                    <span>Employees</span>
                                    <span"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-14">
                            <div class="">
                                <div class="jumbotron">
                                    <img src="{{asset('images/clipart1.png')}}" alt="photos">
                                    <span class="i">Bookings</span>
                                    <span class=""></span>
                                </div>
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
