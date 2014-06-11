<?php

/**
 * Table of contents
 *
 * - dslc_ajax_add_modules_section ( Echo new modules section HTML )
 * - dslc_ajax_add_modules_area ( Echo new modules area HTML )
 * - dslc_ajax_add_module ( Load the module's front ened output)
 * - dslc_ajax_display_module_options ( Display options for a specific module )
 * - dslc_ajax_save_composer ( Save the composer code )
 * - dslc_ajax_import_template ( Loads front ened output of an exported template )
 * - dslc_ajax_get_new_module_id ( Returns a new unique ID, similar to post ID )
 * - dslc_ajax_dm_module_defaults_code ( Returns the code to alter the defaults for the module options )
 */

/**
 * Add a new module section
 *
 * @since 1.0
 */

function dslc_ajax_add_modules_section( $atts ) {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {

		// The array we'll pass back to the AJAX call
		$response = array();

		// The output
		$output = '<div class="dslc-modules-section dslc-modules-section-empty" style="padding-top: 50px; padding-bottom: 50px;">
			<div class="dslc-bg-video"><div class="dslc-bg-video-inner"></div><div class="dslc-bg-video-overlay"></div></div>
			<div class="dslc-modules-section-wrapper">
				<div class="dslc-modules-section-inner dslc-clearfix">
					<div class="dslc-modules-area dslc-col dslc-12-col" data-size="12">
						<div class="dslc-modules-area-inner">
							<div class="dslca-modules-area-manage">
								<div class="dslca-modules-area-manage-inner">
									<span class="dslca-manage-action dslca-copy-modules-area-hook"><span class="dslca-icon dslc-icon-copy"></span></span>
									<span class="dslca-manage-action dslca-move-modules-area-hook"><span class="dslca-icon dslc-icon-move"></span></span>
									<span class="dslca-manage-action dslca-change-width-modules-area-hook">
										<span class="dslca-icon dslc-icon-columns"></span>
										<div class="dslca-change-width-modules-area-options">
											<span data-size="1">1/12</span><span data-size="2">2/12</span>
											<span data-size="3">3/12</span><span data-size="4">4/12</span>
											<span data-size="5">5/12</span><span data-size="6">6/12</span>
											<span data-size="7">7/12</span><span data-size="8">8/12</span>
											<span data-size="9">9/12</span><span data-size="10">10/12</span>
											<span data-size="11">11/12</span><span data-size="12">12/12</span>
										</div>
									</span>
									<span class="dslca-manage-action dslca-delete-modules-area-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
								</div>
							</div>
							<div class="dslca-no-content">
								<span class="dslca-no-content-primary"><span class="dslca-icon dslc-icon-download-alt"></span><span class="dslca-no-content-help-text">' . __( 'Drop modules here', 'dslc_string' ) . '</span></span>
							</div>
							<div class="dslca-module-loading"><div class="dslca-module-loading-inner"></div></div>
						</div>
					</div>
				</div><!-- .dslc-module-section-inner -->
				<div class="dslca-modules-section-manage">
					<div class="dslca-modules-section-manage-inner">
						<span class="dslca-manage-action dslca-edit-modules-section-hook"><span class="dslca-icon dslc-icon-cog"></span></span>
						<span class="dslca-manage-action dslca-copy-modules-section-hook"><span class="dslca-icon dslc-icon-copy"></span></span>
						<span class="dslca-manage-action dslca-move-modules-section-hook"><span class="dslca-icon dslc-icon-move"></span></span>
						<span class="dslca-manage-action dslca-delete-modules-section-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
					</div>
				</div>
				<div class="dslca-modules-section-settings">
					<input type="text" data-id="type" value="wrapped">
					<input type="text" data-id="columns_spacing" value="spacing">
					<input type="text" data-id="border_color" value="">
					<input type="text" data-id="border_width" value="0">
					<input type="text" data-id="border_style" value="solid">
					<input type="text" data-id="border" value="top bottom">
					<input type="text" data-id="bg_color" value="">
					<input type="text" data-id="bg_image" value="">
					<input type="text" data-id="bg_video" value="">
					<input type="text" data-id="bg_video_overlay_color" value="#000000">
					<input type="text" data-id="bg_video_overlay_opacity" value="0">
					<input type="text" data-id="bg_image_repeat" value="repeat">
					<input type="text" data-id="bg_image_attachment" value="scroll">
					<input type="text" data-id="bg_image_position" value="left top">
					<input type="text" data-id="bg_image_size" value="auto">
					<input type="text" data-id="padding" value="50">
					<input type="text" data-id="padding_h" value="0">
					<input type="text" data-id="custom_class" value="">
					<input type="text" data-id="custom_id" value="">
				</div><!-- .dslca-module-section-settings -->
				<div class="dslca-module-loading dslca-modules-area-loading"><div class="dslca-module-loading-inner"></div></div>
			</div><!-- .dslc-module-section-wrapper -->
		</div>';

		// Set the output
		$response['output'] = $output;

		// Encode response
		$response_json = json_encode( $response );	

		// Send the response
		header( "Content-Type: application/json" );
		echo $response_json;

		// Good night
		exit;

	}

} add_action( 'wp_ajax_dslc-ajax-add-modules-section', 'dslc_ajax_add_modules_section' );

/**
 * Add a new modules area
 *
 * @since 1.0
 */

function dslc_ajax_add_modules_area( $atts ) {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {

		// The array we'll pass back to the AJAX call
		$response = array();

		// The output
		$output = '<div class="dslc-modules-area dslc-col dslc-12-col" data-size="12">
			<div class="dslca-modules-area-manage">
				<div class="dslca-modules-area-manage-inner">
					<span class="dslca-manage-action dslca-copy-modules-area-hook"><span class="dslca-icon dslc-icon-copy"></span></span>
					<span class="dslca-manage-action dslca-move-modules-area-hook"><span class="dslca-icon dslc-icon-move"></span></span>
					<span class="dslca-manage-action dslca-change-width-modules-area-hook">
						<span class="dslca-icon dslc-icon-columns"></span>
						<div class="dslca-change-width-modules-area-options">
							<span data-size="1">1/12</span><span data-size="2">2/12</span>
							<span data-size="3">3/12</span><span data-size="4">4/12</span>
							<span data-size="5">5/12</span><span data-size="6">6/12</span>
							<span data-size="7">7/12</span><span data-size="8">8/12</span>
							<span data-size="9">9/12</span><span data-size="10">10/12</span>
							<span data-size="11">11/12</span><span data-size="12">12/12</span>
						</div>
					</span>
					<span class="dslca-manage-action dslca-delete-modules-area-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
				</div>
			</div>
			<div class="dslca-no-content">
				<span class="dslca-no-content-primary"><span class="dslca-icon dslc-icon-download-alt"></span><span class="dslca-no-content-help-text">' . __( 'Drop modules here', 'dslc_string' ) . '</span></span>
			</div>
			<div class="dslca-module-loading"><div class="dslca-module-loading-inner"></div></div>
		</div>';

		// Set the output
		$response['output'] = $output;

		// Encode response
		$response_json = json_encode( $response );	

		// Send the response
		header( "Content-Type: application/json" );
		echo $response_json;

		// Good night
		exit;

	}

} add_action( 'wp_ajax_dslc-ajax-add-modules-area', 'dslc_ajax_add_modules_area' );

/**
 * Add a new module
 *
 * @since 1.0
 */

function dslc_ajax_add_module( $atts ) {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {

		// The array we'll pass back to the AJAX call
		$response = array();

		// The ID of the module to add
		$module_id = $_POST['dslc_module_id'];
		$post_id = $_POST['dslc_post_id'];

		// If post ID is not numberic stop execution
		if ( ! is_numeric( $post_id ) )
			return;

		/**
		 * The instance ID for this specific module
		 */

		// If it is not a new module ( already has ID )
		if ( isset( $_POST['dslc_module_instance_id'] ) ) {
			
			$module_instance_id = $_POST['dslc_module_instance_id'];

		// If it is a new module ( no ID )
		} else {

			// Get current count
			$module_id_count = get_option( 'dslc_module_id_count' );
			
			// If not the first one
			if ( $module_id_count ) {

				// Increment by one
				$module_instance_id = $module_id_count + 1;

				// Update the count
				update_option( 'dslc_module_id_count', $module_instance_id );

			// If it is the first one
			} else {
					
				// Set 1 as the ID
				$module_instance_id = 1;

				// Update the count
				update_option( 'dslc_module_id_count', $module_instance_id );

			}

		}

		// If module instance ID not numeric stop execution
		if ( ! is_numeric( $module_instance_id ) )
			return;

		// Instanciate the module class
		$module_instance = new $module_id();

		// Generate settings
		$module_settings = dslc_module_settings( $module_instance->options() );

		// Append ID to settings
		$module_settings['module_instance_id'] = $module_instance_id;

		// Append post ID to settings
		$module_settings['post_id'] = $post_id;

		// Start output fetching
		ob_start();

		// Output
		$module_instance->output( $module_settings );

		// Get the output and stop fetching
		$output = ob_get_contents();
		ob_end_clean();

		// Set the output
		$response['output'] = $output;

		// Encode response
		$response_json = json_encode( $response );	

		// Send the response
		header( "Content-Type: application/json" );
		echo $response_json;

		// Good night
		exit;

	}

} add_action( 'wp_ajax_dslc-ajax-add-module', 'dslc_ajax_add_module' );


/**
 * Display module options
 *
 * @since 1.0
 */

function dslc_ajax_display_module_options( $atts ) {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {

		// The array we'll pass back to the AJAX call
		$response = array();

		// This will hold the output
		$response['output'] = '';

		// The ID of the module
		$module_id = $_POST['dslc_module_id'];

		// Instanciate the module class
		$module_instance = new $module_id();

		// Get the module options
		$module_options = $module_instance->options();

		// Tabs
		$tabs = array();
		$tabs['general_functionality'] = array(
			'title' => 'General',
			'id' => 'general_functionality',
			'section' => 'functionality'
		);
		$tabs['general_styling'] = array(
			'title' => 'General',
			'id' => 'general_styling',
			'section' => 'styling'
		);

		ob_start();

		// Go through each option, generate the option HTML and append to output
		foreach ( $module_options as $module_option ) {

			$curr_value = $module_option['std'];

			if ( isset( $_POST[ $module_option['id'] ] ) )
				$curr_value = $_POST[ $module_option['id'] ]; 

			/**
			 * Visibility
			 */

			if ( isset( $module_option['visibility'] ) )
				$visibility = false;
			else
				$visibility = true;

			if ( $module_option['type'] == 'checkbox' && count( $module_option['choices'] ) < 2 )
				$visibility = false;

			/**
			 * Refresh on change
			 */

			if ( isset( $module_option['refresh_on_change'] ) ) {

				if ( $module_option['refresh_on_change'] )
					$refresh_on_change = 'active';
				else
					$refresh_on_change = 'inactive';

			} else {
				$refresh_on_change = 'active';
			}

			/**
			 * Section (functionality and styling)
			 */

			if ( isset( $module_option['section'] ) )
				$section = $module_option['section'];
			else
				$section = 'functionality';

			/**
			 * Tab
			 */

			if ( isset( $module_option['tab'] ) ) {

				// Lowercase it
				$tab_ID = strtolower( $module_option['tab'] );

				// Replace spaces with _
				$tab_ID = str_replace( ' ', '_', $tab_ID );

				// Add section ID append
				$tab_ID .= '_' . $section;

				// If not already in the tabs array
				if ( ! in_array( $tab_ID, $tabs ) ) {

					// Add it to the tabs array
					$tabs[$tab_ID] = array(
						'title' => $module_option['tab'],
						'id' => $tab_ID,
						'section' => $section
					);

				}

			} else { 

				$tab_ID = 'general_' . $section;

			}

			$ext = ' ';
			if ( isset( $module_option['ext'] ) ) 
				$ext = $module_option['ext'];

			$affect_on_change_append = '';
			if ( isset( $module_option['affect_on_change_el'] ) && isset( $module_option['affect_on_change_rule'] ) )
				$affect_on_change_append = 'data-affect-on-change-el="' . $module_option['affect_on_change_el'] . '" data-affect-on-change-rule="' . $module_option['affect_on_change_rule'] . '"';


			?>	

				<div class="dslca-module-edit-option dslca-module-edit-option-<?php echo $module_option['type']; ?> dslca-module-edit-option-<?php echo $module_option['id']; ?> <?php if ( ! $visibility ) echo 'dslca-module-edit-option-hidden'; ?>" data-id="<?php echo $module_option['id']; ?>" data-refresh-on-change="<?php echo $refresh_on_change; ?>" data-section="<?php echo $section; ?>" data-tab="<?php echo $tab_ID; ?>">

					<span class="dslca-module-edit-label">
						<?php echo $module_option['label']; ?>
						<?php if ( $module_option['type'] == 'icon' ): ?>
							<span class="dslca-module-edit-field-icon-ttip-hook"><span class="dslca-icon dslc-icon-info"></span></span>
						<?php endif; ?>
					</span>

					<?php if ( $module_option['type'] == 'text' ) : ?>
						
						<input type="text" class="dslca-module-edit-field" name="<?php echo $module_option['id']; ?>" data-id="<?php echo $module_option['id']; ?>" value="<?php echo $curr_value; ?>" data-starting-val="<?php echo $curr_value; ?>" <?php echo $affect_on_change_append ?> />

					<?php elseif ( $module_option['type'] == 'textarea' ) : ?>

						<textarea class="dslca-module-edit-field" name="<?php echo $module_option['id']; ?>" data-id="<?php echo $module_option['id']; ?>" <?php echo $affect_on_change_append ?>><?php echo stripslashes( $curr_value ); ?></textarea>

					<?php elseif ( $module_option['type'] == 'select' ) : ?>

						<select class="dslca-module-edit-field" name="<?php echo $module_option['id']; ?>" data-id="<?php echo $module_option['id']; ?>" <?php echo $affect_on_change_append ?> >
							<?php foreach( $module_option['choices'] as $select_option ) : ?>
								<option value="<?php echo $select_option['value']; ?>" <?php if ( $curr_value == $select_option['value'] ) echo 'selected="selected"'; ?>><?php echo $select_option['label']; ?></option>
							<?php endforeach; ?>
						</select>

					<?php elseif ( $module_option['type'] == 'checkbox' ) : ?>

						<?php 
								
							// Current Value Array
							if ( empty( $curr_value ) )
								$curr_value = array();
							else
								$curr_value = explode( ' ', trim( $curr_value ) );

							// Determined brakepoints
							$chck_amount = count ( $module_option['choices'] );
							$chck_breakpoint = ceil( $chck_amount / 1 );
							$chck_count = 0;

						?>

						<div class="dslca-module-edit-option-checkbox-wrapper">
							<?php foreach ( $module_option['choices'] as  $checkbox_option ) : $chck_count++; ?>
								<div class="dslca-module-edit-option-checkbox-single">
									<span class="dslca-module-edit-option-checkbox-hook"><span class="dslca-icon <?php if ( in_array( $checkbox_option['value'], $curr_value ) ) echo 'dslc-icon-check'; else echo 'dslc-icon-check-empty'; ?>"></span><?php echo $checkbox_option['label']; ?></span>
									<input type="checkbox" class="dslca-module-edit-field dslca-module-edit-field-checkbox" data-id="<?php echo $module_option['id']; ?>" name="<?php echo $module_option['id']; ?>" value="<?php echo $checkbox_option['value']; ?>" <?php if ( in_array( $checkbox_option['value'], $curr_value ) ) echo 'checked="checked"'; ?> <?php echo $affect_on_change_append ?> />
								</div><!-- .dslca-module-edit-option-checkbox-single -->
								<?php if ( $chck_count == $chck_breakpoint ) { echo '<br>'; $chck_count = 0; } ?>
							<?php endforeach; ?>
						</div><!-- .dslca-module-edit-option-checkbox-wrapper -->

					<?php elseif ( $module_option['type'] == 'radio' ) : ?>

						<div class="dslca-module-edit-option-radio-wrapper">
							<?php foreach ( $module_option['choices'] as  $checkbox_option ) : ?>
								<div class="dslca-module-edit-option-radio-single">
									<input type="radio" class="dslca-module-edit-field" data-id="<?php echo $module_option['id']; ?>" name="<?php echo $module_option['id']; ?>" value="<?php echo $checkbox_option['value']; ?>" /> <?php echo $checkbox_option['label']; ?><br>
								</div><!-- .dslca-module-edit-option-radio-single -->
							<?php endforeach; ?>
						</div><!-- .dslca-module-edit-option-radio-wrapper -->

					<?php elseif ( $module_option['type'] == 'color' ) : ?>

						<input type="text" class="dslca-module-edit-field dslca-module-edit-field-colorpicker" name="<?php echo $module_option['id']; ?>" data-id="<?php echo $module_option['id']; ?>" value="<?php echo $curr_value; ?>" data-affect-on-change-el="<?php echo $module_option['affect_on_change_el']; ?>" data-affect-on-change-rule="<?php echo $module_option['affect_on_change_rule']; ?>" />

					<?php elseif ( $module_option['type'] == 'slider' ) : ?>

						<?php
							
							$slider_min = 0;
							$slider_max = 100;
							$slider_increment = 1;

							if ( isset( $module_option['min'] ) )
								$slider_min = $module_option['min'];

							if ( isset( $module_option['max'] ) )
								$slider_max = $module_option['max'];

							if ( isset( $module_option['increment'] ) )
								$slider_increment = $module_option['increment'];

						?>

						<div class="dslca-module-edit-field-slider"></div>
						<span class="dslca-module-edit-field-slider-tooltip"><?php echo $curr_value; ?></span>
						<input type="hidden" class="dslca-module-edit-field" name="<?php echo $module_option['id']; ?>" data-id="<?php echo $module_option['id']; ?>" value="<?php echo $curr_value; ?>" data-affect-on-change-el="<?php echo $module_option['affect_on_change_el']; ?>" data-affect-on-change-rule="<?php echo $module_option['affect_on_change_rule']; ?>" data-min="<?php echo $slider_min; ?>" data-max="<?php echo $slider_max; ?>" data-ext="<?php echo $ext; ?>" data-increment="<?php echo $slider_increment; ?>" />

					<?php elseif ( $module_option['type'] == 'font' ) : ?>
						
						<div class="dslca-module-edit-field-font-wrapper">
							<input type="text" class="dslca-module-edit-field dslca-module-edit-field-font" name="<?php echo $module_option['id']; ?>" data-id="<?php echo $module_option['id']; ?>" value="<?php echo $curr_value; ?>" <?php echo $affect_on_change_append ?> />
							<span class="dslca-module-edit-field-font-suggest"></span>
						</div>
						<span class="dslca-module-edit-field-font-prev"><span class="dslca-icon dslc-icon-chevron-left"></span></span>
						<span class="dslca-module-edit-field-font-next"><span class="dslca-icon dslc-icon-chevron-right"></span></span>

					<?php elseif ( $module_option['type'] == 'icon' ) : ?>
						
						<div class="dslca-module-edit-field-icon-wrapper">
							<input type="text" class="dslca-module-edit-field dslca-module-edit-field-icon" name="<?php echo $module_option['id']; ?>" data-id="<?php echo $module_option['id']; ?>" value="<?php echo $curr_value; ?>" <?php echo $affect_on_change_append ?> />
							<span class="dslca-module-edit-field-icon-suggest"></span>
						</div>
						<span class="dslca-module-edit-field-icon-prev"><span class="dslca-icon dslc-icon-chevron-left"></span></span>
						<span class="dslca-module-edit-field-icon-next"><span class="dslca-icon dslc-icon-chevron-right"></span></span>

					<?php elseif ( $module_option['type'] == 'image' ) : ?>

						<span class="dslca-module-edit-field-image-add-hook" <?php if ( $curr_value != '' ) echo 'style="display: none;"'; ?>><span class="dslca-icon dslc-icon-cloud-upload"></span><?php _e( 'Upload Image', 'dslc_string' ); ?></span>
						<span class="dslca-module-edit-field-image-remove-hook" <?php if ( $curr_value == '' ) echo 'style="display: none;"'; ?>><span class="dslca-icon dslc-icon-remove"></span><?php _e( 'Remove Image', 'dslc_string' ); ?></span>
						<input type="hidden" class="dslca-module-edit-field dslca-module-edit-field-image" name="<?php echo $module_option['id']; ?>" data-id="<?php echo $module_option['id']; ?>" value="<?php echo $curr_value; ?>" <?php echo $affect_on_change_append ?> />

					<?php endif; ?>

				</div><!-- .dslc-module-edit-option -->

			<?php

		}

		$output_fields = ob_get_contents();
		ob_end_clean();

		// Output Start
		$output_start = '<div class="dslca-module-edit-options-inner">
		<div class="dslca-module-edit-options-wrapper dslc-clearfix">';

		// Output End
		$output_end = '</div>
		</div>';

		/**
		 * Output Tabs
		 */

			$output_tabs = '';

			// If more than one
			if ( count( $tabs ) > 1 ) {

				// Start output
				$output_tabs .= '<div class="dslca-module-edit-options-tabs">';

					// Go through all of them
					foreach ( $tabs as $tab ) {
						
						$output_tabs .= '<span class="dslca-module-edit-options-tab-hook" data-section="' . $tab['section'] . '" data-id="'. $tab['id'] .'">' . $tab['title'] . '</span>';

					}

				// End output
				$output_tabs .= '</div>';

			}

		// Combine output
		$response['output'] .= $output_tabs;
		$response['output'] .= $output_start;
		$response['output'] .= $output_fields;
		$response['output'] .= $output_end;

		// Encode response
		$response_json = json_encode( $response );	

		// Send the response
		header( "Content-Type: application/json" );
		echo $response_json;

		// Auf wiedersehen
		exit;

	}

} add_action( 'wp_ajax_dslc-ajax-display-module-options', 'dslc_ajax_display_module_options' );


/**
 * Save composer code
 *
 * @since 1.0
 */

function dslc_ajax_save_composer( $atts ) {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY_SAVE ) ) {

		// The array we'll pass back to the AJAX call
		$response = array();

		// The composer code
		$composer_code = $_POST['dslc_code'];

		// The ID of the post/page
		$post_id = $_POST['dslc_post_id'];

		// Add/update the post/page with the composer code
		if ( update_post_meta( $post_id, 'dslc_code', $composer_code ) )
			$response['status'] = 'success';
		else
			$response['status'] = 'failed';

		// Encode response
		$response_json = json_encode( $response );	

		// Send the response
		header( "Content-Type: application/json" );
		echo $response_json;

		// Refresh cache
		if ( function_exists( 'wp_cache_post_change' ) ) {
			$GLOBALS['super_cache_enabled'] = 1;
			wp_cache_post_change( $post_id );
		}

		// Au revoir
		exit;

	}

} add_action( 'wp_ajax_dslc-ajax-save-composer', 'dslc_ajax_save_composer' );


/**
 * Import a template
 *
 * @since 1.0
 */

function dslc_ajax_import_template( $atts ) {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) ) {

		// The array we'll pass back to the AJAX call
		$response = array();

		// The code of the template
		$template_code = stripslashes( $_POST['dslc_template_code'] );

		// Apply for new ID
		$template_code = str_replace( '[dslc_module]', '[dslc_module give_new_id="true"]', $template_code);

		// Get the front-end output
		$response['output'] = do_shortcode ( $template_code );

		// Encode response
		$response_json = json_encode( $response );	

		// Send the response
		header( "Content-Type: application/json" );
		echo $response_json;

		// Bye bye
		exit;

	}

} add_action( 'wp_ajax_dslc-ajax-import-template', 'dslc_ajax_import_template' );


/**
 * Get new module ID
 *
 * @since 1.0
 */

function dslc_ajax_get_new_module_id() {

	// Allowed to do this?
	if ( is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY_SAVE ) ) {

		$response = array();
		$response['status'] = 'success';

		// Get current count
		$module_id_count = get_option( 'dslc_module_id_count' );

		// Increment by one
		$module_instance_id = $module_id_count + 1;

		// Update the count
		update_option( 'dslc_module_id_count', $module_instance_id );

		// Generate response
		$response['output'] = $module_instance_id;

		// Encode response
		$response_json = json_encode( $response );	

		// AJAX phone home
		header( "Content-Type: application/json" );
		echo $response_json;

		// Asta la vista
		exit;

	}
			
} add_action( 'wp_ajax_dslc-ajax-get-new-module-id', 'dslc_ajax_get_new_module_id' );