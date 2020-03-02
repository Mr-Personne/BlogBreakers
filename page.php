<?php get_header(); echo "page.php";?>

<main>
    <section class="mt-10">
        <?php

        if (have_posts()) :
            /* Start the Loop */
            while (have_posts()) :
                the_post();
        ?>
                <!-- Si l'artcile A une image à la une fait :  -->
                <?php
                if (has_post_thumbnail()) {
                    $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                ?>
                    <div class="container-fluid pt-120px mb-5 pb-120px bg-article d-flex pr-0">
                        <div class="container">
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
                    <div class="container-fluid pt-120px mb-5 pb-120px bg-article d-flex pr-0">
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
            ?>
            <div class="container-fluid pt-120px mb-5 pb-120px bg-article d-flex pr-0">
                <div class="container">
                    <p class="text-center">Sorry, there are no posts to display.</p>
                </div>
            </div>
            <?php

        endif;
        ?>

    </section>
</main>

<?php get_footer(); ?>