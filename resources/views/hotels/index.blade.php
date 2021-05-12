@extends('layouts.app')

@section('title', __('Manage Hotels'))

@section('content')
    <div class="container-fluid">
        <div class="col-md-12" id="main-container">
            <div class="panel panel-default">
                <div class="panel-body table-responsive">
                    @include('hotels.form')
                    <h2>@lang('Hotel List')</h2>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Code')</th>
                                <th scope="col">@lang('About')</th>
                                <th scope="col">@lang('Logo')</th>
                                <th scope="col">@lang('Edit')</th>
                                <th scope="col">+@lang('Admin')</th>
                                <th scope="col">@lang('View Admins')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $hotel)
                                <tr>
                                    <td>{{($loop->index + 1)}}</td>
                                    <td><small>{{$hotel->name}}</small></td>
                                    <td><small>{{$hotel->code}}</small></td>
                                    <td><small>{{$hotel->about}}</small></td>
                                    <td><small><img src="{{$hotel->logo}}"></small></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" role="button" href="{{ route('hotels.edit', $hotel) }}" dusk="edit-hotel-link">
                                            <small>@lang('Edit Hotel')</small>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" role="button" href="{{url('register/admin/'.$hotel->id.'/'.$hotel->code)}}">
                                            <small>+ @lang('Create Admin')</small>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm" role="button" href="{{url('hotel/admin-list/'.$hotel->id)}}">
                                            <small>@lang('View Admins')</small>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $hotels->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
