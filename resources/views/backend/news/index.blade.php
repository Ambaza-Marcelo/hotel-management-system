@extends('layouts.app')
@section('title','news list')
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
                            <a class="btn btn-info btn-sm" href="{{route('admin-news-create') }}">Add New</a>
                        </div>
                    </div>
                    <div class="">
                        <table id="" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="20%">image</th>
                                <th width="15%">Title</th>
                                <th width="10%">Description</th>
                                <th width="10%">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                           
                                @foreach($news as $new)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img class="img-responsive" style="max-height: 100px;" src="{{ asset('storage/news')}}/{{ $new->image }}" alt="">
                                    </td>
                                    <td>{{ $new->title }}</td>
                                    <td>{{ $new->description }}</td>
                                    <td>
                                        <div style="display: flex;">
                                        <div class="btn-group">
                                            <a title="Edit" href="{{route('admin-news-edit',$new->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                            </a>
                                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="btn-group">
                                            <form class="myAction" method="POST" action="{{route('admin-news-destroy',$new->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ?')">
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

