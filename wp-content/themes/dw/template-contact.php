<?php /*Template Name:Page "Contact"*/ ?>

<?php get_header(); ?>
    <aside>
        <h2>Contactez-moi!</h2>
    </aside>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="contact">
        <div class="contact__left"><?= get_the_content(); ?></div>
        <div class="contact__right">
            <form action="<?= admin_url('admin-post.php') ?>" method="post" class="form">
                <fieldset class="form_fields">
                    <div class="field">
                        <label for="firstname">Prénom</label>
                        <input type="text" name="firstname" id="firstname" class="field_input">
                    </div>
                    <div class="field">
                        <label for="lastname">Nom</label>
                        <input type="text" name="lastname" id="lastname" class="field_input">
                    </div>
                    <div class="field">
                        <label for="email">Adresse email</label>
                        <input type="text" name="email" id="email" class="field_input">
                    </div>
                    <div class="field">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="field_input"></textarea>
                    </div>
                </fieldset>
                <div class="form_submit">
                    <?php // ce champs hidden permet à wordpress d'identifier la requête et de transmettre à notre fonction définie dans functions.php via "add_action('admin_post_[nom-action]')"?>
                    <input type="hidden" name="action" value="dw_submit_contact_form">
                    <button type="submit" class="btn">Envoyer</button>
                </div>
            </form>
        </div>
    </section>
<?php endwhile; else: ?>
    <p>La page est vide</p>
<?php endif; ?>
<?php get_footer(); ?>