@extends('layouts.app')
@section('title','Information')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('informations.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>Information List</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Title</th>
		        <th>Description</th>
		        <th>Date</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($informations as $information)     
		      <tr class="success">
		        <td>{{$loop->index + 1}}</td>
		        <td>{{$information->title}}</td>
		        <td>{{$information->description}}</td>
		        <td>{{$informations->created_at }}</td>
		        <td>
		        	<a class="btn btn-info btn-sm" role="button" href="">
                             <small>@lang('Show Information')</small>
                	</a>
                	<a class="btn btn-primary btn-sm" role="button" href="{{ route('informations.edit',$information->id) }}">
                             <small>@lang('Edit Information')</small>
                	</a>
                	<a class="btn btn-danger btn-sm" role="button" href="{{ route('informations.destroy',$information->id) }}">
                             <small>@lang('delete Information')</small>
                	</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
	</div>
@endsection