define([
    'jquery',
    'countdown',
], function ($) {
    'use strict';

    console.log('Loaded common/timer.countdown.js');

    $(document).ready(function(){
        // for timer countdown
        var $dataCountdown = $('[data-countdown]');
        
        $dataCountdown.each(function() {
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