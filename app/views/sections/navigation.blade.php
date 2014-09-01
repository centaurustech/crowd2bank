        <div id="header">
          <div class="top">
            <div class="row-custom">
              <div class="container-custom">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="logo" href="{{ URL::route("home") }}">Crowd2Bank</a>
                </div>        
              </div>        
            </div>        
          </div>

          <div id="off-canvas">
            <div class="main-navigation">
              <div class="container-custom">
                <div class="">
                  <ul>
                      <li class="{{ Request::is( '/') ? 'active' : '' }}"><a href="{{ URL::route("home") }}">Home</a></li>
                      <li class="{{ Request::is( 'browse-a-project') ? 'active' : '' }}"><a href="{{ URL::route("browse-a-project") }}">Browse A Project</a></li>
                      <li class="{{ Request::is( 'create-a-project') ? 'active' : '' }}"><a href="{{ URL::route("create-a-project") }}">Create A Project</a></li>
                      <li class="{{ Request::is( 'about') ? 'active' : '' }}"><a href="{{ URL::route("about") }}">About</a></li>

                      {{-- <li class="{{ Request::is( 'profile') ? 'active' : '' }}"><a href="{{ URL::route("profile") }}">Profile</a></li> --}}
                      {{-- <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ URL::route("Sentinel\login") }}">Login</a></li> --}}
                      {{-- <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ URL::to("register") }}">Sign Up</a></li> --}}
                      

                      @if (Sentry::check())
                      {{-- <li {{ (Request::is('users/' . Session::get('userId') ) ? 'class="active"' : '') }}><a href="/users/{{ Session::get('userId') }}">Profile</a></li> --}}
                      <li class="{{ Request::is('profile') ? 'active' : '' }}"><a href="{{ URL::route('profile') }}">Profile</a></li>
                      <li><a href="{{ URL::route('Sentinel\logout') }}">Logout</a></li>
                      @else
                      <li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ URL::route('Sentinel\login') }}">Login</a></li>
                      <li {{ (Request::is('register') ? 'class="active"' : '') }}><a href="{{ URL::route('Sentinel\register') }}">Register</a></li>
                      @endif

                  </ul>
                </div>            
              </div>
            </div>
            <div class="container-custom">
              <div class="social-links-wrap row-custom">
                <div class="social-links">
                    <p class="hidden-xs">stay connected</p>
                    <ul>
                        <li class="facebook"><a href="#">Facebook</a></li>
                        <li class="twitter no-bottom-border"><a href="#">Twitter</a></li>
                    </ul>            
                </div>    
              </div>
            </div>
          </div>
          <!--/.nav-collapse -->    
        </div>