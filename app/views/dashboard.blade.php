@extends('layouts/master')

@section('content')
	<div class="dashboard">
        <div class="row page-category">
              <div class="col-sm-12 no-padding">
                    <h2 class="page-title">Dashboard</h2>
              </div>                  
        </div>
        @include('template/dashboard-projectlist', array('current_projects' => $data['current_projects']))
	</div>
@stop