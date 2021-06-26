@extends('layouts.app')
@section('title','create command drink')
@section('content')
        <div class="container">
              <h2>Create command drink</h2>
              <form class="form-horizontal" method="POST" action="{{ route('command-drink.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label">@lang('Create command drink')</label>

                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" placeholder="title">

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
               <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-4 control-label">@lang('Description')</label>

                    <div class="col-md-6">
                        <input type="text" name="description" class="form-control" placeholder="description">

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('old_price') ? ' has-error' : '' }}">
                    <label for="buy_price" class="col-md-4 control-label">@lang('Old Price')</label>

                    <div class="col-md-6">
                        <input type="number" name="old_price" class="form-control" placeholder="Old price">

                        @if ($errors->has('old_price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('old_price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('new_price') ? ' has-error' : '' }}">
                    <label for="new_price" class="col-md-4 control-label">@lang('New Price')</label>

                    <div class="col-md-6">
                        <input type="number" name="new_price" class="form-control" placeholder="New Price">

                        @if ($errors->has('new_price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new_price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="col-md-4 control-label">@lang('type')</label>

                    <div class="col-md-6">
                        <input type="text" name="type" class="form-control" placeholder="type">

                        @if ($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="col-md-4 control-label">@lang('Image')</label>
                <div class="col-md-6">
                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="image" placeholder=" image">
                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
                <div class="form-group">        
                  <div class="col-sm-offset-4 col-sm-10">
                    <button type="submit" class="btn btn-default">Save</button>
                  </div>
                </div>
        </form>
        </div>
    @endsection