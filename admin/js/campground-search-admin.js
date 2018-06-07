(function ( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
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

	$(function () {
		// use jQuery UI datepicker if type="date" not supported
		if ( $( '[type="date"]' ).prop( 'type' ) !== 'date' ) {
			$('[type="date"]').datepicker({
				dateFormat: "yy-mm-dd",
			})
		}

		$( '.wl-camps-meta-box input[type=date]' ).on( 'change', function ( e ) {
			if ( e.target.value && e.target.value.length > 0 ) {
				if ( e.target.name.indexOf( 'from' ) >= 0 ) {
					$( e.target ).val( e.target.value.replace( /\d{4}/, '1901' ) )
				} else {
					$( e.target ).val( e.target.value.replace( /\d{4}/, '9999' ) )
				}
			}
		} )
	})

})(jQuery);
