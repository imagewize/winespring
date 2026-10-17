/**
 * Keeps the free shipping bar in step with the cart.
 *
 * No build step: plain browser JavaScript, no dependencies. WooCommerce's cart
 * blocks dispatch these events on `document` whenever the cart changes.
 */
( function () {
	const bars = document.querySelectorAll( '.winespring-shipping-bar' );

	if ( ! bars.length ) {
		return;
	}

	function format( minor, totals ) {
		const unit = Math.pow( 10, totals.currency_minor_unit );
		const fixed = ( minor / unit ).toFixed( totals.currency_minor_unit );
		const parts = fixed.split( '.' );
		parts[ 0 ] = parts[ 0 ].replace( /\B(?=(\d{3})+(?!\d))/g, totals.currency_thousand_separator );
		return totals.currency_prefix + parts.join( totals.currency_decimal_separator ) + totals.currency_suffix;
	}

	function update( bar, cart ) {
		const totals = cart.totals;
		const unit = Math.pow( 10, totals.currency_minor_unit );
		const threshold = parseFloat( bar.dataset.threshold ) * unit;
		const spent = parseInt( totals.total_items, 10 ) - parseInt( totals.total_discount, 10 );
		const messages = JSON.parse( bar.dataset.messages );
		let message = messages.reached;
		let amount = 0;

		if ( spent <= 0 ) {
			message = messages.empty;
			amount = threshold;
		} else if ( spent < threshold ) {
			message = messages.partial;
			amount = threshold - spent;
		}

		bar.querySelector( '.winespring-shipping-bar__text' ).textContent = message.replace( '{amount}', format( amount, totals ) );
		bar.querySelector( '.winespring-shipping-bar__fill' ).style.width = Math.min( 100, Math.max( 0, ( spent / threshold ) * 100 ) ) + '%';
	}

	function refresh() {
		fetch( bars[ 0 ].dataset.endpoint, { credentials: 'same-origin' } )
			.then( ( response ) => ( response.ok ? response.json() : null ) )
			.then( ( cart ) => {
				if ( cart && cart.totals ) {
					bars.forEach( ( bar ) => update( bar, cart ) );
				}
			} )
			.catch( () => {} );
	}

	[ 'wc-blocks_added_to_cart', 'wc-blocks_removed_from_cart' ].forEach( ( name ) => document.addEventListener( name, refresh ) );
}() );
