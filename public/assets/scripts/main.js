'use strict';

require.config({
    baseUrl: '/assets/scripts/',
    paths: {
        jquery: [
        	'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
        	'vendor/jquery.min'
        ],
        modernizr:[
        	'//ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.6.2.js',
        	'vendor/modernizr.min'
        ],
        bootstrap: [
        	'//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js',
        	'vendor/bootstrap.min'
        ],
        backbone: [
        	'//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js',
        	'vendor/backbone.min'
        ],
        underscore: [
        	'//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js',
        	'vendor/underscore.min'
        ],
        countdown: [            
            'vendor/jquery.countdown.min'
        ]
    },
    shim: {
        jquery: {            
            exports: '$'
        },
        underscore: {
            exports: '_'
        },
        backbone: {
            deps: [
                'underscore',
                'jquery'
            ],
            exports: 'Backbone'
        },
        bootstrap: {
            deps: [
                'jquery'
            ]
        },
        countdown: {
            deps: [
                'jquery'
            ]
        }
    }
});

require([
    'backbone',
    'views/app',
    'routers/router'
], function (Backbone, AppView, Workspace) {
    /*jshint nonew:false*/
    // Initialize routing and start Backbone.history()
    new Workspace();
    Backbone.history.start();

    // Initialize the application view
    new AppView();
});
