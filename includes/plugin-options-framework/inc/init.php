<?php

/**
 * Register all the option pages
 */

function dslc_plugin_options_setup() {

	global $dslc_plugin_options;	
	do_action( 'dslc_hook_register_options' );

	add_menu_page(
		'Live Composer',
		'Live Composer',
		'manage_options',
		'dslc_plugin_options',
		'dslc_plugin_options_display'
	);

		foreach ( $dslc_plugin_options as $section_ID => $section ) {

			if ( $section_ID == 'dslc_plugin_options' ) {

				add_submenu_page( 
					'dslc_plugin_options', 
					$section['title'], 
					$section['title'],
					'manage_options',
					$section_ID, 
					'dslc_plugin_options_display'
				);

			} else {

				add_submenu_page( 
					'dslc_plugin_options', 
					$section['title'], 
					$section['title'],
					'manage_options',
					$section_ID, 
					create_function( null, 'dslc_plugin_options_display( "' . $section_ID . '" );' )
				);

			}

		}

} add_action( 'admin_menu', 'dslc_plugin_options_setup' );

/**
 * Display option pages
 */

function dslc_plugin_options_display( $tab = '' ) {	

	global $dslc_plugin_options;

	if ( $tab == '' ) {
		$tab = 'dslc_plugin_options';
	}

	?>
	<div class="wrap">
	
		<div id="icon-themes" class="icon32"></div>
		<h2>Live Composer</h2>
		<?php settings_errors(); ?>

		<h2 class="nav-tab-wrapper">
			<?php foreach ( $dslc_plugin_options as $section_ID => $section ) : ?>
				<a href="?page=<?php echo $section_ID; ?>" class="nav-tab <?php echo $tab == $section_ID ? 'nav-tab-active' : ''; ?>"><?php echo $section['title']; ?></a>
			<?php endforeach; ?>
		</h2>
		
		<form method="post" action="options.php">
			
			<?php
				settings_fields( $tab );
				
				if ( $tab == '' ) 
					do_settings_sections( 'dslc_plugin_options' );
				else 
					do_settings_sections( $tab );

				submit_button();
			?>

		</form>
		
	</div><!-- /.wrap -->
	<?php

}

/**
 * Register options
 */

function dslc_plugin_options_init() {

	global $dslc_plugin_options;

	/**
	 * Add Sections
	 */

	foreach ( $dslc_plugin_options as $section_ID => $section ) {

		add_settings_section( 
			$section_ID, 
			$section['title'], 
			'dslc_plugin_options_display_options', 
			$section_ID
		);

		register_setting(
			$section_ID,
			$section_ID
		);

	}

	/**
	 * Add Fields
	 */

	foreach ( $dslc_plugin_options as $section_ID => $section ) {

		foreach ( $section['options'] as $option_ID => $option ) {

			add_settings_field(
				$option_ID,
				$option['label'],
				create_function( null, 'dslc_plugin_option_display_' . $option['type'] . '( "' . $option_ID . '", "' . $section_ID . '" );' ),
				$section_ID,
				$section_ID
			);

		}

	}


} add_action( 'admin_init', 'dslc_plugin_options_init' );

function dslc_plugin_options_display_options( $section ) {

	

}