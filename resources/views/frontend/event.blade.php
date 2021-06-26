@extends('layouts.app')
@section('title','Event')
@section('content')
<div class="container-fluid">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">All Events</h3>
                    </div>
                    <div class="">
                        <table id="events" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="40%">Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>
                                        <img class="img-responsive" style="max-height: 200px;" src="{{ asset('storage/events')}}/{{ $event->image }}" alt="">
                                    </td> 
                                    <td>
                                        <p>Title : {{ $event->title }}</p>
                                        <p>Decription : {{ $event->description }}</p>
                                        <p>Date : {{ $event->date }}</p>
                                        <p>Time : {{ $event->time }}</p>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
</div>