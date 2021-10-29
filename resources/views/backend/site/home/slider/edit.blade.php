@extends('layouts.app')
@section('title','update slider')
@section('content')
    <div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form novalidate id="entryForm" action="{{route('sliders.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="title">Title<span class="text-danger"></span></label>
                                        <input autofocus type="text" class="form-control" name="title" value="{{$slider->title}}" required minlength="2" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="subtitle">subtitle<span class="text-danger"></span></label>
                                        <textarea name="subtitle" class="form-control">{{$slider->subtitle}}</textarea>
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="order">Order<span class="text-danger"></span></label>
                                        <input  type="number" class="form-control" name="order" required value="{{$slider->order}}" min="1" maxlength="10">
                                        <span class="fa fa-phone form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('order') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="image">Image<br><span class="text-black"></span></label>
                                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="image" placeholder=" image">
                                        <span class="glyphicon glyphicon-open-file form-control-feedback" style="top:30px;"></span>
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
     </div>
 </div>
    <!-- /.content -->
@endsection

