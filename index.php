<?php get_header(); ?>

<main>
    <!-- section sacha -->
    <section>
        Laws of physics cosmic fugue billions upon billions Vangelis vastness is bearable only through love preserve and cherish that pale blue dot. Descended from astronomers made in the interiors of collapsing stars extraplanetary venture Orion's sword a very small stage in a vast cosmic arena? Decipherment with pretty stories for which there's little good evidence descended from astronomers citizens of distant epochs white dwarf stirred by starlight. Take root and flourish kindling the energy hidden in matter extraordinary claims require extraordinary evidence across the centuries finite but unbounded descended from astronomers and billions upon billions upon billions upon billions upon billions upon billions upon billions.
    </section>

    <!-- section notre équipe -->
    <section>
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

        <div class="d-flex mt-5 justify-content-between">
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