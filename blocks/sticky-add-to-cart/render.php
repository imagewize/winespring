<?php
/**
 * Sticky add to cart bar.
 *
 * @package Winespring
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block content.
 * @var WP_Block $block      Block instance.
 */

namespace Winespring;

if ( ! function_exists( 'wc_get_product' ) ) {
	return;
}

$winespring_product = wc_get_product( $block->context['postId'] ?? get_the_ID() );

if ( ! $winespring_product || ! $winespring_product->is_purchasable() || ! $winespring_product->is_in_stock() ) {
	return;
}

$winespring_label   = $winespring_product->is_type( 'simple' )
	? __( 'Add to cart', 'winespring' )
	: __( 'Choose options', 'winespring' );
$winespring_wrapper = get_block_wrapper_attributes(
	array(
		'class'  => 'winespring-sticky-cart',
		'hidden' => true,
	)
);
?>
<div <?php echo $winespring_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped by get_block_wrapper_attributes(). ?>>
	<div class="winespring-sticky-cart__inner">
		<p class="winespring-sticky-cart__title"><?php echo esc_html( $winespring_product->get_name() ); ?></p>
		<span class="winespring-sticky-cart__price"><?php echo wp_kses_post( $winespring_product->get_price_html() ); ?></span>
		<button type="button" class="wp-element-button winespring-sticky-cart__button"><?php echo esc_html( $winespring_label ); ?></button>
	</div>
</div>
