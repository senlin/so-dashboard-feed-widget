=== SO Dashboard Feed Widget ===
Contributors: senlin
Donate link: http://so-wp.com/donations/
Tags: dashboard, feed, widget, admin, rss
Requires at least: 3.6
Tested up to: 3.9-alpha
Stable tag: 2014.02.10
License: GPLv2 or later

The SO Dashboard Feed Widget shows the latest Posts from a site of your choice in the top of the WordPress Dashboard.

== Description ==

On websites I develop for clients I always add this widget to their WordPress Dashboard to keep them informed on general updates regarding their websites. I thought it would be a handy tool for other developers, so I turned my widget into a plugin.

The default settings are:

* the standard title of the widget box is "Recent Updates"
* as I needed a default feed URL I used the feed of WP TIPS, one of my own websites
* the default number of RSS items is 3
* yellow background color of the widget (`#FFFF99`)

The plugin comes localized for use on sites other than the English language and/or on bi/multilingual websites. In the languages folder you will find the .po and .mo files. Feel free to send me translations in other languages, I will then add them to this folder and of course I will credit you here.

Current translations:

* Dutch (by myself)

I have decided to only support this plugin through [Github](https://github.com/senlin/so-dashboard-feed-widget/issues). Therefore, if you have any questions, need help and/or want to make a feature request, please open an issue over at Github. You can also browse through open and closed issues to find what you are looking for and perhaps even help others.
 
<strong>PLEASE DO NOT POST YOUR ISSUES VIA THE WORDPRESS FORUMS BUT ON GITHUB INSTEAD</strong>
 
Thanks for your understanding and cooperation.

== Installation ==

= Wordpress =

Search for "SO Dashboard Feed Widget" and install with the **Plugins > Add New** back-end page.

 &hellip; OR &hellip;

Follow these steps:

1. Download zip file.
2. Upload the zip file via the Plugins > Add New > Upload page &hellip; OR &hellip; unpack and upload with your favorite FTP client to the /plugins/ folder.
3. Activate the plugin on the Plugins page.

Done!

On the Settings page you can change the widget title, the feed URL, the number of feed items and the background color of the widget. You will also see a checkbox that resets the settings back to the default settings when deactivating and then reactivating the plugin again.

After saving the settings, you can see the results in the main WordPress Dashboard.

== Frequently Asked Questions ==

= Does the SO Dashboard Feed Widget plugin also work on WordPress Multisite? =
For now it doesn't for reasons I do not know yet, but I'm looking into. If you want to use something similar for WordPress Multisite, you can download the [SO Multisite Dashboard Feed Widget](http://wordpress.org/plugins/multisite-dashboard-feed-widget/) that I developed a while back and which is also compatible with the latest version of WordPress.

= I have an issue with this plugin, where can I get support? =

Please open an issue over at [Github](https://github.com/senlin/so-dashboard-feed-widget/issues/new), as **I will not use the support forums** here on WordPress.org

== Screenshots ==

1. Settings page
2. Siteadmin Dashboard after installation

== Changelog ==

= 2014.02.10 =

* modified settings page and styling to better fit WP 3.8
* i18n date output
* removed line break between title and date
* updated settings icon
* updated screenshots

= 2013.12.28 =

* fixed [bug](https://github.com/senlin/so-dashboard-feed-widget/issues/2)

= 2013.12.26 =

* tested up to WP 3.9-alpha
* new links pointing to [SO-WP.com](http://so-wp.com/)
* new version number format
* removed dashboard link hover color
* added option to change yellow background color of widget
* moved RTL-style to new `dbfw_style_function`
* update language files

= 2.0.0 =

* complete reorganisation of the plugin files
* compatible up to WP 3.8

= 1.0.6 =

* change text domain to prepare for language packs (via Otto - http://otto42.com/el)

= 1.0.5 =
* Compatible up to WP 3.7
* move minimum WP version upwards to 3.6
* new WP version check

= 1.0.4 =
* Compatible up to WP 3.7-beta2
* Clean up and comment code and escape URLs where not done yet
* move minimum WP version upwards to 3.5.2
* Add "SO" in front of the name
* Add link to SO WP Plugins on Github
* Edit readme file
* adjust .po/.mo files
* remove images directory

= 1.0.3 =
* svn mess-up

= 1.0.2 =
* Compatible up to WP 3.6
* Change Twitter username

= 1.0.1 =
Add current translation to readme.txt, add some text to options page, adjust Dutch translation file

= 1.0 =
First release

== Upgrade Notice ==

= 1.0.5 =
* minimum required WordPress version is now 3.6
