<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body <?php body_class('bg-white'); ?>>
    <?php wp_body_open(); ?>

    <header class="bg-white border-b border-gray-100 sticky top-0 z-[100] shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-20 md:h-24">

                <div class="flex-shrink-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="block focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/assets/img/logo.svg" alt="' . get_bloginfo('name') . '" class="h-10 md:h-14 w-auto object-contain">';
                        }
                        ?>
                    </a>
                </div>

                <nav class="hidden md:block" aria-label="Navegação Principal">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'flex items-center space-x-8',
                        'fallback_cb'    => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'link_before'    => '<span class="text-gray-600 hover:text-blue-900 font-bold text-sm uppercase tracking-wide transition-colors">',
                        'link_after'     => '</span>',
                    ));
                    ?>
                </nav>

                <div class="md:hidden flex items-center">
                    <button type="button" onclick="toggleMenu()" class="text-blue-900 p-2 focus:outline-none rounded-md" id="menu-button">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="hidden md:hidden bg-white border-t border-gray-100" id="mobile-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => 'ul',
                'menu_class'     => 'px-4 py-6 space-y-4 font-bold text-base uppercase tracking-wide text-gray-800',
            ));
            ?>
        </div>
    </header>