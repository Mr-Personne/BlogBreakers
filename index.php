<?php get_header(); ?>

<main>
    <!-- section sacha -->
    <section>
        Laws of physics cosmic fugue billions upon billions Vangelis vastness is bearable only through love preserve and cherish that pale blue dot. Descended from astronomers made in the interiors of collapsing stars extraplanetary venture Orion's sword a very small stage in a vast cosmic arena? Decipherment with pretty stories for which there's little good evidence descended from astronomers citizens of distant epochs white dwarf stirred by starlight. Take root and flourish kindling the energy hidden in matter extraordinary claims require extraordinary evidence across the centuries finite but unbounded descended from astronomers and billions upon billions upon billions upon billions upon billions upon billions upon billions.
    </section>

    <section>
        <?php

        if (have_posts()) :
            /* Start the Loop */
            while (have_posts()) :
                the_post();
                ?>
                
        <div class="container-fluid pt-10 pb-120px">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h3 class="font-bernadette display-4"><?php the_title(); ?></h3>
                        <?php the_content(); ?>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><button type="button" class="btn btn-primary mt-2" data-toggle="button" aria-pressed="false">LIRE LA SUITE</button></a>
                    </div>
                    <div class="col-6">
                        <?php the_post_thumbnail(); ?>
                    </div>
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

        <div class="d-flex">
            <p>-------------------------------------------------------------------------------</p>

            <?php
            foreach ($idArray as $id) {
                $current_prenom = get_post_meta($id, '_equipiers_prenom', true);
                $current_nom = get_post_meta($id, '_equipiers_nom', true);
                echo "<p>" . $current_prenom . " " . $current_nom . " </p> ";
                $current_sousTitre = get_post_meta($id, '_equipiers_sous_titre', true);
                echo "<p>" . $current_sousTitre . "</p>";
            }
            ?>
            <p>-------------------------------------------------------------------------------</p>
        </div>
    </section>
    <!-- FIN section sacha -->


    <!-- section fayçal -->

    <!-- FIN section fayçal -->


    <!-- section franck -->

    <!-- FIN section franck -->


    <!-- section glenn -->

    <!-- FIN section glenn -->

</main>

<?php get_footer(); ?>