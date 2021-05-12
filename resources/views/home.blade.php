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
                    <div id="draggable">
                        <div id="employees" class="ui-widget-content">
                            <p class="employees">Employees</p>
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div id="users" class="ui-widget-content">
                            <p class="users">Users</p>
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div id="capital" class="ui-widget-content">
                            <p class="capital">Capital</p>
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div id="expense" class="ui-widget-content">
                            <p class="expense">Expense</p>
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div id="income" class="ui-widget-content">
                            <p class="income">Income</p>
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
