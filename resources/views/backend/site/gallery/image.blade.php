
@extends('layouts.app')
@section('title','gallery')
@section('content')
    <section class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
         @endif
        <div class="row">
            <div class="col-md-12">
                    <div class="header">
                        <h3>Image</h3>
                    </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form  action="{{URL::Route('site.gallery_image')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Image <span class="text-danger"></span> </label>
                                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="image" placeholder="image" required>
                                        <span class="glyphicon glyphicon-open-file"></span>
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </div>
                                    <button type="submit" class="btn btn-info"><i class="fa fa-upload"></i> Upload</button>
                                </form>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


