<p align="center">
  <picture>
    <source media="(prefers-color-scheme: dark)" srcset="assets/logos/winespring-dark.svg">
    <img src="assets/logos/winespring-primary.svg" alt="Winespring Logo" width="128" height="128">
  </picture>
</p>
<div align="center">
<h1>Winespring</h1>
</div>
<div align="center">

[![Total Downloads](https://img.shields.io/packagist/dt/imagewize/winespring.svg)](https://packagist.org/packages/imagewize/winespring)
[![Latest Stable Version](https://img.shields.io/packagist/v/imagewize/winespring.svg)](https://packagist.org/packages/imagewize/winespring)
[![License](https://img.shields.io/packagist/l/imagewize/winespring.svg)](https://packagist.org/packages/imagewize/winespring)
[![Theme Check](https://github.com/imagewize/winespring/actions/workflows/theme-check.yml/badge.svg)](https://github.com/imagewize/winespring/actions/workflows/theme-check.yml)

</div>
<div align="center">

A lean full-site-editing WooCommerce theme for client e-commerce stores.
</div>

## Description

Winespring is a full-site-editing (FSE) WordPress theme for **e-commerce**, built to speed up client store builds. It provides a design system via `theme.json` (colors, typography, spacing, layout), WooCommerce block templates, and three style variations (`store`, `skincare` and `twilight`), and a single **Store Home** page pattern, but no pattern library — other pages are composed directly from blocks. Fork it per client, or use it as the shared base.

It pairs with the [Aludra](https://github.com/imagewize/aludra) block library (mega menu, carousel, FAQ tabs, store bands, and more), but doesn't require it — the theme is a plain block theme that works with core blocks and any block plugin.

> **Lineage:** Winespring is created from the [Aviendha](https://github.com/imagewize/aviendha) starter theme and focuses it on WooCommerce stores. It is a companion to Imagewize's [Elayne](https://github.com/imagewize/elayne) and [Nynaeve](https://github.com/imagewize/nynaeve) themes and replaces Elayne's store vertical for client e-commerce work. Like Elayne, it ships no custom blocks of its own — content blocks come from the shared Aludra plugin, per WordPress.org's theme-review rules.

## Requirements

- WordPress 6.6+
- PHP 8.0+
- WooCommerce (the point of the theme; templates degrade gracefully without it)
- Aludra plugin (recommended, not required; the Store Home pattern needs it)

## Features

- **Store-first block theme** — built for WooCommerce client stores; fork it per client (it is a template repository) or use it as the shared base, with no pattern library that would need removal
- **Design system** — `theme.json` defines the color palette, typography, spacing, and border radii; color/spacing slugs match what Aludra's own block styles expect (`base`, `contrast`, `secondary`, `main`, `primary`, `accent`, `tertiary`, `border-light`)
- **WooCommerce templates** — `templates/single-product.html`, `templates/archive-product.html`, `templates/product-search-results.html`, and `templates/coming-soon.html` are theme-provided; cart, checkout, and category-archive templates fall back to WooCommerce's own block-theme defaults. The product archive and search results ship a results count, catalog sorting, a filters sidebar (price, category, availability, rating) and an empty state; the single product template uses the block-based add to cart, with theme layouts for simple and variable products in `parts/`. The coming-soon template wraps WooCommerce's coming-soon block with the theme's header and footer.
- **Degrades gracefully without WooCommerce** — with the plugin inactive, the store templates and the header's mini cart are filtered out rather than left to render as unsupported blocks. WooCommerce's own bundled `woocommerce-blocks/*` patterns are unregistered when it *is* active — the theme neither designed nor styles them, and they crowd out core's.
- **Two page templates** — `page.html` (default) omits `post-title` since most pages get their title from a block's own heading; `page-with-title.html` (selectable per-page under Page → Template) adds the conventional title treatment.
- **Style variations** — see `styles/` (`twilight.json` — dark, rose-accented; `store.json` — warm retail palette with self-hosted Cormorant Garamond and Jost; `skincare.json` — calm sage and cream palette with the same fonts) for alternate palettes on top of the same design system. Switch between them under **Appearance → Editor → Styles → Browse styles**.
- **One page pattern, no library** — `winespring/home-store` (**Store Home**) is a front page built from Aludra blocks and a WooCommerce product grid: hero, trust bar, category cards, newest products, story, stats, reviews and a closing call to action. It is registered only when WooCommerce is active **and** the Aludra plugin is installed — without Aludra it is hidden rather than inserting unsupported blocks. Everything else is block-first composition: core's own patterns stay registered, so the inserter is never empty; insert `aludra/*` blocks (or core blocks) directly into pages and templates, then add your own patterns as needed.

## Installation

Download the release zip from [GitHub](https://github.com/imagewize/winespring/releases) and upload it under **Appearance → Themes → Add New**, or install it with Composer from [Packagist](https://packagist.org/packages/imagewize/winespring):

```bash
composer require imagewize/winespring
```

The package type is `wordpress-theme`, so it needs `composer/installers` on the consuming site to land in `themes/` (Bedrock and Trellis already have it).

## Demo content

[imagewize/winespring-demo-content](https://github.com/imagewize/winespring-demo-content) is a WP-CLI seeder that fills a WooCommerce store with 16 skincare products (categories, variable products, sale prices and placeholder packshots), so you can see the templates and the `skincare` style variation with real data:

```bash
git clone https://github.com/imagewize/winespring-demo-content.git
cd winespring-demo-content
wp eval-file seed-skincare-products.php
```

For the front page, install the [Aludra](https://github.com/imagewize/aludra) plugin (`composer require imagewize/aludra`), edit your Home page, insert the **Store Home** pattern (Patterns → Featured) and set the page as your static front page under **Settings → Reading**. Pick the **Skincare** style under **Appearance → Editor → Styles** to match the products.

## Building a client store

Winespring is a GitHub [template repository](https://docs.github.com/en/repositories/creating-and-managing-repositories/creating-a-repository-from-a-template). Press **Use this template → Create a new repository**, then run **Actions → Rename theme from template → Run workflow** in the new repo and merge the pull request it opens. It renames the `winespring`/`Winespring` identifiers (CSS prefixes, PHP function prefix, text domain, package names, logo filenames) to the new repository's name. If it cannot open a PR, enable **Settings → Actions → General → Allow GitHub Actions to create and approve pull requests**.

The rename skips this README, `CHANGELOG.md`, `readme.txt` and the agent guides. Finish by hand:

- Rewrite those files, reset the version to `1.0.0`, and repoint their `assets/logos/winespring-*.svg` references
- Update the `style.css` header, `screenshot.png` and the logo mark
- Give the theme its own palette in `theme.json` or a `styles/*.json` variation (start from `store.json`)
- Rewrite or remove `patterns/home-store.php` (skincare copy), and add more patterns in `patterns/` if needed — the `@imwz/wp-pattern-sentinel` harness is already wired up

## Structure

```
winespring/
├── style.css          # Theme header (metadata only)
├── theme.json          # Design system: color, typography, spacing, layout
├── functions.php       # Theme setup, 'menu' template part area, WooCommerce hooks
├── templates/          # FSE templates (index, home, single, page, page-with-title, page-dark-header, archive, search, 404; WooCommerce: single-product, archive-product, product-search-results, order-confirmation, coming-soon)
├── patterns/            # Store Home page pattern (needs Aludra + WooCommerce)
├── parts/               # header, header-dark, footer, and simple/variable product add-to-cart layouts
├── styles/              # Style variations (store, skincare, twilight)
├── assets/
│   ├── logos/           # Winespring logo mark (SVG)
│   ├── fonts/           # Self-hosted fonts (store/ holds the Store variation's)
│   └── css/             # WooCommerce override stylesheet (enqueued conditionally)
└── languages/           # Translations (text domain: winespring)
```

## Theme Integration for Aludra

The Aludra mega-menu block requires its host theme to register a `menu` template part area. Winespring does this in `functions.php` via the `default_wp_template_part_areas` filter, so mega menu template parts created in the Site Editor appear under **Appearance → Editor → Patterns → Template Parts → Menus**.

## Development

```bash
composer install
composer run lint       # php-parallel-lint syntax check
composer run wpcs:scan   # PHPCS against phpcs.xml
composer run wpcs:fix    # PHPCBF auto-fix
```

No JS build step is required — the theme ships no bundled JavaScript.

## License

GNU GPL v3 (or later). See `LICENSE.md`.
