<?php

function create_perguntas_post_type() {
    $labels = array(
        'name' => __('Perguntas'),
        'singular_name' => __('Pergunta'),
        'menu_name' => __('Perguntas'),
        'name_admin_bar' => __('Pergunta'),
        'add_new' => __('Adicionar Nova'),
        'add_new_item' => __('Adicionar Nova Pergunta'),
        'new_item' => __('Nova Pergunta'),
        'edit_item' => __('Editar Pergunta'),
        'view_item' => __('Ver Pergunta'),
        'all_items' => __('Todas as Perguntas'),
        'search_items' => __('Pesquisar Perguntas'),
        'parent_item_colon' => __('Pergunta Pai:'),
        'not_found' => __('Nenhuma pergunta encontrada.'),
        'not_found_in_trash' => __('Nenhuma pergunta encontrada no lixo.')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_menu' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-editor-help'
    );

    register_post_type('perguntas', $args);
}
add_action('init', 'create_perguntas_post_type');

function create_atributos_post_type() {
    $labels = array(
        'name' => __('Atributos'),
        'singular_name' => __('Atributo'),
        'menu_name' => __('Atributos'),
        'name_admin_bar' => __('Atributo'),
        'add_new' => __('Adicionar Novo'),
        'add_new_item' => __('Adicionar Novo Atributo'),
        'new_item' => __('Novo Atributo'),
        'edit_item' => __('Editar Atributo'),
        'view_item' => __('Ver Atributo'),
        'all_items' => __('Todas os Atributos'),
        'search_items' => __('Pesquisar Atributos'),
        'parent_item_colon' => __('Atributo Pai:'),
        'not_found' => __('Nenhum atributo encontrado.'),
        'not_found_in_trash' => __('Nenhum atributos encontrado no lixo.')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_menu' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-list-view'
    );

    register_post_type('atributos', $args);
}
add_action('init', 'create_atributos_post_type');

# contact-form-7

add_filter('wpcf7_autop_or_not', '__return_false');

add_theme_support('post-thumbnails');

