@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div style="display: flex;">
    <input type="text" class="typeahead form-control">
    <input type="submit" value="Search">
  </div>
        <div id="gradient">
               @include('components.welcome-navbar-top')
              <br>
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
             
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                
                <div class="carousel-inner" role="listbox">

                  <div class="item active">
                    <img src="{{asset('sliders/a.jpg')}}" alt="marcelo" width="460" height="345">
                    <div class="carousel-caption">
                      <h3>marcelo</h3>
                      <p>martial ambaza</p>
                    </div>
                  </div>

                  <div class="item">
                    <img src="{{asset('sliders/b.jpg')}}" alt="martial" width="460" height="345">
                    <div class="carousel-caption">
                      <h3>ambaza</h3>
                      <p>martial ambaza</p>
                    </div>
                  </div>
                
                  <div class="item">
                    <img src="{{asset('sliders/c.jpg')}}" alt="ambaza" width="460" height="345">
                    <div class="carousel-caption">
                      <h3>martial</h3>
                      <p>martial ambaza.</p>
                    </div>
                  </div>

                  <div class="item">
                    <img src="{{asset('sliders/d.jpg')}}" alt="decruise" width="460" height="345">
                    <div class="carousel-caption">
                      <h3>de cruise</h3>
                      <p>martial ambaza</p>
                    </div>
                  </div>
              
                </div>

                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        <br><br><br>
        <div class="" id="iframeGlyphicon">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="580" height="477" id="gmap_canvas" src="https://maps.google.com/maps?q=bujumbura,burundi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>

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
        <div id="accordionIframeVideo">
            <div id="accordion">
                  <h3>Martial 1</h3>
                  <div>
                    <p>
                    Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                    ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                    amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                    odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                    </p>
                  </div>
                  <h3>Martial 2</h3>
                  <div>
                    <p>
                    Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                    purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                    velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                    suscipit faucibus urna.
                    </p>
                  </div>
                  <h3>Martial 3</h3>
                  <div>
                    <p>
                    Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                    Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                    ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                    lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                    </p>
                    <ul>
                      <li>List item one</li>
                      <li>List item two</li>
                      <li>List item three</li>
                    </ul>
                  </div>
                  <h3>Martial 4</h3>
                  <div>
                    <p>
                    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                    mauris vel est.
                    </p>
                    <p>
                    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                    inceptos himenaeos.
                    </p>
                  </div>
            </div>
            <div>

            </div>
        </div>    
</div>
@endsection
