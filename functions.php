<?php
/**
 * Theme Functions
 * 
 * This file contains functions that set up the theme and add any extra
 * or custom functionality.
 * 
 * @package WordPress
 * @version 1.0
 */



/**
 * Maximum width allowed for any content
 * 
 * @since 1.0
 */
if ( ! isset( $content_width ) ) {
    $content_width = 660;
}

if ( ! function_exists( 'amlib_setup' ) ):
/**
 * amlib Theme Setup
 * 
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 * 
 * @since 1.0
 */
function amlib_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on twentyfifteen, use a find and replace
     * to change 'twentyfifteen' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'amlib', get_template_directory() . '/languages' );

    // Add RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support( 'title-tag' );

    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'primary-nav' => __( 'Primary Navigation', 'amlib' ),
        'top-links'  => __( 'Top Bar Links', 'amlib' ),
        'footer-links' => __( 'Footer Links', 'amlib'),
    ) );

    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

}
endif; // amlib_setup
add_action( 'after_setup_theme', 'amlib_setup' );


/**
 * Load required stylesheets & scripts
 * @since 1.0
 */
function amlib_enqueue_style() {
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/styles/amlib.css');
    wp_enqueue_style('mobile-menu-css', get_template_directory_uri() . '/assets/styles/mobile-menu.css');
    wp_enqueue_style('main-style', get_stylesheet_directory());
}

function amlib_enqueue_script() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/scripts/amlib.js', array(), '1', true);
    wp_enqueue_script('mobile-menu-js', get_template_directory_uri() . '/assets/scripts/mobile-menu.js', array(), '1', true);
}

add_action( 'wp_enqueue_scripts', 'amlib_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'amlib_enqueue_script' );


/*
 * Registers widget areas
 *
 * @since 1.0
 *
 * @return void
 */
function amlib_widgets_init() {
     // register_sidebar( array(
     //     'name'          => __( 'Footer Widget Area', 'holstein' ),
     //     'id'            => 'footer-widget',
     //     'description'   => __( 'Appears on the bottom of every page.', 'holstein' ),
     //     'before_widget' => '<div class="col">',
     //     'after_widget'  => '</div>',
     //     'before_title'  => '<h2>',
     //     'after_title'   => '</h2>'
     // ) );

     register_sidebar( array(
         'name'          => __( 'Right Sidebar Widget Area', 'amlib' ),
         'id'            => 'right-sidebar',
         'description'   => __( 'Appears on the right side of the blog index.', 'amlib' ),
         'before_widget' => '<div id="%1$s" class="widget %2$s">',
         'after_widget'  => '</div>',
         'before_title'  => '<h4 class="widget-title">',
         'after_title'   => '</h4>'
     ) );

     // register_sidebar( array(
     //     'name'          => __( 'Left Sidebar Widget Area', 'holstein' ),
     //     'id'            => 'left-sidebar',
     //     'description'   => __( 'Appears on the left side of pages', 'holstein' ),
     //     'before_widget' => '<div id="%1$s" class="area %2$s">',
     //     'after_widget'  => '</div>',
     //     'before_title'  => '<h3>',
     //     'after_title'   => '</h3>'
     // ) );     
}

add_action( 'widgets_init', 'amlib_widgets_init' );


/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

if ( !function_exists( 'of_get_option' ) ) {
    function of_get_option($name, $default = false) {

        $optionsframework_settings = get_option('optionsframework');

        // Gets the unique option id
        $option_name = $optionsframework_settings['id'];

        if ( get_option($option_name) ) {
            $options = get_option($option_name);
        }

        if ( isset($options[$name]) ) {
            return $options[$name];
        } else {
            return $default;
        }
    }
}

// Register Custom Taxonomy
function question_category_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Question Cats', 'Taxonomy General Name', 'amlib' ),
        'singular_name'              => _x( 'Question Cat', 'Taxonomy Singular Name', 'amlib' ),
        'menu_name'                  => __( 'Question Category', 'amlib' ),
        'all_items'                  => __( 'All Categories', 'amlib' ),
        'parent_item'                => __( 'Parent Category', 'amlib' ),
        'parent_item_colon'          => __( 'Parent Item:', 'amlib' ),
        'new_item_name'              => __( 'New Category', 'amlib' ),
        'add_new_item'               => __( 'Add New Category', 'amlib' ),
        'edit_item'                  => __( 'Edit Category', 'amlib' ),
        'update_item'                => __( 'Update Category', 'amlib' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'amlib' ),
        'search_items'               => __( 'Search Categories', 'amlib' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'amlib' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'amlib' ),
        'not_found'                  => __( 'Not Found', 'amlib' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'question_category', array( 'faqs' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'question_category_taxonomy', 0 );


// Register Custom Post Type
function faq_posts() {

    $labels = array(
        'name'                => _x( 'FAQs', 'Post Type General Name', 'amlib' ),
        'singular_name'       => _x( 'FAQ', 'Post Type Singular Name', 'amlib' ),
        'menu_name'           => __( 'FAQs', 'amlib' ),
        'parent_item_colon'   => __( 'Parent FAQ:', 'amlib' ),
        'all_items'           => __( 'All FAQs', 'amlib' ),
        'view_item'           => __( 'View FAQ', 'amlib' ),
        'add_new_item'        => __( 'Add New FAQ', 'amlib' ),
        'add_new'             => __( 'Add FAQ', 'amlib' ),
        'edit_item'           => __( 'Edit FAQ', 'amlib' ),
        'update_item'         => __( 'Update FAQ', 'amlib' ),
        'search_items'        => __( 'Search FAQ', 'amlib' ),
        'not_found'           => __( 'Not found', 'amlib' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'amlib' ),
    );
    $args = array(
        'label'               => __( 'faqs', 'amlib' ),
        'description'         => __( 'Frequently Asked Questions', 'amlib' ),
        'labels'              => $labels,
        'supports'            => array( ),
        'taxonomies'          => array( 'question_category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'faqs', $args );

}

// Hook into the 'init' action
add_action( 'init', 'faq_posts', 0 );