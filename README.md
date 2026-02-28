# LocalGov Sa11y

## Introduction

LocalGov Sa11y integrates the
[Sa11y accessibility checker](https://sa11y.netlify.app/) into
[LocalGov Drupal](https://localgovdrupal.org/) websites. Sa11y is a
customisable, framework-agnostic accessibility quality assurance tool that
visually highlights common accessibility and usability issues on a page.

The module vendors Sa11y 4.0.0 CSS and JavaScript assets locally under
`assets/sa11y/` so that no runtime CDN dependencies are required.

## Requirements

- Drupal 10 or 11 (`core_version_requirement: ^10 || ^11`)
- No additional contributed modules are required.

## Installation

Install as you would normally install a contributed Drupal module. Visit
[Installing Drupal Modules](https://www.drupal.org/docs/extending-drupal/installing-drupal-modules)
for further information.

```bash
composer require drupal/localgov_sa11y
drush en localgov_sa11y
```

## Configuration

1. Grant the **Use LocalGov Sa11y** permission (`use_localgov_sa11y`) to the
   roles that should see the accessibility checker widget.
2. Navigate to **Administration > Configuration > Content authoring >
   LocalGov Sa11y Settings** (`/admin/config/content/localgov-sa11y`) to
   configure options such as:
   - **Check Root** -- CSS selector for the region Sa11y scans (default:
     `div.dialog-off-canvas-main-canvas`).
   - **Container Ignore** -- CSS selectors for regions Sa11y should skip.
   - **Contrast Ignore** -- CSS selectors excluded from contrast checks.
   - **Link Ignore** -- CSS selectors for links Sa11y should ignore.
   - **Export Results Plugin** -- enable CSV/HTML export of results.
   - **Check All Hide Toggles** -- visually hide toggle switches in the
     Sa11y settings panel.
   - **Panel Position** -- place the Sa11y panel in any corner of the page.

The Sa11y widget only appears on pages rendered with the front-end theme (not
the administration theme).

## Maintainers

This project is currently maintained by:

- [Mark Conroy](https://www.drupal.org/u/markconroy)
- [Maria Young](https://www.drupal.org/u/msayoung)
