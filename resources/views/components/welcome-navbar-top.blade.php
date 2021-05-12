<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse"
                aria-expanded="false">
                <span class="sr-only">@lang('Toggle Navigation')</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="" style="color: #000;">
                Hotel name
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
        
            <ul class="nav navbar-nav navbar-right">
                
                <li><a href="" style="color: #000;">@lang('Hebergement')</a></li>
                <li class="nav-item">
                    <a href="" class="nav-link nav-link-align-btn"
                        role="button">
                        Restaurant and Bar
                        <span class="label label-danger" style="vertical-align: middle;border-style: none;border-radius: 50%;width: 30px;height: 30px;"></span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle nav-link-align-btn" data-toggle="dropdown" role="button"
                        aria-expanded="false" aria-haspopup="true">
                        
                        &nbsp;&nbsp;Services <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="">@lang('Salle de Reunion')</a>
                        </li>
                        <li>
                            <a href="">@lang('Sauna')</a>
                        </li>
                        <li>
                            <a href="">@lang('Gym Tonic')</a>                                
                        </li>
                        <li>
                            <a href="">@lang('Piscine')</a>                                
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle nav-link-align-btn" data-toggle="dropdown" role="button"
                        aria-expanded="false" aria-haspopup="true">
                        
                        &nbsp;&nbsp;@lang('Gallery')<span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('images-list')}}">@lang('image')</a>
                        </li>
                        <li>
                            <a href="">@lang('Video')</a>
                        </li>
                    </ul>
                </li>
                <li><a href="" style="color: #000;">@lang('Conferency and Event')</a></li>
                <li><a href="" style="color: #000;">@lang('Booking')</a></li>
                <li><a href="" style="color: #000;">@lang('Contact')</a></li>
                <!--<li class="nav-item">
                    
                        @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/home') }}" class="nav-link nav-link-align-btn">@lang('Home')</a>
                                @else
                                    <a href="{{ route('login') }}" class="nav-link nav-link-align-btn">@lang('Login')</a>
                                @endauth
                        @endif
                    
                </li>-->
            </ul>
        </div>
    </div>
</nav>