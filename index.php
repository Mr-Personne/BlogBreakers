<?php get_header(); ?>

<main>
    <!-- section sacha -->
    <section>
        <div class="container-fluid bg-header">
            <div class="container">
                <h1 class="font-bernadette text-center text-white gitbreakers-h1">GitBreakers the Best</h1>
                <div class="row justify-content-around">
                <?php
                    $args = array(
                        'post_type' => 'projets',
                        'post_status' => 'publish'
                    );

                    $idArray = array();

                    $my_query = new WP_Query($args);

                    if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();

                            // the_title();
                            array_push($idArray, get_the_ID());

                        endwhile;
                    endif;

                    // print_r($idArray);
                    ?>

                    <div class="col-3 d-flex flex-column align-items-center bg-white no-gutter radius-border projet">

                        <?php
                            foreach ($idArray as $id) {
                                $current_url = get_post_meta($id, '_projets_url', true);
                                echo "<div><p>" . $current_url . "</p></div>";
                            }
                        ?>
                    </div>
                    <div class="col-3 d-flex flex-column align-items-center bg-white no-gutter radius-border projet">
                        <div class="bg-automotive radius-border-top"></div>
                        <h4 class="text-center font-weight-bold pt-3 pb-3">Automotive</h4>
                        <p class="text-center">Projet réalisé dans le cadre d'un projet étudiant : réalisation de la maquette, de l'intégration du site. Technologies utilisées : HTML SCSS.</p>
                        <button type="button" class="btn btn-primary mt-2" data-toggle="button" aria-pressed="false">LIRE LA SUITE</button>
                    </div>
                    <div class="col-3 d-flex flex-column align-items-center bg-white no-gutter radius-border projet">
                        <div class="bg-dashboard radius-border-top"></div>
                        <h4 class="text-center font-weight-bold pt-3 pb-3">Dashboard</h4>
                        <p class="text-center">Projet réalisé dans le cadre d'un projet étudiant : réalisation de la maquette, de l'intégration du site. Technologies utilisées : HTML SCSS.</p>
                        <button type="button" class="btn btn-primary mt-2" data-toggle="button" aria-pressed="false">LIRE LA SUITE</button>
                    </div>
                    <div class="col-3 d-flex flex-column align-items-center bg-white no-gutter radius-border projet">
                        <div class="bg-king-burger radius-border-top"></div>
                        <h4 class="text-center font-weight-bold pt-3 pb-3">Le King-Burger</h4>
                        <p class="text-center">Projet réalisé dans le cadre d'un projet étudiant : réalisation de la maquette, de l'intégration du site. Technologies utilisées : HTML SCSS.</p>
                        <button type="button" class="btn btn-primary mt-2" data-toggle="button" aria-pressed="false">LIRE LA SUITE</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section notre équipe -->
    <section class="mt-30">
        <?php
        $args = array(
            'post_type' => 'equipiers',
            'post_status' => 'publish'
        );

        $idArray = array();

        $my_query = new WP_Query($args);

        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();

                // the_title();
                array_push($idArray, get_the_ID());

            endwhile;
        endif;

        // print_r($idArray);
        ?>

        <div class="d-flex justify-content-between">
            <p>-------------------------------------------------</p>

            <?php
            foreach ($idArray as $id) {
                $current_prenom = get_post_meta($id, '_equipiers_prenom', true);
                $current_nom = get_post_meta($id, '_equipiers_nom', true);
                echo "<div><p>" . $current_prenom . " " . $current_nom . " </p> ";
                $current_sousTitre = get_post_meta($id, '_equipiers_sous_titre', true);
                echo "<p>" . $current_sousTitre . "</p></div>";
            }
            ?>


            <p>-------------------------------------------------</p>
        </div>
    </section>
    <!-- FIN section notre équipe -->

    <!-- section Articles -->
    <section class="mt-10">
        <?php

        if (have_posts()) :
            /* Start the Loop */
            while (have_posts()) :
                the_post();
        ?>

                <div class="container-fluid pt-120px mb-5 pb-120px bg-article">
                    <div class="container">
                        <div class="row">
                            <!-- Si l'artcile A une image à la une fait :  -->
                            <?php
                            if (has_post_thumbnail()) {
                                $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                            ?>
                                <div class="col-6">
                                    <h3 class="font-bernadette display-2 mb-5"><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><button type="button" class="btn btn-primary mt-5" data-toggle="button" aria-pressed="false">LIRE LA SUITE</button></a>
                                </div>
                                <div class="col-6">
                                    <?php //the_post_thumbnail(); 
                                    ?>
                                    <?php
                                    echo '<img src="' . $image_src[0]  . '" width="100%"  />';
                                    ?>
                                </div>

                                <!-- Si l'artcile N'A PAS d'image à la une fait :  -->
                            <?php

                            } else {

                            ?>

                                <div class="col-12">
                                    <h3 class="font-bernadette display-2 mb-5"><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><button type="button" class="btn btn-primary mt-5" data-toggle="button" aria-pressed="false">LIRE LA SUITE</button></a>
                                </div>

                            <?php

                            }

                            ?>
                        </div>
                    </div>
                </div>
        <?php

            endwhile;
        else :

            echo "<p>Sorry, there are no posts to display.</p>";

        endif;
        ?>

    </section>
    <!-- FIN section Articles -->


    <!-- section "Get in touch" (logos reseaux sociaux) -->
    <section>

        <div class="container-fluid getintouch">
            <div class="row">
                <div class="col-12">
                    <h3 class="font-bernadette text-center text-white p-5">Get in Touch</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p></p>
                </div>
            </div>
        </div>

    </section>
    <!-- FIN section "Get in touch" (logos reseaux sociaux) -->


    <!-- section carte -->
    <?php
    $longi = 6.1518422;
    $lati = 47.6369051;
    ?>
    <section>
        <?php echo do_shortcode("[blogMap longitude='" . $longi . "' latitude='" . $lati . "']"); ?>
    </section>
    <!-- FIN section carte -->


    <!-- FIN section sacha -->


    <!-- section fayçal -->

    <!-- FIN section fayçal -->


    <!-- section franck -->

    <!-- FIN section franck -->


    <!-- section glenn -->

    <!-- FIN section glenn -->

</main>

<?php get_footer(); ?>