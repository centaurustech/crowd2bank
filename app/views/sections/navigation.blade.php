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
                      @if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
                      <ul>
                        <li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ URL::action('Sentinel\UserController@index') }}">Users</a></li>
                        <li {{ (Request::is('groups*') ? 'class="active"' : '') }}><a href="{{ URL::action('Sentinel\GroupController@index') }}">Groups</a></li>
                      @else
                      <ul>
                        <li class="{{ Request::is( '/') ? 'active' : '' }}"><a href="{{ URL::route("home") }}">Home</a></li>
                        <li class="{{ Request::is( 'browse-a-project') ? 'active' : '' }}"><a href="{{ URL::route("browse-a-project") }}">Browse A Project</a></li>
                        <li class="{{ Request::is( 'create-a-project') ? 'active' : '' }}"><a href="{{ URL::route("create-a-project") }}">Create A Project</a></li>
                        <li class="{{ Request::is( 'about') ? 'active' : '' }}"><a href="{{ URL::route("about") }}">About</a></li>                  
                        @if (Sentry::check())
                        {{-- <li {{ (Request::is('users/' . Session::get('userId') ) ? 'class="active"' : '') }}><a href="/users/{{ Session::get('userId') }}">Profile</a></li> --}}
                        <li class="{{ Request::is('profile') ? 'active' : '' }}"><a href="{{ URL::route('profile') }}">Profile</a></li>                        
                        @else
                        <li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ URL::route('Sentinel\login') }}">Login</a></li>
                        <li {{ (Request::is('register') ? 'class="active"' : '') }}><a href="{{ URL::route('Sentinel\register') }}">Register</a></li>
                        @endif
                      @endif
                      @if (Sentry::check())
                      <li><a href="{{ URL::route('Sentinel\logout') }}">Logout</a></li>
                      @endif
                  </ul>          
              </div>
            </div>
            @unless (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
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
            @endunless

            
          </div>
          <!--/.nav-collapse -->    
        </div>