<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

    <style>
        /* Variáveis de Cor Injetadas para Facilidade de Manutenção */

        .color-5km-bg {
            background-color: var(--color-5km);
        }

        .color-10km-bg {
            background-color: var(--color-10km);
        }

        .color-15km-bg {
            background-color: var(--color-15km);
        }

        .color-5km-text {
            color: var(--color-5km);
        }

        .color-10km-text {
            color: var(--color-10km);
        }

        .color-15km-text {
            color: var(--color-15km);
        }

        .coopanest-gradient {
            background: linear-gradient(135deg, #2e1065 0%, #1e1b4b 100%);
        }

        .skew-element {
            transform: skewX(-10deg);
        }

        .unskew {
            transform: skewX(10deg);
            display: inline-block;
        }

        :root {
            /* Cores das Modalidades e Marca */
            --brand-cta: <?php echo get_theme_mod('brand_cta', '#FFD100'); ?>;
            --color-5km: <?php echo get_theme_mod('color_5km', '#2e1065'); ?>;
            --color-10km: <?php echo get_theme_mod('color_10km', '#22c55e'); ?>;
            --color-15km: <?php echo get_theme_mod('color_15km', '#7e22ce'); ?>;

            /* Cores de Interface (Craft Design) */
            --text-main: <?php echo get_theme_mod('text_main', '#18181b'); ?>;
            
            /* Derivações Úteis */
            --brand-cta-hover: color-mix(in srgb, var(--brand-cta), black 10%);
            --border-subtle: color-mix(in srgb, var(--text-main), transparent 90%);
        }

        /* Aplicação Automática */
        body { 
            color: var(--text-main); 
        }
        .bg-yellow-brand { background-color: var(--brand-cta); }
    </style>
</head>

<body <?php body_class('antialiased text-zinc-900 bg-zinc-50'); ?>>
    <?php wp_body_open(); ?>

    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-sm border-b border-zinc-200 py-4 shadow-sm">
        <div class="container mx-auto px-6 flex justify-between items-center">

            <div class="flex-shrink-0">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        // Fallback se não houver logo
                        echo '<span class="font-black italic text-xl color-5km-text tracking-tighter">' . get_bloginfo('name') . '</span>';
                    }
                    ?>
                </a>
            </div>

            <div class="hidden lg:flex items-center text-[10px] font-black uppercase tracking-[0.2em]">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container'      => false,
                    'menu_class'     => 'flex gap-8',
                    'fallback_cb'    => '__return_false',
                    'add_li_class'   => 'text-zinc-600 hover:color-10km-text transition-colors'
                ));
                ?>
            </div>

            <?php
            // Puxando os dados do Customizer
            $cta_hide = get_theme_mod('header_cta_hide', false);
            $cta_text = get_theme_mod('header_cta_text', 'Inscreva-se');
            $cta_link = get_theme_mod('header_cta_link', '#');

            // Só exibe se o cliente NÃO marcou "Ocultar Botão"
            if (!$cta_hide) :
            ?>
                <a href="<?php echo esc_url($cta_link); ?>"
                    class="color-10km-bg text-white px-6 py-2 skew-element font-black text-xs uppercase italic hover:bg-green-600 transition-colors hidden md:inline-block"  target="_blank">
                    <span class="unskew"><?php echo esc_html($cta_text); ?></span>
                </a>
            <?php endif; ?>

            <button type="button" id="menu-toggle" class="lg:hidden text-zinc-900 p-2 focus:outline-none" aria-label="Abrir Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <div id="mobile-menu" class="hidden fixed inset-0 z-40 bg-white flex-col pt-24 px-6 lg:hidden">
                <div class="flex flex-col gap-6 text-sm font-black uppercase tracking-widest">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'container'      => false,
                        'items_wrap'     => '%3$s', // Remove o <ul> para controle direto do flex
                        'fallback_cb'    => '__return_false'
                    ));
                    ?>
                </div>
            </div>

        </div>
    </nav>