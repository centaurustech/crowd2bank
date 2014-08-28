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

});
