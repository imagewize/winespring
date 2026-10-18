<?php
/**
 * Title: Core Home
 * Slug: winespring/home-core
 * Categories: winespring-pages
 * Block Types: core/post-content
 * Viewport Width: 1200
 * Description: A front page built from core blocks only: hero, three feature highlights, a product or post grid, a brand story and a closing call to action. Needs no plugins.
 *
 * @package Winespring
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// With WooCommerce the grid lists products; without it, the latest posts.
$has_shop  = class_exists( 'WooCommerce' );
$grid_type = $has_shop ? 'product' : 'post';
$cta_url   = ( $has_shop && function_exists( 'wc_get_page_permalink' ) ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
$cta_label = $has_shop ? __( 'Shop the collection', 'winespring' ) : __( 'Read the journal', 'winespring' );
$grid_head = $has_shop ? __( 'New arrivals', 'winespring' ) : __( 'Latest from the journal', 'winespring' );
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Considered goods, made to be kept', 'winespring' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"medium"} -->
<p class="has-secondary-color has-text-color has-medium-font-size"><?php esc_html_e( 'A short introduction to your brand. Say what you make, who it is for and why it is worth choosing.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_label ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/hero.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"width":"48px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/truck.svg' ) ); ?>" alt="" style="width:48px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Free delivery', 'winespring' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color"><?php esc_html_e( 'Describe your shipping promise in a sentence or two.', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"width":"48px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/returns.svg' ) ); ?>" alt="" style="width:48px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Easy returns', 'winespring' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color"><?php esc_html_e( 'Explain how customers can send something back.', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"width":"48px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/leaf.svg' ) ); ?>" alt="" style="width:48px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Responsibly made', 'winespring' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color"><?php esc_html_e( 'Share what goes into your products and where they come from.', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:heading {"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size"><?php echo esc_html( $grid_head ); ?></h2>
<!-- /wp:heading -->

<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"<?php echo esc_attr( $grid_type ); ?>","order":"desc","orderBy":"date","inherit":false,"excludeCurrent":null},"queryId":0,"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/5"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"large"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Nothing to show yet.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/story.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Our story', 'winespring' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color"><?php esc_html_e( 'Tell visitors how the business began and what you stand for. Two or three short paragraphs are plenty.', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"main","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-color has-main-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size"><?php esc_html_e( 'Ready when you are', 'winespring' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"base","textColor":"contrast"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_label ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
