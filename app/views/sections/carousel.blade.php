        @if ( Request::is( '/') ) 
            <div class="custom-carousel container-custom">
                <div id="carousel-custom-carousel" class="custom-wrap carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="custom-wrap-item">
                                <a href="#" class="wrap-image">
                                    <img class="img-responsive" src="{{ URL::asset('assets/images/slider1.png') }}">
                                </a>                
                                <div class="wrap-details">
                                    <div class="details">
                                        <div class="top">
                                            <h2 class="page-title">Glass Bread Toaster</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam in laborum culpa, voluptas totam modi quas reiciendis, iste sit ipsa commodi voluptates alias eaque? Numquam, voluptate facilis beatae iste quidem!</p>
                                        </div>
                                        <a href="{{ URL::route('single-page') }}" class="btn-view-project">View Project</a>
                                    </div>
                                </div>                                
                            </div>                     
                        </div>
                    @for ($i = 0; $i < 2; $i++)
                        <div class="item">
                            <div class="custom-wrap-item">
                                <a href="#" class="wrap-image">
                                    <img class="img-responsive" src="{{ URL::asset('assets/images/slider1.png') }}">
                                </a>                
                                <div class="wrap-details">
                                    <div class="details">
                                        <div class="top">
                                            <h2 class="page-title">Glass Bread Toaster</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam in laborum culpa, voluptas totam modi quas reiciendis, iste sit ipsa commodi voluptates alias eaque? Numquam, voluptate facilis beatae iste quidem!</p>
                                        </div>
                                        <a href="{{ URL::route('single-page') }}" class="btn-view-project">View Project</a>
                                    </div>
                                </div>                                
                            </div>                     
                        </div>
                    @endfor
                    </div>

                    <div class="lower-note">
                        <h1 class="page-title">Create, <span class="support">Support</span> & <span class="share">Share</span> A Project</h1>
                        <p>crowd2bank is the most amazing way to support and get connected to people with great ideas or inventions.</p>
                    </div>

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-custom-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-custom-carousel" data-slide-to="1"></li>
                        <li data-target="#carousel-custom-carousel" data-slide-to="2"></li>
                    </ol>

                </div>
            </div>
        @endif