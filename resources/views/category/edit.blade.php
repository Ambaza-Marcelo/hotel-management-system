@extends('layouts.app')
@section('title','Update category')
@section('content')
        <div class="container">
              <h2>Update Category</h2>
              <form class="form-horizontal" method="POST" action="{{ route('categories.update',$category->id) }}">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">@lang('Update Category')</label>

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="{{$category->name}}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">        
                  <div class="col-sm-offset-4 col-sm-10">
                    <button type="submit" class="btn btn-default">Update</button>
                  </div>
                </div>
              </form>
        </div>
    @endsection