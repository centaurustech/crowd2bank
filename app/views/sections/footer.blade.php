        <div id="footer">
            @unless (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
            <div class="container">
                <img class="img-responsive" src="{{ URL::asset('assets/images/ads.png') }}" alt="Mobile Apps">
            </div>
            <div class="upper">
                <div class="container">
                    <h3>
                        Some proceeds will go directly to support
                    </h3>
                    <p class="lead lead-custom">
                        <a class="swn" href="#"></a>
                        socialworkersnetwork.org
                    </p>
                    <p class="lead">
                        another project by Andy Lo<br>
                        andylo@socialworkersnetwork.org
                    </p>
                </div>
            </div>             
            @endunless
       
        
            <div class="lower">
                <div class="container">
                    @unless (Sentry::check() && Sentry::getUser()->hasAccess('admin'))                    
                    <ul class="list-custom-pagination list-unstlyed list-inline">
                        <li class="active"><a href="{{ route('home') }}">home</a></li>
                        <li><a href="{{ route('browse-a-project') }}">browse a project</a></li>
                        <li><a href="{{ route('create-a-project') }}">create a project</a></li>
                        <li><a href="{{ route('about') }}">about</a></li>
                        <li><a href="{{ route('terms-and-conditions') }}">terms and conditions</a></li>
                        <li><a href="{{ route('faq') }}">faq</a></li>
                        <li><a href="{{ route('contact-us') }}">contact us</a></li>
                    </ul>  
                    @endunless             
                    <p>
                        <a class="logo" href="#"><span>Crowd2Bank | a crowdfunding platform</span></a>
                    </p>
                    <p>
                        crowd2bank.com 2014 | Andy Lo (trinvestgrp717@gmail.com)<br>
                        Powered by: <a href="#">Devitions</a>
                    </p>
                </div>
            </div>
        </div>