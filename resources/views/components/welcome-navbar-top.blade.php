<nav class="navbar navbar-default navbar-static-top">
    <div class="container">

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
        
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle nav-link-align-btn" data-toggle="dropdown" role="button">
                        Hotel
                        <span class="label label-danger" style="vertical-align: middle;border-style: none;border-radius: 50%;width: 30px;height: 30px;"></span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('rooms') }}">@lang('Chambres')</a>
                        </li>
                        <li>
                            <a href="{{ url('news') }}">
                                @lang('News')
                            </a>

                        </li>
                        <li>
                            <a href="{{ url('rooms') }}">
                                @lang('Infrastructures')
                            </a>

                        </li>
                        <li>
                            <a href="{{ url('restaurations') }}">
                                @lang('Restauration')
                            </a>

                        </li>
                    </ul>
                </li>
                
                <li><a href="#gallery" style="color: #000;">@lang('Gallerie')</a></li>
                <li><a href="{{url('event-available')}}" style="color: #000;">@lang('Evénément')</a></li>
                <li><a href="#contact" style="color: #000;">@lang('Contact')</a></li>
                <li><a href="#help" style="color: #000;">@lang('Aide')</a></li>
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