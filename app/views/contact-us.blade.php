@extends('layouts/master')

@section('content')
	<div class="row page-category">
		<h2 class="page-title">Contact Us<br><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptate, blanditiis molestias voluptatem culpa a? Repudiandae laboriosam necessitatibus aspernatur dolore mollitia, dignissimos facilis quae porro accusamus a dicta, repellendus, itaque.</small></h2>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="well custom-well">
				<form class="form-horizontal">

	                    <div class="form-group">
	                        <p class="col-sm-12 control-label text-left"><strong><span class="col-sm-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus earum assumenda dolore esse autem illo neque ab voluptas eaque nisi eligendi ex minus, blanditiis recusandae illum, rerum dicta, aperiam natus?</span></strong></p>
	                    </div>

	                    <div class="form-group">
	                        <label for="inputName" class="col-sm-2 control-label">Name</label>
	                        <div class="col-sm-5">
	                            <input class="form-control" placeholder="Name" name="name" type="text">
	                        </div>
	                        <div class="col-sm-5">
	                            
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
	                        <div class="col-sm-5">
	                            <input class="form-control" placeholder="Email" name="email" type="text">                            
	                        </div>    
	                        <div class="col-sm-5">
	                            
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="inputSubject" class="col-sm-2 control-label">Subject</label>
	                        <div class="col-sm-5">
	                            <input class="form-control" placeholder="Subject" name="subject" type="text">
	                        </div>
	                        <div class="col-sm-5">
	                            
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="inputMessage" class="col-sm-2 control-label">Message</label>
	                        <div class="col-sm-5">
	                            <textarea id="textareaShortDescription" class="form-control" rows="7"></textarea>
	                        </div>
	                        <div class="col-sm-5">
	                            
	                        </div>
	                    </div>

	                    <div class="form-group">	                        
	                        <div class="col-sm-5 col-sm-offset-2">
	                            <input class="btn btn-primary" type="submit" value="Send Message">	                            
	                        </div>
	                    </div>

				</form>
			</div>
		</div>
	</div>
@stop