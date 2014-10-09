'use strict';

require.config({
    baseUrl: '/assets/scripts/',
    paths: {
        jquery: 'vendor/jquery.min',
        modernizr: 'vendor/modernizr.min',
        bootstrap: 'vendor/bootstrap.min',
        backbone: 'vendor/backbone.min',
        underscore: 'vendor/underscore.min',
        tinyMCE: '../tinymce/tinymce/tinymce',
        countdown: 'vendor/jquery.countdown.min',
        backboneLocalStorage: 'vendor/backbone.localStorage.min',
        text: 'vendor/requirejs-text/text'
    },
    waitSeconds: 0,
    shim: {
        jquery: {            
            exports: '$'
        },
        underscore: {
            exports: '_'
        },
        backbone: {
            deps: ['underscore', 'jquery'],
            exports: 'Backbone'
        },
        bootstrap: {
            deps: ['jquery']
        },
        tinyMCE: {
            exports: 'tinyMCE',
            init: function () {
                this.tinyMCE.DOM.events.domLoaded = true;
                return this.tinyMCE;
            }
        },
        countdown: {
            deps: ['jquery']
        }
    }
});

require(['common'], function () {
    console.log('Loaded main.js');
});
