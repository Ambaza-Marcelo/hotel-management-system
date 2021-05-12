@extends('layouts.app')
@section('title','expense')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('expenses.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>Expense List</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>id</th>
		        <th>Title</th>
		        <th>Total</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($expenses as $expense)     
		      <tr class="success">
		        <td>{{$expense->id}}</td>
		        <td>{{$expense->title}}</td>
		        <td>{{$expense->total}} Fbu</td>
		        <td>
		        	<form action="{{ route('expenses.destroy',$expense->id) }}" method="POST">
		        		@csrf
		        		@method('DELETE')
		        	<a class="btn btn-info btn-sm" role="button" href="">
                             <small>@lang('Show Expense')</small>
                	</a>
                	<a class="btn btn-primary btn-sm" role="button" href="{{ route('expenses.edit',$expense->id) }}">
                             <small>@lang('Edit Expense')</small>
                	</a>
                	<a class="btn btn-danger btn-sm" role="button" href="{{ route('expenses.destroy',$expense->id) }}">
                             <small>@lang('delete Expense')</small>
                	</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
	</div>
@endsection