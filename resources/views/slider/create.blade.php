@extends('layouts.app')

@section('title',('hotel report'))
@section('content')
	<div class="container lst">
		@if(count($errors)>0)
		<div class="alert alert-danger">
			<strong>Sorry!</strong>
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
			
		</div>
		@endif

		<form method="post" action="{{ url('admin/slider/store') }}" enctype="multipart/form-data">
			@csrf

			<div class="row">
				<div class="col-md-4">
					<br>
					<input type="text" name="title" class="form-control" placeholder="add title">
				</div>
				<div class="col-md-12">
					<br>
					<input type="file" name="image" class="image">
				</div>
				<div class="col-md-12">
					<br>
					<button type="submit" class="btn btn-primary btnImage">Upload Image</button>	
				</div>
			</div>
		</form>
	</div>
@endsection