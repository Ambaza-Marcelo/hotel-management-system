@extends('layouts.app')
@section('title','Food')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('foods.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>Food List</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>id</th>
		        <th>name</th>
		        <th>Quantity</th>
		        <th>Buy Price</th>
		        <th>Sell Price</th>
		        <th>Profit</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($foods as $food)     
		      <tr class="success">
		        <td>{{$food->id}}</td>
		        <td>{{$food->name}}</td>
		        <td>{{$food->quantity}}</td>
		        <td>{{$food->buy_price}} Fbu</td>
		        <td>{{$food->sell_price}} Fbu</td>
		        <td>{{$food->profit}} Fbu</td>
		        <td>
		        	<form action="{{ route('foods.destroy',$food->id) }}" method="POST">
		        		@csrf
		        		@method('DELETE')
		        	<a class="btn btn-info btn-sm" role="button" href="">
                             <small>@lang('Show Food')</small>
                	</a>
                	<a class="btn btn-primary btn-sm" role="button" href="{{ route('foods.edit',$food->id) }}">
                             <small>@lang('Edit Food')</small>
                	</a>
                	<a class="btn btn-danger btn-sm" role="button" href="{{ route('foods.destroy',$food->id) }}">
                             <small>@lang('delete Food')</small>
                	</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
	</div>
@endsection