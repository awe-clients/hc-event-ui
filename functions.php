<?php

/**
 * Configurações e carregamento de recursos do tema Crion Eventos.
 *
 * @package Crion_Eventos
 */

defined('ABSPATH') || exit;

/**
 * Registra os recursos suportados pelo tema.
 */
function crion_theme_setup()
{
    load_theme_textdomain('crion-eventos', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support(
        'custom-logo',
        array(
            'height'               => 272,
            'width'                => 640,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true,
        )
    );

    add_theme_support(
        'html5',
        array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'script',
            'style',
            'navigation-widgets',
        )
    );
}
add_action('after_setup_theme', 'crion_theme_setup');

/**
 * Retorna a versão de um ativo com base na última modificação do arquivo.
 * Isso evita que o navegador mantenha CSS antigo após uma publicação.
 *
 * @param string $relative_path Caminho relativo à raiz do tema.
 * @return string
 */
function crion_asset_version($relative_path)
{
    $file_path = get_theme_file_path($relative_path);

    return file_exists($file_path)
        ? (string) filemtime($file_path)
        : (string) wp_get_theme()->get('Version');
}

/**
 * Localiza o CSS compilado do Tailwind.
 *
 * O caminho preferencial é assets/css/theme.css. Como o build original usa
 * hash no nome, a função também aceita arquivos no padrão index-*.css.
 *
 * @return string Caminho relativo do CSS ou string vazia.
 */
function crion_get_compiled_css()
{
    $preferred = 'assets/css/theme.css';

    if (file_exists(get_theme_file_path($preferred))) {
        return $preferred;
    }

    $matches = glob(get_theme_file_path('assets/css/index-*.css'));

    if (! empty($matches)) {
        sort($matches, SORT_STRING);

        return 'assets/css/' . basename(end($matches));
    }

    return '';
}

/**
 * Carrega as folhas de estilo do tema conforme a API do WordPress.
 */
function crion_enqueue_assets()
{
    wp_enqueue_style(
        'crion-style',
        get_stylesheet_uri(),
        array(),
        crion_asset_version('style.css')
    );

    $compiled_css = crion_get_compiled_css();

    if ($compiled_css) {
        wp_enqueue_style(
            'crion-tailwind',
            get_theme_file_uri($compiled_css),
            array('crion-style'),
            crion_asset_version($compiled_css)
        );
    }
}
add_action('wp_enqueue_scripts', 'crion_enqueue_assets');
