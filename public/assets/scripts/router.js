// Filename: router.js
define([
  'jquery',
  'underscore',
  'backbone',
  ], function($, _, Backbone){
    var AppRouter = Backbone.Router.extend({
      routes: {
        '/projects': 'showProjects',
        '/users': 'showUsers',
        '*actions': 'defaultAction'
      }
    });

    var initialize = function(){
      var app_router = new AppRouter;
          app_router.on('showProjects', function(){
            console.log('showProjects');
          });
          app_router.on('showUsers', function(){
            console.log('showUsers');
          });
          app_router.on('defaultAction', function(actions){      
            console.log('No route:', actions);
          });
          Backbone.history.start(); 
    };

    return {
      initialize: initialize
    };

  });