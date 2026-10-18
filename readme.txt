=== Winespring WordPress Theme ===
Contributors: Rhand
Tags: e-commerce, full-site-editing, custom-colors, custom-logo, custom-menu, editor-style, featured-images, grid-layout, template-editing, translation-ready, wide-blocks
Requires at least: 6.6
Tested up to: 7.1
Requires PHP: 8.0
Stable tag: 1.5.1
License: GNU General Public License v3.0 (or later)
License URI: https://www.gnu.org/licenses/gpl-3.0.html

== Description ==

Winespring is a lean full-site-editing (FSE) theme for WooCommerce stores, built to speed up client
e-commerce builds. It provides a design system via `theme.json` (colors, typography, spacing,
layout), WooCommerce block templates, and style variations. It ships a single page pattern, a store
front page built from Aludra blocks; other page content is composed directly from blocks. Winespring is created from the Aviendha starter theme.

Winespring pairs with the [Aludra](https://github.com/imagewize/aludra) block library (mega menu,
carousel, FAQ tabs, and more), but doesn't require it — the theme is a plain block theme that
works with core blocks and any block plugin. WooCommerce is needed for the store templates.

= Key Features =

* Full Site Editing (FSE) theme for WooCommerce stores
* Solid design system via `theme.json` (colors, typography, spacing, layout)
* WooCommerce block templates for single product and product archive
* Style variations: Twilight (dark), Store (warm retail palette, self-hosted fonts) and Skincare (calm sage and cream, same fonts)
* One page pattern (Store Home, needs Aludra and WooCommerce) — otherwise block-first composition
* Pairs with the Aludra block library (mega menu, carousel, FAQ tabs, and more)
* Translation-ready

== Installation ==

1. Upload the theme folder to `/wp-content/themes/`, or install via Appearance → Themes → Add New.
2. Activate the theme through the 'Appearance' menu in WordPress.
3. Optionally install and activate the Aludra plugin for mega menu, carousel, and other blocks.
4. Install and activate WooCommerce for store functionality.

== Changelog ==

= 1.5.1 =
* Changed: the brand name in the bundled illustrations (hero, story, bottle, jar, serum and kit) is resized to fit its labels. The longer Winespring name overflowed the label artwork made for the old name.
* Changed: theme screenshot now shows the Winespring Store Home pattern. It was still an Aviendha image.

= 1.5.0 =
* Added: first release under the Winespring name (renamed from Marin).
* Added: announcement bar template part, shown above both headers. With Aludra 2.39 or later it carries a free shipping progress bar.
* Added: sticky add to cart bar on single products (Aludra 2.39 or later).
* Added: product image badges for New, Sold out and Low stock, and sale badges show the percentage saved.

= 1.4.0 =
* Changed: Store Home pattern redesigned, with a light hero and still-life image, illustrated category tiles, richer product cards, a routine section, a light story section, static testimonials and a terracotta closing call to action.
* Changed: trust bar icons now match their labels.
* Added: product illustrations and trust bar icons used by the pattern.
* Added: hover motion for category tiles, product photos and buttons, switched off for visitors who prefer reduced motion.
* Fixed: stray character in the Store Home pattern description.

= 1.3.1 =
* Changed: the mobile menu overlay is a full-screen menu with large left-aligned links and hairline dividers on the theme's base colour, instead of a small right-aligned list on white.

= 1.3.0 =
* Added: Skincare style variation, a calm sage and cream palette that reuses the Store variation's fonts.

= 1.2.0 =
* Added: Store Home page pattern, a front page built from Aludra blocks and a WooCommerce product grid. It is hidden unless WooCommerce is active and the Aludra plugin is installed.
* Changed: documentation now describes the single page pattern.

= 1.1.0 =
* Added: header product search, an icon-only search limited to products, in both header parts.
* Changed: the inherited "Start a project" button is removed from both headers.

= 1.0.4 =
* Changed: README documents Composer installation from Packagist and its file structure is corrected.

= 1.0.3 =
* Fixed: the npm lockfile carried an inherited version number; it now matches the theme version.

= 1.0.2 =
* Changed: package metadata and README now describe Winespring as a WooCommerce e-commerce theme rather than a generic starter.

= 1.0.1 =
* Changed: a Winespring logo mark (grape cluster, Material Design Icons) replaces the inherited Aviendha rose, with a dark-mode variant for the README.

= 1.0.0 =
* Initial release. Created from Aviendha 1.18.4 and focused on WooCommerce stores.
* Added: a Store style variation — cream, charcoal and rust-orange with Cormorant Garamond headings and Jost body copy — mapped onto the full palette contract so Aludra blocks and store patterns render in it. Fonts are self-hosted and load only with the style.

== Third-Party Libraries ==

= Material Design Icons (via Blade Icons) =
* License: Apache License, Version 2.0
* Source: https://blade-ui-kit.com/blade-icons/mdi-fruit-grapes
* License URI: https://www.apache.org/licenses/LICENSE-2.0
* Used in: `assets/logos/winespring-primary.svg` and `assets/logos/winespring-dark.svg`
* Purpose: The "fruit-grapes" icon is used, unmodified except for recoloring, as the theme's logo mark (the Winespring Inn).

The Apache License 2.0 is GPLv3-compatible.

= Theme illustrations and icons =
* License: CC0 1.0 Universal (public domain dedication)
* License URI: https://creativecommons.org/publicdomain/zero/1.0/
* Used in: `assets/illustrations/*.svg` and `assets/icons/*.svg`
* Purpose: Original artwork created for this theme: the product illustrations and hero/story artwork used by the Store Home pattern, and its trust bar icons. The screenshot (`screenshot.png`) is a capture of the theme itself and uses the same artwork.

CC0 is GPL-compatible.

= Bricolage Grotesque =
* License: SIL Open Font License, Version 1.1
* Source: https://fonts.google.com/specimen/Bricolage+Grotesque
* License URI: https://scripts.sil.org/OFL
* Used in: `assets/fonts/bricolage-grotesque-variable.woff2`
* Purpose: Display font family (headings), self-hosted as a single variable-font file.

= JetBrains Mono =
* License: SIL Open Font License, Version 1.1
* Source: https://fonts.google.com/specimen/JetBrains+Mono
* License URI: https://scripts.sil.org/OFL
* Used in: `assets/fonts/jetbrains-mono-variable.woff2`
* Purpose: Mono font family (eyebrows/labels/metrics), self-hosted as a single variable-font file.

= Cormorant Garamond =
* License: SIL Open Font License, Version 1.1
* Source: https://fonts.google.com/specimen/Cormorant+Garamond
* License URI: https://scripts.sil.org/OFL
* Used in: `assets/fonts/store/CormorantGaramond-VariableFont_wght.woff2` and `CormorantGaramond-Italic-VariableFont_wght.woff2`
* Purpose: Display font family in the Store style variation, self-hosted as variable-font files.

= Jost =
* License: SIL Open Font License, Version 1.1
* Source: https://fonts.google.com/specimen/Jost
* License URI: https://scripts.sil.org/OFL
* Used in: `assets/fonts/store/jost-v20-latin-variable.woff2` and `jost-v20-latin-italic-variable.woff2`
* Purpose: Body font family in the Store style variation, self-hosted as variable-font files.

The SIL Open Font License is GPL-compatible.

== Copyright ==

Winespring WordPress Theme, (C) 2026 Jasper Frumau
Winespring is distributed under the terms of the GNU GPL v3 (or later).
