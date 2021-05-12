@extends('layouts.app')
@section('title','Update About US')
@section('content')
		<div class="container">
			  <h2>Create About US</h2>
			  <form class="form-horizontal" method="POST" action="{{ route('abouts.update',$about->id) }}">
			  	{{ csrf_field() }}
                @method('PUT')
			    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">@lang('Create About US')</label>

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="{{$about->name}}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
			   <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                    <label for="telephone" class="col-md-4 control-label">@lang('Telephone')</label>

                    <div class="col-md-6">
                        <input type="text" name="telephone" class="form-control" placeholder="{{$about->telephone}}">

                        @if ($errors->has('telephone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">@lang('Email')</label>

                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="{{$about->email}}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('adress') ? ' has-error' : '' }}">
                    <label for="adress" class="col-md-4 control-label">@lang('Adress')</label>

                    <div class="col-md-6">
                        <input type="text" name="adress" class="form-control" placeholder="{{$about->adress}}">

                        @if ($errors->has('adress'))
                            <span class="help-block">
                                <strong>{{ $errors->first('adress') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                  <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                        <label for="about" class="col-md-4 control-label">@lang('About')</label>

                        <div class="col-md-6">
                            <textarea id="about" class="form-control" rows="3" name="about" placeholder="@lang('about')" required>{{ old('about') }}</textarea>

                            @if ($errors->has('about'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about') }}</strong>
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