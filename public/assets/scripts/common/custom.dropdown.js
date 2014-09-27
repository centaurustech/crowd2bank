define([
	'jquery',
	'bootstrap'
], function ($) {

    console.log('Loaded common/custom.dropdown.js');

	$(document).ready(function(){

        var dropDownCustom = $('.dropdown-custom').width();
        var bank_detals = $('#bankDetails');

        $('.dropdown-custom .dropdown-menu').css({
            "min-width": dropDownCustom
        });

        $('#paymentMode').change( function() {
            if($(this).val() == "bank_to_bank" )
            {
                bank_detals.show();
            }
            else
            {
                bank_detals.hide();
            }
        });
		
	});

});