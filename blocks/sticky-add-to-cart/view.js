/**
 * Shows the sticky add to cart bar while the main add to cart form is out of
 * view. The button scrolls back to that form instead of adding anything
 * itself, so quantity and variation choices are never skipped.
 *
 * No build step: plain browser JavaScript, no dependencies.
 */
( function () {
	const bar = document.querySelector( '.winespring-sticky-cart' );
	const form = document.querySelector( '.wp-block-woocommerce-add-to-cart-with-options' );

	if ( ! bar || ! form || ! ( 'IntersectionObserver' in window ) ) {
		return;
	}

	new IntersectionObserver( ( [ entry ] ) => {
		// Only show once the form is above the viewport, never while it is still below the fold.
		bar.hidden = entry.isIntersecting || entry.boundingClientRect.top > 0;
	} ).observe( form );

	bar.querySelector( 'button' ).addEventListener( 'click', () => {
		const reduce = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
		form.scrollIntoView( { behavior: reduce ? 'auto' : 'smooth', block: 'center' } );
		const focusable = form.querySelector( 'select, input, button' );
		if ( focusable ) {
			focusable.focus( { preventScroll: true } );
		}
	} );
}() );
