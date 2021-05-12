@extends('layouts.app')
@section('title','create Planning')
@section('content')
		<div class="container">
			  <h2>Create Planning</h2>
			  <form class="form-horizontal" method="POST" action="{{ route('plannings.store') }}">
			  	{{ csrf_field() }}
			    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label">@lang('Create Planning')</label>

                    <div class="col-md-6">
                        <input type="text" name="title" class="form-control" placeholder="title">

                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
			   <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                    <label for="quantity" class="col-md-4 control-label">@lang('Quantity')</label>

                    <div class="col-md-6">
                        <input type="text" name="quantity" class="form-control" placeholder="Quantity">

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
                        <input type="number" name="buy_price" class="form-control" placeholder="Buy price">

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
                        <input type="number" name="sell_price" class="form-control" placeholder="Sell Price">

                        @if ($errors->has('sell_price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sell_price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('profit') ? ' has-error' : '' }}">

                    <div class="col-md-6">
                        <input type="hidden" name="profit" class="form-control" value="0" placeholder="Profit">

                        @if ($errors->has('profit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('profit') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                        <label for="about" class="col-md-4 control-label">@lang('About')</label>

                        <div class="col-md-6">
                            <textarea id="about" class="form-control" rows="3" name="about" placeholder="@lang('About Planning')" required>{{ old('about') }}</textarea>

                            @if ($errors->has('about'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about') }}</strong>
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