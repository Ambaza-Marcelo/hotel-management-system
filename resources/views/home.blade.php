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
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="col-sm-16">
                            <div class="panel panel-default" style="background-color: rgba(242,245,245,0.8);">
                                <div class="panel-body">
                                    <h3>@lang('Bienvenu à musumba hill\'s hotel') </h3>
                                </div>
                                <div>
                                    <img src="{{ asset('images/undraw_special_event.svg') }}" width="200">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <img src="{{ asset('images/undraw_visual.svg') }}" width="200">
                                </div>
                            </div>
                            
                        </div>
                    @if(Auth::user()->role == 'admin')
                    <div class="row">
                        <div class="col-md-6 col-sm-14">
                            <div class="">
                                <span class=""></i></span>

                                <div class="jumbotron">
                                    <a href="{{url('register/accountant')}}">
                                    <img src="{{asset('images/clipart2.png')}}" alt="subscribers">
                                    <span>Caissiers</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-14">
                            <div class="">
                                <div class="jumbotron">
                                    <a href="{{url('register/technician')}}">
                                    <img src="{{asset('cliparts/9000.jpg')}}" height="100" alt="photos">
                                    <span class="i">Techniciens</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
