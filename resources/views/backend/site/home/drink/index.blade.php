@extends('layouts.app')
@section('title','command drink list')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">All Command Drinks</h3>
                        <div class="">
                            <a class="btn btn-info btn-sm" href="{{ URL::route('command-drink.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                    </div>
                    <div class="">
                        <table id="rooms" class="table table-bordered table-striped list_view_table">
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
                            @foreach($commandDrinks as $commandDrink)
                                <tr>
                                    <td>
                                        <img class="img-responsive" style="max-height: 200px;" src="{{ asset('storage/drinks')}}/{{ $commandDrink->image }}" alt="">
                                    </td>
                                    <td>{{ $commandDrink->title }}</td>
                                    <td> {{ $commandDrink->type }}</td>
                                    <td> {{ $commandDrink->description }}</td>
                                    <td> {{ $commandDrink->old_price }}</td>
                                    <td> {{ $commandDrink->new_price }}</td>
                                    <td>
                                    <div style="display: flex;">
                                        <div class="btn-group">
                                            <a title="Edit" href="{{URL::route('command-drink.edit',$commandDrink->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form class="myAction" method="POST" action="{{URL::route('command-drink.destroy',$commandDrink->id)}}">
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

