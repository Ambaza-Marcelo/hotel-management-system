@extends('layouts.app')
@section('title','expense')
@section('content')
	<div class="container">
		<div style="margin-top: 10px;">        
			      <div class=" col-sm-10">
			        <a href="{{ route('incomes.create') }}" class="btn btn-primary">+create</a>
			      </div>
		</div>
		<div class="panel panel-header">
			<h2>Income List</h2>
		</div>
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Title</th>
		        <th>Total</th>
		        <th>Date</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
		      @foreach($incomes as $income)     
		      <tr class="success">
		        <td>{{$loop->index + 1}}</td>
		        <td>{{$income->title}}</td>
		        <td>{{$income->total}} Fbu</td>
		        <td>{{$income->created_at }}</td>
		        <td>
		        	<a class="btn btn-info btn-sm" role="button" href="">
                             <small>@lang('Show Income')</small>
                	</a>
                	<a class="btn btn-primary btn-sm" role="button" href="{{ route('incomes.edit',$income->id) }}">
                             <small>@lang('Edit Income')</small>
                	</a>
                	<a class="btn btn-danger btn-sm" role="button" href="{{ route('incomes.destroy',$income->id) }}">
                             <small>@lang('delete Income')</small>
                	</a>
		        </td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
	</div>
@endsection