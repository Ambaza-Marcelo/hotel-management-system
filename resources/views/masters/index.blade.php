@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="page-panel-title">@lang('Dashboard')</div>

                <div class="panel-body">
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('hotels.index') }}" role="button">
                        @lang('Manage Hotels')
                    </a>
                </div>
            </div>
        </div>
    </div>
         <div class="row">
            <div style="display: flex;">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <img src="{{ asset('images/1000.jpg')}}" alt="">
                    </div>
                    <p>lorem ipsum jdhfgkwjdhfgsjdhfjdh</p>
                </div>
                <div class="col-md-12">
                    <div class="thumbnail">
                        <img src="{{ asset('images/2000.jpg')}}" alt="">
                    </div>
                    <p>lorem ipsum jdhfgkwjdhfgsjdhfjdh</p>
                </div>
            </div>
            <div style="display: flex;">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <img src="{{ asset('images/3000.jpg')}}" alt="">
                    </div>
                    <p>lorem ipsum jdhfgkwjdhfgsjdhfjdh</p>
                </div>
                <div class="col-md-12">
                    <div class="thumbnail">
                        <img src="{{ asset('images/1000.jpg')}}" alt="">
                    </div>
                    <p>lorem ipsum jdhfgkwjdhfgsjdhfjdh</p>
                </div>
            </div>
    </div>
</div>
@endsection
