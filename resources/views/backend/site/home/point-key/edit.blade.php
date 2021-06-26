@extends('layouts.app')
@section('title','edit point key')
@section('content')
	<div class="container-fluid">
		<div class="container">
			<div class="panel panel-header">
				edit point key
			</div>
			<form class="form-control" method="post" action="">
				<input type="hidden" name="" method="put">
				@csrf
				<div class="row">
					<div class="col-md-12 col-xs-18">
						<div class="form-group">
							<label class="form-control" for="title">Title</label>
							<input type="text" name="title" value="{{$pointkey->title}}" class="form-control">
						</div>
						<div>
							<span>{{$errors->first('title')}}</span>
						</div>
					</div>
					<div class="col-md-12 col-xs-18">
						<div class="form-group">
							<label for="descriprion">Description</label>
							<textarea id="descriprion" class="form-control">{{$pointkey->description}}</textarea>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection