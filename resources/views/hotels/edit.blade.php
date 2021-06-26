
@extends('layouts.app')
@section('title','Edit Ambazapp')
@section('content')
    <div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form novalidate id="entryForm" action="{{ route('hotels.update', $hotel) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="name">Name<span class="text-danger"></span></label>
                                        <input autofocus type="text" class="form-control" name="name" placeholder="{{$hotel->name}}" value="{{$hotel->name}}" required minlength="2" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="about">Description<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="about" placeholder="{{$hotel->about}}" value="{{$hotel->about}}">
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('about') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="adress">Adress<span class="text-danger"></span></label>
                                        <input  type="text" class="form-control" name="adress" required placeholder="{{$hotel->adress}}" value="{{$hotel->adress}}" min="1" maxlength="10">
                                        <span class="fa fa-phone form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('adress') }}</span>
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
                            <button type="submit" class="btn btn-info">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
     </div>
 </div>
    <!-- /.content -->
@endsection

