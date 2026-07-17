<?php

/**
 * Template Part: Hero Section com Cronômetro
 * Adaptado para: 1ª Corrida do Empreendedor (Sebrae)
 */
$hero_sub     = get_theme_mod('hero_subtitle', '1ª EDIÇÃO');
$hero_title   = get_theme_mod('hero_title', 'CORRIDA DO EMPREENDEDOR');
$hero_date    = get_theme_mod('hero_date_text', '24 DE OUTUBRO');
$bg_desktop   = get_theme_mod('hero_bg_desktop');
$bg_tablet    = get_theme_mod('hero_bg_tablet');
$bg_mobile    = get_theme_mod('hero_bg_mobile');
$target_date  = get_theme_mod('hero_countdown_date', '2026-10-24 06:00:00');
// style="background: repeating-radial-gradient(circle at 50% 150%, transparent, transparent 40px, rgba(255, 255, 255, 0.04) 41px, rgba(255, 255, 255, 0.04) 80px);"
?>

<section class="relative min-h-screen bg-[#123774] flex items-center pt-20 overflow-hidden font-montserrat">

    <picture class="absolute inset-0 opacity-40">
        <source media="(max-width: 768px)" srcset="<?php echo esc_url($bg_mobile); ?>">
        <source media="(max-width: 1024px)" srcset="<?php echo esc_url($bg_tablet); ?>">
        <img src="<?php echo esc_url($bg_desktop); ?>" class="w-full h-full object-cover mix-blend-overlay" alt="Fundo Hero">
    </picture>

    <div class="absolute inset-0 bg-[#0c2b6b]/70"></div>
    <div class="absolute inset-0 pointer-events-none"></div>

    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-8 relative z-10 py-12">

        <div class="lg:col-span-8 flex flex-col justify-center items-start">

            <p class="text-yellow-400 font-black italic tracking-widest text-sm md:text-base mb-2 uppercase">
                / / / / / <?php echo esc_html($hero_sub); ?>
            </p>

            <h1 class="text-white text-5xl md:text-[5.5rem] font-black italic leading-[0.9] tracking-tighter uppercase mb-4" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.4);">
                <?php
                // Processa o título para aplicar a cor ciano na última palavra (ex: "DO EMPREENDEDOR")
                $title_words = explode(' ', esc_html($hero_title));
                if (count($title_words) > 1) {
                    $last_word = array_pop($title_words);
                    echo implode(' ', $title_words) . ' <span class="text-[#3b93a5]">' . $last_word . '</span>';
                } else {
                    echo esc_html($hero_title);
                }
                ?>
            </h1>

            <?php if (!empty($hero_date)) : ?>
                <p class="text-yellow-400 font-black italic tracking-widest text-xl md:text-3xl mb-8 uppercase">
                    / / / / <?php echo esc_html($hero_date); ?> \ \ \ \
                </p>
            <?php endif; ?>

            <?php if (get_theme_mod('header_cta_hide', false) == false) : ?>
                <div class="mt-4">
                    <a href="<?php echo esc_url(get_theme_mod('header_cta_link', '#')); ?>"
                        class="bg-[#e81c62] text-white px-10 py-5 text-xl font-black uppercase italic skew-element hover:bg-white hover:text-[#e81c62] transition-colors inline-block shadow-xl" target="_blank">
                        <span class="unskew"><?php echo esc_html(get_theme_mod('header_cta_text', 'Inscreva-se')); ?> <i class="fas fa-running ml-2"></i></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="lg:col-span-4 flex flex-col justify-end lg:justify-center space-y-6 lg:pb-10">

            <div class="flex flex-col items-end gap-3 hidden lg:flex mb-6">
                <span class="rounded-full px-5 py-1.5 text-sm font-extrabold uppercase tracking-wide bg-[#8cb8d9] text-[#123774]">Esporte & Saúde</span>
                <span class="rounded-full px-5 py-1.5 text-sm font-extrabold uppercase tracking-wide bg-[#f9db3d] text-[#123774]">Networking</span>
            </div>

            <?php if ($target_date) : ?>
                <div class="bg-white/10 backdrop-blur-md border border-white/20 py-6 skew-element shadow-2xl" id="countdown-wrapper" data-date="<?php echo esc_attr($target_date); ?>">
                    <div class="unskew w-full px-4">
                        <p class="text-xs font-black uppercase tracking-widest opacity-80 mb-4 text-center text-white">Contagem Regressiva</p>
                        <div class="flex justify-around font-black text-4xl text-yellow-400 italic" id="timer">
                            <div class="flex flex-col items-center"><span id="days">00</span><small class="text-[10px] text-white mt-1 uppercase tracking-wider not-italic">DIAS</small></div>
                            <div class="flex flex-col items-center"><span id="hours">00</span><small class="text-[10px] text-white mt-1 uppercase tracking-wider not-italic">HORAS</small></div>
                            <div class="flex flex-col items-center"><span id="mins">00</span><small class="text-[10px] text-white mt-1 uppercase tracking-wider not-italic">MIN</small></div>
                            <div class="flex flex-col items-center"><span id="secs">00</span><small class="text-[10px] text-[#3b93a5] mt-1 uppercase tracking-wider not-italic">SEG</small></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    .font-montserrat {
        font-family: 'Montserrat', sans-serif;
    }
</style>