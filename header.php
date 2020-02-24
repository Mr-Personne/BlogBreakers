<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php bloginfo('name'); ?> <?php wp_title('-'); ?></title>

    <!-- bloginfo() info : https://developer.wordpress.org/reference/functions/bloginfo/ -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header">
        <h1><?php bloginfo('name'); ?></h1>
        <nav>
            <!-- .navbar-header -->
			<?php if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
					'menu_class'        => 'primary-menu',
                ) ); } 
                
            ?>
        </nav>
    </header>