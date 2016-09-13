<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'media_buttons' => true
	);
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('General', 'options_check'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('Logo', 'options_check'),
		// 'desc' => __('This creates a full size uploader that previews the image.', 'options_check'),
		'id' => 'site_logo',
		'type' => 'upload');

	// $options[] = array(
	// 	'name' => __('Footer Logo', 'options_check'),
	// 	// 'desc' => __('This creates a full size uploader that previews the image.', 'options_check'),
	// 	'id' => 'footer_logo',
	// 	'type' => 'upload');	

	// $options[] = array(
	// 	'name' => __('Input Text Mini', 'options_check'),
	// 	'desc' => __('A mini text input field.', 'options_check'),
	// 	'id' => 'example_text_mini',
	// 	'std' => 'Default',
	// 	'class' => 'mini',
	// 	'type' => 'text');

	// $options[] = array(
	// 	'name' => __('Main Address', 'options_check'),
	// 	'desc' => __('The address to your headquarters', 'options_check'),
	// 	'id' => 'main_address',
	// 	'std' => '',
	// 	'type' => 'text');	

	// $options[] = array(
	// 	'name' => __('City, State', 'options_check'),
	// 	'desc' => __('', 'options_check'),
	// 	'id' => 'city_state',
	// 	'std' => '',
	// 	'type' => 'text');	

	// $options[] = array(
	// 	'name' => __('Zip Code', 'options_check'),
	// 	'desc' => __('', 'options_check'),
	// 	'id' => 'zip_code',
	// 	'std' => '',
	// 	'type' => 'text');	

	$options[] = array(
		'name' => __('Phone Number', 'options_check'),
		'desc' => __('Your phone number formatted for display ie: (954) 867-5309', 'options_check'),
		'id' => 'phone_number',
		'std' => '',
		'type' => 'text');

    $options[] = array(
        'name' => __('Global Message', 'options_check'),
        'desc' => __('', 'options_check'),
        'id' => 'global_message',
        'std' => '',
        'type' => 'text');
    $options[] = array(
        'name' => __('Address', 'options_check'),
        'desc' => __('', 'options_check'),
        'id' => 'street_address',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('City, ST, zip', 'options_check'),
        'desc' => __('', 'options_check'),
        'id' => 'city_state_zip',
        'std' => '',
        'type' => 'text');

    $options[] = array(
		'name' => __('Email Address', 'options_check'),
		'desc' => __('Your main email address', 'options_check'),
		'id' => 'main_email',
		'std' => '',
		'type' => 'text');

//    $options[] = array(
//        'name' => __('Top Bar Quote', 'options_check'),
//        'desc' => __('A quote displayed at very top of the page', 'options_check'),
//        'id' => 'top_bar_quote',
//        'std' => '',
//        'type' => 'text');

    $options[] = array(
		'name' => __('Facebook', 'options_check'),
		'desc' => __('Link to your facebook page.', 'options_check'),
		'id' => 'facebook_link',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter', 'options_check'),
		'desc' => __('Link to your twitter page.', 'options_check'),
		'id' => 'twitter_link',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('YouTube', 'options_check'),
		'desc' => __('Link to your YouTube profile.', 'options_check'),
		'id' => 'youtube_link',
		'std' => '',
		'type' => 'text');			

	$options[] = array(
		'name' => __('Copyright', 'options_check'),
		// 'desc' => __('P')
		'id' => 'copyright',
		'type' => 'text'
		);

	// $options[] = array(
	// 	'name' => __('Store', 'options_check'),
	// 	'type' => 'heading');

	// $options[] = array(
	// 	'name' => __('Category Banner', 'options_check'),
	// 	// 'desc' => __('This creates a full size uploader that previews the image.', 'options_check'),
	// 	'id' => 'category_banner',
	// 	'type' => 'upload');


	// $options[] = array(
	// 	'name' => __('Category Banner Link', 'options_check'),
	// 	// 'desc' => __('P')
	// 	'id' => 'category_banner_link',
	// 	'type' => 'text'
	// 	);	

//	$options[] = array(
//		'name' => __('Right Header Content', 'options_check'),
//		'desc' => sprintf( __( 'Content header area to the right of the logo') ),
//		'id' => 'right_header_content',
//		'type' => 'editor',
//		'settings' => $wp_editor_settings );





	return $options;
}