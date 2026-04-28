<?php

/**
 * Template Part: Hero Section com Cronômetro
 * Adaptado para: 1ª Corrida do Bom Vizinho - Rede MAIS
 */
$hero_sub     = get_theme_mod('hero_subtitle', 'O evento que conecta saúde, comunidade e energia.');
$hero_title   = get_theme_mod('hero_title', '1ª Corrida do Bom Vizinho');
$hero_date    = get_theme_mod('hero_date_text', '02 DE AGOSTO 2026');
$bg_desktop   = get_theme_mod('hero_bg_desktop');
$bg_tablet    = get_theme_mod('hero_bg_tablet');
$bg_mobile    = get_theme_mod('hero_bg_mobile');
$target_date  = get_theme_mod('hero_countdown_date', '2026-08-02 06:00:00'); 
?>

<section class="relative min-h-screen color-5km-bg flex items-center pt-20 overflow-hidden">
    <picture class="absolute inset-0 opacity-30">
        <source media="(max-width: 768px)" srcset="<?php echo esc_url($bg_mobile); ?>">
        <source media="(max-width: 1024px)" srcset="<?php echo esc_url($bg_tablet); ?>">
        <img src="<?php echo esc_url($bg_desktop); ?>" class="w-full h-full object-cover grayscale" alt="Fundo Hero">
    </picture>

    <div class="absolute inset-0 bg-red-950/60 mix-blend-multiply"></div>

    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-8 relative z-10">
        <div class="lg:col-span-8">
            <h4 class="text-yellow-400 font-black tracking-[0.3em] uppercase mb-4">
                <?php echo esc_html($hero_sub); ?>
            </h4>
            <h1 class="text-white text-5xl md:text-[5rem] font-black italic leading-[0.85] tracking-tighter uppercase mb-10">
                <?php echo esc_html($hero_title); ?>
            </h1>

            <?php if (get_theme_mod('header_cta_hide', false) == false) : ?>
                <a href="<?php echo esc_url(get_theme_mod('header_cta_link', '#')); ?>"
                    class="bg-yellow-brand text-red-950 px-10 py-5 text-xl font-black uppercase italic skew-element hover:bg-white transition-colors inline-block" target="_blank">
                    <span class="unskew"><?php echo esc_html(get_theme_mod('header_cta_text', 'Inscreva-se')); ?> <i class="fas fa-running ml-2"></i></span>
                </a>
            <?php endif; ?>
        </div>

        <div class="lg:col-span-4 flex flex-col justify-end space-y-4 pb-10">
            <?php if ($target_date) : ?>
                <div class="bg-yellow-brand py-4 skew-element border border-transparent" id="countdown-wrapper" data-date="<?php echo esc_attr($target_date); ?>">
                    <div class="unskew w-full">
                        <p class="text-[10px] font-black uppercase opacity-70 mb-2 text-center text-red-950">Contagem Regressiva</p>
                        <div class="flex justify-around font-black text-3xl text-red-950" id="timer">
                            <div class="flex flex-col items-center"><span id="days">00</span><small class="text-[9px]">DIAS</small></div>
                            <div class="flex flex-col items-center"><span id="hours">00</span><small class="text-[9px]">HORAS</small></div>
                            <div class="flex flex-col items-center"><span id="mins">00</span><small class="text-[9px]">MIN</small></div>
                            <div class="flex flex-col items-center"><span id="secs">00</span><small class="text-[9px]">SEG</small></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>