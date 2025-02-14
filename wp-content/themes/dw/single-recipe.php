<?php
    get_header(); ?>
    <style type="text/css">
        .recipe{
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
        }
        .recipe_ingredients{
            width: 320px;
            padding: 20px;
            background: #00d084;
        }
    </style>
    <!-- // on ouvre la boucle
     // structure de controle de contenu pour wordpress-->
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <h2><?= get_the_title(); ?></h2>

    <div class="recipe">
        <aside class="recipe_ingredients">
            <h3>Ingrédients</h3>
            <p>A compléter</p>
        </aside>

        <section class="recipe_steps">
            <h3>Etapes</h3>
            <div><?= get_the_content(); ?></div>
        </section>
    </div>

    <!--on ferme la boucle-->
<?php endwhile; else: ?>
    <p>Cette recette n'existe pas</p>
<?php endif; ?>
<?php get_footer(); ?>