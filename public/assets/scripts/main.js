'use strict';

require.config({
    baseUrl: '/assets/scripts/',
    paths: {
        jquery: [
        	'//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
        	'vendor/jquery'
        ],
        modernizr:[
        	'//ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.6.2.js',
        	'vendor/modernizr'
        ],
        bootstrap: [
        	'//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js',
        	'vendor/bootstrap'
        ],
        backbone: [
        	'//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js',
        	'vendor/backbone'
        ],
        underscore: [
        	'//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js',
        	'vendor/underscore'
        ]
    }
});

require([
	'app',
], function(App){
	App.initialize();
});