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
			@for ($i = 0; $i < 2; $i++)
                <div class="row crowd-list">
                @for ($a = 0; $a < 4; $a++)
                    <div class="col-sm-6 col-md-3 item-display">
                        <div class="crowd-box">
                            <div class="status-cont">
                                <ul class="list-custom-inline list-unstyled list-inline" data-countdown="2014/09/15">
                                    <li><strong>Status:</strong></li>                                                                        
                                </ul>
                            </div>

                            <div class="img-wrap">
                                <a href="{{ URL::to("single-page") }}"><img class="img-responsive" src="{{ URL::asset('assets/images') }}/img{{ $a + 1 }}.png"></a>
                            </div>
                            <div class="detailed-cont">
                                <h3 class="box-title"><a href="{{ URL::to("single-page") }}">The Rolling Bench</a></h3>
                                <p class="box-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto nesciunt cumque dolorem, quasi, maxime & repellendus.</p>
                            </div>
                            <div class="footer-cont">
                                <div class="completed">
                                    <p>Completed: 60%</p>
                                    <div class="progress-plain progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        <span class="hide">60%</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-custom list-unstyled">
                                    <li>
                                        Target Fund
                                        <span>US$ 1000</span>
                                    </li>
                                    <li>
                                        Funded
                                        <span>US$ 280</span>
                                    </li>
                                    <li>
                                        Backers
                                        <span>15</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endfor
                </div>
			@endfor
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