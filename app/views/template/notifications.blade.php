@if ($message = Session::get('success'))
<div class="alert-wrapper">
	<div class="container-custom">
		<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Success:</strong> {{ $message }}
		</div>
	</div>
	{{ Session::forget('success') }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert-wrapper">
	<div class="container-custom" style="margin-top: 15px;">
		<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Error:</strong> {{ $message }}
		</div>
		{{ Session::forget('error') }}
	</div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert-wrapper">
	<div class="container-custom" style="margin-top: 15px;">
		<div class="alert alert-warning alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Warning:</strong> {{ $message }}
		</div>
	</div>
	{{ Session::forget('warning') }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert-wrapper">
	<div class="container-custom" style="margin-top: 15px;">
		<div class="alert alert-info alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>FYI:</strong> {{ $message }}
		</div>
		{{ Session::forget('info') }}
	</div>
</div>
@endif