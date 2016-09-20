/*!
 * Entorno
 *
 */
var Entorno = {
	cargarDatepickers: function (form){
		//
		jQuery('#fechain').pickadate({
			min:+1,
			showMonthsShort: true,
			formatSubmit: 'dd-mm-yyyy',
			hiddenName: true,
			clear:false,
			onSet: function(context) {
				var campout = jQuery('#fechaout').pickadate().pickadate('picker');
				var date = jQuery('#fechain').pickadate().pickadate('picker').get('select');
				campout.set('min',new Date(date.pick+ 86400000));
				campout.render();
				campout.open();
			}
		});
		//
		jQuery('#fechaout').pickadate({
			min:+2,
			showMonthsShort: true,
			clear:false,
			formatSubmit: 'dd-mm-yyyy',
			hiddenName: true
		});
	}
};



//

(function( $ ) {
	'use strict';
	$(document).ready(function(event){	Entorno.cargarDatepickers(); });
	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );
