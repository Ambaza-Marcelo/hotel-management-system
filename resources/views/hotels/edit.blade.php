@extends('layouts.app')

@section('title', __('Edit Hotel'))

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h2 class="text-center">@lang('Edit') {{$hotel->name}}</h2>

            <form class="form-horizontal" action="{{ route('hotels.update', $hotel) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">@lang('Hotel Name')</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $hotel->name }}" placeholder="@lang('Hotel Name')" required>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                    <label for="about" class="col-md-4 control-label">@lang('About Hotel')</label>

                    <div class="col-md-6">
                        <textarea id="about" type="text" class="form-control" name="about"
                            placeholder="@lang('About Hotel')" required>{{ $hotel->about }}</textarea>

                        @if ($errors->has('about'))
                            <span class="help-block">
                                <strong>{{ $errors->first('about') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <a href="{{ route('hotels.index') }}" class="btn btn-primary">@lang('Back')</a>
                        <button type="submit" class="btn btn-danger">@lang('Save')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
