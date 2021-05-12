@extends('layouts.app')
@section('title','Drink')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('drinks.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>Drink List</h2>
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
		      @foreach($drinks as $drink)     
		      <tr class="success">
		        <td>{{$drink->id}}</td>
		        <td>{{$drink->name}}</td>
		        <td>{{$drink->quantity}}</td>
		        <td>{{$drink->buy_price}} Fbu</td>
		        <td>{{$drink->sell_price}} Fbu</td>
		        <td>{{$drink->sell_price - $drink->buy_price }} Fbu</td>
		        <td>
		        	<form action="{{ route('drinks.destroy',$drink->id) }}" method="POST">
		        		@csrf
		        		@method('DELETE')
		        	<a class="btn btn-info btn-sm" role="button" href="">
                             <small>@lang('Show Drink')</small>
                	</a>
                	<a class="btn btn-primary btn-sm" role="button" href="{{ route('drinks.edit',$drink->id) }}">
                             <small>@lang('Edit Drink')</small>
                	</a>
                	<a class="btn btn-danger btn-sm" role="button" href="{{ route('drinks.destroy',$drink->id) }}">
                             <small>@lang('delete Drink')</small>
                	</a>
		        </td>
		      </tr>
		      @endforeach
		      <tfoot>
		      <tr class="info">
		        <th>total</th>
		        <th></th>
		        <th></th>
		        <th></th>
		        <th></th>
		        <th></th>
		        <th></th>
		      </tr>
		    </tfoot>
		    </tbody>
		  </table>
	</div>
@endsection