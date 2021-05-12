@extends('layouts.app')
@section('title','Update Drink')
@section('content')
		<div class="container">
			  <h2>Update Food</h2>
			  <form class="form-horizontal" method="POST" action="{{ route('drinks.update',$drink->id) }}">
			  	{{ csrf_field() }}
                @method('PUT')
			    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">@lang('Update Drink')</label>

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="{{$drink->name}}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
			   <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                    <label for="quantity" class="col-md-4 control-label">@lang('Quantity')</label>

                    <div class="col-md-6">
                        <input type="text" name="quantity" class="form-control" placeholder="{{$drink->quantity}}">

                        @if ($errors->has('quantity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('buy_price') ? ' has-error' : '' }}">
                    <label for="buy_price" class="col-md-4 control-label">@lang('Buy Price')</label>

                    <div class="col-md-6">
                        <input type="number" name="buy_price" class="form-control" placeholder="{{$drink->buy_price}}">

                        @if ($errors->has('buy_price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('buy_price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('sell_price') ? ' has-error' : '' }}">
                    <label for="sell_price" class="col-md-4 control-label">@lang('Sell Price')</label>

                    <div class="col-md-6">
                        <input type="number" name="sell_price" class="form-control" placeholder="{{$drink->sell_price}}">

                        @if ($errors->has('sell_price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sell_price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('profit') ? ' has-error' : '' }}">

                    <div class="col-md-6">
                        <input type="hidden" name="profit" class="form-control" value="0" placeholder="{{$drink->profit}}">

                        @if ($errors->has('profit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('profit') }}</strong>
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