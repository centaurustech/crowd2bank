/*global define*/
define([
	'jquery',
	'underscore',
	'backbone',
	'collections/modals',
	'common'
], function ($, _, Backbone, Modals) {

	var AppView = Backbone.View.extend({

		el: 'body',

		initialize: function () {
			_.bindAll(this, 'render'); // fixes loss of context for 'this' within methods
			this.setElement($(this.el)); // backbone 0.9.1 code, re-setting the element of your view this time, i set it to the $() jquery object of your selector  this.el.
			this.render(); // not all views are self-rendering. This one is.
		},
		render: function(){
		// and here instead of $(this.el) i use the cached jquery object of your view, this is also backbone 0.9.1 stuff.
		this.$el.append("<ul><li>hello world</li></ul>");
		}

	});

	return AppView;
});
