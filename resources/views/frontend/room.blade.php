@extends('layouts.app')
@section('title','Room')
@section('content')
<div class="container-fluid">
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">All Rooms</h3>
                    </div>
                    <div class="">
                        <table id="rooms" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="50%">Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rooms as $room)
                                <tr>
                                    <td>
                                        <img class="img-responsive" style="max-height: 200px;" src="{{ asset('storage/rooms')}}/{{ $room->image }}" alt=""><br>
                                        <a href="" class="btn btn-danger">Book Now</a>
                                    </td> 
                                    <td>
                                        <p>Title : {{ $room->title }}</p>
                                        <p>Type : {{ $room->type }}</p>
                                        <p>No : {{ $room->num }}</p>
                                        <p>Description : {{ $room->description }}</p>
                                        <p>Old Price : {{ $room->old_price }}</p>
                                        <p>New Price : {{ $room->new_price }}</p>
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