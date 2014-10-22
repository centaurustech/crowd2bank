@extends('layouts/master')

@section('content')
    <div class="row page-category">
        <div class="col-sm-12 no-padding">
            <h2 class="page-title"> {{ $project['single']['title'] }}<br /><small >Project by: <a href="#" class="author">{{ $project['single']['author'] }}</a></small></h2>
        </div>                
    </div>
                <div class="row">
                    <div class="post-content col-sm-8 col-md-8">
                      <div class="post-image-wrap">
                        <img class="img-responsive" src="{{ $project['single']['thumbnail'] }}" style="min-width: 740px;">
                      </div>

                      @if ( $project['single']['status'] == 1 ) 
                      <div class="inline-social-links">
                        <span class="title">Help by sharing this to your friends:</span>
                        <ul class="list-inline list-unstyle">
                          <li>
                              <a href="#" class="icon facebook">facebook</a><span class="count-likes">{{ $project['single']['facebook_count'] }}</span>
                          </li>
                          <li>
                              <a href="#" class="icon twitter">Twiiter</a><span class="count-likes">{{ $project['single']['twitter_count'] }}</span>
                          </li>
                        </ul>
                      </div>
                      @endif

                      <h3 class="page-title">Project Description</h3>
                      {{ $project['single']['full_description'] }}

                    </div>
                    <div class="sidebar col-sm-4 col-md-4">
                      <div class="sidebar-wrap">
                        <div class="status-cont text-center">
                          <p class="page-title-blue"></p>
                          @if ( $project['single']['status'] == 1 )
                          <ul class="list-custom-inline list-unstyled list-inline" data-countdown="{{ $project['single']['target_date'] }}">
                              <li><strong>Status:</strong></li>
                          </ul>
                          @else
                          <ul class="list-custom-inline list-unstyled list-inline">
                              <li><strong>Status:</strong></li>
                              <li><strong>{{ $project['single']['status'] }}</strong></li>
                          </ul>
                          @endif
                        </div>
                        <hr>
                        <div class="footer-cont">
                        <?php
                            $round = round ( ( $project['single']['funded'] / $project['single']['target_fund'] ) * 100 );
                            $average = ( $round < 100 ) ? $round : 100;

                            $targetDate =  $project['single']['category'];
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
                                $completed = $average . ' %';
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
                          <div class="completed">
                            <p>Completed:  {{ $completed }}</p>
                            <div class="progress-plain progress">
                              <div class="progress-bar {{ $progressBar }}" role="progressbar" aria-valuenow="{{ $average }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $average }}%;">
                                <span class="hide">{{ $average }}%</span>
                              </div>
                            </div>
                          </div>
                          <ul class="list-custom list-unstyled">
                            <li>
                              Target Fund
                              <span>{{ $project['single']['target_fund'] }}</span>
                            </li>
                            <li>
                              Funded
                              <span>{{ $project['single']['funded'] }}</span>
                            </li>
                          </ul>
                        </div>
                        <hr>

                        <div class="support-item">
                          <h3 class="support-title page-title-blue">Support this project</h3>
                        </div>
                        @foreach ($project['support'] as $support)
                        <div class="support-item">
                          <p class="support-sub-title page-title-blue">US$ {{ $support['amount'] }}</p>
                          <?php
                            $details = unserialize($support['details']);                            
                          ?>
                          <ul class="list-readable">
                            @foreach ($details as $detail)
                            <li>{{ $detail }}</li>
                            @endforeach
                          </ul>                          
                          <a class="btn-sidebar" href="{{ URL::route('pledge-a-project') }}">Support this amount</a>
                        </div> 
                        @endforeach
                      </div>                    
                    </div>

                </div>
@stop