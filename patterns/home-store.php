<?php
/**
 * Title: Store Home
 * Slug: winespring/home-store
 * Categories: featured
 * Block Types: core/post-content
 * Description: A skincare store front page built from Aludra blocks: hero, trust bar, category cards, newest products, brand story, stats, reviews and a closing call to action. Registered only when Aludra and WooCommerce are active.
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
$kit      = get_page_by_path( 'essentials-kit', OBJECT, 'product' );
$kit_url  = $kit ? get_permalink( $kit ) : $shop_url;
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"72px","bottom":"88px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:72px;padding-right:24px;padding-bottom:88px;padding-left:24px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"48px","left":"56px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"52%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:52%"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.16em","fontWeight":"500"},"spacing":{"margin":{"bottom":"24px"}}},"textColor":"accent","fontSize":"small"} -->
<p class="has-accent-color has-text-color has-small-font-size" style="margin-bottom:24px;font-weight:500;letter-spacing:0.16em;text-transform:uppercase">New: the Essentials Kit</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1","fontWeight":"500"}},"textColor":"contrast","fontSize":"display"} -->
<h1 class="wp-block-heading has-contrast-color has-text-color has-display-font-size" style="font-weight:500;line-height:1">Skincare, <em><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-accent-color">made simple</mark></em></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"28px"}}},"textColor":"secondary","fontSize":"medium"} -->
<p class="has-secondary-color has-text-color has-medium-font-size" style="margin-top:28px">Gentle, effective formulas for a three-step routine you will actually keep. Cleanse, treat, moisturise.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"36px"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-buttons" style="margin-top:36px"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $shop_url ); ?>">Shop all products</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $cat_url( 'kits' ) ); ?>">Browse kits</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"32px"}}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size" style="margin-top:32px">✓ Free shipping over $50&nbsp;&nbsp;&nbsp;✓ 30-day returns</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"48%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:48%"><!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/hero.svg' ) ); ?>","dimRatio":0,"isUserOverlayColor":false,"minHeight":680,"minHeightUnit":"px","contentPosition":"top left","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-top-left" style="border-radius:20px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:680px"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/hero.svg' ) ); ?>" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"top":"14px","right":"18px","bottom":"14px","left":"18px"},"blockGap":"2px"},"border":{"radius":"12px"}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
<div class="wp-block-group has-contrast-color has-base-background-color has-text-color has-background" style="border-radius:12px;padding-top:14px;padding-right:18px;padding-bottom:14px;padding-left:18px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.16em"}},"textColor":"accent","fontSize":"xx-small"} -->
<p class="has-accent-color has-text-color has-xx-small-font-size" style="letter-spacing:0.16em;text-transform:uppercase">Sale</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"fontSize":"1.375rem","fontWeight":"600","lineHeight":"1.2"},"elements":{"link":{"color":{"text":"var:preset|color|contrast"},"typography":{"textDecoration":"none"}}}},"textColor":"contrast"} -->
<h4 class="wp-block-heading has-contrast-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;font-size:1.375rem;font-weight:600;line-height:1.2"><a href="<?php echo esc_url( $kit_url ); ?>">The Essentials Kit</a></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>$68.00</strong> <s>$79.00</s></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:aludra/trust-bar -->
<div class="wp-block-aludra-trust-bar alignfull"><div class="trust-bar__inner"><!-- wp:group {"className":"trust-bar__items","style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"flex","flexWrap":"wrap","alignItems":"center","justifyContent":"center"}} -->
<div class="wp-block-group trust-bar__items"><!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/truck.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Free shipping over $50</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/returns.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>30-day returns</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/leaf.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Gentle, fragrance-free options</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"trust-item","style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","alignItems":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group trust-item"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/icons/lock.svg' ) ); ?>" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Secure checkout</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:aludra/trust-bar -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"},"blockGap":"48px"}},"backgroundColor":"tertiary","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:24px;padding-bottom:80px;padding-left:24px"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Shop by category</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textColor":"contrast","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color has-xx-large-font-size">Find your <em>routine</em></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"grid","minimumColumnWidth":"16rem"}} -->
<div class="wp-block-group"><!-- wp:group {"className":"winespring-tile","style":{"dimensions":{"minHeight":"400px"},"spacing":{"padding":{"top":"28px","right":"28px","bottom":"28px","left":"28px"},"blockGap":"16px"},"border":{"radius":"16px"}},"backgroundColor":"primary-accent","textColor":"contrast","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
<div class="wp-block-group winespring-tile has-contrast-color has-primary-accent-background-color has-text-color has-background" style="border-radius:16px;min-height:400px;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Daily care</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size">Moisturisers</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size"><a href="<?php echo esc_url( $cat_url( 'moisturisers' ) ); ?>">Explore →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"winespring-art","height":"170px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized winespring-art"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/jar.svg' ) ); ?>" alt="" style="width:auto;height:170px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"winespring-tile","style":{"dimensions":{"minHeight":"400px"},"spacing":{"padding":{"top":"28px","right":"28px","bottom":"28px","left":"28px"},"blockGap":"16px"},"border":{"radius":"16px"}},"backgroundColor":"sand-deep","textColor":"contrast","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
<div class="wp-block-group winespring-tile has-contrast-color has-sand-deep-background-color has-text-color has-background" style="border-radius:16px;min-height:400px;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">New arrivals</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size">Serums</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size"><a href="<?php echo esc_url( $cat_url( 'serums' ) ); ?>">Explore →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"winespring-art","height":"210px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized winespring-art"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/serum.svg' ) ); ?>" alt="" style="width:auto;height:210px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"winespring-tile","style":{"dimensions":{"minHeight":"400px"},"spacing":{"padding":{"top":"28px","right":"28px","bottom":"28px","left":"28px"},"blockGap":"16px"},"border":{"radius":"16px"}},"backgroundColor":"primary","textColor":"base","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
<div class="wp-block-group winespring-tile has-base-color has-primary-background-color has-text-color has-background" style="border-radius:16px;min-height:400px;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Daily essentials</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size">Cleansers</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size"><a href="<?php echo esc_url( $cat_url( 'cleansers' ) ); ?>">Explore →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"winespring-art","height":"210px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized winespring-art"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/bottle.svg' ) ); ?>" alt="" style="width:auto;height:210px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"winespring-tile","style":{"dimensions":{"minHeight":"400px"},"spacing":{"padding":{"top":"28px","right":"28px","bottom":"28px","left":"28px"},"blockGap":"16px"},"border":{"radius":"16px"}},"backgroundColor":"accent","textColor":"base","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
<div class="wp-block-group winespring-tile has-base-color has-accent-background-color has-text-color has-background" style="border-radius:16px;min-height:400px;padding-top:28px;padding-right:28px;padding-bottom:28px;padding-left:28px"><!-- wp:group {"style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"fontSize":"x-small"} -->
<p class="has-x-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Gift ideas</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size">Kits</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"fontSize":"small"} -->
<p class="has-link-color has-small-font-size"><a href="<?php echo esc_url( $cat_url( 'kits' ) ); ?>">Explore →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-group"><!-- wp:image {"className":"winespring-art","height":"120px","width":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized winespring-art"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/kit.svg' ) ); ?>" alt="" style="width:auto;height:120px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"},"blockGap":"48px"}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:24px;padding-bottom:80px;padding-left:24px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">Best sellers</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textColor":"contrast","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color has-xx-large-font-size">Bestsellers <em>to try first</em></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $shop_url ); ?>">View all</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

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
<p class="has-text-align-center has-secondary-color has-text-color">No products yet. Add some in WooCommerce to fill this band.</p>
<!-- /wp:paragraph -->
<!-- /wp:woocommerce/product-collection-no-results --></div>
<!-- /wp:woocommerce/product-collection --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"96px","bottom":"72px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"},"blockGap":"48px"}},"backgroundColor":"primary-alt","textColor":"base","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-base-color has-primary-alt-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:96px;padding-right:24px;padding-bottom:72px;padding-left:24px"><!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em"}},"textColor":"sand-deep","fontSize":"small"} -->
<p class="has-sand-deep-color has-text-color has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">The routine</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textColor":"base","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-xx-large-font-size">Cleanse, treat, <em>moisturise</em></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"grid","minimumColumnWidth":"20rem"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"24px"},"blockGap":"12px"},"border":{"top":{"color":"var:preset|color|primary-accent","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--primary-accent);border-top-width:1px;padding-top:24px"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"textColor":"sand-deep","fontSize":"display","fontFamily":"display"} -->
<p class="has-sand-deep-color has-text-color has-display-font-family has-display-font-size" style="line-height:1">01</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"base","fontSize":"x-large"} -->
<h3 class="wp-block-heading has-base-color has-text-color has-x-large-font-size">Cleanse</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"primary-accent"} -->
<p class="has-primary-accent-color has-text-color">Gentle formulas that clean without the tight, dry feeling.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size"><a href="<?php echo esc_url( $cat_url( 'cleansers' ) ); ?>">Shop cleansers →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"24px"},"blockGap":"12px"},"border":{"top":{"color":"var:preset|color|primary-accent","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--primary-accent);border-top-width:1px;padding-top:24px"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"textColor":"sand-deep","fontSize":"display","fontFamily":"display"} -->
<p class="has-sand-deep-color has-text-color has-display-font-family has-display-font-size" style="line-height:1">02</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"base","fontSize":"x-large"} -->
<h3 class="wp-block-heading has-base-color has-text-color has-x-large-font-size">Treat</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"primary-accent"} -->
<p class="has-primary-accent-color has-text-color">Toners and serums that refine, brighten and balance.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size"><a href="<?php echo esc_url( $cat_url( 'serums' ) ); ?>">Shop serums →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"24px"},"blockGap":"12px"},"border":{"top":{"color":"var:preset|color|primary-accent","width":"1px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--primary-accent);border-top-width:1px;padding-top:24px"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1"}},"textColor":"sand-deep","fontSize":"display","fontFamily":"display"} -->
<p class="has-sand-deep-color has-text-color has-display-font-family has-display-font-size" style="line-height:1">03</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"base","fontSize":"x-large"} -->
<h3 class="wp-block-heading has-base-color has-text-color has-x-large-font-size">Moisturise</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"primary-accent"} -->
<p class="has-primary-accent-color has-text-color">Lightweight daily hydration with ceramides and squalane.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size"><a href="<?php echo esc_url( $cat_url( 'moisturisers' ) ); ?>">Shop moisturisers →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:aludra/stat-rail -->
<div class="wp-block-aludra-stat-rail alignfull" style="margin-top:0;margin-bottom:0"><div class="stat-rail__shell"><!-- wp:aludra/stat-item {"number":"3 steps","caption":"To a complete routine","good":true} -->
<div class="wp-block-aludra-stat-item stat-rail__item is-good"><div class="stat-rail__num">3 steps</div><div class="stat-rail__cap">To a complete routine</div></div>
<!-- /wp:aludra/stat-item -->

<!-- wp:aludra/stat-item {"number":"16","caption":"Products in the range"} -->
<div class="wp-block-aludra-stat-item stat-rail__item"><div class="stat-rail__num">16</div><div class="stat-rail__cap">Products in the range</div></div>
<!-- /wp:aludra/stat-item -->

<!-- wp:aludra/stat-item {"number":"30 days","caption":"Free returns"} -->
<div class="wp-block-aludra-stat-item stat-rail__item"><div class="stat-rail__num">30 days</div><div class="stat-rail__cap">Free returns</div></div>
<!-- /wp:aludra/stat-item --></div></div>
<!-- /wp:aludra/stat-rail -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"96px","bottom":"96px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:96px;padding-right:24px;padding-bottom:96px;padding-left:24px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"48px","left":"64px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"20px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/illustrations/story.svg' ) ); ?>" alt="" style="border-radius:20px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.16em","fontWeight":"500"},"spacing":{"margin":{"bottom":"14px"}}},"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size" style="margin-bottom:14px;font-weight:500;letter-spacing:0.16em;text-transform:uppercase">Our story</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textColor":"contrast","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-contrast-color has-text-color has-xx-large-font-size">Made <em><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-accent-color">simple</mark></em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","lineHeight":"1.3"},"spacing":{"margin":{"top":"20px"}}},"textColor":"primary-alt","fontSize":"large","fontFamily":"display"} -->
<p class="has-primary-alt-color has-text-color has-display-font-family has-large-font-size" style="margin-top:20px;font-style:italic;line-height:1.3">Every formula starts with a question: what does skin actually need?</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"24px"}}},"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color" style="margin-top:24px">We started with a short list: ingredients we can explain, formulas that are gentle enough for daily use, and nothing in the box you would not keep.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"16px"}}},"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color" style="margin-top:16px">Today the range is larger, but the rule is the same. If we would not use it ourselves, it does not ship.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"32px"}}}} -->
<div class="wp-block-buttons" style="margin-top:32px"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $shop_url ); ?>">Shop the range</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"},"blockGap":"48px"}},"backgroundColor":"tertiary","layout":{"type":"constrained","contentSize":"1200px","wideSize":"1200px"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:24px;padding-bottom:80px;padding-left:24px"><!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"textColor":"contrast","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-contrast-color has-text-color has-xx-large-font-size">Loved by our <em>customers</em></h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2.25rem","right":"2.25rem","bottom":"2.25rem","left":"2.25rem"},"blockGap":"1rem"},"border":{"radius":"16px","width":"1px"}},"borderColor":"border-light","backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;border-radius:16px;padding-top:2.25rem;padding-right:2.25rem;padding-bottom:2.25rem;padding-left:2.25rem"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"0.15em"}},"textColor":"accent","fontSize":"medium"} -->
<p class="has-accent-color has-text-color has-medium-font-size" style="letter-spacing:0.15em"><span class="screen-reader-text">Rated 5 out of 5 stars</span><span aria-hidden="true">★★★★★</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","lineHeight":"1.35"}},"textColor":"contrast","fontSize":"large","fontFamily":"display"} -->
<p class="has-contrast-color has-text-color has-display-font-family has-large-font-size" style="font-style:italic;line-height:1.35">Beautifully made and exactly as described. It arrived quickly and I have used it every day since.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="font-weight:600">Verified buyer, <span style="font-weight:400">London</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"2.25rem","right":"2.25rem","bottom":"2.25rem","left":"2.25rem"},"blockGap":"1rem"},"border":{"radius":"16px","width":"1px"}},"borderColor":"border-light","backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;border-radius:16px;padding-top:2.25rem;padding-right:2.25rem;padding-bottom:2.25rem;padding-left:2.25rem"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"0.15em"}},"textColor":"accent","fontSize":"medium"} -->
<p class="has-accent-color has-text-color has-medium-font-size" style="letter-spacing:0.15em"><span class="screen-reader-text">Rated 5 out of 5 stars</span><span aria-hidden="true">★★★★★</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","lineHeight":"1.35"}},"textColor":"contrast","fontSize":"large","fontFamily":"display"} -->
<p class="has-contrast-color has-text-color has-display-font-family has-large-font-size" style="font-style:italic;line-height:1.35">The quality is a step above anything else I have bought in this category. Easily worth the price.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="font-weight:600">Verified buyer, <span style="font-weight:400">Melbourne</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"2.25rem","right":"2.25rem","bottom":"2.25rem","left":"2.25rem"},"blockGap":"1rem"},"border":{"radius":"16px","width":"1px"}},"borderColor":"border-light","backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;border-radius:16px;padding-top:2.25rem;padding-right:2.25rem;padding-bottom:2.25rem;padding-left:2.25rem"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"0.15em"}},"textColor":"accent","fontSize":"medium"} -->
<p class="has-accent-color has-text-color has-medium-font-size" style="letter-spacing:0.15em"><span class="screen-reader-text">Rated 5 out of 5 stars</span><span aria-hidden="true">★★★★★</span></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","lineHeight":"1.35"}},"textColor":"contrast","fontSize":"large","fontFamily":"display"} -->
<p class="has-contrast-color has-text-color has-display-font-family has-large-font-size" style="font-style:italic;line-height:1.35">Great service from start to finish, and the packaging alone made it feel like a gift. I will be back.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="font-weight:600">Verified buyer, <span style="font-weight:400">Toronto</span></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"104px","bottom":"104px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"},"blockGap":"24px"}},"backgroundColor":"accent","textColor":"white","layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignfull has-white-color has-accent-background-color has-text-color has-background" style="margin-top:0;margin-bottom:0;padding-top:104px;padding-right:24px;padding-bottom:104px;padding-left:24px"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.12em","textAlign":"center"}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="letter-spacing:0.12em;text-transform:uppercase">The Essentials Kit</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"fontSize":"display"} -->
<h2 class="wp-block-heading has-text-align-center has-display-font-size">Not sure where to <em>start?</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size">A cleanser, serum and moisturiser in travel sizes: a complete routine in three steps.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"base","textColor":"contrast","style":{"spacing":{"padding":{"left":"2.25rem","right":"2.25rem","top":"1rem","bottom":"1rem"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( $kit_url ); ?>" style="padding-top:1rem;padding-right:2.25rem;padding-bottom:1rem;padding-left:2.25rem">Shop the kit</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
