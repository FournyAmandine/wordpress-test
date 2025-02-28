<?php
get_header();?>

    <style type="text/css">
        .recipe {
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
        }

        .travel-information {
            width: 320px;
            padding: 20px;
            background: #00d084;
            display: flex;
            flex-direction: column-reverse;
        }
        .travel_fig{
            display: block;
            position: relative;
            width: 100%;
            height: 0;
            padding-top: 100%;
            margin: 0;
        }
        .travel_img{
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h2><?= get_the_title(); ?></h2>

    <p><?= get_the_excerpt() ?></p>

    <div class="travel">
        <aside class="travel-information">
            <div>
                <h3>Informations de voyages</h3>
                <p>A compléter</p>
            </div>
            <figure class="travel_fig">
                <?= get_the_post_thumbnail(size:'large', attr: ['class'=>'travel_img'])?>
            </figure>
        </aside>

        <section class="travel_price">
            <h3>Prix</h3>
            <div><?= get_the_content(); ?></div>
        </section>
    </div>

    <!--on ferme la boucle-->
<?php endwhile; else: ?>
    <p>Ce voyage n'existe pas</p>
<?php endif; ?>
<?php get_footer()?>