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

    <section id="evento" class="py-20 bg-white">
        <div class="container mx-auto px-4 max-w-4xl text-center">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="prose prose-lg mx-auto text-gray-600">
                        <?php the_content(); ?>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>