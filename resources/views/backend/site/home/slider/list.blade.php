@extends('layouts.app')
@section('title','list')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="box-header">
                        <h3 class="box-title">All sliders</h3>
                        <div class="">
                            <a class="btn btn-info btn-sm" href="{{ URL::route('sliders.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                    </div>
                    <div class="">
                        <table id="sliders" class="table table-bordered table-striped list_view_table">
                            <thead>
                            <tr>
                                <th width="30%">Image</th>
                                <th width="30%">Title</th>
                                <th width="25%">Subtitle</th>
                                <th width="5%">Order</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>
                                        <img class="img-responsive" style="max-height: 100px;" src="{{ asset('storage/sliders')}}/{{ $slider->image }}" alt="">
                                    </td>
                                    <td>{{ $slider->title }}</td>
                                    <td> {{ $slider->subtitle }}</td>
                                    <td> {{ $slider->order }}</td>
                                    <td>
                                        <div style="display: flex;">
                                            <div class="btn-group">
                                                <a title="Edit" href="{{route('sliders.edit',$slider->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                                </a>
                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="btn-group">
                                                <form class="myAction" method="POST" action="{{route('sliders.destroy',$slider->id)}}" onclick="return confirm('voulez-vous vraiment supprimer ?')">
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
                                <th width="30%">Title</th>
                                <th width="25%">Subtitle</th>
                                <th width="5%">Order</th>
                                <th width="10%">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
    <script type="text/javascript">
        $(document).ready(function () {
            Site.sliderInit();
            initDeleteDialog();
        });
    </script>
@endsection
<!-- END PAGE JS-->
