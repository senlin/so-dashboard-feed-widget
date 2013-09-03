=== SO Dashboard Feed Widget ===
Contributors: senlin
Donate link: http://senl.in/PPd0na
Tags: dashboard, feed, widget, admin, rss
Requires at least: 3.0
Tested up to: 3.6
Stable tag: 1.0.3
License: GPLv2 or later

The SO Dashboard Feed Widget shows the latest Posts from a site of your choice in the top of the WordPress Dashboard.

== Description ==

On websites I develop for clients I always add this widget to their WordPress Dashboard to keep them informed on general updates regarding their websites. I thought it would be a handy tool for other developers, so I turned my widget into a plugin.

The default settings are:<br />
- the standard title of the widget box is "Recent Updates"<br />
- as I needed a default feed URL I used the feed of WP TIPS, one of my own websites<br />
- the default number of RSS items is 3

The plugin comes localized for use on sites other than the English language and/or on bi/multilingual websites. In the languages folder you will find the .po, .pot and .mo files. Feel free to send me translations in other languages, I will then add them to this folder and of course I will credit you here.

Current translations:<br />
- Dutch (by myself)

== Installation ==

1. Upload `dashboard-feed-widget.zip` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. You will see a link to the Settings after activation and you can also find them later under the Settings menu.

On the Settings page you can change the widget title, the feed URL and the number of feed items. You will also see a checkbox that resets the settings back to the default settings when deactivating and then reactivating the plugin again.

After saving the settings, you can see the results in the main WordPress Dashboard.

== Frequently Asked Questions ==

= Does the SO Dashboard Feed Widget plugin also work on WordPress Multisite? =
For now it doesn't for reasons I do not know yet, but I'm looking into. If you want to use something similar for WordPress Multisite, you can download the [SO Multisite Dashboard Feed Widget](http://wordpress.org/plugins/multisite-dashboard-feed-widget/) that I developed a while back and which is also compatible with the latest version of WordPress.

== Screenshots ==

1. Settings page
2. Siteadmin Dashboard after installation

== Changelog ==

= 1.0.3 =
* svn mess-up

= 1.0.2 =
* Compatible up to WP 3.6
* Change Twitter username

= 1.0.1 =
Add current translation to readme.txt, add some text to options page, adjust Dutch translation file

= 1.0 =
First release
