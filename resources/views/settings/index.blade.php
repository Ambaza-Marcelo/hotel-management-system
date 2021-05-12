@extends('layouts.app')

@section('title', __('Hotel Settings'))

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="side-navbar">
                @include('layouts.leftside-menubar')
            </div>
            <div class="col-md-10" id="main-container">
                <div class="panel panel-default">
                    <div class="page-panel-title">@lang('Hotel Settings')</div>
                    <div class="panel-body table-responsive">

                        <h4>@lang('Add Users')</h4>
                        <table class="table table-condensed" style="width:600px">
                            <thead>
                                <tr>
                                    <th scope="col">+@lang('Employee')</th>
                                    <th scope="col">+@lang('Customer')</th>
                                    <th scope="col">+@lang('Accountant')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{url('register/student')}}">+ @lang('Employee')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{url('register/teacher')}}">+ @lang('Customer')</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-sm" href="{{url('register/accountant')}}">+ @lang('Add Accountant')</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
