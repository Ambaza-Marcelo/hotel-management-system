@extends('layouts.app')
@section('title','create point key')
@section('content')
        <div class="container">
              <h2>Create Point Key</h2>
              <form class="form-horizontal" method="POST" action="{{ route('point-keys.store') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label">@lang('Title')</label>

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
                        <textarea class="form-control" name="description"></textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
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