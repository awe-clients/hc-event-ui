<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

    <style>
        /* Variáveis de Cor Dinâmicas com Fallback para a Identidade Rede MAIS */
        :root {
            --brand-cta: <?php echo get_theme_mod('brand_cta', '#facc15'); ?>; /* Amarelo */
            --color-5km: <?php echo get_theme_mod('color_5km', '#7f1d1d'); ?>; /* Vermelho Escuro */
            --color-10km: <?php echo get_theme_mod('color_10km', '#b91c1c'); ?>; /* Vermelho Médio */
            --color-15km: <?php echo get_theme_mod('color_15km', '#ef4444'); ?>; /* Vermelho Vibrante */
            --text-main: <?php echo get_theme_mod('text_main', '#18181b'); ?>;
            --bg-light: <?php echo get_theme_mod('bg_light', '#fafafa'); ?>;
        }

        .color-5km-bg { background-color: var(--color-5km); }
        .color-10km-bg { background-color: var(--color-10km); }
        .color-15km-bg { background-color: var(--color-15km); }
        
        .color-5km-text { color: var(--color-5km); }
        .color-10km-text { color: var(--color-10km); }
        .color-15km-text { color: var(--color-15km); }
        
        .bg-yellow-brand { background-color: var(--brand-cta); }

        /* Gradiente Atualizado para a Nova Identidade */
        .bom-vizinho-gradient {
            background: linear-gradient(135deg, var(--color-5km) 0%, var(--color-10km) 100%);
        }

        .skew-element { transform: skewX(-10deg); }
        .unskew { transform: skewX(10deg); display: inline-block; }

        body { 
            color: var(--text-main); 
            background-color: var(--bg-light); 
        }
    </style>
</head>

<body <?php body_class('antialiased'); ?>>
    <?php wp_body_open(); ?>

    <header>
        <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-sm border-b border-zinc-200 py-4">
            <div class="container mx-auto px-6 flex justify-between items-center">

                <div class="flex-shrink-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
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
                        'add_li_class'   => 'text-zinc-600 hover:color-15km-text transition-colors'
                    ));
                    ?>
                </div>

                <div class="flex items-center gap-4">
                    <?php
                    $cta_hide = get_theme_mod('header_cta_hide', false);
                    $cta_text = get_theme_mod('header_cta_text', 'Inscreva-se');
                    $cta_link = get_theme_mod('header_cta_link', '#');

                    if (!$cta_hide) :
                    ?>
                        <a href="<?php echo esc_url($cta_link); ?>"
                            class="bg-yellow-brand text-zinc-900 px-6 py-2 skew-element font-black text-xs uppercase italic hover:brightness-90 transition-all hidden md:inline-block" target="_blank">
                            <span class="unskew"><?php echo esc_html($cta_text); ?></span>
                        </a>
                    <?php endif; ?>

                    <button type="button" id="menu-toggle" class="lg:hidden text-zinc-900 p-2 focus:outline-none" aria-label="Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

        <div id="mobile-menu" class="hidden fixed inset-0 z-40 bg-white flex-col pt-28 px-8 lg:hidden">
            <div class="flex flex-col gap-6 text-sm font-black uppercase tracking-widest border-t border-zinc-100 pt-8">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => '__return_false'
                ));
                ?>
                
                <?php if (!$cta_hide) : ?>
                    <a href="<?php echo esc_url($cta_link); ?>" class="bg-yellow-brand text-zinc-900 text-center py-4 mt-4 font-black uppercase italic text-xs">
                        <?php echo esc_html($cta_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>