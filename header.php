<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    /* Removida a tag <title> manual. 
       O Yoast SEO gerencia o título através do add_theme_support('title-tag') no functions.php 
    */
    wp_head();
    ?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body <?php body_class('bg-white antialiased text-slate-900'); ?>>
    <?php wp_body_open(); ?>

    <a href="#primary" class="sr-only focus:not-sr-only focus:absolute focus:z-[200] focus:bg-white focus:p-4 focus:text-blue-900">
        Pular para o conteúdo
    </a>

    <header class="bg-white border-b border-gray-100 sticky top-0 z-[100] shadow-sm" role="banner">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-20 md:h-24">

                <div class="flex-shrink-0" itemscope itemtype="http://schema.org/Organization">
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                        class="block focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg"
                        rel="home"
                        itemprop="url">
                        <?php
                        if (has_custom_logo()) {
                            // O Yoast cuida dos atributos alt se configurado corretamente na biblioteca
                            the_custom_logo();
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/assets/img/logo.svg" 
                                       alt="' . get_bloginfo('name') . ' - Página Inicial" 
                                       class="h-10 md:h-14 w-auto object-contain"
                                       itemprop="logo">';
                        }
                        ?>
                    </a>
                </div>

                <nav class="hidden md:block" role="navigation" aria-label="Navegação Principal">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'container'      => false,
                        'menu_class'     => 'flex items-center space-x-8',
                        'fallback_cb'    => '__return_false',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                        'add_li_class'   => 'text-gray-600 hover:text-blue-900 font-bold text-sm uppercase tracking-wide transition-colors focus-within:text-blue-900'
                    ));
                    ?>
                </nav>

                <div class="md:hidden flex items-center">
                    <button type="button"
                        onclick="toggleMenu()"
                        class="text-blue-900 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-md"
                        id="menu-button"
                        aria-expanded="false"
                        aria-controls="mobile-menu"
                        aria-label="Abrir menu de navegação">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="hidden md:hidden bg-white border-t border-gray-100" id="mobile-menu" role="menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu', // Usando o mesmo menu para consistência SEO
                'container'      => false,
                'menu_class'     => 'px-4 py-6 space-y-4 font-bold text-base uppercase tracking-wide text-gray-800',
            ));
            ?>
        </div>
    </header>


    <!-- -->