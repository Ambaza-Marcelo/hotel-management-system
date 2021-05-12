@extends('layouts.app')
@section('title','create category')
@section('content')
        <div class="container">
              <h2>Create Category</h2>
              <form class="form-horizontal" method="POST" action="{{ route('categories.store') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">@lang('Create Category')</label>

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="name">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
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