<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    // Define se o header é transparente ou branco baseado na página
    $is_home = is_front_page();
    $header_bg = $is_home ? 'bg-transparent absolute' : 'bg-white shadow-lg';
    $text_color = $is_home ? 'text-white' : 'text-neutral-500';
    $logo = $is_home ? 'logo.png' : 'logo-white-theme.png';
    ?>
    <header class="<?= $header_bg ?> w-full top-0 z-50">
        <nav class="py-8">
            <div class="container mx-auto flex justify-between items-center">
                <a href="<?= home_url() ?>">
                    <img src="<?= get_template_directory_uri() ?>/dist/img/<?= $logo ?>" alt="<?php bloginfo('name'); ?>">
                </a>

                <div class="hidden lg:flex space-x-4">
                    <ul class="flex gap-2 <?= $text_color ?> items-center">
                        <?php /* Seu menu aqui... */ ?>
                    </ul>
                </div>

                <button id="navbarToggle" class="lg:hidden <?= $text_color ?> focus:outline-none z-[999]">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">...</svg>
                </button>
            </div>
        </nav>
        <?php get_template_part('template-parts/content', 'mobile-menu'); ?>
    </header>