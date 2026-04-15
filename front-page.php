<?php

/**
 * Template Name: Home Page
 * O arquivo principal da página inicial modular.
 */
get_header();

/**
 * Definição de Variáveis com Fallbacks Robustos
 * Usamos get_post_meta para independência de plugins (sem ACF)
 */
$post_id = get_the_ID();

// Status do evento (inscricao, kits, resultados) - Padrão: inscricao
$status_evento = get_post_meta($post_id, '_status_evento', true) ?: 'inscricao';

// Link do botão principal - Padrão: #
$link_principal = get_post_meta($post_id, '_link_status', true) ?: '#';

// Texto do botão principal - Padrão: Inscreva-se
$label_principal = get_post_meta($post_id, '_label_status', true) ?: 'Inscreva-se';
?>

<main id="primary" class="site-main">
    <?php get_template_part('template-parts/section', 'hero'); ?>

    <?php get_template_part('template-parts/section', 'extra-info'); ?>

    <?php get_template_part('template-parts/section', 'crucial-info'); ?>

    <?php get_template_part('template-parts/section', 'quick-links'); ?>

    <?php get_template_part('template-parts/section', 'home-news'); ?>
</main>

<?php get_footer(); ?>