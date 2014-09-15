@extends('layouts/master')

@section('content')
                  
            	<div class="profile-page">
            		<div class="container">
            			<div class="col-sm-8 col-md-8 no-padding">
                                    <div class="page-category">                                          
                                          <h2 class="page-title">Welcome, {{ $data['profile']['username'] }}</h2>
                                    </div>
                                    <div class="img-wrap img-wrap-thumbnail">
                                          <img class="img-responsive" src="{{ URL::asset('assets/images/profile.png') }}">
                                    </div>
                                    <ul class="profile-list list-unstyled">
                                          <li><strong>Name</strong> {{ $data['profile']['fullname'] }}</li>
                                          <li><strong>Email:</strong> {{ $data['profile']['email'] }}</li>
                                          <li><strong>Contact:</strong> {{ $data['profile']['contact'] }}</li>
                                          <li><strong>Company:</strong> {{ $data['profile']['company'] }}</li>
                                          <li><strong>Total Projects:</strong> {{ $data['profile']['total_projects'] }}</li>
                                          <li><strong>Total Backers:</strong> {{ $data['profile']['total_backers'] }}</li>
                                          <li><strong>Type of Membership:</strong> {{ $data['profile']['membership'] }} <a href="#">(Upgrade to Premium click here)</a></li>
                                          <li>
                                                <ul class="list-unstyle list-inline">
                                                      <li><a href="#">Edit Profile</a></li>
                                                      <li><a href="{{ URL::route('create-a-project') }}">Create a Project</a></li>
                                                      <li><a href="#">Members Scope</a></li>
                                                      <li><a href="#">Remove Account</a></li>
                                                </ul>
                                          </li>
                                    </ul>               
            			</div>
                        @unless (Sentry::check() && Sentry::getUser()->hasAccess('admin'))      
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
                        @endunless
            		</div>
            	</div>
@stop