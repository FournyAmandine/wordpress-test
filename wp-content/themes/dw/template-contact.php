<?php /*Template Name:Page "Contact"*/ ?>

<?php get_header(); ?>
    <aside>
        <h2>Contactez-moi!</h2>
    </aside>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="contact">
        <div class="contact__left"><?= get_the_content(); ?></div>
        <div class="contact__right">
            <?= do_shortcode('[contact-form-7 id="ec509ed" title="Formulaire page contact"]')?>
        </div>
    </section>
<?php endwhile; else: ?>
    <p>La page est vide</p>
<?php endif; ?>
<?php get_footer(); ?>