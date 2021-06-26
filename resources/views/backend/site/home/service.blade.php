
@extends('layouts.app')
@section('title','our services')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form  id="serviceContentForm" action="{{URL::Route('site.service')}}" method="post" enctype="multipart/form-data">
                        <div class="box-header">
                            <h3 class="box-title">Our Services <span class="text-danger"></span></h3>

                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            @csrf
                            <div class="form-group has-feedback">
                                <label for="why_content">Our Services<span class="text-danger"></span></label>
                                <textarea autofocus name="meta_value" class="form-control" required maxlength="500" required>@if($content){{ $content->meta_value }}@endif</textarea>
                                <span class="glyphicon glyphicon-info form-control-feedback"></span>
                                <span class="text-danger">{{ $errors->first('meta_value') }}</span>
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> Save</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


