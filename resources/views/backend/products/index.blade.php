@extends('layouts.app')
@section('title','Products list')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">All products</h3>
                        <div class="">
                            <a class="btn btn-info btn-sm" href="{{ URL::route('product.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                    </div>
                    <div class="">
                        <table id="products" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="30%">Image</th>
                                <th width="10%">Name</th>
                                <th width="15%">Price For One</th>
                                <th width="10%">Quantity</th>
                                @if(Auth::user()->role == 'admin')
                                <th width="15%">Total Price</th>
                                <th width="10%">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <img class="img-responsive" style="max-height: 200px;" src="{{ asset('storage/products')}}/{{ $product->image }}" alt="">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td> {{ $product->price_for_one }} FBU</td>
                                    <td> {{ $product->quantity }}</td>
                                    @if(Auth::user()->role == 'admin')
                                    <td> {{ $product->quantity * $product->price_for_one }} FBU</td>
                                    <td>
                                    <div style="display: flex;">
                                        <div class="btn-group">
                                            <a title="Edit" href="{{URL::route('product.edit',$product->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form class="myAction" method="POST" action="{{URL::route('product.destroy',$product->id)}}">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fa fa-fw fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    </td>
                                    @endif
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

