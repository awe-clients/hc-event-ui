<?php

/**
 * Redireciona usuários não logados para a página de espera
 */
function coopanest_maintenance_mode()
{
    // Verifica se o usuário não está logado e se não está na tela de login
    if (!is_user_logged_in() && !is_login()) {
        // Busca o arquivo template-espera.php na raiz do tema
        include(get_template_directory() . '/template-espera.php');
        exit;
    }
}
add_action('template_redirect', 'coopanest_maintenance_mode');



function coopanest_scripts()
{
    // 1. Tailwind CSS via CDN (Crucial para renderizar as classes que usamos)
    //wp_enqueue_style('tailwind-cdn', 'https://cdn.tailwindcss.com', array(), null);

    // 2. Estilo principal do tema (style.css na raiz do tema)
    wp_enqueue_style('coopanest-main-style', get_stylesheet_uri(), array('tailwind-cdn'), '1.0.0');

    // 3. Script para o Menu e Galerias (localizado na pasta /js/)
    wp_enqueue_script('coopanest-scripts', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'coopanest_scripts');

function coopanest_enqueue_tailwind()
{
    // O Tailwind Play CDN é um script que processa as classes em tempo real
    wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com', array(), null, false);
}
add_action('wp_enqueue_scripts', 'coopanest_enqueue_tailwind');
