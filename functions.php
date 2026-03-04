<?php

// 1. Suporte e CF7 (Igual ao seu original)
function equatorial_setup()
{
    add_theme_support('post-thumbnails');
    add_filter('wpcf7_autop_or_not', '__return_false');
}
add_action('after_setup_theme', 'equatorial_setup');

// 2. Carregamento de CSS/JS (Necessário para as novas páginas)
function equatorial_assets()
{
    $uri = get_template_directory_uri();
    wp_enqueue_style('main-styles', $uri . '/dist/css/styles.css', [], '1.0');
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_script('main-js', $uri . '/dist/js/index.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'equatorial_assets');

// 3. Função Global de ID (Necessária para simplificar Home/Footer)
function get_home_id()
{
    $id = get_option('page_on_front');
    return $id ? $id : (get_page_by_path('home') ? get_page_by_path('home')->ID : null);
}

// 4. Seus CPTs (Exatamente com seus Labels originais)
function create_custom_post_types()
{
    // Perguntas
    register_post_type('perguntas', [
        'labels' => [
            'name' => __('Perguntas'),
            'singular_name' => __('Pergunta'),
            'add_new' => __('Adicionar Nova'),
            'add_new_item' => __('Adicionar Nova Pergunta'),
            'edit_item' => __('Editar Pergunta'),
            'all_items' => __('Todas as Perguntas'),
            'not_found' => __('Nenhuma pergunta encontrada.'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-editor-help',
        'supports' => ['title', 'editor', 'thumbnail']
    ]);

    // Atributos
    register_post_type('atributos', [
        'labels' => [
            'name' => __('Atributos'),
            'singular_name' => __('Atributo'),
            'add_new' => __('Adicionar Novo'),
            'add_new_item' => __('Adicionar Novo Atributo'),
            'not_found' => __('Nenhum atributo encontrado.'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-list-view',
        'supports' => ['title', 'editor', 'thumbnail']
    ]);
}
add_action('init', 'create_custom_post_types');
