@extends('layouts/master')

@section('content')
        <div id="content">
        	@include('sections/carousel')
            <div class="container">
				@include('template/crowdlist', array('title'=>'Current Projects'))
				@include('template/crowdlist', array('title'=>'Completed Projects'))
            </div>
        </div>
@stop