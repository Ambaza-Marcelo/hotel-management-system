@extends('layouts.app')
@section('title','command food list')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">All Command Foods</h3>
                        <div class="">
                            <a class="btn btn-info btn-sm" href="{{ URL::route('command-food.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                    </div>
                    <div class="">
                        <table id="foods" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="30%">Image</th>
                                <th width="10%">Title</th>
                                <th width="20%">Type</th>
                                <th width="10%">Description</th>
                                <th width="10%">Old price</th>
                                <th width="5%">New Price</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($commandFoods as $commandFood)
                                <tr>
                                    <td>
                                        <img class="img-responsive" style="max-height: 200px;" src="{{ asset('storage/foods')}}/{{ $commandFood->image }}" alt="">
                                    </td>
                                    <td>{{ $commandFood->title }}</td>
                                    <td> {{ $commandFood->type }}</td>
                                    <td> {{ $commandFood->description }}</td>
                                    <td> {{ $commandFood->old_price }}</td>
                                    <td> {{ $commandFood->new_price }}</td>
                                    <td>
                                    <div style="display: flex;">
                                        <div class="btn-group">
                                            <a title="Edit" href="{{URL::route('command-food.edit',$commandFood->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form class="myAction" method="POST" action="{{URL::route('command-food.destroy',$commandFood->id)}}">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-fw fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th width="30%">Image</th>
                                <th width="10%">Title</th>
                                <th width="20%">Type</th>
                                <th width="10%">Description</th>
                                <th width="10%">Old price</th>
                                <th width="5%">New Price</th>
                                <th width="10%">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

