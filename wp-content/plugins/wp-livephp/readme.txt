=== WP Live.php ===
Contributors: mbence
Donate link: http://bencemeszaros.com/donate/
Tags: developer, live, autorefresh, theme, plugin, refresh, easy, development
Requires at least: 2.6
Tested up to: 3.3.1
Stable tag: /trunk/

Automatically refresh your browser if you change any files in your theme or plugins directory

== Description ==

This plugin was written to make Wordpress theme and plugin developers' life easier.
Inspired by the brilliant live.js script (written by Martin Kool), 
this plugin will auto refresh your browser if you change any files in your wp-content/themes 
or plugins directories. No need for Alt-Tab and manual refresh anymore.

If you activate the WP Live Php plugin, it adds a small javascript file to your blog. 
It will monitor your directories by calling wp-live.php every second. If any file changed 
(i.e. has a newer filemtime), the browser will be refreshed.

With this plugin, it is also very easy to check your work in many browsers simultaneously. 
Just enable Frontend Monitoring, load the site in all your browsers and the rest goes automatically.

Starting from v1.3 there is an option to enable admin bar integration, to conveniently enable or
disable Live.php monitoring directly on your frontend or backend with just one click.

WARNING!
You should never activate this plugin on a live server! It is meant for developer environment only!

== Installation ==

Upload the WP Live.php plugin to your blog and Activate it. Thats all.

== Frequently Asked Questions ==

== Screenshots ==
1. Settings page
2. Admin bar integration

== Changelog ==
= 1.4 =
* Switched to long polling. Now the js will open only one long ajax request every 2 minutes (or as long as the php script is allowed to run). 
= 1.3.1 = 
* No new features, only some refactoring and code cleaning
= 1.3 =
* Admin bar integration
= 1.2.1 = 
* No cache fix for IE
= 1.2 = 
* Added Backend (wp-admin) monitoring option
* Settings page improvements - Ajax controls
= 1.1.1 =
* Some minor fixes
= 1.1 =
* Added settings page (Settings/WP Live.php) to enable / disable the  monitoring function
* Some code cleanup
* Updated for WP 3.3 
= 1.0 =
* Initial version

== Upgrade Notice ==
= 1.2.1 = 
Update to 1.2.1 if you plan to use this plugin on Internet Explorer
= 1.2 =
This version adds wp-admin monitoring and a nice settings page
