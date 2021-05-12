@extends('layouts.app')
@section('title','create information')
@section('content')
		<div class="container">
			  <h2>Create Information</h2>
			  <form class="form-horizontal" method="POST" action="{{ route('informations.store') }}">
			  	{{ csrf_field() }}
			    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label">@lang('Create Information')</label>

                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" placeholder="Title">

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
			   <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">@lang('Descriprion')</label>

                        <div class="col-md-6">
                            <textarea id="description" class="form-control" rows="3" name="description" placeholder="@lang('Descriprion')" required>{{ old('description') }}</textarea>

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