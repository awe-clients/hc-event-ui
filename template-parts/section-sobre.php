<?php

/**
 * Template Part: Seção Sobre
 */
$subtitle = get_theme_mod('sobre_subtitle', 'Saúde & Integração');
$title    = get_theme_mod('sobre_title', 'O Evento da Medicina Potiguar');
$text     = get_theme_mod('sobre_text', 'A representação em movimento presente na padronagem VAVA reflete a dinâmica e a energia da nossa cooperativa.');
$image    = get_theme_mod('sobre_image', 'https://via.placeholder.com/800x1200/2e1065/FFFFFF?text=ATLETA');
?>
<section class="py-24 bg-white" id="prova">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 border border-zinc-200 overflow-hidden shadow-2xl">
            <div class="lg:col-span-7 p-10 md:p-20 flex flex-col justify-center bg-white">
                <div class="mb-10">
                    <span class="color-15km-text font-black text-xs uppercase tracking-[0.4em] mb-4 block">
                        <?php echo esc_html($subtitle); ?>
                    </span>
                    <h2 class="text-5xl md:text-7xl font-black italic uppercase tracking-tighter leading-none mb-8 color-5km-text">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                    <div class="h-2 w-24 coopanest-gradient mb-10"></div>
                </div>

                <div class="space-y-6 text-zinc-600 leading-relaxed text-lg font-medium">
                    <p><?php echo nl2br(esc_html($text)); ?></p>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-16 pt-10 border-t border-zinc-100 text-white text-center font-black italic uppercase">
                    <div class="color-5km-bg p-4 skew-element"><span class="unskew">5 KM</span></div>
                    <div class="color-10km-bg p-4 skew-element"><span class="unskew">10 KM</span></div>
                    <div class="color-15km-bg p-4 skew-element"><span class="unskew">15 KM</span></div>
                </div>
            </div>

            <div class="lg:col-span-5 relative min-h-[400px] color-5km-bg overflow-hidden pattern-vava-vazado">
                <img src="<?php echo esc_url($image); ?>" class="absolute inset-0 w-full h-full object-cover" alt="Sobre o Evento">
            </div>
        </div>
    </div>
</section>