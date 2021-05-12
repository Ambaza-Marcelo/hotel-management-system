@extends('layouts.app')

@section('title',('hotel pictures'))
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

		<form method="post" action="{{ url('file') }}" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="input-group hdmartial control-group lst increment">
				<input type="file" name="filenames[]" class="myfrm form-control">
				<div class="clone hide">
					<div class="hdmartial control-group lst input-group" id="hdmartial">
						<input type="file" name="filenames[]" class="myfrm form-control">
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