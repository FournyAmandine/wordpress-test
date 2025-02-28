<?php
get_header();?>

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
        .travel__header {
            height: 400px;
            width: 100%;
            position: relative;
        }
        .travel__back,
        .travel__back:before,
        .travel__head {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
        }
        .travel__back {
            z-index: 0;
            margin: 0;
            padding: 0;
        }
        .travel__back:before {
            content: '';
            display: block;
            background: rgb(132, 191, 243);
            opacity: 0.6;
        }
        .travel__cover {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .travel__head {
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .travel__container {
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
        }
        .travel__fig {
            display: block;
            position: relative;
            width: 100%;
            height: 0;
            padding-top: 100%;
            margin: 0;
        }
        .travel__img {
            display: block;
            position: absolute;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .travel__rating{
            width: 150px;
            height: 30px;
            display: block;
            position: relative;
            background: url(/wp-content/themes/dw/ressources/img/star_empty.svg);
            background-repeat: repeat-x;
            background-position: 0 0;
        }
        .travel__rating:after{
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 0;
            background: url(/wp-content/themes/dw/ressources/img/star.svg);
            background-repeat: repeat-x;
            background-position: 0 0;
        }
        .travel__rating[data-score="1"]:after{
            width: 30px;
        }
        .travel__rating[data-score="2"]:after{
            width: 60px;
        }
        .travel__rating[data-score="3"]:after{
            width: 90px;
        }
        .travel__rating[data-score="4"]:after{
            width: 120px;
        }.travel__rating[data-score="5"]:after{
             width: 100%;
         }
    </style>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



    <div class="travel">

        <header class="travel__header">
            <div class="travel__head">
                <h2 class="travel__title"><?= get_the_title(); ?></h2>
                <p class="travel__excerpt"><?= get_the_excerpt() ?></p>
                <div class="travel__rating" data-score="4">
                    <p class="sro">Ce voyage obtient l'appréciation de X étoiles sur 5</p><!--Lecteur vocaux-->

                </div>
            </div>

            <figure class="travel__back">
                <?= get_the_post_thumbnail(size:'travel-side', attr: ['class'=>'travel__cover'])?>
            </figure>

        </header>

        <aside class="travel-information">
            <div class="travel__container">
                <h3>Informations de voyages</h3>
                <p>A compléter</p>
            </div>
            <figure class="travel__fig">
                <?= get_the_post_thumbnail(size:'travel-side', attr: ['class'=>'travel_img'])?>
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