@extends('layouts.app')
@section('title','category')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('categories.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>Category List</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>id</th>
		        <th>name</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($categories as $category)     
		      <tr class="success">
		        <td>{{$category->id}}</td>
		        <td>{{$category->name}}</td>
		        <td>
		        	<form action="{{ route('categories.destroy',$category->id) }}" method="POST">
		        		@csrf
		        		@method('DELETE')
		        	<a class="btn btn-info btn-sm" role="button" href="">
                             <small>@lang('Show Category')</small>
                	</a>
                	<a class="btn btn-primary btn-sm" role="button" href="{{ route('categories.edit',$category->id) }}">
                             <small>@lang('Edit Category')</small>
                	</a>
                	<a class="btn btn-danger btn-sm" role="button" href="{{ route('categories.destroy',$category->id) }}">
                             <small>@lang('delete Category')</small>
                	</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
	</div>
@endsection