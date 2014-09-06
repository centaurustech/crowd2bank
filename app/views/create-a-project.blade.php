@extends('layouts/master')

@section('content')
<div class="row page-category">
	<h2 class="page-title" style="margin-bottom: 10px;">Create A Project <br><small>Fill in your project details</small></h2>
	<p>Please note that all project require approval. Until approved, your users can only pledge and won't be able to accept payments and official arrangement with Crowd2Bank has been made. If you have more questions, feel free to send us an email at info@crowd2bank.com</p>
</div>

<div class="well">
<form class="form-horizontal" role="form">
	<div class="form-group">
		<p class="col-sm-2 control-label"><strong>About Your Project</strong></p>
	</div>
	<div class="form-group">
		<label for="inputTtile" class="col-sm-2 control-label">Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTtile" placeholder="Title">
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Project Label</label>
		<div class="col-sm-10">
			<div id="dropdown-custom-trigger" class="dropdown dropdown-custom">
				<button class="btn btn-default btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
					Sorted By
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="min-width: 360px;">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="inputMainPhoto" class="col-sm-2 control-label">Main Photo</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="inputMainPhoto" placeholder="Main Photo">
			<p class="help-block">Please note that only jpeg and png images files are supported.</p>
		</div>
	</div>
	<div class="form-group">
		<label for="inputTargetAmount" class="col-sm-2 control-label">Target Amount</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputTargetAmount" placeholder="Target Amount">
			<p class="help-block">Amount should be in Dollars($), and there is no need to add commas on the digits.</p>
		</div>
	</div>
	<hr>
	<div class="form-group">
		<p class="col-sm-2 control-label"><strong>Introduction</strong></p>
	</div>
	<div class="form-group">
		<label for="textareaShortDescription" class="col-sm-2 control-label">Short Description</label>
		<div class="col-sm-10">
			<textarea id="textareaShortDescription" class="form-control" rows="3"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="textareaIntroductions" class="col-sm-2 control-label">Introductions</label>
		<div class="col-sm-10">
			<textarea id="textareaIntroductions" class="form-control" rows="5"></textarea>
			<p class="help-block">This section supports HTML Code. You can Vimeo or Youtube Embed Code, preferably 560px in width and 315px in height.</p>
		</div>
	</div>
	<hr>
	<div class="form-group">
		<label for="textareaProjectDescription" class="control-label">Project Description</label>
		<textarea id="textareaProjectDescription" class="form-control" rows="3"></textarea>
	</div>
	<hr>
	<div class="form-group">
		<p class="col-sm-2 control-label"><strong>Incentives for supporters</strong></p>
	</div>
	<div class="form-group">
		<label for="textareaIncentives" class="col-sm-2 control-label">Incentives</label>
		<div class="col-sm-10">
			<textarea id="textareaIncentives" class="form-control" rows="5"></textarea>
			<p class="help-block"><a href="#">-Remove</a></p>
		</div>
	</div>
	<div class="form-group">
		<label for="inputAmountSupported" class="col-sm-2 control-label">Amount Supported</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputAmountSupported" placeholder="Amount Supported">
			<p class="help-block">Amount should be in Dollars($), and there is no need to add commas on the digits.</p>
		</div>
	</div>
	<div class="form-group">
		<label for="textareaIncentivesDetails" class="col-sm-2 control-label">Incentives Details</label>
		<div class="col-sm-10">
			<textarea id="textareaIncentivesDetails" class="form-control" rows="5"></textarea>
			<p class="help-block"><a href="#">-Add More</a></p>
		</div>
	</div>
	<hr>
	<div class="form-group">
		<p class="col-sm-2 control-label"><strong>Published</strong></p>
	</div>
	<div class="form-group">
		<label for="textareaIncentivesDetails" class="col-sm-2 control-label">Incentives Details</label>
		<div class="col-sm-10">
			<div class="checkbox">
				<label>
				<input type="checkbox"> Published
				</label>
			</div>
		</div>
	</div>
	<hr>
	<div class="form-group">
		<p class="col-sm-2 control-label"><strong>Contact Information</strong></p>
	</div>
	<div class="form-group">
		<label for="inputContactName" class="col-sm-2 control-label">Contact Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputContactName" placeholder="Contact Name">		
		</div>
	</div>
	<div class="form-group">
		<label for="inputContactNumber" class="col-sm-2 control-label">Contact Number</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="inputContactNumber" placeholder="Contact Number">		

		</div>
	</div>
</form>	
</div>

@stop