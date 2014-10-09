<div class="row page-category">
    <div class="col-sm-6 col-md-8 no-padding">
        <h2 class="page-title">{{{ $title }}} <br /><small>{{{ $subtitle or 'support and share new projects or inventions' }}}</small></h2>
    </div>
    @if( isset($nav) && ($nav == 'all') )
    <div class="col-sm-6 col-md-4 no-padding">
        <div>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Project  By <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">All</a></li>
                <li><a href="#">Current</a></li>
                <li><a href="#">Completed</a></li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Category By <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Status</a></li>
                <li><a href="#">Title</a></li>
                <li><a href="#">Funded</a></li>
                <li><a href="#">Target Fund</a></li>
              </ul>
            </div>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Sorted By <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Ascending</a></li>
                <li><a href="#">Descending</a></li>
              </ul>
            </div>
            <div class="btn-group">
                <a class="btn btn-primary" href="#">Sort</a>
            </div>
        </div>
    </div>   
    @endif                 
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
                <a href="{{ URL::to("single-page") }}/{{ $category }}/{{ $projects[$i]['product_id'] }}">
                    <img class="img-responsive" src="{{ $projects[$i]['thumbnail'] }}">
                </a>
            </div>
            <div class="detailed-cont">
                <h3 class="box-title"><a href="{{ URL::to("single-page") }}/{{ $category }}/{{ $projects[$i]['product_id'] }}">{{ $projects[$i]['title'] }}</a></h3>
                <p class="box-paragraph">{{ $projects[$i]['description'] }}</p>
            </div>
            <div class="footer-cont">
                <div class="completed">
                    <p>Completed: {{ $projects[$i]['status'] }}</p>
                    <div class="progress-plain progress">
                        <div class="progress-bar {{ $projects[$i]['progress_bar'] }}" role="progressbar" aria-valuenow="{{ $projects[$i]['percentage'] }}" aria-valuemin="0" aria-valuemax="{{ $projects[$i]['percentage'] }}" style="width: {{ $projects[$i]['percentage'] }}%;">
                        <span class="hide">{{ $projects[$i]['percentage'] }}%</span>
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
                    @if( isset($nav) && ($nav == 'all') )
                        <ul class="list-custom-pagination list-unstyled list-inline">
                            <li><a href="#">next</a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">prev</a></li>
                        </ul>
                    @else
                        <a class="pull-right" href="{{ URL::route('browse-a-project') }}">View All</a>
                    @endif  
                    </div>
                </div>