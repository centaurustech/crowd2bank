'use strict';

require.config({
    baseUrl: 'scripts',
    paths: {
        jquery: [
            '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min',
            '../../bower_components/jquery/dist/jquery'
        ],
        modernizr: '../../bower_components/modernizr/modernizr',
        bootstrap: 'libs/bootstrap-amd'            
    },
    shim: {
        'jquery': {
            deps: [],
            exports: '$'
        }
    }
});