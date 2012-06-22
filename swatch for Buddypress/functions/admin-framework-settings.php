<?php
/*-----------------------------------------------------------------------------------*/
/* Framework Settings page - woothemes_framework_settings_page */
/*-----------------------------------------------------------------------------------*/

function woothemes_framework_settings_page(){

    $themename =  get_option( 'woo_themename' );
    $manualurl =  get_option( 'woo_manual' );
	$shortname =  'framework_woo';

    //Framework Version in Backend Head
    $woo_framework_version = get_option( 'woo_framework_version' );

    //Version in Backend Head
    $theme_data = get_theme_data( get_template_directory() . '/style.css' );
    $local_version = $theme_data['Version'];

    //GET themes update RSS feed and do magic
	include_once(ABSPATH . nxtINC . '/feed.php' );

	$pos = strpos($manualurl, 'documentation' );
	$theme_slug = str_replace( "/", "", substr($manualurl, ($pos + 13))); //13 for the word documentation

    //add filter to make the rss read cache clear every 4 hours
    add_filter( 'nxt_feed_cache_transient_lifetime', create_function( '$a', 'return 14400;' ) );

	$framework_options = array();

	$framework_options[] = array( 	"name" => "Admin Settings",
									"icon" => "general",
									"type" => "heading" );

	$framework_options[] = array( 	"name" => "Super User (username)",
									"desc" => "Enter your <strong>username</strong> to hide the Framework Settings and Update Framework from other users. Can be reset from the <a href='".home_url()."/nxt-admin/options.php'>nxt options page</a> under <em>framework_woo_super_user</em>.",
									"id" => $shortname."_super_user",
									"std" => "",
									"class" => "text",
									"type" => "text" );

	$framework_options[] = array( 	"name" => "Disable SEO Menu Item",
									"desc" => "Disable the <strong>SEO</strong> menu item in the theme menu.",
									"id" => $shortname."_seo_disable",
									"std" => "",
									"type" => "checkbox" );

	$framework_options[] = array( 	"name" => "Disable Sidebar Manager Menu Item",
									"desc" => "Disable the <strong>Sidebar Manager</strong> menu item in the theme menu.",
									"id" => $shortname."_sbm_disable",
									"std" => "",
									"type" => "checkbox" );

	$framework_options[] = array( 	"name" => "Disable Backup Settings Menu Item",
									"desc" => "Disable the <strong>Backup Settings</strong> menu item in the theme menu.",
									"id" => $shortname."_backupmenu_disable",
									"std" => "",
									"type" => "checkbox" );

	$framework_options[] = array( 	"name" => "Disable Buy Themes Menu Item",
									"desc" => "Disable the <strong>Buy Themes</strong> menu item in the theme menu.",
									"id" => $shortname."_buy_themes_disable",
									"std" => "",
									"type" => "checkbox" );

	$framework_options[] = array( 	"name" => "Enable Custom Navigation",
									"desc" => "Enable the old <strong>Custom Navigation</strong> menu item. Try to use <a href='".home_url()."/nxt-admin/nav-menus.php'>nxt Menus</a> instead, as this function is outdated.",
									"id" => $shortname."_woonav",
									"std" => "",
									"type" => "checkbox" );

	$framework_options[] = array( 	"name" => "Theme Update Notification",
									"desc" => "This will enable notices on your theme options page that there is an update available for your theme.",
									"id" => $shortname."_theme_version_checker",
									"std" => "",
									"type" => "checkbox" );
									
	$framework_options[] = array( 	"name" => "WooFramework Update Notification",
									"desc" => "This will enable notices on your theme options page that there is an update available for the WooFramework.",
									"id" => $shortname."_framework_version_checker",
									"std" => "",
									"type" => "checkbox" );

	$framework_options[] = array( 	"name" => "Theme Settings",
									"icon" => "general",
									"type" => "heading" );

	$framework_options[] = array( 	"name" => "Remove Generator Meta Tags",
									"desc" => "This disables the output of generator meta tags in the HEAD section of your site.",
									"id" => $shortname."_disable_generator",
									"std" => "",
									"type" => "checkbox" );

	$framework_options[] = array( 	"name" => "Image Placeholder",
									"desc" => "Set a default image placeholder for your thumbnails. Use this if you want a default image to be shown if you haven't added a custom image to your post.",
									"id" => $shortname."_default_image",
									"std" => "",
									"type" => "upload" );

	$framework_options[] = array( 	"name" => "Disable Shortcodes Stylesheet",
									"desc" => "This disables the output of shortcodes.css in the HEAD section of your site.",
									"id" => $shortname."_disable_shortcodes",
									"std" => "",
									"type" => "checkbox" );

	$framework_options[] = array( 	"name" => "Output \"Tracking Code\" Option in Header",
									"desc" => "This will output the <strong>Tracking Code</strong> option in your header instead of the footer of your website.",
									"id" => $shortname."_move_tracking_code",
									"std" => "false",
									"type" => "checkbox" );

	$framework_options[] = array( 	"name" => "Branding",
									"icon" => "misc",
									"type" => "heading" );

	$framework_options[] = array( 	"name" => "Options panel header",
									"desc" => "Change the header image for the WooThemes Backend.",
									"id" => $shortname."_backend_header_image",
									"std" => "",
									"type" => "upload" );

	$framework_options[] = array( 	"name" => "Options panel icon",
									"desc" => "Change the icon image for the NXTClass backend sidebar.",
									"id" => $shortname."_backend_icon",
									"std" => "",
									"type" => "upload" );

	$framework_options[] = array( 	"name" => "NXTClass login logo",
									"desc" => "Change the logo image for the NXTClass login page.",
									"id" => $shortname."_custom_login_logo",
									"std" => "",
									"type" => "upload" );

/*
	$framework_options[] = array( 	"name" => "Font Stacks (Beta)",
									"icon" => "typography",
									"type" => "heading" );

	$framework_options[] = array( 	"name" => "Font Stack Builder",
									"desc" => "Use the font stack builder to add your own custom font stacks to your theme.
									To create a new stack, fill in the name and a CSS ready font stack.
									Once you have added a stack you can select it from the font menu on any of the
									Typography settings in your theme options.",
									"id" => $shortname."_font_stack",
									"std" => "Added Font Stacks",
									"type" => "string_builder" );
*/

	global $nxt_version;

	if ( $nxt_version >= '3.1' ) {

	$framework_options[] = array( 	"name" => "NXTClass Toolbar",
									"icon" => "header",
									"type" => "heading" );

	$framework_options[] = array( 	"name" => "Disable NXTClass Toolbar",
									"desc" => "Disable the NXTClass Toolbar.",
									"id" => $shortname."_admin_bar_disable",
									"std" => "",
									"type" => "checkbox" );

	$framework_options[] = array( 	"name" => "Enable the WooFramework Toolbar enhancements",
									"desc" => "Enable several WooFramework-specific enhancements to the NXTClass Toolbar, such as custom navigation items for 'Theme Options'.",
									"id" => $shortname."_admin_bar_enhancements",
									"std" => "",
									"type" => "checkbox" );

	}

	// PressTrends Integration
	if ( defined( 'WOO_PRESSTRENDS_THEMEKEY' ) ) {
		$framework_options[] = array( 	"name" => "PressTrends",
									"icon" => "presstrends",
									"type" => "heading" );
									
		$framework_options[] = array( 	"name" => "Disable PressTrends Tracking",
									"desc" => "Disable sending of usage data to PressTrends.",
									"id" => $shortname."_presstrends_disable",
									"std" => "false",
									"type" => "checkbox" );
	
		$framework_options[] = array( 	"name" => "What is PressTrends?",
									"desc" => "",
									"id" => $shortname."_presstrends_info",
									"std" => 'PressTrends is a simple usage tracker that allows us to see how our customers are using WooThemes themes - so that we can help improve them for you. <strong>None</strong> of your personal data is sent to PressTrends.<br /><br />For more information, please view the PressTrends <a href="http://presstrends.io/privacy" target="_blank">privacy policy</a>.',
									"type" => "info" );
	}

    update_option( 'woo_framework_template', $framework_options );

	?>

    <div class="wrap" id="woo_container">
    <div id="woo-popup-save" class="woo-save-popup"><div class="woo-save-save">Options Updated</div></div>
    <div id="woo-popup-reset" class="woo-save-popup"><div class="woo-save-reset">Options Reset</div></div>
        <form action="" enctype="multipart/form-data" id="wooform" method="post">
        <?php
	    	// Add nonce for added security.
	    	if ( function_exists( 'nxt_nonce_field' ) ) { nxt_nonce_field( 'wooframework-framework-options-update' ); } // End IF Statement

	    	$woo_nonce = '';

	    	if ( function_exists( 'nxt_create_nonce' ) ) { $woo_nonce = nxt_create_nonce( 'wooframework-framework-options-update' ); } // End IF Statement

	    	if ( $woo_nonce == '' ) {} else {

	    ?>
	    	<input type="hidden" name="_ajax_nonce" value="<?php echo $woo_nonce; ?>" />
	    <?php

	    	} // End IF Statement
	    ?>
            <div id="header">
                <div class="logo">
                <?php if(get_option( 'framework_woo_backend_header_image')) { ?>
                <img alt="" src="<?php echo get_option( 'framework_woo_backend_header_image' ); ?>"/>
                <?php } else { ?>
                <img alt="WooThemes" src="<?php echo get_template_directory_uri(); ?>/functions/images/logo.png"/>
                <?php } ?>
                </div>
                <div class="theme-info">
                    <span class="theme"><?php echo $themename; ?> <?php echo $local_version; ?></span>
                    <span class="framework">Framework <?php echo $woo_framework_version; ?></span>
                </div>
                <div class="clear"></div>
            </div>
            <div id="support-links">
                <ul>
                    <li class="changelog"><a title="Theme Changelog" href="<?php echo $manualurl; ?>#Changelog">View Changelog</a></li>
                    <li class="docs"><a title="Theme Documentation" href="<?php echo $manualurl; ?>">View Themedocs</a></li>
                    <li class="forum"><a href="http://www.woothemes.com/support-forum" target="_blank">Visit Forum</a></li>
                    <li class="right"><img style="display:none" src="<?php echo get_template_directory_uri(); ?>/functions/images/loading-top.gif" class="ajax-loading-img ajax-loading-img-top" alt="Working..." /><a href="#" id="expand_options">[+]</a> <input type="submit" value="Save All Changes" class="button submit-button" /></li>
                </ul>
            </div>
            <?php $return = woothemes_machine($framework_options); ?>
            <div id="main">
                <div id="woo-nav">
                    <ul>
                        <?php echo $return[1]; ?>
                    </ul>
                </div>
                <div id="content">
   				<?php echo $return[0]; ?>
                </div>
                <div class="clear"></div>

            </div>
            <div class="save_bar_top">
            <input type="hidden" name="woo_save" value="save" />
            <img style="display:none" src="<?php echo get_template_directory_uri(); ?>/functions/images/loading-bottom.gif" class="ajax-loading-img ajax-loading-img-bottom" alt="Working..." />
            <input type="submit" value="Save All Changes" class="button submit-button" />
            </form>

            <form action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ) ?>" method="post" style="display:inline" id="wooform-reset">
            <?php
		    	// Add nonce for added security.
		    	if ( function_exists( 'nxt_nonce_field' ) ) { nxt_nonce_field( 'wooframework-framework-options-reset' ); } // End IF Statement

		    	$woo_nonce = '';

		    	if ( function_exists( 'nxt_create_nonce' ) ) { $woo_nonce = nxt_create_nonce( 'wooframework-framework-options-reset' ); } // End IF Statement

		    	if ( $woo_nonce == '' ) {} else {

		    ?>
		    	<input type="hidden" name="_ajax_nonce" value="<?php echo $woo_nonce; ?>" />
		    <?php

		    	} // End IF Statement
		    ?>
            <span class="submit-footer-reset">
<!--             <input name="reset" type="submit" value="Reset Options" class="button submit-button reset-button" onclick="return confirm( 'Click OK to reset. Any settings will be lost!' );" /> -->
            <input type="hidden" name="woo_save" value="reset" />
            </span>
        	</form>


            </div>

    <div style="clear:both;"></div>
    </div><!--wrap-->

<?php } ?>