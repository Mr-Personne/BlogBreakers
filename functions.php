<?php
// section sacha
function register_blogBreakers_menus() {
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Top Primary Menu', 'blogBreakers' ),
    ) );
}
add_action( 'init', 'register_blogBreakers_menus' );

// https://www.daddydesign.com/wordpress/how-to-add-features-in-wordpress-using-add_theme_support-function/
// https://www.wpbeginner.com/beginners-guide/how-to-add-featured-image-or-post-thumbnails-in-wordpress/
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 250, 250);
    add_theme_support( 'post-thumbnails', array( 'page' ) );
    add_theme_support( 'post-thumbnails', array( 'post' ) );
    add_theme_support( 'post-thumbnails', array( 'your-post-type-name' ) ); 
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    add_theme_support( 'title-tag' );
}

// FIN section sacha


// section fayçal

// FIN section fayçal


// section franck

// FIN section franck


// section glenn

// FIN section glenn

?>