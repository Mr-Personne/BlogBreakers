        <footer>
            <h3>Ceci n'est pas un footer</h3>
            <p><?php wp_list_authors(); ?></p>

            <!-- ajout de ma nouvelle widget area -->
            <?php if (is_active_sidebar('new-widget-area')) : ?>
                <div id="header-widget-area" class="nwa-header-widget widget-area" role="complementary">
                    <?php dynamic_sidebar('new-widget-area'); ?>
                </div>
            <?php endif; ?>
            <!-- fin nouvelle widget area -->
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>