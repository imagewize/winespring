# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Winespring is a lean full-site-editing (FSE) **WooCommerce theme** for WordPress, created from the
**Aviendha** starter (GitHub template repository) to speed up building e-commerce themes for clients.
It is a companion to Imagewize's **Elayne** and **Nynaeve** themes and is meant to replace Elayne's
store vertical for client store work. Like Aviendha it is deliberately minimal: **a small,
curated set of patterns, not a library**. `theme.json`, WooCommerce block templates, and style variations (`styles/store.json`
is the retail palette) form the design system; page content is composed directly from blocks (core
blocks or the [Aludra](https://github.com/imagewize/aludra) block library).

**Requirements:**
- WordPress 6.6+
- PHP 8.0+
- WooCommerce (the point of the theme; templates degrade gracefully without it)
- Aludra plugin — recommended, not required

## Lineage and upstream

Winespring (originally named Marin, renamed because the `marin` slug is taken on wordpress.org) was created from `imagewize/aviendha` on 2026-10-04 via **Use this template** plus
`.github/workflows/template-rename.yml` (run from the Actions tab; `persist-credentials: false` on
checkout was added here because the rename action's push otherwise fails with a duplicate
`Authorization` header). Aviendha stays the neutral starter; improvements that are not store-specific
(theme.json fixes, template bugs, grid rules) belong upstream there too — port them by hand.

**Why a small, curated set of patterns:** reusable logic lives in Aludra's `aludra/*` blocks, which keeps
this theme's surface area small. Prefer a **style variation** (`styles/*.json`) over more patterns for
new looks. The theme ships five page patterns, all in the `winespring-pages` category (registered in
`functions.php`), so a fresh install has a working front page and the standard content pages, and so the
wp.org theme preview has patterns to show:

- `winespring/home-core`, `page-about`, `page-contact`, `page-faq` — built from **core blocks only**, so they
  need no plugins. `home-core` lists products when WooCommerce is active and the latest posts otherwise.
  The Contact pattern leaves a placeholder for the owner's form plugin, since core has no form block.
- `winespring/home-store` (**Store Home (Aludra + WooCommerce)**): the store front page built from Aludra
  blocks and a WooCommerce product grid, with skincare copy and links resolved at render time (shop page,
  `product_cat` slugs). It is registered only when WooCommerce is active and Aludra's blocks are registered
  (`winespring_maybe_unregister_store_home_pattern()` in `functions.php`), since pattern files otherwise
  register themselves and would insert unsupported blocks. Its colour panels are Aludra's own "replace
  with a photo" placeholders, so it works without any images.

Keep the set small: add vertical-specific page patterns on a branch, not as a growing library. The
pattern-validation harness (`@imwz/wp-pattern-sentinel`, `npm run validate`) covers all of them — see
[Pattern validation](#pattern-validation).

The workflow's `paths-ignore` skips `.github/**`, README/CHANGELOG/readme.txt/agent guides,
`composer.lock`, `vendor/**` and PNGs. The rename moves `assets/logos/winespring-*.svg` but not the
references to them in the skipped files; forks of Winespring must repoint those by hand.

## Architecture

### Design system (`theme.json`)

Single source of truth for color, typography, spacing, and border radius. Color and spacing slugs are
chosen to match what Aludra's block styles and patterns already reference (mega-menu patterns use
`var:preset|color|contrast`, `secondary`, `border-light`, and `var:preset|spacing|small` etc.) —
**do not rename or remove these slugs** without checking Aludra's `patterns/*.php` for references:

- Colors: `base`, `tertiary`, `border-light`, `contrast`, `secondary`, `main`, `primary`, `accent`
- Spacing: `2-x-small`, `x-small`, `small`, `medium`, `large`, `x-large`

### Templates (`templates/`)

Real block markup — not pattern references. Includes core templates (`index`, `home`, `archive`,
`single`, `page`, `search`, `404`) and the WooCommerce templates. The two core ones:

- `single-product.html` — product gallery, title, price, add-to-cart, details, related products
- `archive-product.html` — product grid via `woocommerce/product-collection`

`product-search-results.html`, `order-confirmation.html` and `coming-soon.html` are also
theme-provided; see the README for what each ships.

**`page.html` (default) omits `post-title`.** Most Winespring pages are composed directly from blocks
(or Aludra blocks) whose own heading already serves as the page's title — e.g. `aludra/hero-split`'s
`<h1>`. Auto-printing `post-title` above that would duplicate it. Use **`page-with-title.html`** (a
custom template, selectable per-page under Page → Template in the editor) for standard content pages
that do want the conventional title treatment — it's identical to `page.html` plus `post-title`.

**Deliberately not shipped:** `cart.html`, `checkout.html`, `taxonomy-product_cat.html`. WooCommerce
ships its own block-theme default templates for these and uses them automatically when a theme
doesn't override them. Only add theme-specific versions here once there's an actual customization
need — don't ship untested block markup for the sake of completeness.

### Template parts (`parts/`)

`header.html`, `header-dark.html` (used by `page-dark-header.html`) and `footer.html`, plus the
`simple-product-add-to-cart-with-options.html` and `variable-product-add-to-cart-with-options.html`
add-to-cart layouts for the single-product template. No file-based `menu` template part — see below.

### Aludra mega-menu integration

The Aludra mega-menu block requires its host theme to register a `menu` template part area.
`functions.php` does this via the `default_wp_template_part_areas` filter. This makes mega menu
template parts (created by users in the Site Editor) appear under
**Appearance → Editor → Patterns → Template Parts → Menus**. Content for those template parts lives
in the database, not in this theme — Winespring ships no menu template part files, matching the
"small set of patterns" rule above.

### Style variations (`styles/`)

Alternate color palettes layered on the same `theme.json` design system. `styles/twilight.json` is
the example — a dark, rose-accented variant. Follow this pattern for future variations: override
`settings.color.palette` (keep the same slugs) and any `styles` overrides needed, nothing else.
`styles/skincare.json` follows it too and reuses `store.json`'s fonts rather than shipping new ones; check
every text/background pairing in a new palette against WCAG AA (4.5:1) before shipping it.

## Development

No JS build step — the theme ships no bundled JavaScript or CSS preprocessing. Store blocks that need scripts belong in the Aludra plugin: Theme Check rejects `register_block_type()` in a theme as plugin territory.

```bash
composer install
composer run lint       # php-parallel-lint syntax check
composer run wpcs:scan  # PHPCS against phpcs.xml (WordPress standard)
composer run wpcs:fix   # PHPCBF auto-fix
composer run i18n:pot   # regenerate languages/winespring.pot (needs WP-CLI) — run before each release
```

`package.json` exists only for the pattern-validation harness below — it is not a build step, and
ships no runtime JS.

Project-specific code review rules (for the `/code-review` skill or Vibe) live in
`.agents/code-review.md` — read that before reviewing a change here.

### Pattern validation

Winespring ships five patterns (see "Why a small, curated set of patterns" above) and carries the
`@imwz/wp-pattern-sentinel` harness in `package.json` for them and for forks that add a `patterns/` directory.
`wp pattern validate`'s PHP `parse_blocks()` pass does **not** run Gutenberg's JavaScript `save()`
function — issues only the JS serializer produces (class-ordering, attribute defaults like a
block's own `align`, auto-injected styles) pass that check but still fail block validation in the
real editor. Sentinel catches these by launching a real browser, logging into WP admin, inserting
the pattern into a draft page, saving it, and reading back the actual validation/content-mismatch
result — so run it after each pattern iteration, not just once at the end. Run it against the real
Trellis VM install (see "Testing on the demo site" below), never a standalone `--url`, since that's
the WordPress instance patterns are actually exercised against:

```bash
npm install
npm run setup            # npx playwright install chromium, once

# from the theme directory (~/code/winespring, or the fork's working copy)
sentinel --trellis --trellis-dir=$HOME/code/imagewize.com/trellis \
  --site=demo.imagewize.com --subsite=winespring patterns/my-pattern.php   # single file

sentinel --trellis --trellis-dir=$HOME/code/imagewize.com/trellis \
  --site=demo.imagewize.com --subsite=winespring patterns/                # everything
```

Swap `--subsite=winespring` for the fork's own subsite slug (e.g. `--subsite=ixian`).

### Where docs and design mockups live

**Not in this repo.** Planning documents, roadmaps and HTML design mockups belong in the
`imagewize/imagewize.com` repo, under `docs/winespring/` and `designs/winespring/` — the same
per-project layout Aludra, Elayne and Nynaeve use. Elayne and Nynaeve ship no `docs/` or `designs/`
directory at all; keep it that way here.

**That repo is private, and access is limited to the Imagewize team.** Contributors outside the
team cannot read it, so nothing here — no code comment, no README, no issue reply — should treat a
document there as something a reader can go and open. Anything an outside contributor genuinely
needs must live in this repo, in `readme.txt`, `CHANGELOG.md` or a code comment. Team members
clone `imagewize.com` alongside this repo and read the documents locally; the paths above are
relative to that clone.

Two reasons, beyond consistency: this repo is public and distributable, so mockups carrying client
names and roadmaps of unshipped work do not belong in it; and a second copy of a design file drifts
from the first (`winespring-redesign.html` was already duplicated in both repos before this rule).

Durable rationale for a change belongs in the commit message and in code comments, not in a
document — that is what makes the split cost nothing. `.distignore` and `.gitattributes` still
carry `docs/` and `designs/` entries as a guard, so a stray file never reaches a release zip.

### Testing on the demo site

Winespring is exercised on the `/winespring/` subsite of the local Trellis/Bedrock multisite at
`~/code/imagewize.com/demo` (`http://demo.imagewize.test/winespring/`), alongside the
[Aludra](https://github.com/imagewize/aludra) block library the content is composed from.

Both are pinned Composer dependencies there, **not** symlinks to these working copies. Do not cut
a release to test a local change — sync instead, with `rsync-package-to-site` from
[wp-ops](https://github.com/imagewize/wp-ops), via the `wp-ops` CLI (run `~/code/wp-ops/install.sh`
once if `wp-ops` isn't on your PATH yet):

```bash
SITE_ROOT=~/code/imagewize.com/demo/web/app \
  wp-ops rsync-package-to-site theme winespring ~/code/winespring
```

**Always pass the theme working copy (`~/code/winespring`) as the explicit source argument, and do
not `cd` into the demo site to run this.** When the source argument is omitted the script defaults
it to `$PWD` — so running this from inside the demo site rsyncs the entire Bedrock site *into*
`themes/winespring/`, and because the sync uses `--delete --delete-excluded`, it wipes the real
theme. Preview with `--dry-run` (before the `theme` argument) when unsure; if the output shows it
deleting WordPress core (`web/wp/...`) or Bedrock files (`.env`, `config/`), the source argument is
wrong — stop.

It rsyncs a dist-faithful tree (`--delete --delete-excluded`, honouring `.distignore`), so what
you test is what ships; pass `plugin aludra` for the block library. A `composer update` on the
demo site puts the released code back.

The script deliberately lives in wp-ops rather than here: its paths are personal configuration,
not theme code, and Theme Check's `File_Check` rejects a theme that ships a `.sh` file at all.
Elayne and Nynaeve keep their copies untracked for the same reason; `bin/sync-demo.sh` is
gitignored here if you want a local shortcut.

Run one-off WP-CLI commands against it with:

```bash
cd ~/code/imagewize.com/trellis
trellis vm shell --workdir /srv/www/demo.imagewize.com/current -- wp <command> --url=demo.imagewize.test/winespring/
```

### CI

Two checks run on GitHub, both mirroring Elayne's:

- `wpcs.yml` — PHPCS against the WordPress standard, on every pull request. `composer run
  wpcs:scan` runs the same standard locally.
- `theme-check.yml` — the WordPress theme review action with the stricter accessibility suite
  enabled, on pull requests and pushes to `main`. It reviews the repo root, exactly as Elayne's
  does. The action copies whatever `root-folder` points at, so anything tracked here is reviewed:
  Theme Check's `File_Check` rejects a theme carrying a `.sh` file, which is why the sync script
  lives in wp-ops and is gitignored here. Keep it that way rather than reaching for a build step.

### Release packaging

Publishing a GitHub release triggers `.github/workflows/create-release.yml`, which zips the theme
with `zip -x@.distignore` and attaches it to the release. Anything that should not reach an
installed site belongs in `.distignore` — and, so source archives match, in `.gitattributes` as
`export-ignore`. Keep the two in step.

## Version Management

When updating the theme version, update **four files** in sync:

1. **CHANGELOG.md** — add a new version section
2. **readme.txt** — update `Stable tag` header and add a changelog entry
3. **style.css** — update the `Version` header
4. **package.json** — update `version`

`style.css` is the version WordPress actually reads, and the only one that affects an installed
site; the other three keep the repo, the WP.org listing and the release tooling honest. Check all
four before tagging.

**Lockfiles are not part of the checklist.** `composer.lock` never records the theme's own
version (`composer.json` has no `version` field; the lock holds only dependency versions and a
content hash), so a version bump never touches it. `package-lock.json` copies the root `name` and
`version` from `package.json` and npm refreshes them on the next `npm install`; it once drifted at
Aviendha's `1.18.3` because the theme has no JS build and nobody runs npm often. Nothing reads that
value — if you notice drift, fix it by hand or run `npm install`, but it does not block a release.

**License:** Winespring uses the GNU GPL v3 (or later) (see `LICENSE.md`), matching Aludra, Elayne and Ixian.

## Git Commit Guidelines

**Never mention AI tools (Claude, ChatGPT, etc.) in commit messages or PR bodies**, and never add
AI co-author/attribution trailers (e.g. `Co-Authored-By: Claude ...`, "Generated with Claude Code").
This applies regardless of how the change was made — commit messages describe the change, not the
tooling used to produce it.

Commit messages should be concise, professional, and focused on the change itself:

- Good: "Add archive-product template", "Fix header nav overlay z-index"
- Bad: "Claude helped me fix..." / overly long explanations / AI attribution footers

**Prefer atomic commits** — one commit per file or logically-related group of files, rather than
one large commit bundling unrelated changes. Makes history easier to review and bisect.

## Key Files

- `theme.json` — design system (single source of truth)
- `functions.php` — theme setup, `menu` template part area registration, WooCommerce hooks
- `inc/plugin-recommendations.php` — admin-only, dismissible notice recommending WooCommerce and Aludra (wp.org allows a restrained notice; keep it to the Dashboard and Themes screens, capability-gated and per-user dismissible)
- `languages/winespring.pot` — translation template; regenerate with `composer run i18n:pot` before each release. `languages/nl_NL.po`/`.mo` is the Dutch translation (informal "je"); after regenerating the template run `msgmerge -U languages/nl_NL.po languages/winespring.pot`, translate any new strings, then `msgfmt --check -o languages/nl_NL.mo languages/nl_NL.po`
- `templates/*.html` — FSE templates, including WooCommerce single-product/archive-product
- `parts/*.html` — header, dark header, footer and add-to-cart template parts
- `styles/*.json` — style variations
- `assets/logos/` — Winespring logo mark (light and dark variants for the README `<picture>`) — grape cluster for the Winespring Inn (SVG, Material Design Icons `fruit-grapes` via Blade Icons, Apache 2.0)
- `composer.json` / `phpcs.xml` — PHP lint/coding-standards tooling
- `.github/workflows/template-rename.yml` — the fork rename (see [Forking Winespring](#forking-winespring))
