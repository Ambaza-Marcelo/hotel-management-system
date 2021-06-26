@extends('layouts.app')
@section('title','point key')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('point-keys.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>point key List</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>title</th>
		        <th>description</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($pointkeys as $pointKey)     
		      <tr class="success">
		        <td>{{$loop-> index +1}}</td>
		        <td>{{$pointKey->title}}</td>
		        <td>{{$pointKey->description}}</td>
		        <td>
		        	<form action="" method="POST">
		        		@csrf
		        		@method('DELETE')
                	<a class="btn btn-primary btn-sm" role="button" href="">
                             <small>@lang('Edit')</small>
                	</a>
                	<a class="btn btn-danger btn-sm" role="button" href="">
                             <small>@lang('delete')</small>
                	</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
	</div>
@endsection