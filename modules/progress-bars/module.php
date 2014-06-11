<?php

class DSLC_Progress_Bars extends DSLC_Module {

	var $module_id = 'DSLC_Progress_Bars';
	var $module_title = 'Progress Bar';
	var $module_icon = 'tasks';
	var $module_category = 'elements';

	function options() {	

		$dslc_options = array(

			array(
				'label' => __( 'Label', 'dslc_string' ),
				'id' => 'label',
		 		'std' => 'CLICK TO EDIT',
				'type' => 'textarea',
				'visibility' => 'hidden',
				'section' => 'functionality',
			),

			/**
			 * General Settings
			 */

			array(
				'label' => __( 'Amount', 'dslc_string' ),
				'id' => 'amount',
				'std' => '50',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-progress-bar-loader-inner',
				'affect_on_change_rule' => 'width',
				'ext' => '%',
				'section' => 'functionality',
			),

			/**
			 * Wrapper Style
			 */

			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-progress-bar',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),

			/**
			 * Label
			 */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_label_color',
				'std' => '#3d3d3d',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'h4.dslc-progress-bar-label',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'Title'
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_label_font_size',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'h4.dslc-progress-bar-label',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'Title',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_label_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'h4.dslc-progress-bar-label',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => 'Title',
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_label_font_family',
				'std' => 'Oswald',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'h4.dslc-progress-bar-label',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => 'Title',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_label_margin',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'h4.dslc-progress-bar-label',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'tab' => 'Title',
				'ext' => 'px'
			),

			/**
			 * Loader
			 */

			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_loader_bg_color',
				'std' => '#f1f1f1',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-progress-bar-loader',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'bar'
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_loader_color',
				'std' => '#62cbd7',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-progress-bar-loader-inner',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => 'bar'
			),
			array(
				'label' => __( 'Size', 'dslc_string' ),
				'id' => 'css_loader_height',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
				'affect_on_change_rule' => 'height',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => 'bar'
			),

			/**
			 * Responsive Tablet
			 */

			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_t',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => 'tablet',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-progress-bar',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Title - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_label_font_size',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'h4.dslc-progress-bar-label',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_label_margin',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'h4.dslc-progress-bar-label',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Bar - Size', 'dslc_string' ),
				'id' => 'css_res_t_loader_height',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
				'affect_on_change_rule' => 'height',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),

			/**
			 * Responsive Phone
			 */

			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_p',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => 'phone',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-progress-bar',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Title - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_label_font_size',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'h4.dslc-progress-bar-label',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Bar - Size', 'dslc_string' ),
				'id' => 'css_res_p_loader_height',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
				'affect_on_change_rule' => 'height',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),

		);		

		return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

	}

	function output( $options ) {

		global $dslc_active;

		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;

		$this->module_start( $options );

		/* Module output starts here */

			$wrapper_class = '';
			
			?>

				<div class="dslc-progress-bar <?php echo $wrapper_class; ?>">

					<?php if ( $dslc_is_admin ) : ?>
						<h4 class="dslc-progress-bar-label dslca-editable-content" data-id="label" data-type="simple" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?>><?php echo $options['label']; ?></h4>
					<?php else : ?>
						<h4 class="dslc-progress-bar-label"><?php echo $options['label']; ?></h4>
					<?php endif; ?>

					<span class="dslc-progress-bar-loader">
						<span class="dslc-progress-bar-loader-inner" data-amount="<?php echo $options['amount']; ?>"></span>
					</span><!-- .dslc-progress-bar-loader -->

				</div><!-- .dslc-progress-bar -->

			<?php

		/* Module output ends here */

		$this->module_end( $options );

	}

}