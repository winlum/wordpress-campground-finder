=== Campground Search ===
Contributors: winlum
Donate link: https://winlum.com/
Tags: comments, campground, search
Requires at least: 4.6
Tested up to: 5.1.1
Requires PHP: 5.4
Stable tag: master
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WordPress (WP) Plugin to manage and display Campgrounds.

== Description ==

Utilizes WP custom post types (CPT), taxonomies, custom fields (metadata),
query vars, etc. to facilitate adding campgrounds withing WP.

== Installation ==

Upload the Akismet plugin to your blog, Activate it.

1, 2, 3: then create and manage your campgrounds.

== TODO ==

1. ~~create Post Type~~
1. ~~create Taxonomies~~
1. ~~create Meta Boxes~~
1. ~~create Query vars~~
1. ~~create search form~~
1. ~~display search results~~
1. cleanup on deactivate/uninstall
1. ~~admin options/creation~~
1. import/export data
1. ~~create seed data~~

- Multisite support
- CLI support
- Error handling
- Logging
- Notices
- Improved Administration
- Theme support for search form?
- Geolocation support
- Ability to "close" a campground
- Rework date ranges -- very clunky right now (use type="month"?)
- Performance -- reduce the number of queries, update looping/mapping
- Handle i18n for certain measurement (e.g. elevation), etc values
- Quick Edit Form fields

== Changelog ==

= 1.1.0 =

- Add district and # group sites as options
- Add more activity and feature taxonomies

= 1.0.0 =

- Initial version.

== Upgrade Notice ==

= 1.1.0 =

There should be no changes as only added options.

= 1.0.0 =

No need to upgrade as this is the inital version.
