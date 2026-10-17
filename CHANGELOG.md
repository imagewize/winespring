# Changelog

All notable changes to Winespring are documented in this file. Winespring was created from
[Aviendha](https://github.com/imagewize/aviendha) 1.18.4; earlier history lives in that repository.

## [1.5.0] - 2026-10-17

First release under the Winespring name.

### Added
- `winespring/free-shipping-bar` block: shows how far the cart is from free shipping, with a progress
  bar. The threshold is the lowest minimum on an enabled free shipping method in the customer's
  shipping zone (override with the block's `threshold` attribute or the
  `winespring_free_shipping_threshold` filter). Rendered on the server, then kept current from the
  Store API when items are added or removed.
- `parts/announcement-bar.html`, shown above both headers, with a message and the free shipping bar.
- `winespring/sticky-add-to-cart` block, added to `single-product.html`: a bar with name, price and a
  button that scrolls back to the add to cart form once it leaves the viewport.
- Product image badges for New, Sold out and Low stock (`winespring_new_badge_days` and
  `winespring_low_stock_amount` filters); sale badges now show the percentage saved.
- `inc/store-features.php`.

### Changed
- Requires WordPress 6.7, for server-registered blocks that need no editor JavaScript.
- The theme now ships two small unbuilt view scripts (`blocks/*/view.js`), loaded only where the
  block is on the page. Still no build step.
- `composer run wpcs:scan` and `wpcs:fix` skip `.js` files; the WordPress PHP standard misreads them.
- Renamed the theme from Marin to Winespring, because the `marin` slug is already taken on
  wordpress.org. The text domain, `winespring_` function prefix, `Winespring` namespace,
  `winespring/home-store` pattern, `winespring-*` CSS classes and the logo files
  (`assets/logos/winespring-*.svg`) all follow. Sites running Marin must re-select the theme and
  re-save any template or template part customisations, which are stored under the old theme slug.

## [1.4.0] - 2026-10-04

### Changed
- `patterns/home-store.php` (**Store Home**) redesigned from the new home mockup:
  - Hero rebuilt from core blocks with a light background, large display type with an italic
    terracotta accent, a still-life illustration and a Sale card, replacing `aludra/hero-split`.
  - Category cards are now coloured tiles carrying a small product illustration.
  - Bestsellers are ordered by popularity and each card shows its category, summary, price and an
    Add to cart button, with square product images and padded text.
  - New "Cleanse, treat, moisturise" routine section, with the stat rail moved beneath it.
  - Story section rebuilt as a light image-and-text split, replacing `aludra/split-section`.
  - Testimonials are a static three-card grid instead of the Slick carousel, which also removes
    references to font and size slugs that the Skincare variation does not define.
  - The closing call to action is a terracotta core-block band, replacing `aludra/cta-banner`.
- Trust bar icons now match their labels (shipping, returns, gentle, secure checkout).

### Added
- `assets/illustrations/`: SVG product illustrations (hero, story, jar, serum, bottle, kit) used as
  placeholders until real product photography replaces them.
- `assets/icons/`: four trust bar icons (truck, returns, leaf, lock), since Aludra ships none.
- `style.css` section 7, Motion: category tile illustrations lift on hover or focus, product photos
  ease in, and buttons in page content darken slightly on hover. All of it is off under
  `prefers-reduced-motion`.

### Fixed
- Stray ` *` in the Store Home pattern's Description header.

## [1.3.1] - 2026-10-04

### Changed
- Mobile menu overlay (both headers): the open menu is now laid out as a full-screen menu — a
  left-aligned, full-width list of large display-face links separated by hairlines — instead of
  core's shrink-wrapped, right-anchored list of body-size links. Its background is the theme's
  `base` colour rather than core's `#fff`, and the overlay is inset on all four sides so the close
  button and the list share the same margins. The inline desktop menu is unchanged.

## [1.3.0] - 2026-10-04

### Added
- `styles/skincare.json`: a calm sage, cream and clay style variation for skincare and wellness
  stores. Same palette slugs as the base design system, so Aludra blocks and the Store Home pattern
  pick it up unchanged; reuses the Store variation's self-hosted Cormorant Garamond and Jost, so no
  new font files. Every text/background pairing in the palette meets WCAG AA (4.5:1).
- README: the demo-content steps now mention picking the Skincare style.

## [1.2.0] - 2026-10-04

### Added
- `patterns/home-store.php` (`winespring/home-store`, **Store Home**): a store front page built from Aludra
  blocks and a WooCommerce product grid — hero, trust bar, category cards, newest products, story,
  stats, reviews and a closing call to action. Skincare copy; the shop, category and kit links are
  resolved at render time. Validated with `sentinel` against the demo install.
- `winespring_maybe_unregister_store_home_pattern()` registers the pattern only when WooCommerce is active
  and Aludra's blocks are registered, so it is never offered where it would insert unsupported blocks.

### Changed
- Docs (README, `readme.txt`, `CLAUDE.md`, `AGENTS.md`, `.agents/code-review.md`) now describe Winespring as
  shipping one page pattern rather than none, and say the pattern needs Aludra.

## [1.1.0] - 2026-10-04

### Added
- Header product search: an icon-only `core/search` block limited to products (`post_type=product`)
  sits before the account and mini-cart icons in both `parts/header.html` and
  `parts/header-dark.html`.
- README: a "Demo content" section pointing to
  [imagewize/winespring-demo-content](https://github.com/imagewize/winespring-demo-content), a WP-CLI seeder
  with 16 skincare products and placeholder packshots.

### Changed
- Both headers no longer ship the inherited "Start a project" call-to-action button, which made no
  sense on a store. The `.winespring-header__cta` styles were removed with it.

## [1.0.4] - 2026-10-04

### Changed
- README: added an Installation section covering the release zip and `composer require
  imagewize/winespring` now that the theme is on Packagist, and corrected the Structure tree (removed the
  non-existent `docs/`, added `assets/fonts/`, the dark-header template and the order-confirmation
  template).
- `CLAUDE.md` and `AGENTS.md`: the template-parts and WooCommerce-template notes now list what
  `parts/` and `templates/` actually contain.

## [1.0.3] - 2026-10-04

### Fixed
- `package-lock.json` carried Aviendha's `1.18.3` as its root version; it now matches `package.json`.

## [1.0.2] - 2026-10-04

### Changed
- Positioned Winespring as a WooCommerce e-commerce theme rather than a generic starter: `composer.json`
  and `package.json` descriptions, the `package.json` keywords (`woocommerce`, `e-commerce` replace
  `starter-theme`), the README tagline, feature list and WooCommerce requirement, and the opening
  line of `.agents/code-review.md`.

## [1.0.1] - 2026-10-04

### Changed
- **Winespring logo mark** (`assets/logos/winespring-primary.svg`): a grape cluster for the
  Winespring Inn replaces the inherited Aviendha rose. A lighter `winespring-dark.svg` variant
  serves the README in dark mode via `<picture>`. Material Design Icons credited in readme.txt.

## [1.0.0] - 2026-10-04

### Added
- **Store style variation** (`styles/store.json`): cream, charcoal and rust-orange palette mapped onto
  the full 12-slug palette contract, with self-hosted Cormorant Garamond headings and Jost body copy
  under `assets/fonts/store/`. The fonts load only when the variation is active.

### Changed
- Created from Aviendha 1.18.4 and refocused as a WooCommerce theme for client store builds.
  Description, README, readme.txt and agent guides rewritten for Winespring.
- Rename workflow: `actions/checkout` now uses `persist-credentials: false`, which fixes the
  rename action's push failing with a duplicate `Authorization` header.
