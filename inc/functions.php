<?php
 /**
  * Main function of the plugin
  * 
  * grabs the feed and loops through it to output it
  *
  * since version 2.0.0
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

	$rss = fetch_feed( $feedurl );
	
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
						<a class="rsswidget" href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a>
						
						<span class="rss-date"><?php echo date_i18n('F j, Y', $item->get_date('U')); ?></span>
					</li>

				<?php } ?>
			
			</ul>
		
		</div> <!-- end .rss-widget -->

	<?php }
}

/* @since 2013.12.26 */
function dbfw_style_function() {
	$options = get_option( 'dbfw_options' );
	
	/* @since 2013.12.28 */
	$bkgr = isset( $options['widget_bkgr'] ) ? $options['widget_bkgr'] : 'FF9';
	
	// This makes sure that the positioning is also correct for right-to-left languages - changed order @since 2013.12.28
	$x = is_rtl() ? 'right' : 'left';
   
	/* @since 2013.12.28 - fixed RTL styling */
	echo '<style type="text/css">
		#dbfw_widget{background:#' . $bkgr . ';}
		#dbfw_widget.postbox h3, #dbfw_widget.postbox .rss-widget {text-align:' . $x . ';}
		</style>';
}

add_action( 'admin_head', 'dbfw_style_function' );