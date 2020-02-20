<?php

get_header();

?>
<main>
    <!-- section sacha -->
    <section>
        Laws of physics cosmic fugue billions upon billions Vangelis vastness is bearable only through love preserve and cherish that pale blue dot. Descended from astronomers made in the interiors of collapsing stars extraplanetary venture Orion's sword a very small stage in a vast cosmic arena? Decipherment with pretty stories for which there's little good evidence descended from astronomers citizens of distant epochs white dwarf stirred by starlight. Take root and flourish kindling the energy hidden in matter extraordinary claims require extraordinary evidence across the centuries finite but unbounded descended from astronomers and billions upon billions upon billions upon billions upon billions upon billions upon billions.
    </section>

    <section>
        <?php
        echo "<br>ptdr";
        if (have_posts()) :
            echo "<br>mdr";
            /* Start the Loop */
            while (have_posts()) :
                the_post();
                echo "<br>lol";

            endwhile;

            

        else :

            get_template_part('template-parts/post/content', 'none');

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
<?php

get_footer();

?>