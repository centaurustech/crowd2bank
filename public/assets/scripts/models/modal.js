/*global define*/
// models/modals.js
// http://www.egstudio.biz/how-to-setup-a-basic-backbone-application/
define([
	'underscore',
	'backbone'
], function (_, Backbone) {
	'use strict';

	var Modal = Backbone.Model.extend({
		defaults: {
			title: "defaults"
		}
	});

	return Modal;
});
