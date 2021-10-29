@extends('layouts.app')
@section('title','Restauration list')
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
                        <h3 class="box-title">All </h3>
                        <div class="">
                            <a class="btn btn-info btn-sm" href="{{ route('admin-restauration-create') }}">Add New</a>
                        </div>
                    </div>
                    <div class="">
                        <table id="" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="20%">image</th>
                                <th width="10%">Title</th>
                                <th width="10%">Description</th>
                                <th width="15%">Price</th>
                                <th width="10%">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                           
                                @foreach($restaurations as $restauration)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img class="img-responsive" style="max-height: 100px;" src="{{ asset('storage/restaurations')}}/{{ $restauration->image }}" alt="">
                                    </td>
                                    <td>{{ $restauration->title }}</td>
                                    <td>{{ $restauration->description }}</td>
                                    <td>{{ $restauration->price }} FBU</td>
                                    <td>
                                        <div style="display: flex;">
                                            <div class="btn-group">
                                                <a title="Edit" href="{{route('admin-restauration-edit',$restauration->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                                </a>
                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="btn-group">
                                                <form class="myAction" method="POST" action="{{route('admin-restauration-destroy',$restauration->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ?')">
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
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection

