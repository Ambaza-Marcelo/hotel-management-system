@extends('layouts.app')
@section('title','Rooms list')
@section('content')
    <section class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
         @endif
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">All Rooms</h3>
                        <div class="">
                            <a class="btn btn-info btn-sm" href="{{ route('admin-room-create')}}">Add New</a>
                        </div>
                    </div>
                    <div class="">
                        <table id="" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="20%">image</th>
                                <th width="10%">Category</th>
                                <th width="10%">Discount Price</th>
                                <th width="10%">Price</th>
                                <th width="10%">Room Nu</th>
                                <th width="15%">Description</th>
                                <th width="10%">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img class="img-responsive" style="max-height: 100px;" src="{{ asset('storage/rooms')}}/{{ $room->image }}" alt="">
                                    </td>
                                    <td>{{ $room->category->name }}</td>
                                    <td>{{ $room->category->discount_price }} FBU</td>
                                    <td>{{ $room->category->price }} FBU</td>
                                    <td> {{ $room->num_room }} </td>
                                    <td> {{ $room->description }}</td>
                                    <td>
                                        <div style="display: flex;">
                                        <div class="btn-group">
                                            <a title="Edit" href="{{route('admin-room-edit',$room->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                            </a>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="btn-group">
                                            <form class="myAction" method="POST" action="{{route('admin-room-destroy',$room->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ?')">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-fw fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

