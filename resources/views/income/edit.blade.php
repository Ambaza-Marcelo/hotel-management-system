@extends('layouts.app')
@section('title','Update income')
@section('content')
		<div class="container">
			  <h2>Update Income</h2>
			  <form class="form-horizontal" method="POST" action="{{ route('incomes.update',$income->id) }}">
			  	{{ csrf_field() }}
                @method('PUT')
			    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label">@lang('Update Income')</label>

                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" placeholder="{{$income->title}}">

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
			   <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                    <label for="total" class="col-md-4 control-label">@lang('Total')</label>

                    <div class="col-md-6">
                        <input type="number" name="total" class="form-control" placeholder="{{$income->total}}">

                        @if ($errors->has('total'))
                            <span class="help-block">
                                <strong>{{ $errors->first('total') }}</strong>
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