define([
	'jquery',
	'bootstrap',
    'tinyMCE',
    'countdown',
    'modal'
], function ($) {
   
    console.log('Loaded Common Script');

/*
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
 */

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

        var bank_detals = $('#bankDetails');

        $('#paymentMode').change(function(){

            if($(this).val() == "bank_to_bank" )
            {
                bank_detals.show();
            }
            else
            {
                bank_detals.hide();
            }

        });

        tinyMCE.init({
                mode : "textareas",
                editor_selector : "mceEditor",
                editor_deselector : "mceNoEditor",
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
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

        // for timer countdown
        $('[data-countdown]').each(function() {
            var $this = $(this),
                finalDate = $(this).data('countdown');

                $this.countdown(finalDate, function(event) {

                    var format ='<li><strong>Status:</strong></li>' +
                                '<li><span>%D day%!D</span></li>' +
                                '<li><span>%H hour%!H</span></li>' +
                                '<li><span>%M min%!M</span></li>'; 

                        $(this).html(event.strftime(format));


                })
                .on('finish.countdown', function(event){

                    var format ='<li><strong>Status:</strong></li>' +
                                '<li><span>This offer has expired!</span></li>'; 

                    $(this).html(format);
                });
        });       

    });

});
