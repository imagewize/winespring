# Changelog

All notable changes to Winespring are documented in this file. Winespring was created from
[Aviendha](https://github.com/imagewize/aviendha) 1.18.4; earlier history lives in that repository.

## [1.7.0] - 2026-10-18

### Added
- `inc/plugin-recommendations.php`: a dismissible admin notice on the Dashboard and Themes
  screens recommending WooCommerce and Aludra. It is shown only to users who can install
  plugins and only while one of the two is missing, and a nonce-protected Dismiss link stores
  a per-user flag so it does not return. It links to install or activate each plugin; the
  theme never installs or activates anything itself.
- `languages/winespring.pot`, the `Domain Path: /languages` header and a `composer run i18n:pot`
  script to regenerate the template (needs WP-CLI).

## [1.6.0] - 2026-10-18

### Added
- Page patterns built from core blocks only, so they need no plugins: `winespring/home-core`
  (Core Home), `winespring/page-about`, `winespring/page-contact` and `winespring/page-faq`.
  Core Home lists products when WooCommerce is active and the latest posts otherwise. The
  Contact pattern leaves a placeholder for the site owner's form plugin.
- `winespring-pages` pattern category, registered in `functions.php`.
- readme.txt licence entry for the illustrations and icons (CC0 1.0).

### Changed
- Retitled `winespring/home-store` to "Store Home (Aludra + WooCommerce)" and moved it into the
  `winespring-pages` category. The slug is unchanged.
- Docs (`CLAUDE.md`, `AGENTS.md`, `.agents/code-review.md`, README, readme.txt, style.css
  description) now describe a small set of five patterns instead of one.

### Fixed
- `winespring_strip_woocommerce_blocks()` used a regex with an unbalanced group, so `preg_replace`
  returned `null` and the header template part rendered empty whenever WooCommerce was inactive.
- PHPCS alignment warnings in `style.css` and `assets/css/woocommerce.css`.

## [1.5.1] - 2026-10-18

### Changed
- Resized the brand name in the illustrations (`hero`, `story`, `bottle`, `jar`, `serum`, `kit`
  SVGs in `assets/illustrations/`). The longer Winespring name overflowed the labels drawn for
  Marin; each now takes about 80% of its label width.
- Replaced `screenshot.png` with the Winespring Store Home pattern (1200x900). It was still an
  Aviendha screenshot.

## [1.5.0] - 2026-10-17

First release under the Winespring name.

### Added
- `parts/announcement-bar.html`, shown above both headers: a message plus the
  `aludra/free-shipping-bar` block.
- `aludra/sticky-add-to-cart` in `single-product.html`: a bar with name, price and a button that
  scrolls back to the add to cart form once it leaves the viewport.
- Both blocks come from the Aludra plugin (2.39.0 or later), because Theme Check rejects block
  registration in a theme. Without Aludra, or without WooCommerce, the theme removes them from the
  templates and template parts so nothing renders as an unsupported block.
- Product image badges for New, Sold out and Low stock (`winespring_new_badge_days` and
  `winespring_low_stock_amount` filters); sale badges now show the percentage saved.
- `inc/store-features.php`.

### Changed
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
