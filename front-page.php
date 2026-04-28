<?php

/**
 * Template Name: Página Inicial
 */
get_header(); ?>

<main class="antialiased text-zinc-900 bg-zinc-50">

    <?php get_template_part('template-parts/section', 'hero'); ?>

    <?php get_template_part('template-parts/section', 'sobre'); ?>

    <?php get_template_part('template-parts/section', 'cards'); ?>

    <?php get_template_part('template-parts/section', 'noticias'); ?>

    <?php get_template_part('template-parts/section', 'marcas'); ?>

</main>

<?php get_footer(); ?>