<?php

//Gutenberg est le nouvel éditeur de contenu propre à wordpress, il ne nous intéresse pas pour l'utilisation du thème que nous allons créer

// Disable Gutenberg on the back end.
add_filter( 'use_block_editor_for_post', '__return_false' );

// Disable Gutenberg for widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
// Disable default front-end styles. 
add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );
    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );
    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );

//queue : mise en file. Prépare l'objet pour charger les éléments
//enqueue : enlève de la file d'attente

//Activer l'utilisation des vignettes (images de couverture) sur nos post_types

add_theme_support( 'post-thumbnails', ['recipe', 'travel'] );

// enregistrer de nouveaux types de contenu qui seront stokés dans la table wp_post avec un identifiant de type spécific dans la colonne post_type

register_post_type('recipe', [
    'label' => 'Recettes',
    'description' => 'Les recettes liées à nos voyages',
    'menu_position' => 6,
    'menu_icon' => 'dashicons-carrot',
    'public' => true,
    'rewrite' => [
        'slug' => 'recettes'
    ],
    'supports' => [
        'title',
        'editor',
        'excerpt',
        'thumbnail',
    ]
]);

register_post_type('travel', [
    'label' => 'Voyages',
    'description' => 'Les voyages que nous avons réalisés',
    'menu_position' => 5,
    'menu_icon' => 'dashicons-airplane',
    'public' => true,
    'rewrite' => [
        'slug' => 'voyages'
    ],
    'supports' => [
        'title',
        'editor',
        'excerpt',
        'thumbnail',
    ]
]);

