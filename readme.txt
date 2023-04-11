=== 404 Suggested Page ===
Contributors: momandwiar
Tags: 404, page suggestion
Requires at least: 5.0
Tested up to: 5.9.3
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin suggests a published page when the requested page is not found.

== Description ==

404 Suggested Page is a lightweight plugin that provides a fallback mechanism for non-existing pages. When a page is not found, it searches for the closest match among the published pages and returns it as a suggestion.

This plugin is useful for improving the user experience and reducing the bounce rate of your website. It can also help search engines to index your pages better by providing a suggestion for the missing page.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/404-suggested-page` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.

== Frequently Asked Questions ==

= How does the plugin work? =

The plugin uses the `get_the_suggested_page()` function to retrieve a suggested published page for the current request URI. The function searches for the closest match among the published pages and returns it as a suggestion.

= What happens if there are no published pages? =

If there are no published pages, the plugin returns a default WordPress 404 error message.

== Changelog ==

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.0 =
Initial release.
