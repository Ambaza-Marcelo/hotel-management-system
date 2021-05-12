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

		@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif

		<form method="post" action="{{ url('admin/report') }}" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="input-group hdmartial control-group lst increment">
				<div class="row">
					<div class="col-lg-6">
						<input type="text" name="title" placeholder="title of report" class="myfrm form-control">
					</div>
					<div class="col-lg-6">
						<input type="file" name="reportnames[]" class="myfrm form-control">
					</div>
				<div class="clone hide">
					<div class="hdmartial control-group lst input-group" id="hdmartial">
						<input type="file" name="reportnames[]" class="myfrm form-control">
						<div class="input-group-btn">
							<button class="btn btn-danger">
								<i class="glyphicon-remove"></i>Remove
							</button>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btnImage">Save</button>
		</form>
	</div>
@endsection