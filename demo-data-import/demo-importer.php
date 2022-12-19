<?php

/**
 * One Click Install
 * @return Import Demos - Needed Import Demo's
 */
function egens_core_import_files() {

	return array(
		array(
			'import_file_name'           => esc_html('Corelaw'),
			'import_file_url'            => 'https://demo.egenslab.com/wp/demo-data/corelaw-wp/contents.xml',
			'import_widget_file_url'     => 'https://demo.egenslab.com/wp/demo-data/corelaw-wp/widgets.wie',
			'import_customizer_file_url' => 'https://demo.egenslab.com/wp/demo-data/corelaw-wp/customizer.dat',
			'import_notice'              => __( 'Import process may take 3-5 minutes, please be patient. It\'s really based on your network speed.', 'egens-core' ),
			'preview_url'                => '#',
		),
	);
}

add_filter( 'ocdi/import_files', 'egens_core_import_files' );


function egens_core_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu' => $main_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home 1' );
	$blog_page_id  = get_page_by_title( 'Blog Standard' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

    $options_data = file_get_contents( 'https://demo.egenslab.com/wp/demo-data/corelaw-wp/theme_option.txt'); // set file path 'EGNS_CORE_ROOT_URL'
    $out = wp_kses_post_deep( json_decode(  trim( $options_data ) , true ) );
    update_option('egns_theme_options', $out ); // update option with proper option table name 'egns_theme_options'

	// Select default elementor custom post type
	$cpt = get_option('elementor_cpt_support') ? get_option('elementor_cpt_support') : array();
	$cpt = array_merge($cpt, array('post', 'page', 'egens-case-study', 'egens-practice-area'));
	update_option('elementor_cpt_support', $cpt);

}

add_action( 'ocdi/after_import', 'egens_core_after_import_setup' );



// Model Popup - Width Increased
function egens_core_ocdi_confirmation_dialog_options( $options ) {
	return array_merge( $options, array(
		'width'       => 600,
		'dialogClass' => 'wp-dialog',
		'resizable'   => false,
		'height'      => 'auto',
		'modal'       => true,
	) );
}

add_filter( 'ocdi/confirmation_dialog_options', 'egens_core_ocdi_confirmation_dialog_options', 10, 1 );

// Disable the branding notice - ProteusThemes
add_filter( 'ocdi/disable_pt_branding', '__return_true' );

function ocdi_plugin_intro_text( $default_text ) {
	$default_text .= '<h1>Import Demo</h1>
    <div class="egens_toolkit_intro-text dl-demo-one-click">
    <div id="poststuff">

      <div class="postbox important-notes">
        <h3><span>Important notes:</span></h3>
        <div class="inside">
          <ol>
            <li>Please note, this import process will take time. So, please be patient.</li>
			<li>Please make sure you\'ve installed recommended plugins before you import this content.</li>
            <li>All images are demo purposes only. So, images may repeat in your site content.</li>
          </ol>
        </div>
      </div>
    </div>
  </div>';

	return $default_text;
}

add_filter( 'ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );