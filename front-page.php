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
    <section class="bg-blue-900 md:py-12 overflow-hidden">
        <div class="container mx-auto px-4 relative">

            <?php get_template_part('template-parts/header', 'status'); ?>

            <div class="relative overflow-hidden rounded-2xl shadow-2xl border-4 border-white/10">
                <div id="hero-slider" class="flex transition-transform duration-700 ease-in-out">

                    <?php
                    $has_slides = false;
                    for ($i = 1; $i <= 3; $i++) :
                        $img = get_theme_mod("hb_banner_img_$i");
                        $link = get_theme_mod("hb_banner_link_$i", '#');

                        if ($img) :
                            $has_slides = true;
                    ?>
                            <div class="min-w-full relative h-[300px] md:h-[500px]">
                                <a href="<?php echo esc_url($link); ?>">
                                    <img src="<?php echo esc_url($img); ?>" class="w-full h-full object-cover">
                                </a>
                            </div>
                        <?php
                        endif;
                    endfor;

                    // Fallback: Se nenhum banner for configurado, exibe um padrão
                    if (!$has_slides) : ?>
                        <div class="min-w-full relative h-[300px] md:h-[500px] bg-slate-800 flex items-center justify-center">
                            <span class="text-white opacity-50 uppercase font-black tracking-widest">Aguardando banners...</span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="absolute bottom-6 right-8 flex space-x-3 z-10">
                    <?php
                    for ($i = 1; $i <= 3; $i++) :
                        if (get_theme_mod("hb_banner_img_$i")) :
                            $idx = $i - 1;
                    ?>
                            <button onclick="moveHero(<?php echo $idx; ?>)" class="hero-dot w-3 h-3 rounded-full bg-white/50 transition-all hover:bg-white"></button>
                    <?php
                        endif;
                    endfor;
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>