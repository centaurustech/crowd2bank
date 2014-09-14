@extends('layouts/master')

@section('content')
	<div class="row page-category">
		<h2 class="page-title" style="margin-bottom: 10px;">Glass Bread Toaster <br><small>Fill in your project details</small></h2>
		<p>Please note that all project require approval. Until approved, your users can only pledge and won't be able to accept payments and official arrangement with Crowd2Bank has been made. If you have more questions, feel free to send us an email at info@crowd2bank.com</p>
	</div>		
<div class="row">
    <div class="col-sm-12 ">
        <div class="well custom-well">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-sm-12">
						<h3>You are currently pledging: <strong>$250.00</strong></h3>
					</div>
				</div>
				<div class="form-group">
					<label for="inputTitle" class="col-sm-2 control-label">Payment Mode</label>
					<div class="col-sm-10">
						<select id="paymentMode" class="form-control">
							<option value="bank_to_bank">Bank to Bank</option>
							<option value="paypal">Paypal</option>
						</select>
						<p class="help-block">We currently support Paypal and Bank Deposit payments at the moment. For Paypal Payments, we will direct you to a checkout form so you can send your pledges immediately!</p>
					</div>
				</div>
				<div id="bankDetails" class="form-group">
					<label for="inputContactNumber" class="col-sm-2 control-label">Message</label>
					<div class="col-sm-10">
<textarea id="textareaIntroductions" class="form-control" rows="6" disabled>
Bank Name: Chinabank
Account Name: Andy Lo
Account Number: 968574213
Branch: Hong Kong
Country: Hong Kong
</textarea>
					</div>
				</div>					
				<div class="form-group">
					<label for="inputYourAddress" class="col-sm-2 control-label">Your Address</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputYourAddress" placeholder="Your Address">
						<p class="help-block">Applicable only for Bank Deposit payments. We will contact you as well to assist you.</p>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<div class="col-sm-12">
						<h3>How can we reach you</h3>
					</div>
				</div>
				<div class="form-group">
					<label for="inputFirstName" class="col-sm-2 control-label">First Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
					</div>
				</div>
				<div class="form-group">
					<label for="inputLastName" class="col-sm-2 control-label">Last Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmailAddress" class="col-sm-2 control-label">Email Address</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputEmailAddress" placeholder="Email Address">
						<p class="help-block">If you prefer paypal payments make sure this email is valid and correct</p>
					</div>
				</div>
				<div class="form-group">
					<label for="inputContactNumber" class="col-sm-2 control-label">Contact Number</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputContactNumber" placeholder="Contact Number">
					</div>
				</div>			
				<div class="form-group">
					<label for="inputContactNumber" class="col-sm-2 control-label">Message</label>
					<div class="col-sm-10">
						<textarea id="textareaIntroductions" class="form-control" rows="5"></textarea>
					</div>
				</div>	
				
				<div class="form-group">
					<label class="col-sm-2"></label>
					<div class="col-sm-10">
						<input class="btn btn-primary" type="submit" value="Submit a Pledge">	
						<p class="help-block"><strong>if you have questions or inquiries:</strong><br />Send us an email at info@crowd2bank.com</p>
					</div>
				</div>
			</form>	
        </div>
    </div>
</div>
@stop