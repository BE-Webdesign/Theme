import $ from 'jquery';

$( document ).ready( function() {
	const searchToggle = $( '#site-header__search-toggle' );
	const searchInput  = $( '#site-header__search-input' );
	const searchForm   = $( '#site-header__search-form' );
	const searchMenu   = toggle( searchToggle, searchInput, searchForm );

	if ( ! searchToggle || ! searchInput || ! searchForm ) {
		return;
	}

	searchToggle.on( 'click', function() {
		searchMenu.toggle();
	} );
} );

$( document ).ready( function() {
	const menuToggle  = $( '#site-header__menu-toggle' );
	const menu        = $( '#primary-nav' );
	const menuClosure = toggle( menuToggle, menu, menu );

	if ( ! menuToggle || ! menu ) {
		return;
	}

	menuToggle.on( 'click', function() {
		menuClosure.toggle();
	} );
} );

/**
 * Creates a toggle interface.
 *
 * @param $el      {jQuery}
 * @param $focusEl {jQuery}
 * @param $slideEl {jQuery}
 * @returns {Object}
 */
function toggle( $el, $focusEl, $slideEl ) {
	let open = false;

	/**
	 * Adds listener for escape key.
	 *
	 * @param event {Event}
	 */
	function addExitListener( event ) {
		// Escape key pressing.
		if ( 27 === event.keyCode ) {
			$el.removeClass( 'open' );
			$slideEl.removeClass( 'open' );

			open = false;

			$el.focus();

			// Remove listener for Escape key closing.
			$focusEl.off();
		}
	}

	return {
		/**
		 * Toggle menu.
		 *
		 * @returns {Boolean}
		 */
		toggle: function() {
			if ( ! $el || ! $focusEl || ! $slideEl ) {
				return;
			}

			$el.toggleClass( 'open' );
			$slideEl.toggleClass( 'open' );

			if ( ! open ) {
				$focusEl.focus();
				$focusEl.on( 'keydown', addExitListener );
			} else {
				// Remove listener for Escape key closing.
				$focusEl.off();
			}

			open = ! open;

			return open;
		},
	};
}
