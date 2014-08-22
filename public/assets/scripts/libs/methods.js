'use strict';

define(['jquery', 'bootstrap'], function($){
    var Zombie = function(){
		return {
		    addItem: function() {		    	
		    	console.log( this.getItemCount() );
		    },
		    getItemCount: function() {
		        return 'getItemCount';
		    },
		    getTotal: function(){
		       return 'getTotal';
		    }
		}
    };
    return Zombie;
});