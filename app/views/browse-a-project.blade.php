@extends('layouts/master')

@section('content')
    {{-- @include('template/crowdlist', array('title'=>'Browse A Project', 'nav'=>'all')) --}}
<div class="row page-category">
    <div class="col-sm-6 col-md-8 no-padding">
        <h2 class="page-title">Browse A Project <br /><small>support and share new projects or inventions</small></h2>
    </div>
</div>
<div class="row crowd-list">
@for ($i = 0; $i < count($projects); $i++)
    <div class="col-sm-6 col-md-3 item-display">
        <div class="crowd-box">
            <div class="status-cont">
                <ul class="list-custom-inline list-unstyled list-inline" data-countdown="{{ $projects[$i]['target_date'] }}">
                    <li><strong>Status:</strong></li>
                </ul>
            </div>
            <div class="img-wrap">
                <a href="#">
                    <img class="img-responsive" src="{{ $projects[$i]['thumbnail'] }}">
                </a>
            </div>
            <div class="detailed-cont">
                <h3 class="box-title"><a href="#">{{ $projects[$i]['title'] }}</a></h3>
                <p class="box-paragraph">{{ $projects[$i]['short_description'] }}</p>
            </div>
        </div>
    </div>


    @if ( ( ($i + 1) % 4) == 0 )
        </div><div class="row crowd-list">
    @endif    
@endfor
</div> <!-- end of crowdlist -->
    <div class="row">
        <div class="col-md-12">
            {{  $projects->links(); }}
        </div>
    </div>

@stop