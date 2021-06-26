@extends('layouts.app')
@section('title','gallery')
@section('content')
	



<div class="container">
	@foreach($images as $image)
	  <div class="mySlides">
	    <div class="numbertext">1 / </div>
	    <img src="{{asset('storage/gallery/'.$image->meta_value)}}" style="width:100%">
	  </div>
    @endforeach
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
  	@foreach($images as $image)
	    <div class="column">
	      <img class="demo cursor" src="{{asset('storage/gallery/'.$image->meta_value)}}" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
	    </div>
    @endforeach
  </div>
</div>
@endsection
