<?php get_header(); ?>
        <aside>
            <h2>Bienvenu sur mon site&nbsp;!</h2>
        </aside>
       <!-- // on ouvre la boucle
        // structure de controle de contenu pour wordpress-->
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            <div><?= get_the_content(); ?></div>
        <!--on ferme la boucle-->
        <?php endwhile; else: ?>
        <p>La page est vide</p>
        <?php endif; ?>
<?php get_footer(); ?>