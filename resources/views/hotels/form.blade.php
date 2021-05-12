<button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#hotelModal" dusk="create-school-button">
    + @lang('Create Hotel')
</button>

<!-- Modal -->
<div class="modal fade" id="hotelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal" method="POST" action="{{ route('hotels.store') }}">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">@lang('Create Hotel')</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('hotel_name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">@lang('Hotel Name')</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="@lang('Hotel Name')" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
                        <label for="language" class="col-md-4 control-label">@lang('Hotel language')</label>

                        <div class="col-md-6">
                            <select id="language" class="form-control" name="language">
                                <option selected="selected">@lang('English')</option>
                                <option>@lang('French')</option>
                            </select>

                            @if ($errors->has('language'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('language') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('adress') ? ' has-error' : '' }}">
                        <label for="adress" class="col-md-4 control-label">@lang('adress')</label>

                        <div class="col-md-6">
                            <input id="adress" type="text" class="form-control" name="adress" value="{{ old('adress') }}" placeholder="@lang('adress')" required>

                            @if ($errors->has('adress'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('adress') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                        <label for="logo" class="col-md-4 control-label">@lang('logo')</label>

                        <div class="col-md-6">
                            <input id="logo" type="file" class="form-control" name="logo" required>

                            @if ($errors->has('logo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('logo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                        <label for="about" class="col-md-4 control-label">@lang('About')</label>

                        <div class="col-md-6">
                            <textarea id="about" class="form-control" rows="3" name="about" placeholder="@lang('About Hotel')" required>{{ old('about') }}</textarea>

                            @if ($errors->has('about'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('about') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('Save')</button>
                </div>
            </div>
        </form>
    </div>
</div>
