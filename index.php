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
                    // echo 'post';
                    the_post();
                    the_post_thumbnail();
                    
        ?>
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2><small><?php the_time('F jS, Y') ?> by <?php the_author() ?> </small>
        <?php
                    the_content();   
                endwhile;
            else :

                echo "<p>Sorry, there are no posts to display.</p>";

            endif;
        ?>
        
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