
@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<style type="text/css">
    .row{
        margin-top: 5%;
    }
</style>

    <section class="container">
        <div class="row">
            <div class="col-md-6 col-sm-14">
                <div class="">
                    <span class=""></i></span>

                    <div class="jumbotron">
                        <img src="{{asset('images/clipart5.png')}}" alt="subscribers">
                        <span>Subscribers</span>
                        <span">{{$subscribers}}<small></small></span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-14">
                <div class="">
                    <div class="jumbotron">
                        <img src="{{asset('images/clipart3.png')}}" alt="photos">
                        <span class="i">Photos</span>
                        <span class="">{{$photos}}</span>
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
                        <span>Developped and Maintained by</span>
                        <span">Ambaza M.<small></small></span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-14">
                <div class="">
                    <div class="jumbotron">
                        <img src="{{asset('images/clipart1.png')}}" alt="photos">
                        <span class="i">Bookings</span>
                        <span class="">{{$photos}}</span>
                    </div>
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </section>
@endsection
