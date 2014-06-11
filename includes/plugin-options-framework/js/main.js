jQuery(document).ready(function(){

	function dslc_plugin_opts_generate_list_code( dslcTarget ) {

		var dslcTitle, dslcCodeInput = jQuery( '.dslca-plugin-opts-list-code', dslcTarget ), dslcCode = '';

		jQuery( '.dslca-plugin-opts-list-item', dslcTarget ).each( function(){

			dslcTitle = jQuery(this).find('.dslca-plugin-opts-list-title').text();
			dslcCode += dslcTitle + ','

		});

		dslcCodeInput.val( dslcCode );

	}

	jQuery('.dslca-plugin-opts-list-add-hook').click( function(e){

		e.preventDefault();

		var dslcWrapper = jQuery(this).closest('.dslca-plugin-opts-list-wrap');
		var dslcTarget = dslcWrapper.find('.dslca-plugin-opts-list');

		jQuery('<div class="dslca-plugin-opts-list-item"><span class="dslca-plugin-opts-list-title" contenteditable>Click to edit</span><a href="#" class="dslca-plugin-opts-list-delete-hook">delete</a></div>').appendTo( dslcTarget );

		dslc_plugin_opts_generate_list_code( dslcWrapper );

	});

	jQuery(document).on( 'click', '.dslca-plugin-opts-list-delete-hook', function(e){

		e.preventDefault();

		var dslcWrapper = jQuery(this).closest('.dslca-plugin-opts-list-wrap');
		var dslcTarget = jQuery(this).closest('.dslca-plugin-opts-list-item');

		dslcTarget.remove();

		dslc_plugin_opts_generate_list_code( dslcWrapper );

	});

	jQuery(document).on( 'blur', '.dslca-plugin-opts-list-title', function() {

		var dslcWrapper = jQuery(this).closest('.dslca-plugin-opts-list-wrap');
		dslc_plugin_opts_generate_list_code( dslcWrapper );

	});

});