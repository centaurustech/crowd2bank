@extends('layouts/master')

@section('content')

            	<div class="profile-page">
            		<div class="container">
            			<div class="col-sm-8 col-md-8 no-padding">
            				<div class="page-category">
            					<h2 class="page-title">Welcome, {{ $users['username'] }}</h2>
            				</div>
            				<div class="img-wrap img-wrap-thumbnail">
            				<img class="img-responsive" src="{{ URL::asset('assets/images/profile.png') }}">
            				</div>
            				<ul class="profile-list list-unstyled">
            					<li><strong>Name:</strong> {{ $users['userFullname'] }}</li>
                                          <li><strong>Email:</strong> {{ $users['email'] }}</li>
            					<li><strong>Contact:</strong> 1234567890</li>
            					<li><strong>Company:</strong> JD Company</li>
            					<li><strong>Total Projects:</strong> 5</li>
            					<li><strong>Total Backers:</strong> 220</li>
            					<li><strong>Type of Membership</strong> Regular Member <a href="#">(Upgrade to Premium click here)</a></li>
            					<li>
            						<ul class="list-unstyle list-inline">
            							<li><a href="#">Edit Profile</a></li>
            							<li><a href="#">Create a Project</a></li>
            							<li><a href="#">Members Scope</a></li>
            							<li><a href="#">Remove Account</a></li>
            						</ul>
            					</li>
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

                              @include('template/profile-createdlist')
                              @include('template/profile-sponsoredlist')

            		</div>
            	</div>
@stop