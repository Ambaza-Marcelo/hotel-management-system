@extends('layouts.app')
@section('title','contact us')

@section('content')

		<div class="container-fluid">
			<div class="container">
				<div class="jumbotron">
					<section>
						<h2>@lang('Contact US')</h2>
						<address>
							<p>
								<strong class="fs-18">@lang('address'):</strong>
								<br/>{{$address->meta_value}}</p>
							<p>
								<strong class="fs-18">@lang('No Phone'):</strong>
								<br/>
								<a href="tel:{{$phone->meta_value}}">{{$phone->meta_value}}</a>

							</p>
							<p>
								<strong class="fs-18">@lang('email'):</strong>
								<br/>
								<a href="mailto:{{$email->meta_value}}" class="email">
									<span class="">{{$email->meta_value}}</span>
								</a>
							</p>
						</address>
					</section>
				</div>
				<div class="col-md-8">
					<section>
						<h2>@lang('contact US')</h2>
						<div class="widget-contact-form">
							<form action="{{URL::route('site.contact_us_form')}}" method="post" enctype="text/plain" class="form-control">
								@csrf
								<input type="text" name="name" value="" size="40" placeholder="@lang('Your name')" aria-invalid="false" aria-required="true" class="form-control">
								<input type="text" class="form-control" name="email" value="" size="40" placeholder="@lang('Your email')" aria-required="true">
								<input type="text" class="form-control" name="subject" value="" size="40" placeholder="@lang('Your subject')" aria-invalid="false" aria-required="true">
								<textarea name="message" class="form-control" cols="40" rows="3" placeholder="@lang('Your message')" aria-invalid="false" aria-required="true"></textarea>
								<button type="submit" class="btn btn-info">@lang('Send')</button>
							</form>
						</div>
					</section>
				</div>
		</div>
	</div>
@endsection

