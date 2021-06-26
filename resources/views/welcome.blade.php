@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="container">
  @include('components.welcome-navbar-top')
    <div class="slideshow-container">
        @foreach($sliders as $slider)
          <div class="mySlides">
            <div class="numbertext">{{$slider->title}}</div>
            <img src="{{asset('storage/sliders/'.$slider->image)}}" style="width:100%">
            <div class="text">{{$slider->subtitle}}</div>
          </div>
        @endforeach
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
          <br>

          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
</div>
        
        <br><br><br>
        <div class="" id="iframeGlyphicon">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=kayanza,kirema,maravilla%20hotel&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>

            <div id="glyphicon">
                <ul>
                    <li><span class="glyphicon glyphicon-glass"></span><br><small>Drink</small></li>
                    <li><span class="glyphicon glyphicon-headphones"></span><br><small>Karaoke</small></li>
                    <li><span class="glyphicon glyphicon-briefcase"></span><br><small>Free Parking</small></li>
                </ul>
                <ul>
                    <li><span class="glyphicon glyphicon-cutlery"></span><br><small>Food</small></li>
                    <li><span class="glyphicon glyphicon-bed"></span><br><small>Twin Bed</small></li>
                    <li><span class="glyphicon glyphicon-cog"></span><br><small>Security</small></li>
                </ul>
                <ul>
                    <li><span class="glyphicon glyphicon-certificate"></span><br><small>Free WIFI</small></li>
                    <li><span class="glyphicon glyphicon-lock"></span><br><small>Be Happy</small></li>
                    <li><span class="glyphicon glyphicon-tower"></span><br><small>Swiming Pool</small></li>
                </ul>
            </div>
        </div>
          <div id="accordion">
              @foreach($pointKeys as $pointKey)
                  <h3>{{$pointKey->title}}</h3>
                    <p>
                    {{$pointKey->description}}
                    </p>
              @endforeach
          </div>
              <div class="accordion">
                <h2>@lang('service')</h2>
                @if($ourService)
                <p>{{$ourService->meta_value}}</p>
                  @else
                <p>@lang('empty service')</p>
                  @endif

              </div>

         <div>
               @include('frontend.partial.footer') 
        </div>  
    </div>
</div>
@endsection
