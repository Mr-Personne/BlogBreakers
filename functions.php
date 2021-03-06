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

//custom background image settings
function wpse228339_custom_background_cb() {
    // $background is the saved custom image, or the default image.
    $background = set_url_scheme( get_background_image() );
 
    // $color is the saved custom color.
    // A default has to be specified in style.css. It will not be printed here.
    $color = get_background_color();
 
    if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
        $color = false;
    }
 
    $type_attr = current_theme_supports( 'html5', 'style' ) ? '' : ' type="text/css"';
 
    if ( ! $background && ! $color ) {
        if ( is_customize_preview() ) {
            printf( '<style%s id="custom-background-css"></style>', $type_attr );
        }
        return;
    }
 
    $style = $color ? "background-color: #$color;" : '';
 
    if ( $background ) {
        $image = ' background-image: url("' . esc_url_raw( $background ) . '");';
 
        // Background Position.
        $position_x = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
        $position_y = get_theme_mod( 'background_position_y', get_theme_support( 'custom-background', 'default-position-y' ) );
 
        if ( ! in_array( $position_x, array( 'left', 'center', 'right' ), true ) ) {
            $position_x = 'left';
        }
 
        if ( ! in_array( $position_y, array( 'top', 'center', 'bottom' ), true ) ) {
            $position_y = 'top';
        }
 
        $position = " background-position: $position_x $position_y;";
 
        // Background Size.
        $size = get_theme_mod( 'background_size', get_theme_support( 'custom-background', 'default-size' ) );
 
        if ( ! in_array( $size, array( 'auto', 'contain', 'cover' ), true ) ) {
            $size = 'auto';
        }
 
        $size = " background-size: $size;";
 
        // Background Repeat.
        $repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
 
        if ( ! in_array( $repeat, array( 'repeat-x', 'repeat-y', 'repeat', 'no-repeat' ), true ) ) {
            $repeat = 'repeat';
        }
 
        $repeat = " background-repeat: $repeat;";
 
        // Background Scroll.
        $attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
 
        if ( 'fixed' !== $attachment ) {
            $attachment = 'scroll';
        }
 
        $attachment = " background-attachment: $attachment;";
 
        $style .= $image . $position . $size . $repeat . $attachment;
    }
    ?>
    <style<?php echo $type_attr; ?> id="custom-background-css">
    body.custom-background { <?php echo trim( $style ); ?> }
    </style>
    <?php
}
$defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'wp-head-callback'       => 'wpse228339_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
);


// https://www.daddydesign.com/wordpress/how-to-add-features-in-wordpress-using-add_theme_support-function/
// https://www.wpbeginner.com/beginners-guide/how-to-add-featured-image-or-post-thumbnails-in-wordpress/
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(250, 250);
    add_theme_support('post-thumbnails', array('page'));
    add_theme_support('post-thumbnails', array('post'));
    add_theme_support('post-thumbnails', array('your-post-type-name'));
    add_theme_support('custom-background', $defaults);
    add_theme_support('custom-header');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('title-tag');
}


//ajout utiliation de BootStrap
function bootstrap_scripts_enqueue()
{
    // all styles
    wp_register_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_register_style('bootstrap-theme-css', get_template_directory_uri() . '/assets/css/bootstrap-theme.min.css');
    wp_register_style('bootstrap-all-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');

    wp_register_style('blogBreakers-style', get_stylesheet_uri());

    // wp_enqueue_style('bootstrap-css');
    // wp_enqueue_style('bootstrap-theme-css');
    // wp_enqueue_style('blogBreakers-style');

    // all scripts
    // wp_register_script( 'jquery-3-js', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js');
    // wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js');
    wp_register_script('npm-js', get_template_directory_uri() . '/assets/js/npm.js');
    wp_register_script('script-js', get_template_directory_uri() . '/assets/js/script.js');

    // wp_enqueue_scripts('bootstrap-js');
    // wp_enqueue_scripts('npm-js');
    // wp_enqueue_scripts('script-js');
}
// add_action('wp_enqueue_scripts', 'bootstrap_scripts_enqueue', 80);



/**
 * Register Custom Navigation Walker
 * https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 */
function register_navwalker(){
	if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
        // File does not exist... return an error.
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        // File exists... require it.
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
}
add_action( 'after_setup_theme', 'register_navwalker' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );


//widgets
function widgets_init()
{

    register_sidebar(array(

        'name' => 'Widget du header',
        'id' => 'widget-area-header',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="gitbreakers-h1">',
        'after_title' => '</h1>',
    ));

    register_sidebar(array(

        'name' => 'Widget du footer 1',
        'id' => 'widget-area-1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-email">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(

        'name' => 'Widget du footer 2',
        'id' => 'widget-area-2',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-telephone">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(

        'name' => 'Widget du footer 3',
        'id' => 'widget-area-3',
        'before_widget' => '<div class="my-0">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-adresse">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(

        'name' => 'Widget du footer - Auteur',
        'id' => 'widget-area-auteur',
        'before_widget' => '<div class="text-center font-weight-bold">',
        'after_widget' => '</div>',
    ));
}

add_action('widgets_init', 'widgets_init');


//custom post types
function projets_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Projets', 'Post Type General Name', 'blogbreakers'),
        'singular_name'       => _x('Projets', 'Post Type Singular Name', 'blogbreakers'),
        'menu_name'           => __('Projets', 'blogbreakers'),
        'parent_item_colon'   => __('Parent Projets', 'blogbreakers'),
        'all_items'           => __('All Projets', 'blogbreakers'),
        'view_item'           => __('View Projets', 'blogbreakers'),
        'add_new_item'        => __('Add New Projets', 'blogbreakers'),
        'add_new'             => __('Add New', 'blogbreakers'),
        'edit_item'           => __('Edit Projets', 'blogbreakers'),
        'update_item'         => __('Update Projets', 'blogbreakers'),
        'search_items'        => __('Search Projets', 'blogbreakers'),
        'not_found'           => __('Not Found', 'blogbreakers'),
        'not_found_in_trash'  => __('Not found in Trash', 'blogbreakers'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('Projets', 'blogbreakers'),
        'description'         => __('Projets dans header', 'blogbreakers'),
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
    wp_nonce_field(basename(__FILE__), 'projets_meta_box_nonce');

    // retrieve the _projets_url current value
    $current_url = get_post_meta($post->ID, '_projets_url', true);
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
    if (!isset($_POST['projets_meta_box_nonce']) || !wp_verify_nonce($_POST['projets_meta_box_nonce'], basename(__FILE__))) {
        return;
    }

    // return if autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (!current_user_can('edit_post', $post_id)) {
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
        'name'                => _x('Équipiers', 'Post Type General Name', 'blogbreakers'),
        'singular_name'       => _x('Équipiers', 'Post Type Singular Name', 'blogbreakers'),
        'menu_name'           => __('Équipiers', 'blogbreakers'),
        'parent_item_colon'   => __('Parent Équipiers', 'blogbreakers'),
        'all_items'           => __('All Équipiers', 'blogbreakers'),
        'view_item'           => __('View Équipiers', 'blogbreakers'),
        'add_new_item'        => __('Add New Équipiers', 'blogbreakers'),
        'add_new'             => __('Add New', 'blogbreakers'),
        'edit_item'           => __('Edit Équipiers', 'blogbreakers'),
        'update_item'         => __('Update Équipiers', 'blogbreakers'),
        'search_items'        => __('Search Équipiers', 'blogbreakers'),
        'not_found'           => __('Not Found', 'blogbreakers'),
        'not_found_in_trash'  => __('Not found in Trash', 'blogbreakers'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('Équipiers', 'blogbreakers'),
        'description'         => __('Équipiers détails', 'blogbreakers'),
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
    register_post_type('equipiers', $args);
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
    wp_nonce_field(basename(__FILE__), 'equipiers_meta_box_nonce');

    // retrieve the _equipiers_nom current value
    $current_nom = get_post_meta($post->ID, '_equipiers_nom', true);

    // retrieve the _equipiers_prenom current value
    $current_prenom = get_post_meta($post->ID, '_equipiers_prenom', true);

    // retrieve the _equipiers_sous-titre current value
    $current_sousTitre = get_post_meta($post->ID, '_equipiers_sous_titre', true);

    // retrieve the _equipiers_github current value
    $current_github = get_post_meta($post->ID, '_equipiers_github', true);

    // retrieve the _equipiers_linkedin current value
    $current_linkedin = get_post_meta($post->ID, '_equipiers_linkedin', true);

    // retrieve the _equipiers_facebook current value
    $current_facebook = get_post_meta($post->ID, '_equipiers_facebook', true);
?>
    <div class='inside'>
        <h3><?php _e('Nom', 'equipiers_example_plugin'); ?></h3>
        <p>
            <input type="text" name="nom" value="<?php echo $current_nom ?>" />
        </p>
    </div>
    <div class='inside'>
        <h3><?php _e('Prénom', 'equipiers_example_plugin'); ?></h3>
        <p>
            <input type="text" name="prenom" value="<?php echo $current_prenom ?>" />
        </p>
    </div>
    <div class='inside'>
        <h3><?php _e('Sous-titre', 'equipiers_example_plugin'); ?></h3>
        <p>
            <input type="text" name="sous-titre" value="<?php echo $current_sousTitre ?>" />
        </p>
    </div>

    <div class='inside'>
        <h3><?php _e('Lien Github', 'equipiers_example_plugin'); ?></h3>
        <p>
            <input type="text" name="lien-github" value="<?php echo $current_github ?>" />
        </p>
    </div>
    <div class='inside'>
        <h3><?php _e('Lien LinkedIn', 'equipiers_example_plugin'); ?></h3>
        <p>
            <input type="text" name="lien-linkedin" value="<?php echo $current_linkedin ?>" />
        </p>
    </div>
    <div class='inside'>
        <h3><?php _e('Lien Facebook', 'equipiers_example_plugin'); ?></h3>
        <p>
            <input type="text" name="lien-facebook" value="<?php echo $current_facebook ?>" />
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
    if (!isset($_POST['equipiers_meta_box_nonce']) || !wp_verify_nonce($_POST['equipiers_meta_box_nonce'], basename(__FILE__))) {
        return;
    }

    // return if autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // store custom fields values
    // _equipiers_nom string
    if (isset($_REQUEST['nom'])) {
        update_post_meta($post_id, '_equipiers_nom', sanitize_text_field($_POST['nom']));
    }

    // _equipiers_prenom string
    if (isset($_REQUEST['prenom'])) {
        update_post_meta($post_id, '_equipiers_prenom', sanitize_text_field($_POST['prenom']));
    }

    // _equipiers_sous-titre string
    if (isset($_REQUEST['sous-titre'])) {
        update_post_meta($post_id, '_equipiers_sous_titre', sanitize_text_field($_POST['sous-titre']));
    }

    // _equipiers_lien-github string
    if (isset($_REQUEST['lien-github'])) {
        update_post_meta($post_id, '_equipiers_github', sanitize_text_field($_POST['lien-github']));
    }

    // _equipiers_lien-linkedin string
    if (isset($_REQUEST['lien-linkedin'])) {
        update_post_meta($post_id, '_equipiers_linkedin', sanitize_text_field($_POST['lien-linkedin']));
    }

    // _equipiers_lien-facebook string
    if (isset($_REQUEST['lien-facebook'])) {
        update_post_meta($post_id, '_equipiers_facebook', sanitize_text_field($_POST['lien-facebook']));
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
