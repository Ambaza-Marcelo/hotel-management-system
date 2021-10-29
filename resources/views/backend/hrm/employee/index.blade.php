@extends('layouts.app')
@section('title','employee list')
@section('content')
	<div class="container">
		@if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
         @endif
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('employees.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>Employee List</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>photo</th>
		        <th>name</th>
		        <th>id card</th>
		        <th>qualification</th>
		        <th>designation</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($employees as $employee)     
		      <tr class="success">
		        <td>{{$loop->index + 1}}</td>
		        <td>
		        	<img class="img-responsive" style="height: 35px; width: 35px;" src="{{ asset('storage/employee/'.$employee->image)}}" alt="">
		        </td>
		        <td>{{$employee->name}}</td>
		        <td>{{$employee->id_card}}</td>
		        <td>{{$employee->qualification}}</td>
		        <td>{{$employee->designation}}</td>
		        <td>
		        	<form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
		        		@csrf
		        		@method('DELETE')
		        	<a class="btn btn-info btn-sm" role="button" href="{{ route('employees.show',$employee->id)}}">
                             <small>@lang('Show Employee')</small>
                	</a>
                	<a class="btn btn-primary btn-sm" role="button" href="{{ route('employees.edit',$employee->id) }}">
                             <small>@lang('Edit Employee')</small>
                	</a>
                	<a class="btn btn-danger btn-sm" role="button" href="{{ route('employees.destroy',$employee->id) }}" onclick="return confirm('voulez-vous vraiment supprimer ?')">
                             <small>@lang('delete Employee')</small>
                	</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
	</div>
@endsection