/*global define */
// collections/modals.js
define([
	'underscore',
	'backbone',
	'backboneLocalStorage',
	'models/modal'
], function (_, Backbone, Store, Modal) {
	'use strict';

	var ModalsCollection = Backbone.Collection.extend({
		model: Modal,
	});

	return new ModalsCollection();
});
