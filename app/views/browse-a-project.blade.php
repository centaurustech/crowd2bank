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
                <a href="{{ URL::to("single-page") }}/{{ $projects[$i]['id'] }}">
                    <img class="img-responsive" src="{{ $projects[$i]['thumbnail'] }}">
                </a>
            </div>
            <div class="detailed-cont">
                <h3 class="box-title"><a href="{{ URL::to("single-page") }}/{{ $projects[$i]['id'] }}">{{ $projects[$i]['title'] }}</a></h3>                
                <p class="box-paragraph">{{ $projects[$i]['short_description'] }}</p>
            </div>
            <div class="footer-cont">
                <div class="completed">
                <?php
                    $round = round ( ( $projects[$i]['funded'] / $projects[$i]['target_fund'] ) * 100 );
                    $average = ( $round < 100 ) ? $round : 100;

                    $targetDate =  $projects[$i]['category'];
                    if ( $targetDate == 'completed' )
                    {
                        $completed = ( $average >= 100 ) ? 'sucessful' : 'unsucessful';
                    }
                    else if ( $targetDate == 'current' && $average >= 100 )
                    {
                        $completed = 'sucessful';
                    }        
                    else
                    {
                        $completed = $average;
                    }                

                    if ( $targetDate == 'current' )
                    {
                        if( $average >= 100 )
                        {
                            $progressBar = 'progress-bar-success';
                        }
                        else
                        {
                            $progressBar = '';
                        }
                    }
                    else if ( $targetDate == 'completed' )
                    {
                        if( $average >= 100 )
                        {
                            $progressBar = 'progress-bar-success';
                        }
                        else
                        {
                            $progressBar = 'progress-bar-danger';
                        }
                    }
                    else
                    {
                        $progressBar = '';
                    }

                ?>
                    <p>Completed: {{ $completed }}</p>
                    <div class="progress-plain progress">
                        <div class="progress-bar {{ $progressBar }}" role="progressbar" aria-valuenow="{{ $average }}" aria-valuemin="0" aria-valuemax="{{ $average }}" style="width: {{ $average }}%;">
                        <span class="hide">{{ $average }}%</span>
                        </div>
                    </div>
                </div>
                <ul class="list-custom list-unstyled">
                    <li>Target Fund<span>{{ $projects[$i]['target_fund'] }}</span></li>
                    <li>Funded<span>{{ $projects[$i]['funded'] }}</span></li>
                    <li>Backers<span>{{ $projects[$i]['backers'] }}</span></li>
                </ul>
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