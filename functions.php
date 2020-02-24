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


//widgets
function footer_widgets_init()
{

    register_sidebar(array(

        'name' => 'Widget du footer',
        'id' => 'new-widget-area',
        'before_widget' => '<div class="nwa-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="nwa-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'footer_widgets_init');


//custom post types
function projets_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Projets', 'Post Type General Name', 'nisarg'),
        'singular_name'       => _x('Projets', 'Post Type Singular Name', 'nisarg'),
        'menu_name'           => __('Projets', 'nisarg'),
        'parent_item_colon'   => __('Parent Projets', 'nisarg'),
        'all_items'           => __('All Projets', 'nisarg'),
        'view_item'           => __('View Projets', 'nisarg'),
        'add_new_item'        => __('Add New Projets', 'nisarg'),
        'add_new'             => __('Add New', 'nisarg'),
        'edit_item'           => __('Edit Projets', 'nisarg'),
        'update_item'         => __('Update Projets', 'nisarg'),
        'search_items'        => __('Search Projets', 'nisarg'),
        'not_found'           => __('Not Found', 'nisarg'),
        'not_found_in_trash'  => __('Not found in Trash', 'nisarg'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('Projets', 'nisarg'),
        'description'         => __('Projets news and reviews', 'nisarg'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        //change support to change display of editor(???)
        // 'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'supports'            => array('title', 'thumbnail', 'excerpt'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        // 'taxonomies'          => array('genres'),
        /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
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
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('projets', $args);
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'projets_post_type', 0);



function projets_add_meta_boxes($post)
{
    add_meta_box('projets_id', 'projets', 'projets_build_meta_box', 'projets');
}

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function projets_build_meta_box($post)
{
    // make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'projets_meta_box_nonce' );

	// retrieve the _projets_url current value
	$current_url = get_post_meta( $post->ID, '_projets_url', true );
?>
    <div class='inside'>
        <h3><?php _e('Projet url', 'projets_example_plugin'); ?></h3>
        <p>
            <input type="text" name="projet-url" value="<?php echo $current_url ?>" />
        </p>
    </div>
<?php
}

add_action('add_meta_boxes_projets', 'projets_add_meta_boxes');


/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 */
function projets_save_meta_boxes_data($post_id)
{
    // code here
    // verify taxonomies meta box nonce
	if ( !isset( $_POST['projets_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['projets_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}

	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
    // store custom fields values
    // _projets_url string
    if (isset($_REQUEST['projet-url'])) {
        update_post_meta($post_id, '_projets_url', sanitize_text_field($_POST['projet-url']));
    }
    
}
add_action('save_post_projets', 'projets_save_meta_boxes_data');




function equipiers_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Équipers', 'Post Type General Name', 'nisarg'),
        'singular_name'       => _x('Équipers', 'Post Type Singular Name', 'nisarg'),
        'menu_name'           => __('Équipers', 'nisarg'),
        'parent_item_colon'   => __('Parent Équipers', 'nisarg'),
        'all_items'           => __('All Équipers', 'nisarg'),
        'view_item'           => __('View Équipers', 'nisarg'),
        'add_new_item'        => __('Add New Équipers', 'nisarg'),
        'add_new'             => __('Add New', 'nisarg'),
        'edit_item'           => __('Edit Équipers', 'nisarg'),
        'update_item'         => __('Update Équipers', 'nisarg'),
        'search_items'        => __('Search Équipers', 'nisarg'),
        'not_found'           => __('Not Found', 'nisarg'),
        'not_found_in_trash'  => __('Not found in Trash', 'nisarg'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('Équipers', 'nisarg'),
        'description'         => __('Équipers news and reviews', 'nisarg'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        //change support to change display of editor(???)
        // 'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'supports'            => array('title', 'thumbnail', 'excerpt'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        // 'taxonomies'          => array('genres'),
        /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
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
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('equipers', $args);
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */

add_action('init', 'equipiers_post_type', 0);



function equipiers_add_meta_boxes($post)
{
    add_meta_box('equipiers_id', 'equipiers', 'equipiers_build_meta_box', 'equipiers');
}

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function equipiers_build_meta_box($post)
{
    // make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'equipiers_meta_box_nonce' );

	// retrieve the _equipiers_url current value
	$current_url = get_post_meta( $post->ID, '_equipiers_url', true );
?>
    <div class='inside'>
        <h3><?php _e('equipier url', 'equipiers_example_plugin'); ?></h3>
        <p>
            <input type="text" name="equipier-url" value="<?php echo $current_url ?>" />
        </p>
    </div>
<?php
}

add_action('add_meta_boxes_equipiers', 'equipiers_add_meta_boxes');


/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 */
function equipiers_save_meta_boxes_data($post_id)
{
    // code here
    // verify taxonomies meta box nonce
	if ( !isset( $_POST['equipiers_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['equipiers_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}

	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
    // store custom fields values
    // _equipiers_url string
    if (isset($_REQUEST['equipier-url'])) {
        update_post_meta($post_id, '_equipiers_url', sanitize_text_field($_POST['equipier-url']));
    }
    
}
add_action('save_post_equipiers', 'equipiers_save_meta_boxes_data');
// FIN section sacha


// section fayçal

// FIN section fayçal


// section franck

// FIN section franck


// section glenn

// FIN section glenn
