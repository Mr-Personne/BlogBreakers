<?php
// section sacha
function register_blogBreakers_menus()
{
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'primary' => esc_html__('Top Primary Menu', 'blogBreakers'),
    ));
}
add_action('init', 'register_blogBreakers_menus');

// https://www.daddydesign.com/wordpress/how-to-add-features-in-wordpress-using-add_theme_support-function/
// https://www.wpbeginner.com/beginners-guide/how-to-add-featured-image-or-post-thumbnails-in-wordpress/
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(250, 250);
    add_theme_support('post-thumbnails', array('page'));
    add_theme_support('post-thumbnails', array('post'));
    add_theme_support('post-thumbnails', array('your-post-type-name'));
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('title-tag');
}


//ajout utiliation de BootStrap
function bootstrap_scripts_enqueue()
{
    // all styles
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('blogBreakers-style', get_stylesheet_uri());

    // all scripts
    // wp_enqueue_script( 'jquery-3-js', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js');
    // wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js');
}
add_action('wp_enqueue_scripts', 'bootstrap_scripts_enqueue', 80);

// FIN section sacha


// section fayçal

// FIN section fayçal


// section franck

// FIN section franck


// section glenn

// FIN section glenn
