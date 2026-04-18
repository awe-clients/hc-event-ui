<?php

/**
 * Template Part: Hero Section com Cronómetro
 */
$hero_sub     = get_theme_mod('hero_subtitle', 'Integração e Desempenho');
$hero_date    = get_theme_mod('hero_date_text', '15 OUTUBRO');
$bg_desktop = get_theme_mod('hero_bg_desktop');
$bg_tablet  = get_theme_mod('hero_bg_tablet');
$bg_mobile  = get_theme_mod('hero_bg_mobile');
$target_date  = get_theme_mod('hero_countdown_date'); // Formato: 2026-10-15 06:00:00
?>

<section class="relative min-h-screen bg-slate-900 flex items-center pt-20 overflow-hidden">
    <picture class="absolute inset-0 opacity-40">
        <source media="(max-width: 768px)" srcset="<?php echo esc_url($bg_mobile); ?>">
        <source media="(max-width: 1024px)" srcset="<?php echo esc_url($bg_tablet); ?>">
        <img src="<?php echo esc_url($bg_desktop); ?>" class="w-full h-full object-cover" alt="Fundo Hero">
    </picture>

    <div class="absolute inset-0 bg-blue-900/40 mix-blend-multiply"></div>

    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-8 relative z-10">
        <div class="lg:col-span-8">
            <h4 class="text-yellow-400 font-black tracking-[0.3em] uppercase mb-4">
                <?php echo esc_html($hero_sub); ?>
            </h4>
            <h1 class="text-white text-6xl md:text-[8rem] font-black italic leading-[0.85] tracking-tighter uppercase mb-10">
                3ª Corrida<br>COOPANEST
            </h1>

            <?php if (get_theme_mod('header_cta_hide', false) == false) : ?>
                <a href="<?php echo esc_url(get_theme_mod('header_cta_link', '#')); ?>"
                    class="btn-brand bg-yellow-400 text-blue-900 px-10 py-5 text-xl font-black uppercase italic skew-element hover:bg-white transition-all inline-block">
                    <span class="unskew"><?php echo esc_html(get_theme_mod('header_cta_text', 'Inscreva-se')); ?> <i class="fas fa-running ml-2"></i></span>
                </a>
            <?php endif; ?>
        </div>

        <div class="lg:col-span-4 space-y-4">
            <div class="bg-black/80 border border-yellow-400/30 p-6 flex justify-between items-center backdrop-blur-sm">
                <div class="text-white">
                    <p class="text-[10px] font-bold uppercase opacity-60">Edição</p>
                    <p class="text-5xl font-black italic text-yellow-400">3ª</p>
                </div>
                <div class="text-right text-white">
                    <p class="text-[10px] font-bold uppercase opacity-60">Próxima Largada</p>
                    <p class="text-2xl font-black"><?php echo esc_html($hero_date); ?></p>
                </div>
            </div>

            <?php if ($target_date) : ?>
                <div class="bg-yellow-400 p-6 skew-element" id="countdown-wrapper" data-date="<?php echo esc_attr($target_date); ?>">
                    <div class="unskew w-full">
                        <p class="text-[10px] font-black uppercase opacity-70 mb-2 text-center" id="countdown-label">Contagem Regressiva</p>
                        <div class="flex justify-around font-black text-2xl text-blue-900" id="timer">
                            <div class="flex flex-col items-center"><span id="days">00</span><small class="text-[8px]">DIAS</small></div>
                            <div class="flex flex-col items-center"><span id="hours">00</span><small class="text-[8px]">HORAS</small></div>
                            <div class="flex flex-col items-center"><span id="mins">00</span><small class="text-[8px]">MIN</small></div>
                            <div class="flex flex-col items-center"><span id="secs">00</span><small class="text-[8px]">SEG</small></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>