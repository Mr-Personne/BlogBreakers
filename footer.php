        <footer>
            <h3>Ceci n'est pas un footer</h3>
            <p><?php wp_list_authors(); ?></p>

            <div style="display:flex; margin-right:50px;">
                <!-- ajout de ma nouvelle widget area -->
                <?php if (is_active_sidebar('widget-area-1')) : ?>
                    <div style="margin-right:50px;">
                        <?php dynamic_sidebar('widget-area-1'); ?>
                    </div>
                <?php endif; ?>
                <?php if (is_active_sidebar('widget-area-2')) : ?>
                    <div style="margin-right:50px;">
                        <?php dynamic_sidebar('widget-area-2'); ?>
                    </div>
                <?php endif; ?>
                <?php if (is_active_sidebar('widget-area-3')) : ?>
                    <div style="margin-right:50px;">
                        <?php dynamic_sidebar('widget-area-3'); ?>
                    </div>
                <?php endif; ?>
                <!-- fin nouvelle widget area -->

            </div>
        </footer>

        <?php wp_footer(); ?>
        </body>

        </html>