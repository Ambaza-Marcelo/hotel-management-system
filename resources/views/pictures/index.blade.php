@extends('layouts.app')
@section('title',('pictures hotels'))
@section('content')

<div class="container" id="container-pictures">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg" style="width:100%">
  <div id="imgtext"></div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="{{asset('sliders/a.jpg')}}" alt="Coffe" onclick="myFunction(this);">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
      </div>
    </div>
  
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="{{asset('sliders/b.jpg')}}" alt="Tea" onclick="myFunction(this);">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
      <img src="{{asset('sliders/c.jpg')}}" alt="Tea" onclick="myFunction(this);">
          <div class="caption">
            <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
