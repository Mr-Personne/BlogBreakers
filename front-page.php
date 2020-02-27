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

                    ?>
                            <div class="col-3 d-flex flex-column align-items-center bg-white no-gutter radius-border projet">
                                <div class="bg-default radius-border-top">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                        echo '<img src="' . $image_src[0]  . '" width="100%" height="100%"  />';
                                    }
                                    ?>
                                </div>
                                <h4 class="text-center font-weight-bold pt-3 pb-3"><?php the_title(); ?></h4>
                                <p class="text-center"><?php the_excerpt(); ?></p>
                                <?php $current_url = get_post_meta(get_the_ID(), '_projets_url', true); ?>
                                <a href="<?php echo $current_url; ?>" target="_blank"><button type="button" class="btn btn-primary mt-2" data-toggle="button" aria-pressed="false">LIRE LA SUITE</button></a>
                            </div>
                    <?php
                        endwhile;
                    endif;

                    ?>
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
            $count = 0;
            while (have_posts() && $count < 3) :
                the_post();
                $count++;
                // echo $count;
        ?>
                <!-- Si l'artcile A une image à la une fait :  -->
                <?php
                if (has_post_thumbnail()) {
                    $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                ?>
                    <div class="container-fluid mb-5 mt-10 d-flex pr-0 pl-0">
                        <div class="container bg-article">
                            <div class="row">

                                <div class="col-12 pl-200px">
                                    <h3 class="font-bernadette display-4 mb-5"><?php the_title(); ?></h3>
                                    <div class="content-box">
                                        <?php the_content(); ?>
                                    </div>
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><button type="button" class="btn btn-primary mt-5" data-toggle="button" aria-pressed="false">LIRE LA SUITE</button></a>
                                </div>


                            </div>
                        </div>
                        <div class="bg-thumbnail"><?php echo '<img src="' . $image_src[0]  . '" width="100%" height="100%" />'; ?></div>
                    </div>
                    <!-- Si l'artcile N'A PAS d'image à la une fait :  -->
                <?php

                } else {

                ?>
                    <div class="container-fluid mb-5 pb-5 mt-10 bg-article d-flex pr-0 pl-0">
                        <div class="row">
                            <div class="col-12 pl-200px pr-200px">
                                <h3 class="font-bernadette display-2 mb-5"><?php the_title(); ?></h3>
                                <div class="content-box-full">
                                    <?php the_content(); ?>
                                </div>
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><button type="button" class="btn btn-primary mt-5" data-toggle="button" aria-pressed="false">LIRE LA SUITE</button></a>
                            </div>
                        </div>
                    </div>
                <?php
                
                }

                ?>
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
                    <h3 class="title-getintouch font-bernadette text-center text-white p-5">Get in Touch</h3>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 justify-content-around d-flex pt-5">
                        <img class="social-media" src="wp-content/themes/blogbreakers/assets/images/facebook-logo.png" alt="logo-facebook">
                        <img class="social-media" src="wp-content/themes/blogbreakers/assets/images/twitter-logo.png" alt="logo-twitter">
                        <img class="social-media" src="wp-content/themes/blogbreakers/assets/images/linkedin-logo.png" alt="logo-linkedin">
                        <img class="social-media" src="wp-content/themes/blogbreakers/assets/images/github-logo.png" alt="logo-github">
                    </div>
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