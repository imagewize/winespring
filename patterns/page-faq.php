<?php
/**
 * Title: FAQ
 * Slug: winespring/page-faq
 * Categories: winespring-pages
 * Block Types: core/post-content
 * Viewport Width: 1200
 * Description: A frequently asked questions page built from core Details blocks, with a call to contact below.
 *
 * @package Winespring
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:heading {"level":1,"style":{"typography":{"textAlign":"center"}},"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Frequently asked questions', 'winespring' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"textColor":"secondary","fontSize":"medium"} -->
<p class="has-text-align-center has-secondary-color has-text-color has-medium-font-size"><?php esc_html_e( 'Quick answers to the things people ask us most.', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:details -->
<details class="wp-block-details"><summary><?php esc_html_e( 'Question 1 goes here?', 'winespring' ); ?></summary><!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color"><?php esc_html_e( 'Write a short, direct answer to the question.', 'winespring' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary><?php esc_html_e( 'Question 2 goes here?', 'winespring' ); ?></summary><!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color"><?php esc_html_e( 'Write a short, direct answer to the question.', 'winespring' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary><?php esc_html_e( 'Question 3 goes here?', 'winespring' ); ?></summary><!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color"><?php esc_html_e( 'Write a short, direct answer to the question.', 'winespring' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary><?php esc_html_e( 'Question 4 goes here?', 'winespring' ); ?></summary><!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color"><?php esc_html_e( 'Write a short, direct answer to the question.', 'winespring' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:details -->
<details class="wp-block-details"><summary><?php esc_html_e( 'Question 5 goes here?', 'winespring' ); ?></summary><!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color"><?php esc_html_e( 'Write a short, direct answer to the question.', 'winespring' ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size"><?php esc_html_e( 'Still have a question?', 'winespring' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Get in touch', 'winespring' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
