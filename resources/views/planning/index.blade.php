@extends('layouts.app')
@section('title','Planning')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('plannings.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>Planning List</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>id</th>
		        <th>Quantity</th>
		        <th>Buy Price</th>
		        <th>Sell Price</th>
		        <th>Profit</th>
		        <th>About</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($plannings as $planning)     
		      <tr class="success">
		        <td>{{$planning->id}}</td>
		        <td>{{$planning->quantity}}</td>
		        <td>{{$planning->buy_price}} Fbu</td>
		        <td>{{$planning->sell_price}} Fbu</td>
		        <td>{{$planning->sell_price - $planning->buy_price }} Fbu</td>
		        <td>{{ $planning->about }}</td>
		        <td>
		        	<form action="{{ route('plannings.destroy',$planning->id) }}" method="POST">
		        		@csrf
		        		@method('DELETE')
		        	<a class="btn btn-info btn-sm" role="button" href="">
                             <small>@lang('Show Planning')</small>
                	</a>
                	<a class="btn btn-primary btn-sm" role="button" href="{{ route('plannings.edit',$planning->id) }}">
                             <small>@lang('Edit Planning')</small>
                	</a>
                	<a class="btn btn-danger btn-sm" role="button" href="{{ route('plannings.destroy',$planning->id) }}">
                             <small>@lang('delete Planning')</small>
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