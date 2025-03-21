<?php

//Charger les fichiers fields de ACF
include_once('fields.php');


function hepl_trad_load_textdomain(): void
{
    load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');
}

add_action('after_setup_theme', 'hepl_trad_load_textdomain');

function __hepl(string $translation, array $replacements = [])
{
// 1. Récupérer la traduction de la phrase présente dans $translation
    $base = __($translation, 'hepl-trad');

// 2. Remplacer toutes les occurrences des variables par leur valeur
    foreach ($replacements as $key => $value) {
        $variable = ':' . $key;
        $base = str_replace($variable, $value, $base);
    }

// 3. Retourner la traduction complète.
    return $base;
}

//Gutenberg est le nouvel éditeur de contenu propre à wordpress, il ne nous intéresse pas pour l'utilisation du thème que nous allons créer

// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');

// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');
// Disable default front-end styles. 
add_action('wp_enqueue_scripts', function () {
    // Remove CSS on the front end.
    wp_dequeue_style('wp-block-library');
    // Remove Gutenberg theme.
    wp_dequeue_style('wp-block-library-theme');
    // Remove inline global CSS on the front end.
    wp_dequeue_style('global-styles');
}, 20);

//queue : mise en file. Prépare l'objet pour charger les éléments
//enqueue : enlève de la file d'attente

//Activer l'utilisation des vignettes (images de couverture) sur nos post_types

add_theme_support('post-thumbnails', ['recipe', 'travel']);

// enregistrer de nouveaux types de contenu qui seront stokés dans la table wp_post avec un identifiant de type spécific dans la colonne post_type

register_post_type('recipe', [
    'label' => 'Recettes',
    'description' => 'Les recettes liées à nos voyages',
    'menu_position' => 6,
    'menu_icon' => 'dashicons-carrot',
    'public' => true,
    'has_archive' => true,
    //'show_in_nav_menus' => true,
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
    'has_archive' => true,
    //'show_in_nav_menus' => true,
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

//Ajouter des catégories (taxonomie) sur ces post_types :
register_taxonomy('course', ['recipe'],[
    'labels' => [
        'name' => 'Services',
        'singular_name' => 'Service'
    ],
    'description' =>'A quel moment du repas ce plat intervient-il?',
    'public' => true,
    'hierarchical' => true,
    'tag_cloud' => false,
]);

register_taxonomy('diet', ['recipe'],[
    'labels' => [
        'name' => 'Régimes alimentaires',
        'singular_name' => 'Régime'
    ],
    'description' =>'A quel type de régime appartient cette recette?',
    'public' => true,
    'hierarchical' => true,
    'tag_cloud' => false,
]);

//Paramétrer des tailles d'images pour le générateur de thumbnails de Wordpress :
add_image_size('travel-side', 420, 420); // sans recadrage
add_image_size('travel-header', 1920, 400, true); // avec recadrage
add_image_size('recipe-header', 1920, 400, true);

//enregistrer les menus de navigation en focntion de l'endroit àù ils sont exploités
register_nav_menu('header', 'Le menu de navigation principale en haut de page');
register_nav_menu('footer', 'Le menu de navigation principale en fin de page');


//Créer une nouvelle fonction qui permet de retourner un menu de navigation formaté en un tableau d'objets afin de pouvoir l'affiche à notre guise dans le template

function dw_get_navigation_links(string $location): array
{
    //Récupérer l'objet WP pour le menu à la location $location
    $locations = get_nav_menu_locations();

    if (!isset($locations[$location])) {
        return [];
    }

    $nav_id = $locations[$location];
    $nav = wp_get_nav_menu_items($nav_id);

    //Transformer le menu en un tableau de liens, chaque lien est un objet personnalisé

    $links = [];

    foreach ($nav as $post) {
        $link = new stdClass();
        $link->href = $post->url;
        $link->label = $post->title;
        //$link->children = []; sous menus
        $link->icon = get_field('icon', $post);

        $links[] = $link;
        //array_push($links, $link);
    }
    //Retourner le tableau d'objets (liens)
    return $links;
}


// Créer une fonction qui permet de créer des pages d'options ACF pour le thème :
function create_site_options_page() {
    if (function_exists('acf_add_options_page')) {
        // Page principale
        acf_add_options_page([
            'page_title'  => 'Site Options',
            'menu_title'  => 'Site Settings',
            'menu_slug'   => 'site-options',
            'capability'  => 'edit_posts',
            'redirect'    => false
        ]);

        // Sous-pages
        acf_add_options_sub_page([
            'page_title'  => 'Company Settings',
            'menu_title'  => 'Company',
            'parent_slug' => 'site-options',
        ]);

        acf_add_options_sub_page([
            'page_title'  => 'SEO Settings',
            'menu_title'  => 'SEO',
            'parent_slug' => 'site-options',
        ]);
    }
}

add_action('acf/init', 'create_site_options_page');

//Ajouter la fonctionnalité post pour un formulaire de contact personnalisé
add_action('admin_post_nopriv_dw_submit_contact_form', 'dw_handle_contact_form');
add_action('admin_post_dw_submit_contact_form', 'dw_handle_contact_form');

function dw_handle_contact_form(){
    var_dump($_POST); die();
}