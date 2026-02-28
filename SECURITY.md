# Security Policy

## Supported Versions

| Version | Supported          |
| ------- | ------------------ |
| 1.x     | Yes                |

## Reporting a Vulnerability

If you discover a security vulnerability in this module, please report it
through the Drupal security team's responsible disclosure process:

1. **Do not** open a public issue on drupal.org or GitHub.
2. Follow the [Drupal Security Team reporting process](https://www.drupal.org/drupal-security-team).
3. Send a detailed description to the Drupal Security Team at
   security@drupal.org.

The Drupal Security Team will coordinate the fix, assign a CVE if appropriate,
and publish a Security Advisory (SA) once a patch is available.

## Threat Model

This module integrates the Sa11y accessibility checker into Drupal pages for
authenticated users who hold the `use_localgov_sa11y` permission. The following
threat areas are relevant:

### Permission-gated access

The Sa11y widget is only attached for users who have been explicitly granted the
`use_localgov_sa11y` permission. Misconfiguring this permission (e.g. granting
it to anonymous users) would expose the checker to unauthenticated visitors.
Site administrators should restrict this permission to trusted roles.

### Admin settings form

The module provides a configuration form at
`/admin/config/content/localgov-sa11y` protected by the
`administer localgov_sa11y settings` permission. Values entered here (CSS
selectors) are passed to `drupalSettings` and consumed by client-side
JavaScript. Because Drupal's configuration API handles storage and the values
are only used as CSS selector strings in the Sa11y library, the risk of
injection is low. However, only trusted administrators should have access to
this form.

### Vendored third-party assets

Sa11y CSS and JavaScript assets are vendored locally under `assets/sa11y/` to
eliminate runtime CDN dependencies. When updating these assets, maintainers
should verify the integrity of the files against the upstream release.

### Client-side only

Sa11y runs entirely in the browser. It does not transmit page content to
external services, and it does not modify any server-side state.
