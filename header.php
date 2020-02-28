<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!-- install a plugin for meta and open graph setup (yoast?)-->

    <title><?php bloginfo('name'); ?> <?php wp_title('-'); ?></title>

    <!-- bloginfo() info : https://developer.wordpress.org/reference/functions/bloginfo/ -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- <header class="site-header">
        <h1><?php bloginfo('name'); ?></h1>
        <nav> -->
    <!-- .navbar-header -->
    <?php
    // if ( has_nav_menu( 'primary' ) ) {
    // 	wp_nav_menu( array(
    // 		'theme_location'    => 'primary',
    // 		'container'         => 'div',
    // 		'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
    // 		'menu_class'        => 'primary-menu',
    //     ) ); } 

    ?>
    <!-- </nav>
    </header> -->

    <header>
        <div class="container-fluid">
            <!-- <nav class="navbar navbar-expand-lg font-montserrat text-decoration-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-2">
                    
                    <?php //echo the_custom_logo(); ?>
                </div>
                <div class="col-2">
                    <a class="nav-item nav-hover text-decoration-none text-center font-color-dark" href="#">Accueil</a>
                </div>
                <div class="col-2">
                    <a class="nav-item nav-hover text-decoration-none text-center font-color-dark" href="#">Projets</a>
                </div>
                <div class="col-2">
                    <a class="nav-item nav-hover text-decoration-none text-center font-color-dark" href="#">Notre
                        équipe</a>
                </div>
                <div class="col-2">
                    <a class="nav-item nav-hover text-decoration-none text-center font-color-dark" href="#">Blog</a>
                </div>
                <div class="col-2">
                    <a class="nav-item nav-hover text-decoration-none text-center font-color-dark" href="#">Contact</a>
                </div>
            </nav> -->

            <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
                <div class="container">
                    <?php echo the_custom_logo(); ?>
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#">Navbar</a>
                    <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>
                </div>
            </nav>
        </div>
    </header>