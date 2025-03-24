
        </main>
        <footer>
            <?php wp_nav_menu( ['theme_location' => 'footer', 'container' => 'nav', ]);?>
            <p>© <?= get_bloginfo();?></p>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>