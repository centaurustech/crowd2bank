define([
	'jquery',
	'tinyMCE'
], function ($) {

        console.log('Loaded common/custom.textarea.js');

	$(document).ready( function () {

                tinyMCE.init({
                        mode : "textareas",
                        editor_selector : "mceEditor",
                        editor_deselector : "mceNoEditor",
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                });
        
	});

});