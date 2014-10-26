<div class="profile-page">
      <div class="container">
            <div class="col-sm-8 col-md-8 no-padding">
                  <div class="page-category">
                        @if ( $data['profile']['fullname'] )       
                              <h2 class="page-title">Welcome, {{ $data['profile']['fullname'] }}</h2>
                        @else
                              <h2 class="page-title">Hi, {{ $data['profile']['email'] }}</h2>
                              <p>You can start adding/sponsoring a project/s once you update your profile.</p>
                        @endif
                  </div>
                  <div class="img-thumbnail-warp">
                        <div class="img-wrap img-thumbnail">
                              <img class="img-responsive" src="{{ URL::asset('assets/images/profile.png') }}">
                              <a id="upload-image" class="btn btn-default" href="#">Upload Image</a>
                        </div>                     
                  </div>
                  <ul class="profile-list list-unstyled">
                        <li><strong>Name</strong> 
                        @if ( $data['profile']['fullname'] )
                              {{ $data['profile']['fullname'] }}
                        @else
                              <a href="#">Edit Name</a>                              
                        @endif
                        </li>
                        <li><strong>Email:</strong> {{ $data['profile']['email'] }}</li>
                        <li><strong>Contact:</strong> 
                        @if ( $data['profile']['contact'] )
                              {{ $data['profile']['contact'] }}
                        @else
                              <a href="#">Edit Name</a>                              
                        @endif
                        </li>
                        <li><strong>Company:</strong> 
                        @if ( $data['profile']['company'] )
                              {{ $data['profile']['company'] }}
                        @else
                              <a href="#">Edit Name</a>
                        @endif
                        </li>
                        <li><strong>Total Projects:</strong> {{ $data['profile']['total_projects'] }}</li>
                        <li><strong>Total Backers:</strong> {{ $data['profile']['total_backers'] }}</li>
                        <li><strong>Type of Membership:</strong> {{ $data['profile']['membership'] }}</li>
                  </ul>               
                  <ul class="list-unstyle list-inline">
                        <li><a href="#">Edit Profile</a></li>
                        <li><a href="{{ URL::route('create-a-project') }}">Create a Project</a></li>
                        <li><a href="#" data-modal-trigger="account" data-modal-value="scope">Members Scope</a></li>
                        <li><a href="#" data-modal-trigger="account" data-modal-value="remove">Remove Account</a></li>
                  </ul>
            </div>
            <div class="col-sm-4 col-md-4 no-padding">
                  <div class="page-category">
                        <h2 class="page-title-small">Video Introduction<br /><small>an introduction about yourself or project.</small></h2>
                  </div>
                  <div class="img-wrap">                      
                        <div class='responsive-video-wrapper'><iframe src='http://player.vimeo.com/video/99462237' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
                  </div>
            </div>
            @include('template/profile-createdlist', array('current_projects' => $data['current_projects']))
            @include('template/profile-sponsoredlist', array('sponsored_projects' => $data['sponsored_projects']))
      </div>
</div>