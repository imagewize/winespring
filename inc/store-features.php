<?php
/**
 * Store features: free shipping threshold, blocks and product badges.
 *
 * @package Winespring
 * @since   1.5.0
 */

namespace Winespring;

/**
 * Register the theme's blocks. They render server-side; `autoRegister` makes
 * them available in the editor without any editor JavaScript (WordPress 6.7+).
 */
function winespring_register_blocks() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	foreach ( array( 'free-shipping-bar', 'sticky-add-to-cart' ) as $block ) {
		register_block_type( get_template_directory() . '/blocks/' . $block );
	}
}
add_action( 'init', __NAMESPACE__ . '\winespring_register_blocks' );

/**
 * Minimum cart amount for free shipping, from the shipping zone matching the
 * customer's location.
 *
 * @return float Threshold, or 0 when no free shipping method with a minimum applies.
 */
function winespring_free_shipping_threshold() {
	$location = wc_get_customer_default_location();
	$customer = WC()->customer;

	$zone = \WC_Shipping_Zones::get_zone_matching_package(
		array(
			'destination' => array(
				'country'  => $customer && $customer->get_shipping_country() ? $customer->get_shipping_country() : $location['country'],
				'state'    => $customer && $customer->get_shipping_state() ? $customer->get_shipping_state() : $location['state'],
				'postcode' => $customer ? $customer->get_shipping_postcode() : '',
			),
		)
	);

	$threshold = 0;

	foreach ( $zone->get_shipping_methods( true ) as $method ) {
		if ( 'free_shipping' !== $method->id || ! in_array( $method->requires, array( 'min_amount', 'either', 'both' ), true ) ) {
			continue;
		}

		$amount = (float) $method->min_amount;

		if ( $amount > 0 && ( 0 === $threshold || $amount < $threshold ) ) {
			$threshold = $amount;
		}
	}

	return (float) apply_filters( 'winespring_free_shipping_threshold', $threshold );
}

/**
 * Show the percentage saved on sale badges instead of the word "Sale".
 *
 * @param string      $text    Badge text.
 * @param \WC_Product $product Product.
 * @return string Badge text.
 */
function winespring_sale_badge_text( $text, $product ) {
	if ( $product->is_type( 'variable' ) ) {
		$regular = $product->get_variation_regular_price( 'max' );
		$sale    = $product->get_variation_sale_price( 'max' );
	} else {
		$regular = $product->get_regular_price();
		$sale    = $product->get_sale_price();
	}

	if ( ! is_numeric( $regular ) || ! is_numeric( $sale ) || (float) $regular <= 0 ) {
		return $text;
	}

	$percent = (int) round( ( 1 - (float) $sale / (float) $regular ) * 100 );

	/* translators: %d: discount percentage. */
	return $percent > 0 ? sprintf( __( '-%d%%', 'winespring' ), $percent ) : $text;
}
add_filter( 'woocommerce_sale_badge_text', __NAMESPACE__ . '\winespring_sale_badge_text', 10, 2 );

/**
 * Add "New", "Sold out" and "Low stock" badges to product images in grids.
 *
 * The sale badge is WooCommerce's own inner block; these stack in the opposite
 * corner. Number of days a product counts as new, and the low stock level, are
 * filterable.
 *
 * @param string    $content Rendered block.
 * @param array     $parsed  Parsed block.
 * @param \WP_Block $block   Block instance.
 * @return string Block with badges.
 */
function winespring_product_image_badges( $content, $parsed, $block ) {
	$product = ! empty( $block->context['postId'] ) ? wc_get_product( $block->context['postId'] ) : false;

	if ( ! $product || '' === $content ) {
		return $content;
	}

	$badges = array();

	if ( ! $product->is_in_stock() ) {
		$badges['sold-out'] = __( 'Sold out', 'winespring' );
	} else {
		$low = (int) apply_filters( 'winespring_low_stock_amount', 3, $product );

		if ( $product->managing_stock() && $product->get_stock_quantity() > 0 && $product->get_stock_quantity() <= $low ) {
			$badges['low-stock'] = __( 'Low stock', 'winespring' );
		}
	}

	$days    = (int) apply_filters( 'winespring_new_badge_days', 14, $product );
	$created = $product->get_date_created();

	if ( $days > 0 && $created && $created->getTimestamp() > time() - $days * DAY_IN_SECONDS ) {
		$badges['new'] = __( 'New', 'winespring' );
	}

	if ( ! $badges ) {
		return $content;
	}

	$html = '<span class="winespring-badges">';

	foreach ( $badges as $slug => $label ) {
		$html .= '<span class="winespring-badge winespring-badge--' . esc_attr( $slug ) . '">' . esc_html( $label ) . '</span>';
	}

	$html .= '</span>';

	// Insert straight after the wrapper's opening tag.
	return preg_replace( '/^(\s*<div[^>]*>)/', '$1' . $html, $content, 1 );
}
add_filter( 'render_block_woocommerce/product-image', __NAMESPACE__ . '\winespring_product_image_badges', 10, 3 );
