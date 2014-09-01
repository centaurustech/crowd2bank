define([
	'jquery',
	'bootstrap',	
], function ($) {
   
    var App = {
    	init: function () {
    		this.cacheElements();
    		this.bindEvents();
    		this.render();
    	},
    	cacheElements: function () {    		
    		this.$carousel = $('.carousel');
    		this.$carouselBtn = this.$carousel.find('.btn-view-project');
    	},
    	bindEvents: function () {
    		this.$carouselBtn.on('click', this.sampleEvent.bind(this));
    	},
    	render: function () {
    		this.$carousel.carousel();
    	},
    	sampleEvent: function (e) {
    		console.log(e);
    		console.log('this is a sample kind of event, goooot me?');
    	}
    };
   
    $(function(){
		App.init();
    });

    var offCanH = $("#off-canvas").height(),
        topH = $('#header .top').height(),
        menuH = ( topH + offCanH),
        winH = $(window).height();


    if( !$("#off-canvas").hasClass("in") ) {

        if( menuH > winH ) {
            $("#off-canvas").css({
                "max-height": winH - topH,
                "width" : "50%",
                "overflow-y": "scroll"
            });
        } else {
            $("#off-canvas").css({
                "max-height": "none",
                "width" : "75%",
                "overflow-y": "auto"
            });
        }    
    }

    $('#off-canvas').attr("style", "");

    if( $(window).width() > 768 ) {
        $('#off-canvas').removeClass('in').attr("style", "");
        $('.navbar-toggle').removeClass('pressed');
    }

    $(window).resize(function () {
        if( $(window).width() > 768 ) {
            $('#off-canvas').removeClass('in').attr("style", "");
            $('.navbar-toggle').removeClass('pressed');
        }

        var dropDownCustom = $('#dropdown-custom-trigger').width();

            $('#dropdown-custom-trigger .dropdown-menu').css({
                    "min-width": dropDownCustom
            });

    });


    $(document).ready(function () {

        var dropDownCustom = $('.dropdown-custom').width();

            $('.dropdown-custom .dropdown-menu').css({
                    "min-width": dropDownCustom
            });


        $('.navbar-toggle').on('click', function () {
            $(this).toggleClass('pressed');
            $('#off-canvas').toggleClass('in');
        });    

        $(document).mouseup(function (e)
        {
            var container = $("#header");

            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0) // ... nor a descendant of the container
            {
                $('#off-canvas').removeClass('in').attr("style", "");
                $('.navbar-toggle').removeClass('pressed');
            }

        });

    });



});
