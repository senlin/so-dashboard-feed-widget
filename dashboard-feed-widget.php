<?php
/*
Plugin Name: SO Dashboard Feed Widget
Plugin URI: http://wpti.ps/?p=189
Description: The SO Dashboard Feed Widget shows the latest Posts from a site of your choice in the top of the WordPress Dashboard.
Version: 1.0.5
Author: Piet Bos
Author URI: http://senlinonline.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/

/*  Copyright 2013  Piet Bos  (email : piethfbos@gmail.com)

Credits: Option Page made possible thanks to the Plugin Options Starter Kit by David Gwyer (http://www.presscoders.com/plugins/plugin-options-starter-kit/)


This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/

// For debugging purposes
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//define('WP-DEBUG', true);

/**
 * Prevent direct access to files
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Version check; any WP version under 3.6 is not supported (if only to "force" users to stay up to date)
 * 
 * adapted from example by Thomas Scholz (@toscho) http://wordpress.stackexchange.com/a/95183/2015, Version: 2013.03.31, Licence: MIT (http://opensource.org/licenses/MIT)
 *
 * @since 1.0.5
 */

//Only do this when on the Plugins page.
if ( ! empty ( $GLOBALS['pagenow'] ) && 'plugins.php' === $GLOBALS['pagenow'] )
	add_action( 'admin_notices', 'pinyinslugs_check_admin_notices', 0 );

function pinyinslugs_min_wp_version() {
	global $wp_version;
	$require_wp = '3.6';
	$update_url = get_admin_url( null, 'update-core.php' );

	$errors = array();

	if ( version_compare( $wp_version, $require_wp, '<' ) ) 

		$errors[] = "You have WordPress version $wp_version installed, but <b>this plugin requires at least WordPress $require_wp</b>. Please <a href='$update_url'>update your WordPress version</a>.";

	return $errors;
}

function pinyinslugs_check_admin_notices()
{
	$errors = pinyinslugs_min_wp_version();

	if ( empty ( $errors ) )
		return;

	// Suppress "Plugin activated" notice.
	unset( $_GET['activate'] );

	// this plugin's name
	$name = get_file_data( __FILE__, array ( 'Plugin Name' ), 'plugin' );

	printf( __( '<div class="error"><p>%1$s</p><p><i>%2$s</i> has been deactivated.</p></div>', 'pinyinslugs' ),
		join( '</p><p>', $errors ),
		$name[0]
	);
	deactivate_plugins( plugin_basename( __FILE__ ) );
}

/**
 * Set-up Action and Filter Hooks
 */
register_activation_hook( __FILE__, 'dbfw_add_defaults' );

register_uninstall_hook( __FILE__, 'dbfw_delete_plugin_options' );

add_action( 'admin_init', 'dbfw_init' );

add_action( 'plugins_loaded', 'dbfw_i18n' );

add_action( 'admin_menu', 'dbfw_add_options_page' );

add_filter( 'plugin_action_links', 'dbfw_plugin_action_links', 10, 2 );

/**
 * Delete options table entries ONLY when plugin deactivated AND deleted 
 */
function dbfw_delete_plugin_options() {
	
	delete_option( 'dbfw_options' );

}

/**
 * Define default option settings
 */
function dbfw_add_defaults() {
	
	$tmp = get_option( 'dbfw_options' );
	
	if ( ( $tmp['chk_default_options_db'] == '1' ) || ( ! is_array( $tmp ) ) ) {
		
		delete_option( 'dbfw_options' ); // so we don't have to reset all the 'off' checkboxes too! (don't think this is needed but leave for now)
		
		$arr = array(
			'widget_title' => __( 'Recent Updates', 'dbfw' ),
			'feed_url' => 'http://wpti.ps/feed/',
			'drp_select_box' => '3',
			'chk_default_options_db' => ''
		);
		
		update_option( 'dbfw_options', $arr );
	}
}

/**
 * Init plugin options to white list our options
 */
function dbfw_init() {
	
	register_setting( 'dbfw_plugin_options', 'dbfw_options', 'dbfw_validate_options' );
	
}

/**
 * Loads the translation files.
 *
 * @since 1.0.5
 */
function dbfw_i18n() {

	/* Load the translation of the plugin. */
	load_plugin_textdomain( 'dbfw', false, basename( dirname( __FILE__ ) ) . '/languages' );
}


/**
 * Add menu page
 */
function dbfw_add_options_page() {
	
	add_options_page( 'SO Dashboard Feed Widget Settings', 'SO Dashboard Feed Widget', 'manage_options', __FILE__, 'dbfw_render_form' );

}

/**
 * Render the Plugin options form
 */
function dbfw_render_form() { ?>

	<div class="wrap">
		
		<!-- Display Plugin Icon, Header, and Description -->
		<div class="icon32" id="icon-options-general"><br></div>
		
		<h2><?php _e( 'SO Dashboard Feed Widget Settings', 'dbfw' ); ?></h2>
		
		<p><?php _e( 'Below you can adjust the output of the SO Dashboard Feed Widget. You can change the title of the widget, the feed URL and the amount of feed items to show.', 'dbfw' ); ?></p>

		<!-- Beginning of the Plugin Options Form -->
		<form method="post" action="options.php">
			
			<?php settings_fields( 'dbfw_plugin_options' ); ?>
			
			<?php $options = get_option( 'dbfw_options' ); ?>

			<!-- Table Structure Containing Form Controls -->
			<!-- Each Plugin Option Defined on a New Table Row -->
			
			<table class="form-table">

				<!-- Textbox Control -->
				<tr>
					<th scope="row"><?php _e( 'Widget Title', 'dbfw' ); ?></th>
					<td>
						<input type="text" size="57" name="dbfw_options[widget_title]" value="<?php echo $options['widget_title']; ?>" /><br />
						<span style="color: #666; margin-left: 2px;">
							<?php _e( 'Change the title of the SO Dashboard Feed Widget into something of your liking', 'dbfw' ); ?>
						</span>
					</td>
				</tr>

				<!-- Textbox Control -->
				<tr>
					<th scope="row"><?php _e( 'Feed URL', 'dbfw' ); ?></th>
					<td>
						<input type="text" size="57" name="dbfw_options[feed_url]" value="<?php echo $options['feed_url']; ?>" /><br />
						<span style="color: #666; margin-left: 2px;">
							<?php _e( 'Change the feed-URL to a site of your choice', 'dbfw' ); ?>
						</span>
					</td>
				</tr>

				<!-- Select Drop-Down Control -->
				<tr>
					<th scope="row"><?php _e( 'How many Feed Items to show in the SO Dashboard Feed Widget', 'dbfw' ); ?></th>
					<td>
						<select name='dbfw_options[drp_select_box]'>
							<option value='1' <?php selected( '1', $options['drp_select_box'] ); ?>>1</option>
							<option value='2' <?php selected( '2', $options['drp_select_box'] ); ?>>2</option>
							<option value='3' <?php selected( '3', $options['drp_select_box'] ); ?>>3</option>
							<option value='4' <?php selected( '4', $options['drp_select_box'] ); ?>>4</option>
							<option value='5' <?php selected( '5', $options['drp_select_box'] ); ?>>5</option>
							<option value='6' <?php selected( '6', $options['drp_select_box'] ); ?>>6</option>
							<option value='7' <?php selected( '7', $options['drp_select_box'] ); ?>>7</option>
							<option value='8' <?php selected( '8', $options['drp_select_box'] ); ?>>8</option>
							<option value='9' <?php selected( '9', $options['drp_select_box'] ); ?>>9</option>
							<option value='10' <?php selected( '10', $options['drp_select_box'] ); ?>>10</option>
						</select>
						<span style="color: #666; margin-left: 2px;">
							<?php _e( 'How many feed items to show in the widget?', 'dbfw' ); ?>
						</span>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<div style="margin-top: 10px;"></div>
					</td>
				</tr>
				
				<tr valign="top" style="border-top: 1px solid #DDD;">
					<th scope="row"><?php _e( 'Database Options', 'dbfw' ); ?></th>
					<td>
						<label>
							<input name="dbfw_options[chk_default_options_db]" type="checkbox" value="1" <?php if ( isset($options['chk_default_options_db'] ) ) { checked( '1', $options['chk_default_options_db'] ); } ?> />
								<?php _e( 'Restore defaults upon plugin deactivation/reactivation', 'dbfw' ); ?>
						</label><br />
						<span style="color: #666; margin-left: 2px;">
							<?php _e( 'Only check this if you want to reset plugin settings upon Plugin reactivation', 'dbfw' ); ?>
						</span>
					</td>
				</tr>
			
			</table>
			
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Settings', 'dbfw' ) ?>" />
			</p>
		
		</form>

		<p style="font-style: italic; font-weight: bold; color: #26779A;">
			
			<?php
			/* Translators: 1 is link to WP Repo */
			printf( __( 'If you have found this plugin at all useful, please give it a favourable rating in the <a href="%s" title="Rate this plugin!">WordPress Plugin Repository</a>.', 'dbfw' ), 
				esc_url( 'http://wordpress.org/plugins/dashboard-feed-widget/' )
			);
			?>
			
		</p>
		
		<div class="postbox" style="display: block; float: left; width: 500px; margin: 30px 10px 10px 0;">
			
			<h3 class="hndle" style="padding: 5px;">
				<span><?php _e( 'About the Author', 'dbfw' ); ?></span>
			</h3>
			
			<div class="inside">
				<img src="http://www.gravatar.com/avatar/<?php echo md5( 'info@senlinonline.com' ); ?>" style="float: left; margin-right: 10px; padding: 3px; border: 1px solid #DFDFDF;"/>
				<p style="height: 60px; padding-top: 20px">
					<?php printf( __( 'Hi, my name is Piet Bos, I hope you like this plugin! Please check out any of my other plugins on <a href="%s" title="SO WP Plugins">SO WP Plugins</a>. You can find out more information about me via the following links:', 'dbfw' ),
					esc_url( 'http://so-wp.github.io/' )
					); ?>
				</p>
				
				<ul style="clear: both; margin-top: 20px;">
					<li><a href="http://senlinonline.com/" target="_blank" title="Senlin Online"><?php _e('Senlin Online', 'dbfw'); ?></a></li>
					<li><a href="http://wpti.ps/" target="_blank" title="WP TIPS"><?php _e('WP Tips', 'dbfw'); ?></a></li>
					<li><a href="https://plus.google.com/108543145122756748887" target="_blank" title="Piet on Google+"><?php _e( 'Google+', 'dbfw' ); ?></a></li>
					<li><a href="http://cn.linkedin.com/in/pietbos" target="_blank" title="LinkedIn profile"><?php _e( 'LinkedIn', 'dbfw' ); ?></a></li>
					<li><a href="http://twitter.com/SenlinOnline" target="_blank" title="Twitter"><?php _e( 'Twitter: @piethfbos', 'dbfw' ); ?></a></li>
					<li><a href="http://github.com/senlin" title="on Github"><?php _e( 'Github', 'dbfw' ); ?></a></li>
					<li><a href="http://profiles.wordpress.org/senlin/" title="on WordPress.org"><?php _e( 'WordPress.org Profile', 'dbfw' ); ?></a></li>
				</ul>
			
			</div> <!-- end .inside -->
		
		</div> <!-- end .postbox -->

	</div> <!-- end .wrap -->

<?php }

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function dbfw_validate_options($input) {
	// strip html from textboxes
	$input['widget_title'] =  wp_filter_nohtml_kses( $input['widget_title'] ); // Sanitize input (strip html tags, and escape characters)
	$input['feed_url'] =  wp_filter_nohtml_kses( $input['feed_url'] ); // Sanitize input (strip html tags, and escape characters)
	return $input;
}

/**
 * Display a Settings link on the main Plugins page
 */
function dbfw_plugin_action_links( $links, $file ) {

	if ( $file == plugin_basename( __FILE__ ) ) {
		$dbfw_links = '<a href="' . get_admin_url() . 'options-general.php?page=dashboard-feed-widget/dashboard-feed-widget.php">' . __( 'Settings', 'dbfw' ) . '</a>';
		// make the 'Settings' link appear first
		array_unshift( $links, $dbfw_links );
	}

	return $links;
}

/**
 * Add Feed Dashboard Widget, finally the actual code that grabs the feed and loops through it to output it
 */
function dbfw_setup_function() {
	$options = get_option( 'dbfw_options' );
	$widgettitle = $options['widget_title'];
	add_meta_box( 'dbfw_widget',  $widgettitle, 'dbfw_widget_function', 'dashboard', 'normal', 'high' );
}

function dbfw_widget_function() {
	$options = get_option( 'dbfw_options' );
	$feedurl = $options['feed_url'];
	$select = $options['drp_select_box'];

	$rss = fetch_feed($feedurl);
	
	if ( ! is_wp_error( $rss ) ) { // Checks that the object is created correctly
		
		// Figure out how many total items there are, but limit it to 3.
		$maxitems = $rss->get_item_quantity( $select );
		
		// Build an array of all the items, starting with element 0 (first element).
		$rss_items = $rss->get_items( 0, $maxitems );
	}
	
	if ( ! empty( $maxitems ) ) { ?>
	
		<div class="rss-widget">

			<ul>
				<?php
				// Loop through each feed item and display each item as a hyperlink.
				foreach ( $rss_items as $item ) { ?>
				    
					<li>
						<a class="rsswidget" href='<?php echo $item->get_permalink(); ?>'><?php echo $item->get_title(); ?></a>
						
						<span class="rss-date"><?php echo $item->get_date( 'j F Y' ); ?></span>
					</li>

				<?php } ?>
			
			</ul>
		
		</div> <!-- end .rss-widget -->

	<?php }
	// This makes sure that the positioning is also correct for right-to-left languages
	$x = is_rtl() ? 'left' : 'right'; 
	echo '<style type="text/css">#dbfw_widget { float: $x; }</style>';
}


/**
 * Register the new dashboard widget into the 'wp_dashboard_setup' action
 */
add_action( 'wp_dashboard_setup', 'dbfw_setup_function' );

/**
 * Adds stylesheet
 */
add_action( 'admin_print_styles', 'dbfw_load_custom_admin_css' );


/**
 * And now enqueue the stylesheet
 */
function dbfw_load_custom_admin_css() {
	
	wp_enqueue_style( 'dbfw_custom_admin_css', plugins_url( '/style.css', __FILE__ ) );

}

/**
 * The End
 */
?>