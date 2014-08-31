@extends('layouts/master')

@section('content')
        <div id="content">        	
            <div class="container">
				@include('template/crowdlist', array('title'=>'Browse A Project', 'nav'=>'all'))
            </div>
        </div>
@stop