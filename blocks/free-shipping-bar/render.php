<?php
/**
 * Free shipping progress bar.
 *
 * Rendered server-side for the first paint; view.js keeps it in step with the
 * cart through the Store API.
 *
 * @package Winespring
 *
 * @var array $attributes Block attributes.
 */

namespace Winespring;

if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
	return;
}

$winespring_threshold = (float) $attributes['threshold'];

if ( $winespring_threshold <= 0 ) {
	$winespring_threshold = winespring_free_shipping_threshold();
}

if ( $winespring_threshold <= 0 ) {
	return;
}

$winespring_subtotal  = (float) WC()->cart->get_subtotal() - (float) WC()->cart->get_discount_total();
$winespring_remaining = max( 0, $winespring_threshold - $winespring_subtotal );
$winespring_progress  = min( 100, round( $winespring_subtotal / $winespring_threshold * 100 ) );

$winespring_money = static function ( $amount ) {
	return html_entity_decode( wp_strip_all_tags( wc_price( $amount ) ), ENT_QUOTES, 'UTF-8' );
};

$winespring_messages = array(
	'empty'   => sprintf(
		/* translators: %s: order total needed for free shipping. */
		__( 'Free shipping on orders over %s', 'winespring' ),
		'{amount}'
	),
	'partial' => sprintf(
		/* translators: %s: amount left to spend to get free shipping. */
		__( 'You are %s away from free shipping', 'winespring' ),
		'{amount}'
	),
	'reached' => __( 'You have unlocked free shipping', 'winespring' ),
);

if ( $winespring_subtotal <= 0 ) {
	$winespring_message = $winespring_messages['empty'];
	$winespring_amount  = $winespring_threshold;
} elseif ( $winespring_remaining > 0 ) {
	$winespring_message = $winespring_messages['partial'];
	$winespring_amount  = $winespring_remaining;
} else {
	$winespring_message = $winespring_messages['reached'];
	$winespring_amount  = 0;
}

$winespring_wrapper = get_block_wrapper_attributes(
	array(
		'class'          => 'winespring-shipping-bar',
		'data-endpoint'  => esc_url( rest_url( 'wc/store/v1/cart' ) ),
		'data-threshold' => (string) $winespring_threshold,
		'data-messages'  => wp_json_encode( $winespring_messages ),
	)
);
?>
<div <?php echo $winespring_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>
	<p class="winespring-shipping-bar__text" role="status"><?php echo esc_html( str_replace( '{amount}', $winespring_money( $winespring_amount ), $winespring_message ) ); ?></p>
	<div class="winespring-shipping-bar__track" aria-hidden="true">
		<div class="winespring-shipping-bar__fill" style="width:<?php echo esc_attr( (string) $winespring_progress ); ?>%"></div>
	</div>
</div>
