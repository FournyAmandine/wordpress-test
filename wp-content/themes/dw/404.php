<?php get_header(); ?>

<div>
    <h1>
        Page non trouvée
    </h1>
    <p>
        Désolée, la page que vous recherchez n'existe pas ou a été déplacée
    </p>
    <p>
        Retour à la <a href="<?= home_url()?>" title="Retour à la page d'accueil">page d'accueil</a> ou utilisez la recherche
    </p>
    <?php get_search_form()?>
</div>

<?php get_footer(); ?>
