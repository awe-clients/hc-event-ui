<?php

/**
 * Template part: Seção Hero com Slider Dinâmico
 */
?>
<section class="bg-blue-900 md:py-12 overflow-hidden relative">
    <div class="absolute inset-0 opacity-10 pointer-events-none"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/pattern-vava-fill.png'); background-size: 250px;">
    </div>

    <div class="container mx-auto px-4 relative z-10">

        <?php get_template_part('template-parts/header', 'status'); ?>

        <div class="relative overflow-hidden rounded-2xl shadow-2xl border-4 border-white/10">
            <div id="hero-slider" class="flex transition-transform duration-700 ease-in-out">

                <?php
                $has_slides = false;
                for ($i = 1; $i <= 3; $i++) :
                    $img  = get_theme_mod("hb_banner_img_$i");
                    $link = get_theme_mod("hb_banner_link_$i", '#');

                    if ($img) :
                        $has_slides = true;
                ?>
                        <div class="min-w-full relative h-[300px] md:h-[500px]">
                            <a href="<?php echo esc_url($link); ?>">
                                <img src="<?php echo esc_url($img); ?>" class="w-full h-full object-cover" alt="Banner <?php echo $i; ?>">
                            </a>
                        </div>
                    <?php
                    endif;
                endfor;

                // Fallback: Se nenhum banner for configurado no Customizer
                if (!$has_slides) : ?>
                    <div class="min-w-full relative h-[300px] md:h-[500px] bg-slate-800 flex items-center justify-center">
                        <span class="text-white opacity-50 uppercase font-black tracking-widest italic">Aguardando banners no painel...</span>
                    </div>
                <?php endif; ?>
            </div>

            <div class="absolute bottom-6 right-8 flex space-x-3 z-10">
                <?php
                for ($i = 1; $i <= 3; $i++) :
                    if (get_theme_mod("hb_banner_img_$i")) :
                        $idx = $i - 1;
                ?>
                        <button onclick="moveHero(<?php echo $idx; ?>)"
                            class="hero-dot w-3 h-3 rounded-full bg-white/50 transition-all hover:bg-white focus:outline-none"
                            aria-label="Ir para o slide <?php echo $i; ?>"></button>
                <?php
                    endif;
                endfor;
                ?>
            </div>
        </div>
    </div>
</section>