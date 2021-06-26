@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="page-panel-title">@lang('Dashboard')</div>

                <div class="panel-body">
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('hotels.index') }}" role="button">
                        @lang('Manage AMBAZZAP')
                    </a>
                </div>
            </div>
        </div>
    </div>
         <div class="row">
            <div style="display: flex;">
                <div class="col-md-12">
                    <a href="{{ route('hotels.index') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('images/clipart2.png') }}"
                            class="img-responsive mauto" style="height: 150px; width: 150px;" alt=""/>
                    </div></a>
                    <p>HR Management System</p>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('hotels.index') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('images/7000.jpg') }}"
                            class="img-responsive mauto" style="height: 150px; width: 150px;" alt=""/>
                    </div></a>
                    <p>Hotels Management System</p>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('hotels.index') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('images/dollar.jpg') }}"
                            class="img-responsive mauto" style="height: 150px; width: 150px;" alt=""/>
                    </div></a>
                    <p>Business Management System</p>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('hotels.index') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('images/5000.jpg') }}"
                            class="img-responsive mauto" style="height: 150px; width: 150px;" alt=""/>
                    </div></a>
                    <p>Restaurant Management System</p>
                </div>
            </div>
    </div>
     <div class="row">
            <div style="display: flex;">
                <div class="col-md-12">
                    <a href="{{ route('hotels.index') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('images/clipart11.png') }}"
                            class="img-responsive mauto" style="height: 150px; width: 150px;" alt=""/>
                    </div></a>
                    <p>Rapidity</p>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('hotels.index') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('images/clipart6.png') }}"
                            class="img-responsive mauto" style="height: 150px; width: 150px;" alt=""/>
                    </div></a>
                    <p>Security</p>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('hotels.index') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('images/clipart5.png') }}"
                            class="img-responsive mauto" style="height: 150px; width: 150px;" alt=""/>
                    </div></a>
                    <p>Simple</p>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('hotels.index') }}">
                    <div class="thumbnail">
                        <img src="{{ asset('images/clipart3.png') }}"
                            class="img-responsive mauto" style="height: 150px; width: 150px;" alt=""/>
                    </div></a>
                    <p>Cloud Application System</p>
                </div>
            </div>
    </div>
</div>
</div>
@endsection
