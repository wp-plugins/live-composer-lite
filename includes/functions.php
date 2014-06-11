<?php

/**
 * Table of Contents
 *
 * - dslc_load_translation ( Load the text domain )
 * - dslc_register_modules ( Register default module and calls action used to register custom modules )
 * - dslc_register_module ( Register a module )
 * - dslc_unregister_module ( Unregister a module )
 * - dslc_module_settings ( Get settings of a specific module )
 * - dslc_generate_custom_css ( Generate module CSS )
 * - dslc_get_new_module_id ( Get new unique ID )
 * - dslc_register_template ( Register a template )
 * - dslc_unregister_template ( Unregister a template )
 * - dslc_body_class ( Add custom classes to the body tag )
 * - dslc_set_defaults ( Replaces the default option values )
 * - dslc_is_module_active ( Check if a specific module is active - can be disabled in LC settings )
 */

/**
 * Load text domain
 *
 * @since 1.0.3
 */

function dslc_load_translation() {

	load_plugin_textdomain( 'dslc_string', false, DS_LIVE_COMPOSER_DIR_NAME . '/lang/' );

} add_action( 'init', 'dslc_load_translation' );

/**
 * Registers default and custom modules
 *
 * @since 1.0
 */

function dslc_register_modules() {

	// Register default modules
	dslc_register_module( 'DSLC_Accordion' );
	dslc_register_module( 'DSLC_Separator' );
	dslc_register_module( 'DSLC_Text_Simple' );
	dslc_register_module( 'DSLC_Blog' );
	dslc_register_module( 'DSLC_Social' );
	dslc_register_module( 'DSLC_Notification' );
	dslc_register_module( 'DSLC_Button' );
	dslc_register_module( 'DSLC_Image' );
	dslc_register_module( 'DSLC_Tabs' );
	dslc_register_module( 'DSLC_Progress_Bars' );	
	dslc_register_module( 'DSLC_Info_Box' );	

} add_action( 'init', 'dslc_register_modules', 1 );


/**
 * Register module
 *
 * @since 1.0
 */

function dslc_register_module( $module_id ) {

	// Array that holds all active modules
	global $dslc_var_modules;

	// Instanciate the module class
	$module_instance = new $module_id();

	// Icon
	if ( ! isset( $module_instance->module_icon) )
		$module_instance->module_icon = '';

	// Category/Origin
	if ( ! isset( $module_instance->module_category) )
		$module_instance->module_category = 'other';

	// If the array ID not taken
	if ( ! isset( $dslc_var_modules[$module_id] ) ) {

		// Append new module to the global array
		$dslc_var_modules[ $module_id ] = array(
			'id' => $module_id,
			'title' => $module_instance->module_title,
			'icon' => $module_instance->module_icon,
			'origin' => $module_instance->module_category
		);

	}

}

/**
 * Unregister module
 *
 * @since 1.0
 */

function dslc_unregister_module( $module_id ) {

	// Array that holds all active modules
	global $dslc_var_modules;

	// Remove module from array
	unset( $dslc_var_modules[ $module_id ] );

}

/**
 * Module Settings
 *
 * Generates settings based on default values and user values
 *
 * @since 1.0
 */

function dslc_module_settings( $options, $custom = false ) {

	// Array to hold the settings
	$settings = array();		

	// Go through all options
	foreach( $options as $option ) {

		// If value set use it
		if ( isset( $_POST[ $option['id'] ] ) ) {
			$settings[ $option['id'] ] = $_POST[ $option['id'] ]; 
		// If value not set use default
		} else {
			$settings[ $option['id'] ] = $option['std'];
		}

	}

	return $settings;

}

/**
 * Generates module CSS
 *
 * @since 1.0
 */

function dslc_generate_custom_css( $options_arr, $settings, $restart = false ) {

	$css_output = '';
	global $dslc_googlefonts_array;
	$googlefonts_output = '';
	$regular_fonts = array( "Georgia", "Times", "Arial", "Lucida Sans Unicode", "Tahoma", "Trebuchet MS", "Verdana", "Helvetica" );
	$organized_array = array();

	global $dslc_css_fonts;
	global $dslc_css_style;

	$important_append = '';
	$force_important = dslc_get_option( 'lc_force_important_css', 'dslc_plugin_options' );
	if ( $force_important == 'enabled' )
		$important_append = ' !important';

	if ( isset( $_GET['dslc'] ) && $_GET['dslc'] == 'active' ) {
		$important_append = '';
	}

	if ( $restart == true ) {

		$dslc_css_fonts = '';
		$dslc_css_style = '';

	}

	// Go through array of options
	foreach ( $options_arr as $option_arr ) {

		// If option type is done with CSS and option is set
		if ( isset( $option_arr['affect_on_change_el'] ) && isset( $option_arr['affect_on_change_rule'] ) ) {

			// Default
			if ( ! isset( $settings[$option_arr['id']] ) )
				$settings[$option_arr['id']] = $option_arr['std'];

			// Extension (px, %, em...)
			$ext = ' ';
			if ( isset( $option_arr['ext'] ) )
				$ext = $option_arr['ext'];

			// Prepend
			$prepend = '';
			if ( isset( $option_arr['prepend'] ) )
				$prepend = $option_arr['prepend'];

			// Append
			$append = '';
			if ( isset( $option_arr['append'] ) )
				$append = $option_arr['append'];

			if ( $option_arr['type'] == 'image' ) {
				$prepend = 'url("';
				$append = '")';
			}

			// Get element and CSS rule
			$affect_rule_raw = $option_arr['affect_on_change_rule'];
			$affect_rules_arr = explode( ',', $affect_rule_raw );

			// Affect Element
			$affect_el = '';
			$affect_els_arr = explode( ',', $option_arr['affect_on_change_el'] );
			$count = 0;
			foreach ( $affect_els_arr as $affect_el_arr) {
				$count++;
				if ( $count > 1 ) {
					$affect_el .= ',';
				}

				if ( isset( $option_arr['section'] ) && $option_arr['section'] == 'responsive' ) {

					switch ( $option_arr['tab'] ) {
						case 'tablet':
							if ( isset( $settings['css_res_t'] ) && $settings['css_res_t'] == 'enabled' ) 
								$affect_el .= 'body.dslc-res-tablet #dslc-content #dslc-module-' . $settings['module_instance_id'] . ' ' . $affect_el_arr;		
							break;
						case 'phone':
							if ( isset( $settings['css_res_p'] ) && $settings['css_res_p'] == 'enabled' )
								$affect_el .= 'body.dslc-res-phone #dslc-content #dslc-module-' . $settings['module_instance_id'] . ' ' . $affect_el_arr;		
							break;
					}

				} else {
					$affect_el .= '#dslc-content #dslc-module-' . $settings['module_instance_id'] . ' ' . $affect_el_arr;
				}

			}

			// Checkbox ( CSS )
			if ( $option_arr['type'] == 'checkbox' && $option_arr['refresh_on_change'] == false ) {

				$checkbox_val = '';
				$checkbox_arr = explode( ' ', trim( $settings[$option_arr['id']] ) );
				
				if ( in_array( 'top', $checkbox_arr ) )
					$checkbox_val .= 'solid ';
				else
					$checkbox_val .= 'none ';

				if ( in_array( 'right', $checkbox_arr ) )
					$checkbox_val .= 'solid ';
				else
					$checkbox_val .= 'none ';

				if ( in_array( 'bottom', $checkbox_arr ) )
					$checkbox_val .= 'solid ';
				else
					$checkbox_val .= 'none ';

				if ( in_array( 'left', $checkbox_arr ) )
					$checkbox_val .= 'solid ';
				else
					$checkbox_val .= 'none ';

				$settings[$option_arr['id']] = $checkbox_val;
				
			}

			// Colors (transparent if empy )
			if ( $settings[$option_arr['id']] == '' && ( $option_arr['affect_on_change_rule'] == 'background' || $option_arr['affect_on_change_rule'] == 'background-color' ) ) {

				$settings[$option_arr['id']] = 'transparent';

			}

			foreach ( $affect_rules_arr as $affect_rule ) {
				$organized_array[$affect_el][$affect_rule] = $prepend . $settings[$option_arr['id']] . $ext . $append;
			}

		}

		// If option type is font
		if ( $option_arr['type'] == 'font' ) {

			if ( ! in_array( $settings[$option_arr['id']], $dslc_googlefonts_array ) && ! in_array( $settings[$option_arr['id']], $regular_fonts ) ) 
				$dslc_googlefonts_array[] = $settings[$option_arr['id']];

		}

	}

	if ( count( $organized_array ) > 0 ) {

		foreach ( $organized_array as $el => $rules ) {

			$css_output .= $el . ' { '; 

				foreach ( $rules as $rule => $value ) {

					if ( trim( $value ) != '' ) {

						$css_output .= $rule . ' : ' . $value . $important_append . '; ';

					}

				}

			$css_output .= ' } ';

		}

	}

	$dslc_css_style .= $css_output;

}

/**
 * Returns an unique module ID
 *
 * @since 1.0
 */

function dslc_get_new_module_id() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {

		// Get current count
		$module_id_count = get_option( 'dslc_module_id_count' );

		// Increment by one
		$module_instance_id = $module_id_count + 1;

		// Update the count
		update_option( 'dslc_module_id_count', $module_instance_id );

		// Return new ID
		return $module_instance_id;

	}
			
}

/**
 * Hooks to register/unregister templates
 *
 * @since 1.0
 */

function dslc_register_templates() {
	
	do_action( 'dslc_hook_register_templates' );
	do_action( 'dslc_hook_unregister_templates' );

} add_action( 'init', 'dslc_register_templates', 1 );

/**
 * Register a template
 *
 * @since 1.0
 */

function dslc_register_template( $template ) {

	// Global variable that holds templates information
	global $dslc_var_templates;

	// If an array supplied proceed
	if ( is_array( $template ) ) {

		// If the array ID not taken
		if ( ! isset( $dslc_var_templates[$template['id']] ) ) {

			// Add the template to the templates array
			$dslc_var_templates[$template['id']] = $template;

		}

	}

}

/**
 * Unregister a template
 *
 * @since 1.0
 */

function dslc_unregister_template( $template_ID ) {

	// Global variable that holds templates information
	global $dslc_var_templates;

	// If the template exists 
	if ( isset( $dslc_var_templates[$template_ID] ) ) {

		// Remove the template from the templates array
		unset( $dslc_var_templates[$template_ID] );

	}

}

/**
 * Add custom classes to the body tag
 *
 * @since 1.0.2
 */

function dslc_body_class( $classes ) {

	global $dslc_post_types;

	if ( ! is_singular() )
		return $classes;

	$has_lc_content = false;

	// If page in LC mode, force the class
	if ( isset( $_GET['dslc'] ) && $_GET['dslc'] == 'active' )
		$has_lc_content = true;

	
	// Still nothing, let's check if there's real LC content on the page
	if ( ! $has_lc_content ) {
		
		// Get the dslc_code custom field
		$dslc_code = get_post_meta( get_the_ID(), 'dslc_code', true );

		// If there is LC content, allow the class
		if ( $dslc_code )
			$has_lc_content = true;

	}

	// Still nothing, let's check if it's a post and has an LC template
	if ( ! $has_lc_content && is_singular( $dslc_post_types ) ) {

		// Get the ID of the template
		$template_ID = dslc_st_get_template_ID( get_the_ID() );

		// If tempalte exists, allow the class
		if ( $template_ID )
			$has_lc_content = true;

	}

	// If has LC content append class
	if ( $has_lc_content )
		$classes[] = 'dslc-page';

	// Return the modified array
	return $classes;

} add_filter( 'body_class', 'dslc_body_class' );

/**
 * Replaces the default option values
 *
 * @since 1.0.2
 */

function dslc_set_defaults( $new_defaults, $options ) {

	// If no new defaults, pass it back and stop
	if ( ! $new_defaults ) 
		return $options;

	// Generate an array of options IDs to alter
	$def_ids = array();
	foreach ( $new_defaults as $key => $val ) {
		$def_ids[] = $key;
	}

	// Go through all the options
	foreach ( $options as $opt_key => $option ) {

		if ( in_array( $option['id'], $def_ids ) ) {
			$options[$opt_key]['std'] = $new_defaults[$option['id']];
		}

	}
	
	// Pass back the options array
	return $options;

}

/**
 * Check if module is active
 */

function dslc_is_module_active() {

	return true;

}