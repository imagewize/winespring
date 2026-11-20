<?php
/**
 * Title: Shop Home
 * Slug: winespring/home-shop
 * Categories: winespring-pages
 * Block Types: core/post-content
 * Viewport Width: 1200
 * Description: A general-purpose WooCommerce front page: hero with a product mosaic and mini cart, trust bar, category tiles, best sellers, promotions, reviews and a closing call to action. Registered only when WooCommerce is active.
 *
 * @package Winespring
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' );
$cat_url  = static function ( $slug ) use ( $shop_url ) {
	$term = get_term_by( 'slug', $slug, 'product_cat' );
	$link = $term ? get_term_link( $term ) : false;
	return ( $link && ! is_wp_error( $link ) ) ? $link : $shop_url;
};
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"64px","right":"24px","bottom":"64px","left":"24px"}}},"backgroundColor":"indigo","textColor":"white","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-white-color has-indigo-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:64px;padding-right:24px;padding-bottom:64px;padding-left:24px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"40px","left":"56px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"46%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:46%"><!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"700","lineHeight":"1"}},"textColor":"white","fontSize":"display"} -->
<h1 class="wp-block-heading has-white-color has-text-color has-display-font-size" style="font-weight:700;line-height:1"><?php esc_html_e( 'Everyday things, built to last.', 'winespring' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"24px"}}},"textColor":"tertiary","fontSize":"medium"} -->
<p class="has-tertiary-color has-text-color has-medium-font-size" style="margin-top:24px"><?php esc_html_e( 'Home, fashion, tech and gifts from makers we trust, all in one cart.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"32px"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons" style="margin-top:32px"><!-- wp:button {"backgroundColor":"white","textColor":"indigo"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-indigo-color has-white-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Shop new arrivals', 'winespring' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","textColor":"white"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'See what’s on sale', 'winespring' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"28px"}}},"textColor":"sand-deep","fontSize":"small"} -->
<p class="has-sand-deep-color has-text-color has-small-font-size" style="margin-top:28px"><?php esc_html_e( '★★★★★ 4.8 out of 5 from 2,400 verified reviews', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"54%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:54%"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"14px","left":"14px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"52%"} -->
<div class="wp-block-column" style="flex-basis:52%"><!-- wp:group {"style":{"border":{"radius":"22px"},"spacing":{"padding":{"top":"14px","right":"14px","bottom":"14px","left":"14px"},"blockGap":"8px"}},"backgroundColor":"sand-deep","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-color has-sand-deep-background-color has-text-color has-background" style="border-radius:22px;padding-top:14px;padding-right:14px;padding-bottom:14px;padding-left:14px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"12px","bottom":"4px","left":"12px"}},"typography":{"fontWeight":"600"}},"backgroundColor":"primary","textColor":"white","fontSize":"x-small"} -->
<p class="has-white-color has-primary-background-color has-text-color has-background has-x-small-font-size" style="border-radius:99px;padding-top:4px;padding-right:12px;padding-bottom:4px;padding-left:12px;font-weight:600"><?php esc_html_e( 'Save 25%', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"16px","right":"0","bottom":"8px","left":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:16px;padding-right:0;padding-bottom:8px;padding-left:0"><!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"height":"150px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-lamp.svg' ) ); ?>" alt="" style="width:auto;height:150px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"radius":"18px"},"spacing":{"padding":{"top":"16px","right":"16px","bottom":"16px","left":"16px"},"blockGap":"10px"}},"backgroundColor":"white","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-color has-white-background-color has-text-color has-background" style="border-radius:18px;padding-top:16px;padding-right:16px;padding-bottom:16px;padding-left:16px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="font-weight:700"><?php esc_html_e( 'Your cart', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size"><?php esc_html_e( '2 items', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"top":"4px","right":"4px","bottom":"4px","left":"4px"}}},"backgroundColor":"sand-deep","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-sand-deep-background-color has-background" style="border-radius:10px;padding-top:4px;padding-right:4px;padding-bottom:4px;padding-left:4px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"height":"32px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-lamp.svg' ) ); ?>" alt="" style="width:auto;height:32px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}},"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="margin-bottom:0;font-weight:600"><?php esc_html_e( 'Arc table lamp', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size" style="margin-bottom:0"><?php esc_html_e( 'Terracotta', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="font-weight:700"><?php esc_html_e( '$67', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"top":"4px","right":"4px","bottom":"4px","left":"4px"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="border-radius:10px;padding-top:4px;padding-right:4px;padding-bottom:4px;padding-left:4px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"height":"28px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-mug.svg' ) ); ?>" alt="" style="width:auto;height:28px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}},"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="margin-bottom:0;font-weight:600"><?php esc_html_e( 'Stoneware mug', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}}},"textColor":"secondary","fontSize":"x-small"} -->
<p class="has-secondary-color has-text-color has-x-small-font-size" style="margin-bottom:0"><?php esc_html_e( 'Moss, 350 ml', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="font-weight:700"><?php esc_html_e( '$18', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="font-weight:600"><?php esc_html_e( 'Free shipping unlocked', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"border":{"radius":"99px"},"dimensions":{"minHeight":"6px"}},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-accent-background-color has-background" style="border-radius:99px;min-height:6px"></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="font-weight:700"><?php esc_html_e( 'Subtotal', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="font-weight:700"><?php esc_html_e( '$85', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons"><!-- wp:button {"fontSize":"small","backgroundColor":"primary","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-small-font-size has-custom-font-size wp-element-button" href="#"><?php esc_html_e( 'Checkout', 'winespring' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"48%"} -->
<div class="wp-block-column" style="flex-basis:48%"><!-- wp:group {"style":{"border":{"radius":"22px"},"spacing":{"padding":{"top":"14px","right":"14px","bottom":"14px","left":"14px"}},"dimensions":{"minHeight":"240px"}},"backgroundColor":"primary-accent","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-color has-primary-accent-background-color has-text-color has-background" style="border-radius:22px;padding-top:14px;padding-right:14px;padding-bottom:14px;padding-left:14px;min-height:240px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"12px","bottom":"4px","left":"12px"}},"typography":{"fontWeight":"600"}},"backgroundColor":"white","textColor":"contrast","fontSize":"x-small"} -->
<p class="has-contrast-color has-white-background-color has-text-color has-background has-x-small-font-size" style="border-radius:99px;padding-top:4px;padding-right:12px;padding-bottom:4px;padding-left:12px;font-weight:600"><?php esc_html_e( 'New', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"height":"150px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-headphones.svg' ) ); ?>" alt="" style="width:auto;height:150px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"border":{"radius":"22px"},"spacing":{"padding":{"top":"14px","right":"14px","bottom":"14px","left":"14px"}},"dimensions":{"minHeight":"240px"}},"backgroundColor":"tertiary","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-color has-tertiary-background-color has-text-color has-background" style="border-radius:22px;padding-top:14px;padding-right:14px;padding-bottom:14px;padding-left:14px;min-height:240px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"border":{"radius":"99px"},"spacing":{"padding":{"top":"4px","right":"12px","bottom":"4px","left":"12px"}},"typography":{"fontWeight":"600"}},"backgroundColor":"white","textColor":"contrast","fontSize":"x-small"} -->
<p class="has-contrast-color has-white-background-color has-text-color has-background has-x-small-font-size" style="border-radius:99px;padding-top:4px;padding-right:12px;padding-bottom:4px;padding-left:12px;font-weight:600"><?php esc_html_e( 'Best seller', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"height":"120px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-sneaker.svg' ) ); ?>" alt="" style="width:auto;height:120px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"winespring-trust-bar"} -->
<div class="wp-block-group alignfull winespring-trust-bar"><!-- wp:group {"className":"trust-bar__inner"} -->
<div class="wp-block-group trust-bar__inner"><!-- wp:group {"className":"trust-bar__items","style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"flex","flexWrap":"wrap","alignItems":"center","justifyContent":"center"}} -->
<div class="wp-block-group trust-bar__items"><!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/truck.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Free shipping over $75', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/returns.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><?php esc_html_e( '30-day returns', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/lock.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Secure checkout', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/chat.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Replies within a day', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"88px","right":"24px","bottom":"88px","left":"24px"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:88px;padding-right:24px;padding-bottom:88px;padding-left:24px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:heading {"textColor":"contrast","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color has-xx-large-font-size"><?php esc_html_e( 'Shop by category', 'winespring' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size"><a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'All categories →', 'winespring' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"14px"}},"layout":{"type":"grid","minimumColumnWidth":"11rem"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"winespring-tile","style":{"border":{"radius":"18px"},"spacing":{"padding":{"top":"24px","right":"20px","bottom":"20px","left":"20px"},"blockGap":"6px"}},"backgroundColor":"sand-deep","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-sand-deep-background-color has-background winespring-tile" style="border-radius:18px;padding-top:24px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"winespring-art","height":"110px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized winespring-art"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-plant.svg' ) ); ?>" alt="" style="width:auto;height:110px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-link-color has-medium-font-size"><a href="<?php echo esc_url( $cat_url( 'home-living' ) ); ?>"><?php esc_html_e( 'Home & living', 'winespring' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( '214 products', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"winespring-tile","style":{"border":{"radius":"18px"},"spacing":{"padding":{"top":"24px","right":"20px","bottom":"20px","left":"20px"},"blockGap":"6px"}},"backgroundColor":"primary-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-accent-background-color has-background winespring-tile" style="border-radius:18px;padding-top:24px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"winespring-art","height":"110px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized winespring-art"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-backpack.svg' ) ); ?>" alt="" style="width:auto;height:110px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-link-color has-medium-font-size"><a href="<?php echo esc_url( $cat_url( 'bags' ) ); ?>"><?php esc_html_e( 'Bags', 'winespring' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( '58 products', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"winespring-tile","style":{"border":{"radius":"18px"},"spacing":{"padding":{"top":"24px","right":"20px","bottom":"20px","left":"20px"},"blockGap":"6px"}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-tertiary-background-color has-background winespring-tile" style="border-radius:18px;padding-top:24px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"winespring-art","height":"110px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized winespring-art"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-headphones.svg' ) ); ?>" alt="" style="width:auto;height:110px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-link-color has-medium-font-size"><a href="<?php echo esc_url( $cat_url( 'electronics' ) ); ?>"><?php esc_html_e( 'Electronics', 'winespring' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( '131 products', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"winespring-tile","style":{"border":{"radius":"18px"},"spacing":{"padding":{"top":"24px","right":"20px","bottom":"20px","left":"20px"},"blockGap":"6px"}},"backgroundColor":"sand-deep","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-sand-deep-background-color has-background winespring-tile" style="border-radius:18px;padding-top:24px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"winespring-art","height":"110px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized winespring-art"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-watch.svg' ) ); ?>" alt="" style="width:auto;height:110px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-link-color has-medium-font-size"><a href="<?php echo esc_url( $cat_url( 'accessories' ) ); ?>"><?php esc_html_e( 'Accessories', 'winespring' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( '77 products', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"winespring-tile","style":{"border":{"radius":"18px"},"spacing":{"padding":{"top":"24px","right":"20px","bottom":"20px","left":"20px"},"blockGap":"6px"}},"backgroundColor":"primary-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-accent-background-color has-background winespring-tile" style="border-radius:18px;padding-top:24px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"winespring-art","height":"110px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized winespring-art"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-gift.svg' ) ); ?>" alt="" style="width:auto;height:110px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-link-color has-medium-font-size"><a href="<?php echo esc_url( $cat_url( 'gifts' ) ); ?>"><?php esc_html_e( 'Gifts', 'winespring' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( '64 products', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"winespring-tile","style":{"border":{"radius":"18px"},"spacing":{"padding":{"top":"24px","right":"20px","bottom":"20px","left":"20px"},"blockGap":"6px"}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-tertiary-background-color has-background winespring-tile" style="border-radius:18px;padding-top:24px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"winespring-art","height":"110px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized winespring-art"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-sneaker.svg' ) ); ?>" alt="" style="width:auto;height:110px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-link-color has-medium-font-size"><a href="<?php echo esc_url( $cat_url( 'footwear' ) ); ?>"><?php esc_html_e( 'Footwear', 'winespring' ); ?></a></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size"><?php esc_html_e( '96 products', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"88px","right":"24px","bottom":"88px","left":"24px"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:88px;padding-right:24px;padding-bottom:88px;padding-left:24px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:heading {"textColor":"contrast","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color has-xx-large-font-size"><?php esc_html_e( 'Best sellers', 'winespring' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size"><a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'View all products →', 'winespring' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"bottom":"24px"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons" style="margin-bottom:24px"><!-- wp:button {"fontSize":"small","backgroundColor":"contrast","textColor":"base"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-contrast-background-color has-text-color has-background has-small-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'All', 'winespring' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"fontSize":"small","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( $cat_url( 'home-living' ) ); ?>"><?php esc_html_e( 'Home', 'winespring' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"fontSize":"small","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( $cat_url( 'footwear' ) ); ?>"><?php esc_html_e( 'Fashion', 'winespring' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"fontSize":"small","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( $cat_url( 'electronics' ) ); ?>"><?php esc_html_e( 'Electronics', 'winespring' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"fontSize":"small","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( $cat_url( 'gifts' ) ); ?>"><?php esc_html_e( 'Gifts', 'winespring' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:woocommerce/product-collection {"queryId":1,"query":{"perPage":4,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"popularity","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":4,"shrinkColumns":true},"dimensions":{"widthType":"fill","fixedWidth":""},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Actual products will vary depending on the page being viewed."}} -->
<div class="wp-block-woocommerce-product-collection"><!-- wp:woocommerce/product-template -->
<!-- wp:woocommerce/product-image {"showSaleBadge":false,"isDescendentOfQueryLoop":true,"aspectRatio":"1"} -->
<!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"fontSize":"x-small","align":"left"} /-->
<!-- /wp:woocommerce/product-image -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.25rem","right":"1.25rem","bottom":"1.5rem","left":"1.25rem"},"blockGap":"0.75rem"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:1.25rem;padding-right:1.25rem;padding-bottom:1.5rem;padding-left:1.25rem"><!-- wp:post-terms {"term":"product_cat","style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"secondary","fontSize":"x-small"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"padding":{"left":"0","right":"0"}},"typography":{"fontSize":"1.5rem"}},"fontFamily":"display"} /-->

<!-- wp:woocommerce/product-summary {"isDescendentOfQueryLoop":true,"summaryLength":14,"textColor":"secondary","fontSize":"small"} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"left","style":{"spacing":{"padding":{"left":"0","right":"0"}}},"fontSize":"medium"} /-->

<!-- wp:woocommerce/product-button {"isDescendentOfQueryLoop":true,"textAlign":"left","style":{"spacing":{"padding":{"left":"1.25rem","right":"1.25rem","top":"0.5rem","bottom":"0.5rem"}}},"fontSize":"small","className":"is-style-outline"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template -->

<!-- wp:woocommerce/product-collection-no-results -->
<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"textColor":"secondary"} -->
<p class="has-text-align-center has-secondary-color has-text-color"><?php esc_html_e( 'No products yet. Add some in WooCommerce to fill this band.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:woocommerce/product-collection-no-results --></div>
<!-- /wp:woocommerce/product-collection --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"64px","right":"24px","bottom":"64px","left":"24px"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-white-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:64px;padding-right:24px;padding-bottom:64px;padding-left:24px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"18px","left":"18px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:group {"style":{"border":{"radius":"24px"},"spacing":{"padding":{"top":"40px","right":"40px","bottom":"40px","left":"40px"},"blockGap":"16px"},"dimensions":{"minHeight":"340px"}},"backgroundColor":"primary","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-color has-primary-background-color has-text-color has-background" style="border-radius:24px;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px;min-height:340px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:image {"height":"140px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-headphones.svg' ) ); ?>" alt="" style="width:auto;height:140px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"textColor":"white","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-white-color has-text-color has-xx-large-font-size"><?php esc_html_e( 'Up to 40% off the winter sale', 'winespring' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"primary-accent"} -->
<p class="has-primary-accent-color has-text-color"><?php esc_html_e( 'Prices drop on home, fashion and tech until Sunday.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"primary"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Shop the sale', 'winespring' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:group {"style":{"border":{"radius":"24px"},"spacing":{"padding":{"top":"40px","right":"40px","bottom":"40px","left":"40px"},"blockGap":"16px"},"dimensions":{"minHeight":"340px"}},"backgroundColor":"tertiary","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-contrast-color has-tertiary-background-color has-text-color has-background" style="border-radius:24px;padding-top:40px;padding-right:40px;padding-bottom:40px;padding-left:40px;min-height:340px"><!-- wp:group {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:image {"height":"100px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/shop-gift.svg' ) ); ?>" alt="" style="width:auto;height:100px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Gift cards', 'winespring' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color"><?php esc_html_e( 'Send $25 to $500 by email. No expiry date.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Send a gift card', 'winespring' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"88px","right":"24px","bottom":"88px","left":"24px"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:88px;padding-right:24px;padding-bottom:88px;padding-left:24px"><!-- wp:heading {"textColor":"contrast","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color has-xx-large-font-size"><?php esc_html_e( 'What customers say', 'winespring' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"18px","left":"18px"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"border":{"radius":"18px"},"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"},"blockGap":"12px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:18px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:paragraph {"textColor":"terracotta"} -->
<p class="has-terracotta-color has-text-color"><?php esc_html_e( '★★★★★', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Ordered on Monday, at my door Wednesday. The sneakers fit exactly like the size guide said.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}},"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="margin-bottom:0;font-weight:600"><?php esc_html_e( 'Marit V.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"accent","fontSize":"small"} -->
<p class="has-accent-color has-text-color has-small-font-size"><?php esc_html_e( 'Verified buyer', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"border":{"radius":"18px"},"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"},"blockGap":"12px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:18px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:paragraph {"textColor":"terracotta"} -->
<p class="has-terracotta-color has-text-color"><?php esc_html_e( '★★★★★', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'One mug arrived chipped. Support sent a replacement the same day, no photos or forms needed.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}},"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="margin-bottom:0;font-weight:600"><?php esc_html_e( 'Daniel R.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"accent","fontSize":"small"} -->
<p class="has-accent-color has-text-color has-small-font-size"><?php esc_html_e( 'Verified buyer', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"border":{"radius":"18px"},"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"},"blockGap":"12px"}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:18px;padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:paragraph {"textColor":"terracotta"} -->
<p class="has-terracotta-color has-text-color"><?php esc_html_e( '★★★★★', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'Checkout took under a minute and I could pay with Apple Pay. The backpack is sturdier than it looks.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}},"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="margin-bottom:0;font-weight:600"><?php esc_html_e( 'Aiko T.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"accent","fontSize":"small"} -->
<p class="has-accent-color has-text-color has-small-font-size"><?php esc_html_e( 'Verified buyer', 'winespring' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"72px","right":"24px","bottom":"72px","left":"24px"}}},"backgroundColor":"indigo","textColor":"white","layout":{"type":"constrained","contentSize":"720px","wideSize":"720px"}} -->
<div class="wp-block-group alignfull has-white-color has-indigo-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:72px;padding-right:24px;padding-bottom:72px;padding-left:24px"><!-- wp:heading {"textColor":"white","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-white-color has-text-color has-xx-large-font-size"><?php esc_html_e( 'Find something you’ll use every day', 'winespring' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary","fontSize":"medium"} -->
<p class="has-tertiary-color has-text-color has-medium-font-size"><?php esc_html_e( 'Free shipping over $75, and 30 days to change your mind.', 'winespring' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"indigo"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-indigo-color has-white-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Shop all products', 'winespring' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","textColor":"white"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button" href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Browse sale', 'winespring' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
