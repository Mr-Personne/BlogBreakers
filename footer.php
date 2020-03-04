        <footer id="contact">
            <div class="container-fluid">
                <div class="container pt-5 pb-5">
                    <div class="reglage justify-content-between">

                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <!-- ajout de ma nouvelle widget area -->
                            <?php if (is_active_sidebar('widget-area-1')) : ?>
                                <?php dynamic_sidebar('widget-area-1'); ?>
                            <?php endif; ?>
                        </div>

                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
                            <?php if (is_active_sidebar('widget-area-2')) : ?>
                                <?php dynamic_sidebar('widget-area-2'); ?>
                            <?php endif; ?>
                        </div>

                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <?php if (is_active_sidebar('widget-area-3')) : ?>
                                <?php dynamic_sidebar('widget-area-3'); ?>
                            <?php endif; ?>
                        </div>
                        <!-- fin nouvelle widget area -->

                    </div>

                    <div class="row justify-content-center align-items-center pt-5 pb-5">
                        <div class="col-12 text-center font-weight-bold">
                            <?php if (is_active_sidebar('widget-area-auteur')) : ?>
                                <?php dynamic_sidebar('widget-area-auteur'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js'></script>
        <script src="wp-content/themes/blogbreakers/assets/js/script.js"></script>
    </body>

</html>