SO Dashboard Feed Widget
=====================

[![plugin version](https://img.shields.io/wordpress/plugin/v/dashboard-feed-widget.svg)](https://wordpress.org/plugins/dashboard-feed-widget)

###### Last updated 2016.11.29
###### tested up to WordPress 4.7
###### Author: [Piet Bos](https://github.com/senlin)
###### [Stable Version](https://wordpress.org/plugins/dashboard-feed-widget/) (via WordPress Plugins Repository)
###### [Plugin homepage](https://so-wp.com/?p=15)

The SO Dashboard Feed Widget shows the latest Posts from a site of your choice in the top of the WordPress Dashboard.

## Description

On websites I develop for clients I always add this widget to their WordPress Dashboard to keep them informed on general updates regarding their websites. I thought it would be a handy tool for other developers, so I turned my widget into a plugin.

The default settings are:

* the standard title of the widget box is "Recent Updates"
* as I needed a default feed URL I used the feed of WP TIPS, one of my own websites
* the default number of RSS items is 3
* do not open link in new tab (since v2.3.0)
* yellow background color of the widget (`#FFFF99`)

The plugin comes localized for use on sites other than the English language and/or on bi/multilingual websites. In the languages folder you will find the .po and .mo files. Feel free to send me translations in other languages, I will then add them to this folder and of course I will credit you here.

Current translations:

* Dutch (by myself)

I have decided to only support this plugin through [Github](https://github.com/senlin/so-dashboard-feed-widget/issues). Therefore, if you have any questions, need help and/or want to make a feature request, please open an issue here. You can also browse through open and closed issues to find what you are looking for and perhaps even help others.
 
## Frequently Asked Questions

### Does the SO Dashboard Feed Widget plugin also work on WordPress Multisite?

No it doesn't work properly. There are other plugins that can do this more reliable for Multisite.

### I have an issue with this plugin, where can I get support?

Please open an issue here on [Github](https://github.com/senlin/so-dashboard-feed-widget/issues)

## Contributions

This repo is open to _any_ kind of contributions.

## License

* License: GNU Version 2 or Any Later Version
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Donations

* Donate link: https://so-wp.com/plugins/donations

## Connect with me through

[Website](https://bohanintl.com)

[Website](https://so-wp.com)

[Github](https://github.com/senlin) 

[LinkedIn](https://www.linkedin.com/in/pietbos) 

[WordPress](https://profiles.wordpress.org/senlin/) 

## Changelog

### 2.4.3 (version in the WP Plugins Directory 2016.11.29)

* remove version check
* tested up to WP 4.7

### 2.4.3 (version in the WP Plugins Directory 2016.5.14)

* remove FAQ answer that points to Multisite version as that plugin is no longer in active development
* adjust tested up to version as well as minimum required version
* adjust links to reflect switch to SSL

### 2.4.2 (version in the WP Plugins Directory 2015.08.07)

* tweak header settings page
* adjust language strings

### 2.4.1 (version in the WP Plugins Directory 2015.08.05)

* date: 2015.08.05
* changed header settings page to h1 (https://make.wordpress.org/plugins/2015/08/03/4-3-change-to-plugin-dashboard-pages/)
* show 4.3 compatibility

### 2.4.0

* date: 2015.06.19
* revert to [semantic versioning](http://semver.org/) (only Github version)

### 2.3.1

* date: 2015.04.09
* changed logos
* new banner image for WP.org Repo by [Fré Sonneveld](https://unsplash.com/fresonneveld)

### 2.3.0

* date: 2014.07.27
* [feature request](https://github.com/senlin/so-dashboard-feed-widget/issues/6) add option to open the links of the dashboard feed in a new tab
* bump minimum required WP version up to 3.8

### 2.2.1

* date: 2014.04.17
* compatible up to WP 3.9
* move minimum WP version upwards to 3.7

### 2.2.0

* date: 2014.02.10
* modified settings page and styling to better fit WP 3.8
* i18n date output
* removed line break between title and date
* updated settings icon
* updated screenshots

### 2.1.1

* date: 2013.12.28
* fixed [bug](https://github.com/senlin/so-dashboard-feed-widget/issues/2)

### 2.1.0

* date: 2013.12.26
* tested up to WP 3.9-alpha
* new links pointing to [SO-WP.com](http://so-wp.com/)
* new version number format
* removed dashboard link hover color
* added option to change yellow background color of widget
* moved RTL-style to new `dbfw_style_function`
* update language files

### 2.0.0

* complete reorganisation of the plugin files
* compatible up to WP 3.8

### 1.0.6

* change text domain to prepare for language packs (via Otto - http://otto42.com/el)

### 1.0.5

* Compatible up to WP 3.7
* move minimum WP version upwards to 3.6
* new WP version check

### 1.0.4

* Compatible up to WP 3.7-beta2
* Clean up and comment code and escape URLs where not done yet
* move minimum WP version upwards to 3.5.2
* Add "SO" in front of the name
* Add link to SO WP Plugins on Github
* Edit readme file
* adjust .po/.mo files
* remove images directory

### 1.0.3

* svn mess-up

### 1.0.2

* Compatible up to WP 3.6
* Change Twitter username

### 1.0.1

* Add current translation to readme.txt, add some text to options page, adjust Dutch translation file

### 1.0

* First release

