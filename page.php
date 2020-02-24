<?php get_header(); ?>

<main>
    <!-- section sacha -->
    <section>
        <h2>This is a Page.php</h2>
    </section>

    <section>
        
       <?php
        
            if (have_posts()) :
                /* Start the Loop */
                while (have_posts()) : the_post()
                    // echo 'post';
                    
        ?>
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2><small><?php the_time('F jS, Y') ?> by <?php the_author() ?> </small>
        <?php
                
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