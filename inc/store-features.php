<?php
/**
 * Store features: product badges.
 *
 * @package Winespring
 * @since   1.5.0
 */

namespace Winespring;

/**
 * Show the percentage saved on sale badges instead of the word "Sale".
 *
 * The percentage is measured against the regular price by default. In the EU a
 * "from" price must be the lowest price of the 30 days before the discount
 * (Omnibus Directive), which can be lower than the regular price, so a store
 * that supplies that price should return it from
 * `winespring_sale_badge_reference_price`, or turn the percentage off with
 * `winespring_sale_badge_show_percentage`. The theme keeps no price history
 * itself, so it cannot know that price.
 *
 * @param string      $text    Badge text.
 * @param \WC_Product $product Product.
 * @return string Badge text.
 */
function winespring_sale_badge_text( $text, $product ) {
	/**
	 * Filters whether the sale badge shows a percentage. Return false to keep
	 * WooCommerce's own "Sale" text.
	 *
	 * @param bool        $show    Whether to show the percentage. Default true.
	 * @param \WC_Product $product Product.
	 */
	if ( ! apply_filters( 'winespring_sale_badge_show_percentage', true, $product ) ) {
		return $text;
	}

	if ( $product->is_type( 'variable' ) ) {
		$regular = $product->get_variation_regular_price( 'max' );
		$sale    = $product->get_variation_sale_price( 'max' );
	} else {
		$regular = $product->get_regular_price();
		$sale    = $product->get_sale_price();
	}

	/**
	 * Filters the price the percentage is measured against. Return the lowest
	 * price of the previous 30 days to match the EU price-reduction rule.
	 *
	 * For a variable product the default is the highest variation regular
	 * price, compared with the highest variation sale price; the two can come
	 * from different variations. A reference price returned here applies to
	 * the whole product, not to a single variation.
	 *
	 * @param string|float $reference Reference price. Default: the regular price.
	 * @param \WC_Product  $product   Product.
	 */
	$regular = apply_filters( 'winespring_sale_badge_reference_price', $regular, $product );

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
