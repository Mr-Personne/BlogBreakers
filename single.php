<?php get_header(); ?>

<main>
    <!-- section sacha -->
    <!-- section Articles -->
    <section class="">
        <?php

        if (have_posts()) :
            /* Start the Loop */
            while (have_posts()) :
                the_post();
                $next_post = get_next_post();
                $prev_post = get_previous_post();
                // print_r($next_post);
                // print_r($prev_post);
                // echo get_permalink($prev_post->ID);
        ?>
                <!-- Si l'artcile A une image à la une fait :  -->
                <?php
                if (has_post_thumbnail()) {
                    $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                ?>
                    <div class="container-fluid mb-5 pb-120px bg-article pr-0">
                        <div class="container">
                            <div class="row">

                                <div class="col-12 pl-200px p-single">
                                    <div class="bg-thumbnail bg-thumbnail-single"><?php echo '<img src="' . $image_src[0]  . '" width="100%" height="100%" />'; ?></div>
                                    <h3 class="font-bernadette display-4 mb-5"><?php the_title(); ?></h3>
                                    <div class="">
                                        <?php the_content(); ?>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-between">
                                    <?php
                                    if ($prev_post) {
                                    ?>
                                        <a href="<?php echo get_permalink($prev_post->ID); ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><button type="button" class="btn btn-primary mt-5" data-toggle="button" aria-pressed="false">Article Précé.</button></a>

                                    <?php
                                    }

                                    if ($next_post) {
                                    ?>


                                        <a href="<?php echo get_permalink($next_post->ID); ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><button type="button" class="btn btn-primary mt-5" data-toggle="button" aria-pressed="false">Article Suiv.</button></a>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Si l'artcile N'A PAS d'image à la une fait :  -->
                <?php

                } else {

                ?>
                    <div class="container-fluid mb-5 pb-120px bg-article pr-0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 pl-200px pr-200px p-single">
                                    <h3 class="font-bernadette display-2 mb-5"><?php the_title(); ?></h3>
                                    <div class="">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 d-flex">
                                    <?php
                                    if ($prev_post) {
                                    ?>
                                        <p class="text-left w-100">
                                            <a href="<?php echo get_permalink($prev_post->ID); ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><button type="button" class="btn btn-primary mt-5" data-toggle="button" aria-pressed="false">Article Précé.</button></a>
                                        </p>
                                    <?php
                                    }

                                    if ($next_post) {
                                    ?>

                                        <p class="text-right w-100">
                                            <a href="<?php echo get_permalink($next_post->ID); ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><button type="button" class="btn btn-primary mt-5" data-toggle="button" aria-pressed="false">Article Suiv.</button></a>
                                        </p>
                                    <?php
                                    }
                                    ?>
                                </div>
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
    <!-- FIN section sacha -->


    <!-- section fayçal -->

    <!-- FIN section fayçal -->


    <!-- section franck -->

    <!-- FIN section franck -->


    <!-- section glenn -->

    <!-- FIN section glenn -->

</main>

<?php get_footer(); ?>