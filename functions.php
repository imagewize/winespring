<?php
/**
 * Winespring functions and definitions
 *
 * @package Winespring
 * @since   0.1.0
 */

namespace Winespring;

require_once get_template_directory() . '/inc/store-features.php';

if ( is_admin() ) {
	require_once get_template_directory() . '/inc/plugin-recommendations.php';
}

/**
 * Set up theme defaults and register various WordPress features.
 */
function winespring_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'winespring', get_template_directory() . '/languages' );

	// Enqueue editor styles.
	add_editor_style( 'style.css' );

	// Featured images: the templates place wp:post-featured-image blocks.
	add_theme_support( 'post-thumbnails' );

	// WooCommerce.
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\winespring_setup' );

/**
 * Register the 'menu' template part area, required by the Aludra mega-menu block.
 *
 * @param array $areas Existing template part areas.
 * @return array Modified template part areas.
 */
function winespring_template_part_areas( $areas ) {
	$areas[] = array(
		'area'        => 'menu',
		'area_tag'    => 'nav',
		'label'       => __( 'Menu', 'winespring' ),
		'description' => __( 'Template parts for navigation and mega menu content.', 'winespring' ),
		'icon'        => 'navigation',
	);

	return $areas;
}
add_filter( 'default_wp_template_part_areas', __NAMESPACE__ . '\winespring_template_part_areas' );

/**
 * Register the pattern category used by the theme's page patterns.
 */
function winespring_register_pattern_categories() {
	register_block_pattern_category(
		'winespring-pages',
		array( 'label' => __( 'Winespring Pages', 'winespring' ) )
	);
}
add_action( 'init', __NAMESPACE__ . '\winespring_register_pattern_categories' );

/**
 * Enqueue theme styles.
 */
function winespring_enqueue_styles() {
	wp_enqueue_style(
		'winespring-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\winespring_enqueue_styles' );

/**
 * Enqueue WooCommerce-specific styles, if present.
 */
function winespring_enqueue_woocommerce_styles() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	if ( file_exists( get_template_directory() . '/assets/css/woocommerce.css' ) ) {
		wp_enqueue_style(
			'winespring-woocommerce-style',
			get_template_directory_uri() . '/assets/css/woocommerce.css',
			array( 'winespring-style' ),
			(string) filemtime( get_template_directory() . '/assets/css/woocommerce.css' )
		);
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\winespring_enqueue_woocommerce_styles' );

/**
 * WooCommerce block templates shipped by this theme.
 *
 * @return string[] Template slugs.
 */
function winespring_woocommerce_template_slugs() {
	return array( 'archive-product', 'single-product', 'product-search-results', 'coming-soon', 'order-confirmation' );
}

/**
 * WooCommerce block template parts shipped by this theme.
 *
 * These override WooCommerce's own per-product-type add-to-cart layouts, which
 * the `woocommerce/add-to-cart-with-options` block renders.
 *
 * @return string[] Template part slugs.
 */
function winespring_woocommerce_template_part_slugs() {
	return array(
		'simple-product-add-to-cart-with-options',
		'variable-product-add-to-cart-with-options',
	);
}

/**
 * Register the WooCommerce integration hooks that apply to this site.
 *
 * The theme ships store templates but does not require WooCommerce, so which
 * hooks are needed depends on whether the plugin is active.
 */
function winespring_woocommerce_hooks() {
	if ( class_exists( 'WooCommerce' ) ) {
		return;
	}

	add_filter( 'default_wp_template_part_areas', __NAMESPACE__ . '\winespring_add_to_cart_template_part_area' );
	add_filter( 'get_block_templates', __NAMESPACE__ . '\winespring_filter_woocommerce_templates', 10, 3 );
	add_filter( 'get_block_file_template', __NAMESPACE__ . '\winespring_filter_woocommerce_file_template', 10, 3 );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\winespring_woocommerce_hooks' );

/**
 * Hide the store templates, and the store blocks inside template parts, when
 * WooCommerce is not active.
 *
 * Without this, `single-product` and `archive-product` are listed in the Site
 * Editor on a site that cannot render them, and the header's mini cart shows an
 * unsupported-block placeholder.
 *
 * @param \WP_Block_Template[] $query_result  Templates found for the query.
 * @param array                $query         Query arguments.
 * @param string               $template_type 'wp_template' or 'wp_template_part'.
 * @return \WP_Block_Template[] Filtered templates.
 */
function winespring_filter_woocommerce_templates( $query_result, $query, $template_type ) {
	if ( 'wp_template_part' === $template_type ) {
		foreach ( $query_result as $template ) {
			$template->content = winespring_strip_woocommerce_blocks( $template->content );
		}

		$store_slugs = winespring_woocommerce_template_part_slugs();
	} else {
		$store_slugs = winespring_woocommerce_template_slugs();
	}

	return array_values(
		array_filter(
			$query_result,
			static function ( $template ) use ( $store_slugs ) {
				return ! in_array( $template->slug, $store_slugs, true );
			}
		)
	);
}

/**
 * Strip store blocks from a file-based template part when WooCommerce is not active.
 *
 * Covers the front end, which resolves template parts through this filter rather
 * than through `get_block_templates`.
 *
 * @param \WP_Block_Template|null $block_template Template returned for the file.
 * @param string                  $id             Template identifier.
 * @param string                  $template_type  'wp_template' or 'wp_template_part'.
 * @return \WP_Block_Template|null Filtered template.
 */
function winespring_filter_woocommerce_file_template( $block_template, $id, $template_type ) {
	if ( 'wp_template_part' !== $template_type || ! $block_template instanceof \WP_Block_Template ) {
		return $block_template;
	}

	$block_template->content = winespring_strip_woocommerce_blocks( $block_template->content );

	return $block_template;
}

/**
 * Remove store blocks from template part markup.
 *
 * Block markup in a file cannot be made conditional, so the blocks the theme
 * places in `parts/` are removed from the part's content instead.
 *
 * @param string $content Template part markup.
 * @return string Markup without store blocks.
 */
function winespring_strip_woocommerce_blocks( $content ) {
	if ( ! is_string( $content ) || '' === $content ) {
		return $content;
	}

	return (string) preg_replace(
		'#<!--\s+wp:woocommerce/(?:mini-cart|customer-account)\b.*?/-->\s*#s',
		'',
		$content
	);
}

/**
 * Register the 'add-to-cart-with-options' template part area.
 *
 * WooCommerce registers this area itself; the theme only stands in when the
 * plugin is inactive, so that its add-to-cart parts do not resolve to an
 * unknown area while they are being filtered out.
 *
 * @param array $areas Existing template part areas.
 * @return array Modified template part areas.
 */
function winespring_add_to_cart_template_part_area( $areas ) {
	$areas[] = array(
		'area'        => 'add-to-cart-with-options',
		'area_tag'    => 'div',
		'label'       => __( 'Add to Cart + Options', 'winespring' ),
		'description' => __( 'Add to cart layouts for each product type.', 'winespring' ),
		'icon'        => 'cart',
	);

	return $areas;
}

/**
 * Register the store home pattern only where it can render.
 *
 * `winespring/home-store` places a WooCommerce product collection, so without
 * WooCommerce it would be offered in the inserter and insert an unsupported
 * block. Pattern files register themselves, so it is unregistered again here
 * when the plugin is inactive.
 */
function winespring_maybe_unregister_store_home_pattern() {
	if ( class_exists( 'WooCommerce' ) ) {
		return;
	}

	if ( \WP_Block_Patterns_Registry::get_instance()->is_registered( 'winespring/home-store' ) ) {
		unregister_block_pattern( 'winespring/home-store' );
	}
}
add_action( 'init', __NAMESPACE__ . '\winespring_maybe_unregister_store_home_pattern', 999 );
