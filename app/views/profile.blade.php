@extends('layouts/master')

@section('body')
        <div id="content">        	
            <div class="container">
            	<div class="profile-page">
            		<div class="container">
            			<div class="col-sm-8 col-md-8 no-padding">
            				<div class="page-category">
            					<h2 class="page-title">Welcome, Username</h2>
            				</div>
            				<div class="img-wrap img-wrap-thumbnail">
            				<img class="img-responsive" src="{{ URL::asset('assets/images/profile.png') }}">
            				</div>
            				<ul class="profile-list list-unstyled">
            					<li><strong>Name:</strong> John Doe</li>
            					<li><strong>Contact:</strong> 1234567890</li>
            					<li><strong>Email:</strong> johndoe@gmail.com</li>
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
            			<div class="row page-category">
            				<div class="col-sm-6 col-md-9 no-padding">
            					<h2 class="page-title">Current Project<br /><small>support and share new projects or inventions</small></h2>
            				</div>
            				<div class="col-sm-6 col-md-3 no-padding">
            					<div id="dropdown-custom-trigger" class="dropdown dropdown-custom">
            						<button class="btn btn-default btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
            							Sorted By
            							<span class="caret"></span>
            						</button>
            						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
            							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
            							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
            							<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
            						</ul>
            					</div>
            				</div>                    
            			</div>
            			<div class="row">
            				<div class="col-sm-12">
            					<div class="table-custom">
            						<div class="table-responsive">
            							<table class="table">
            								<thead>
            									<tr>
            										<th>Title Project</th>
            										<th>Date</th>
            										<th>Status</th>
            										<th>Total Funds</th>
            										<th>Actions</th>
            									</tr>
            								</thead>
            								<tbody>
            									<tr>
            										<td><a href="/single-page.html">Glass Bread Toaster</a></td>
            										<td>July 6, 2014</td>
            										<td><span class="font-ligth-blue">5 Days | 3 Hours | 40 Mins</span></td>
            										<td>US$ 2500</td>
            										<td><a href="#">Edit</a> | <a href="#" class="font-red">Delete</a></td>
            									</tr>
            									<tr>
            										<td><a href="/single-page.html">Glass Bread Toaster</a></td>
            										<td>July 6, 2014</td>
            										<td><span class="font-ligth-blue">5 Days | 3 Hours | 40 Mins</span></td>
            										<td>US$ 2500</td>
            										<td><a href="#">Edit</a> | <a href="#" class="font-red">Delete</a></td>
            									</tr>
            									<tr>
            										<td><a href="/single-page.html">Glass Bread Toaster</a></td>
            										<td>July 6, 2014</td>
            										<td><span class="font-ligth-blue">5 Days | 3 Hours | 40 Mins</span></td>
            										<td>US$ 2500</td>
            										<td><a href="#">Edit</a> | <a href="#" class="font-red">Delete</a></td>
            									</tr>
            								</tbody>
            							</table>                            
            						</div>                            
            					</div>

            				</div>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
@stop