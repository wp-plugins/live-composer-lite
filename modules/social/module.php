<?php

class DSLC_Social extends DSLC_Module {

	var $module_id = 'DSLC_Social';
	var $module_title = 'Social';
	var $module_icon = 'twitter';
	var $module_category = 'elements';

	function options() {	

		$dslc_options = array(
			
			/**
			 * General
			 */

			array(
				'label' => __( 'Twitter', 'dslc_string' ),
				'id' => 'twitter',
				'std' => '#',
				'type' => 'text',
			),
			array(
				'label' => __( 'Facebook', 'dslc_string' ),
				'id' => 'facebook',
				'std' => '#',
				'type' => 'text',
			),
			array(
				'label' => __( 'Youtube', 'dslc_string' ),
				'id' => 'youtube',
				'std' => '#',
				'type' => 'text',
			),
			array(
				'label' => __( 'Vimeo', 'dslc_string' ),
				'id' => 'vimeo',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'Tumblr', 'dslc_string' ),
				'id' => 'tumblr',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'Pinterest', 'dslc_string' ),
				'id' => 'pinterest',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'LinkedIn', 'dslc_string' ),
				'id' => 'linkedin',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'Instagram', 'dslc_string' ),
				'id' => 'instagram',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'GitHub', 'dslc_string' ),
				'id' => 'github',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'Google Plus', 'dslc_string' ),
				'id' => 'googleplus',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'Dribbble', 'dslc_string' ),
				'id' => 'dribbble',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'Dropbox', 'dslc_string' ),
				'id' => 'dropbox',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'Flickr', 'dslc_string' ),
				'id' => 'flickr',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'FourSquare', 'dslc_string' ),
				'id' => 'foursquare',
				'std' => '',
				'type' => 'text',
			),

			/**
			 * Styling
			 */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_bg_color',
				'std' => '#40bde6',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => ' ul.dslc-social a',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'ul.dslc-social',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Size', 'dslc_string' ),
				'id' => 'css_size',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'ul.dslc-social a',
				'affect_on_change_rule' => 'width,height',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Spacing', 'dslc_string' ),
				'id' => 'css_spacing',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'ul.dslc-social li',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'ext' => 'px'
			),

			/* Icon */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_icon_color',
				'std' => '#ffffff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => ' ul.dslc-social .dslc-icon',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => 'icon'
			),
			array(
				'label' => __( 'Size', 'dslc_string' ),
				'id' => 'css_icon_font_size',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'ul.dslc-social a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => 'icon',
				'ext' => 'px'
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
				'affect_on_change_el' => 'ul.dslc-social',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Size ( Wrapper )', 'dslc_string' ),
				'id' => 'css_res_t_size',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'ul.dslc-social a',
				'affect_on_change_rule' => 'width,height',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Size ( Icon )', 'dslc_string' ),
				'id' => 'css_res_t_icon_font_size',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'ul.dslc-social a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Spacing', 'dslc_string' ),
				'id' => 'css_res_t_spacing',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'ul.dslc-social li',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'tab' => 'tablet',
				'ext' => 'px'
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
				'affect_on_change_el' => 'ul.dslc-social',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Size ( Wrapper )', 'dslc_string' ),
				'id' => 'css_res_p_size',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'ul.dslc-social a',
				'affect_on_change_rule' => 'width,height',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Size ( Icon )', 'dslc_string' ),
				'id' => 'css_res_p_icon_font_size',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'ul.dslc-social a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Spacing', 'dslc_string' ),
				'id' => 'css_res_p_spacing',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => 'ul.dslc-social li',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'tab' => 'phone',
				'ext' => 'px'
			),

		);

		return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

	}

	function output( $options ) {		

		$this->module_start( $options );

		/* Module output starts here */
			
			?>

			<div class="dslc-social-wrap">

				<ul class="dslc-social">
					<?php if ( isset( $options['twitter'] ) && $options['twitter'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['twitter']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-twitter"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['facebook'] ) && $options['facebook'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['facebook']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-facebook"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['youtube'] ) && $options['youtube'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['youtube']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-youtube-play"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['vimeo'] ) && $options['vimeo'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['vimeo']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-vimeo-square"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['tumblr'] ) && $options['tumblr'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['tumblr']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-tumblr"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['pinterest'] ) && $options['pinterest'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['pinterest']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-pinterest"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['linkedin'] ) && $options['linkedin'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['linkedin']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-linkedin"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['instagram'] ) && $options['instagram'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['instagram']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-instagram"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['github'] ) && $options['github'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['github']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-github-alt"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['googleplus'] ) && $options['googleplus'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['googleplus']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-google-plus"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['dribbble'] ) && $options['dribbble'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['dribbble']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-dribbble"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['dropbox'] ) && $options['dropbox'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['dropbox']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-dropbox"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['flickr'] ) && $options['flickr'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['flickr']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-flickr"></span></a></li>
					<?php endif; ?>
					<?php if ( isset( $options['foursquare'] ) && $options['foursquare'] != '' ) : ?>
						<li><a target="_blank" href="<?php echo $options['foursquare']; ?>"><span class="dslc-icon dslc-init-center dslc-icon-foursquare"></span></a></li>
					<?php endif; ?>
				</ul>

			</div><!-- .dslc-social-wrap -->

			<?php

		/* Module output ends here */

		$this->module_end( $options );

	}

}