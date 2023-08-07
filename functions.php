<?php

function theme_enqueue_styles()
{
    // Chargement du fichier css qui lie le thème parent generatepress
    wp_enqueue_style('parent-style', get_stylesheet_directory_uri() . '/style.css');
    // Chargement du fichier css
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/CSS/theme.css'));
    // Chargement du fichier script
    wp_enqueue_script('jquery');
    wp_enqueue_script('theme-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true);
}
// Action qui permet de charger des scripts dans notre thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 20);

// fonction qui ajoute la taxonomie et le CPT.
function cptrenaud_init()
{
    register_taxonomy('categorie', '{custom_post_type}', [
        'labels' => [
            'name' => 'Catégorie',
            'singular_name' => 'Catégorie',
            'plural_name' => 'Catégories',
            'search_items' => 'Rechercher des catégories',
            'all_item' => 'Toutes les catégories',
            'edit_item' => 'Editer la catégorie',
            'update_item' => 'Mettre à jour la catégories',
            'add_new_item' => 'Ajouter une nouvelle catégorie',
            'new_item_name' => 'Ajouter une nouvelle catégorie',
            'menu_name' => 'Catégorie',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true
    ]);

    register_post_type('projects', [
        'label' => 'Projects',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => ['title', 'thumbnail', 'custom-fields'],
        'taxonomies' => ['categorie'],
        'has_archive' => true,
    ]);
}

add_action('init', 'cptrenaud_init');

function taxonomy_get_the_terms($taxonomy)
{
    $terms = get_the_terms(get_the_ID(), $taxonomy);
    foreach ($terms as $term) {
        $term = $term->name;
        echo "<div class='card-term'>$term</div>";
    }
}