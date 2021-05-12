@extends('layouts.app')
@section('title','About US')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('abouts.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>About US</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>id</th>
		        <th>name</th>
		        <th>telephone</th>
		        <th>email</th>
		        <th>adress</th>
		        <th>About</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($abouts as $about)     
		      <tr class="success">
		        <td>{{$about->id}}</td>
		        <td>{{$about->name}}</td>
		        <td>{{$about->telephone}}</td>
		        <td>{{$about->email}}</td>
		        <td>{{$about->adress}}</td>
		        <td>{{$about->about}}</td>
		        <td>
		        	<form action="{{ route('abouts.destroy',$about->id) }}" method="POST">
		        		@csrf
		        		@method('DELETE')
		        	<a class="btn btn-info btn-sm" role="button" href="">
                             <small>@lang('Show About')</small>
                	</a>
                	<a class="btn btn-primary btn-sm" role="button" href="{{ route('abouts.edit',$about->id) }}">
                             <small>@lang('Edit About')</small>
                	</a>
                	<a class="btn btn-danger btn-sm" role="button" href="{{ route('abouts.destroy',$about->id) }}">
                             <small>@lang('delete About')</small>
                	</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
	</div>
@endsection