<?php 
/*
	Plugin Name: Live Composer Lite
	Plugin URI: http://www.livecomposerplugin.com/free-version
	Description: Live Composer - Live front-end page builder.
	Author: DanyDuchaine
	Version: 1.0.1
	Author URI: http://danyduchaine.com
	License: GPL v3
*/

	if ( ! defined( 'DS_LIVE_COMPOSER_URL' ) ) {

		/**
		 * Constants
		 */

		define( 'DS_LIVE_COMPOSER_VER', '1.0.1' );

		define( 'DS_LIVE_COMPOSER_URL', plugin_dir_url( __FILE__ ) );
		define( 'DS_LIVE_COMPOSER_DIR_NAME', dirname( plugin_basename( __FILE__ ) ) );
		define( 'DS_LIVE_COMPOSER_ABS', dirname(__FILE__) );
		define( 'DS_LIVE_COMPOSER_DEV_MODE', false );

		define( 'DSLC_PO_FRAMEWORK_ABS', DS_LIVE_COMPOSER_ABS . '/includes/plugin-options-framework' );
		define( 'DSLC_ST_FRAMEWORK_ABS', DS_LIVE_COMPOSER_ABS . '/includes/single-templates-framework' );

		$dslc_post_types = array();

		// Templates post types
		$dslc_var_templates_pt = array();

		/**
		 * Is live composer currently active?
		 */

		if ( isset( $_REQUEST['dslc'] ) && $_REQUEST['dslc'] === 'active' ) {
			$dslc_active = true;
			define( 'DS_LIVE_COMPOSER_ACTIVE', true );
		} else {
			$dslc_active = false;
			define( 'DS_LIVE_COMPOSER_ACTIVE', false );
		}

		/**
		 * Global Variables
		 */

		$dslc_var_modules = array(); // Will hold modules information
		$dslc_var_templates = array(); // Will hold templates information
		$dslc_var_post_options = array(); // Will hold post options information

		$dslc_css_fonts = '';
		$dslc_css_style = '';
		$dslc_googlefonts_array = array();
		$dslc_is_content_filtered = array();
		$dslc_should_filter = true;
		
		/**
		 * Include all the files
		 */

		include DS_LIVE_COMPOSER_ABS . '/includes/other-functions.php';
		include DS_LIVE_COMPOSER_ABS . '/includes/functions.php';
		include DS_LIVE_COMPOSER_ABS . '/includes/display-functions.php';
		include DS_LIVE_COMPOSER_ABS . '/includes/ajax.php';
		include DS_LIVE_COMPOSER_ABS . '/includes/shortcodes.php';
		include DS_LIVE_COMPOSER_ABS . '/includes/scripts.php';
		include DS_LIVE_COMPOSER_ABS . '/includes/post-options-framework/post-options-framework.php';
		include DS_LIVE_COMPOSER_ABS . '/includes/plugin-options-framework/plugin-options-framework.php';
		include DSLC_ST_FRAMEWORK_ABS . '/single-templates-framework.php';

		$cap_page = 'publish_posts';
		define( 'DS_LIVE_COMPOSER_CAPABILITY', $cap_page );
		define( 'DS_LIVE_COMPOSER_CAPABILITY_SAVE', $cap_page );

		/**
		 * Include Modules
		 */

		include DS_LIVE_COMPOSER_ABS . '/includes/class.module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/blog/module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/infobox/module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/separator/module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/text-simple/module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/tabs/module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/social/module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/notification/module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/button/module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/image/module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/progress-bars/module.php';
		include DS_LIVE_COMPOSER_ABS . '/modules/accordion/module.php';

	}