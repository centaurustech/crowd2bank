/*global define*/
define([
	'jquery',
	'backbone',
	'collections/modals',
], function ($, Backbone, Modals) {
	'use strict';

	var AppRouter = Backbone.Router.extend({
		routes: {
			'*actions': 'index'
		},
	});

	return AppRouter;
});
