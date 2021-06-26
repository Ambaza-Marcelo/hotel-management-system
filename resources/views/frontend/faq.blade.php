@extends('layouts.app')
@section('title','faq') 

@section('content')
<div class="container-fluid">
	<div class="container">
		<h2>@lang('Frequentry asked questions')</h2>
				<div id="accordion">
					@foreach($faqs as $faq)
						@php
							$qa = json_decode($faq->meta_value);
						@endphp
				                  <h3>{{$qa->q}}</h3>
				                  <div>
				                    <p>
				                    	{!! $qa->a !!}
				                    </p>
				                  </div>
				    @endforeach
				 </div>
	</div>
</div>
@endsection
