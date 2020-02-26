        <footer>
            <div class="container-fluid">
                <div class="container pt-5 pb-5">
                    <div class="row justify-content-between align-items-center">

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
    </body>

</html>