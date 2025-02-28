<?php get_header(); ?>
    <style type="text/css">
        .sro{
            position: absolute;
            clip: rect(1px 1px 1px 1px);
            clip: rect(1px, 1px, 1px, 1px);
            height: 1px;
            overflow: hidden;
            width: 1px;
            padding: 0;
            border: 0;
            margin: -1px;
        }
        .trips{
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 1em;
        }
        .trip{
            position: relative;
            width: calc((100%-3em)/4);
        }
        .trip__link{
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        .trip__link:hover + .trip__card, .trip__link:focus + .trip__card{
            transform: translate3d()(O, -4px, 0);
        }
        .trip__card{
            position: relative;
            z-index: 0;
            border-radius: 4px;
            background: white;
            display: flex;
            flex-direction: column-reverse;
            transition: transform;
        }
        .trip__{
            display: block;
            position: relative;
            padding: 60% 0 0 0;
            margin: 0;
        }
        .trip__img{

        }
    </style>
    <aside>
        <h2>Bienvenu sur mon site&nbsp;!</h2>
    </aside>
    <!-- // on ouvre la boucle
     // structure de controle de contenu pour wordpress-->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div><?= get_the_content(); ?></div>
    <!--on ferme la boucle-->
<?php endwhile; else: ?>
    <p>La page est vide</p>
<?php endif; ?>
    <section>
        <h2>
            Mes voyages récents
        </h2>
        <div class="trips">
            <?php
            $travels = new WP_Query([
                'post_type' => 'travel',
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => 8,
            ]);
            if ($travels->have_posts()) :
                while ($travels->have_posts()) : $travels->the_post();?>
                <article class="trip">
                    <a href="<?= get_the_permalink()?>" class="trip__link">
                        <span class="sro">Découvrir le voyage <?= get_the_title();?></span>
                    </a>
                    <div class="trip__card">
                        <header class="trip__head">
                            <h3 class="trip__title">
                                <?= get_the_title();?>
                            </h3>
                            <p><time datetime="<?= date('c', $departure = get_field('departure'))?>">
                                    <?= date_i18n('F Y', $departure)?>
                                </time></p>
                        </header>
                        <figure class="travel__fig">
                            <?= get_the_post_thumbnail(size:'travel-side', attr: ['class'=>'travel__img'])?>
                        </figure>
                    </div>
                </article>
                <?php endwhile; else: ?>
                <p>Je n'ai pas de voyages récents</p>
            <?php endif; ?>
        </div>
    </section>
<?php get_footer(); ?>