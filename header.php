<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,800;1,900&display=swap');

        /* Variáveis de Cor Dinâmicas com Fallback para a Identidade Corrida do Empreendedor */
        :root {
            --brand-cta: <?php echo get_theme_mod('brand_cta', '#e81c62'); ?>;
            /* Magenta */
            --color-5km: <?php echo get_theme_mod('color_5km', '#123774'); ?>;
            /* Azul Institucional */
            --color-10km: <?php echo get_theme_mod('color_10km', '#f9db3d'); ?>;
            /* Amarelo */
            --color-15km: <?php echo get_theme_mod('color_15km', '#3b93a5'); ?>;
            /* Ciano */
            --text-main: <?php echo get_theme_mod('text_main', '#123774'); ?>;
            /* Azul Escuro para Texto */
            --bg-light: <?php echo get_theme_mod('bg_light', '#fafafa'); ?>;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--text-main);
            background-color: var(--bg-light);
        }

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

        .bg-yellow-brand {
            background-color: var(--brand-cta);
        }

        /* Gradiente Atualizado para a Nova Identidade */
        .bom-vizinho-gradient {
            background: linear-gradient(135deg, var(--color-5km) 0%, var(--color-15km) 100%);
        }

        /* Utilitários de inclinação estrutural padronizados */
        .skew-element {
            transform: skewX(-12deg);
        }

        .unskew {
            transform: skewX(12deg);
            display: inline-block;
        }

        /* Normalização da Logo no Header */
        .custom-logo-link {
            display: flex;
            align-items: center;
        }

        .custom-logo-link img {
            max-height: 60px;
            width: auto;
            object-fit: contain;
            image-rendering: -webkit-optimize-contrast;
        }

        /* Normalização das Marcas de Patrocinadores */
        .item-marca img {
            max-height: 80px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
            filter: grayscale(100%);
            transition: filter 0.3s ease;
        }

        .item-marca img:hover {
            filter: grayscale(0%);
        }
    </style>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-M55WSFJ7');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body <?php body_class('antialiased'); ?>>
    <?php wp_body_open(); ?>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M55WSFJ7"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header>
        <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-sm border-b border-zinc-200 py-4 shadow-sm">
            <div class="container mx-auto px-6 flex justify-between items-center">

                <div class="flex-shrink-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo '<span class="font-black italic text-xl color-5km-text tracking-tighter uppercase">' . get_bloginfo('name') . '</span>';
                        }
                        ?>
                    </a>
                </div>

                <div class="hidden lg:flex items-center text-[11px] font-black uppercase tracking-[0.2em]">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'container'      => false,
                        'menu_class'     => 'flex gap-8',
                        'fallback_cb'    => '__return_false',
                        'add_li_class'   => 'text-[#123774] hover:text-[#e81c62] transition-colors'
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
                            class="bg-[#e81c62] text-white px-8 py-3 skew-element font-black text-xs uppercase italic hover:bg-[#123774] transition-colors hidden md:inline-block shadow-md" target="_blank">
                            <span class="unskew"><?php echo esc_html($cta_text); ?></span>
                        </a>
                    <?php endif; ?>

                    <button type="button" id="menu-toggle" class="lg:hidden text-[#123774] p-2 focus:outline-none" aria-label="Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

        <div id="mobile-menu" class="hidden fixed inset-0 z-40 bg-white flex-col pt-28 px-8 lg:hidden">
            <div class="flex flex-col gap-6 text-sm font-black uppercase tracking-widest border-t border-zinc-100 pt-8 text-[#123774]">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => '__return_false'
                ));
                ?>

                <?php if (!$cta_hide) : ?>
                    <a href="<?php echo esc_url($cta_link); ?>" class="bg-[#e81c62] text-white text-center py-4 mt-4 font-black uppercase italic text-xs shadow-md">
                        <?php echo esc_html($cta_text); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>